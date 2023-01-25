<?php

namespace App\Http\Controllers;

use App\Models\ResepModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategori')->select('*')->get();
        $data = DB::table('resep as b')
            ->join('users as u', 'u.id', '=', 'b.users_id')
            ->join('kategori as k', 'k.id', '=', 'b.kategori_id')
            ->select('b.*', 'u.name as nama', 'k.nama as kategori')
            ->get();
        return view('admin.resep.index', compact('data', 'kategori'));
    }
    public function user()
    {
        $data = DB::table('resep as b')
            ->join('users as u', 'u.id', '=', 'b.users_id')
            ->join('kategori as k', 'k.id', '=', 'b.kategori_id')
            ->select('b.*', 'u.name as nama', 'k.nama as kategori')
            ->get();
        return view('user.resep', compact('data'));
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = DB::table('resep as b')
            ->join('users as u', 'u.id', '=', 'b.users_id')
            ->join('kategori as k', 'k.id', '=', 'b.kategori_id')
            ->select('b.*', 'u.name as nama', 'k.nama as kategori')
            ->where('b.judul', 'like', "%" . $keyword . "%")
            ->get();
        return view('user.resep', compact('data'));
    }
    public function detail($id)
    {
        $data = DB::table('resep as b')
            ->join('users as u', 'u.id', '=', 'b.users_id')
            ->join('kategori as k', 'k.id', '=', 'b.kategori_id')
            ->select('b.*', 'u.name as nama', 'k.nama as kategori')
            ->where('b.id', $id)
            ->get();
        $data2 = DB::table('review as r')
            ->join('users as u', 'u.id', '=', 'r.users_id')
            ->join('resep as p', 'p.id', '=', 'r.resep_id')
            ->select('r.*', 'u.name as nama')
            ->where('r.resep_id', $id)
            ->get();
        return view('user.detailresep', compact('data', 'data2'));
    }
    public function breakfast()
    {
        $data = DB::table('resep as b')
            ->join('users as u', 'u.id', '=', 'b.users_id')
            ->join('kategori as k', 'k.id', '=', 'b.kategori_id')
            ->select('b.*', 'u.name as nama', 'k.nama as kategori')
            ->where('b.kategori_id', '1')
            ->get();
        return view('user.resep', compact('data'));
    }
    public function main()
    {
        $data = DB::table('resep as b')
            ->join('users as u', 'u.id', '=', 'b.users_id')
            ->join('kategori as k', 'k.id', '=', 'b.kategori_id')
            ->select('b.*', 'u.name as nama', 'k.nama as kategori')
            ->where('b.kategori_id', '2')
            ->get();
        return view('user.resep', compact('data'));
    }
    public function dessert()
    {
        $data = DB::table('resep as b')
            ->join('users as u', 'u.id', '=', 'b.users_id')
            ->join('kategori as k', 'k.id', '=', 'b.kategori_id')
            ->select('b.*', 'u.name as nama', 'k.nama as kategori')
            ->where('b.kategori_id', '3')
            ->get();
        return view('user.resep', compact('data'));
    }
    public function beverage()
    {
        $data = DB::table('resep as b')
            ->join('users as u', 'u.id', '=', 'b.users_id')
            ->join('kategori as k', 'k.id', '=', 'b.kategori_id')
            ->select('b.*', 'u.name as nama', 'k.nama as kategori')
            ->where('b.kategori_id', '4')
            ->get();
        return view('user.resep', compact('data'));
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
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path() . '/foto_resep/', $nama_file);
        $name = $nama_file;
        //Foto
        // $file2 = $request->file('foto2');
        // $nama_file2 = time() . "_" . $file2->getClientOriginalName();
        // $file2->move(public_path() . '/foto_resep/', $nama_file2);
        // $name2 = $nama_file2;
        //Foto
        // $file3 = $request->file('foto3');
        // $nama_file3 = time() . "_" . $file3->getClientOriginalName();
        // $file3->move(public_path() . '/foto_resep/', $nama_file3);
        // $name3 = $nama_file3;


        ResepModel::insert([
            'users_id' => Auth::user()->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'foto' => $name,
            // 'foto2' => $name2,
            'foto2' => $request->foto2,
            // 'foto3' => $name3,
            'foto3' => $request->foto3,
            'tanggal' => $request->tanggal,
        ]);
        Alert::success('Success', 'Succes Add Resep!');
        return redirect()->route('resep');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = DB::table('kategori')->select('*')->get();
        $data = DB::table('resep as b')
            ->join('users as u', 'u.id', '=', 'b.users_id')
            ->join('kategori as k', 'k.id', '=', 'b.kategori_id')
            ->select('b.*', 'u.name as nama', 'k.nama as kategori')
            ->where('b.id', $id)
            ->get();
        return view('admin.resep.edit', compact('data', 'kategori'));
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
        if (!empty($request->foto)) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path() . '/foto_resep/', $nama_file);
            $name = $nama_file;
        }
        // if (!empty($request->foto)) {
        //     $file2 = $request->file('foto2');
        //     $nama_file2 = time() . "_" . $file2->getClientOriginalName();
        //     $file2->move(public_path() . '/foto_resep/', $nama_file2);
        //     $name2 = $nama_file2;
        // }
        // if (!empty($request->foto)) {
        //     $file3 = $request->file('foto3');
        //     $nama_file3 = time() . "_" . $file3->getClientOriginalName();
        //     $file3->move(public_path() . '/foto_resep/', $nama_file3);
        //     $name3 = $nama_file3;
        // }

        ResepModel::where('id', $request->id)->update([
            'users_id' => Auth::user()->id,
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'foto' => (!empty($request->foto) ? $name : $request->foto_lama),
            // 'foto2' => (!empty($request->foto2) ? $name2 : $request->foto_lama2),
            'foto2' => $request->foto2,
            // 'foto3' => (!empty($request->foto3) ? $name3 : $request->foto_lama3),
            'foto3' => $request->foto3,
            'tanggal' => $request->tanggal,
        ]);
        Alert::success('Success', 'Succes Edit Resep!');
        return redirect()->route('resep');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('resep')->where('id', $id)->delete();
        Alert::error('Succes', 'Delete Succes');
        return redirect()->route('resep');
    }
}
