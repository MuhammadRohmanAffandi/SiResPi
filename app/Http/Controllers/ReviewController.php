<?php

namespace App\Http\Controllers;

use App\Models\ReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('review as b')
        ->join('users as u', 'u.id', '=', 'b.users_id')
        ->join('resep as r', 'r.id', '=', 'b.resep_id')
        ->select('b.*', 'u.name as nama', 'r.judul as nama_resep')
        ->get();
        return view('admin.review.index', compact('data'));
    }
    public function user()
    {
        $data = DB::table('review as b')
        ->join('users as u', 'u.id', '=', 'b.users_id')
        ->join('resep as r', 'r.id', '=', 'b.resep_id')
        ->select('b.*', 'u.name as nama', 'r.judul as nama_resep')
        ->get();
        return view('user.review.index', compact('data'));
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
        ReviewModel::insert([
            'users_id' => Auth::user()->id,
            'resep_id' => $request->resep_id,
            'review' => $request->review,
            'tanggal' => $request->tanggal,
        ]);
        Alert::success('Success', 'Succes Add review!');
        return redirect()->route('user.detail', ['id' => $request->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('review')->where('id', $id)->delete();
        Alert::error('Succes', 'Delete Succes');
        return redirect()->route('review');
    }
}
