<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('blog as b')
        ->join('users as u', 'u.id', '=', 'b.users_id')
        ->select('b.*', 'u.name as nama')
        ->get();
        return view('admin.blog.index', compact('data'));
    }
    public function user()
    {
        $data = DB::table('blog as b')
        ->join('users as u', 'u.id', '=', 'b.users_id')
        ->select('b.*', 'u.name as nama')
        ->get();
        return view('user.blog', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Foto
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move(public_path().'/foto_blog/', $nama_file);
        $name = $nama_file;

        BlogModel::insert([
            'users_id' => Auth::user()->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $name,
            'tanggal' => $request->tanggal,
        ]);
        Alert::success('Success', 'Succes Add Blog!');
        return redirect()->route('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('blog')
        ->where('id', $id)
        ->get();
        return view('admin.blog.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!empty($request->foto)){
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path().'/foto_blog/', $nama_file);
            $name = $nama_file;  
        }

        BlogModel::where('id', $request->id)->update([
            'users_id' => Auth::user()->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => (!empty($request->foto) ? $name : $request->foto_lama),
            'tanggal' => $request->tanggal,
        ]);
        Alert::success('Success', 'Succes Edit Blog!');
        return redirect()->route('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('blog')->where('id', $id)->delete();
        Alert::error('Succes', 'Delete Succes');
        return redirect()->route('blog');
    }
}
