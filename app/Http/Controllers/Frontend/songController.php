<?php

namespace App\Http\Controllers\Frontend;
use App\BackEnd\SongModel;
use App\BackEnd\CategortMusicModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class songController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbsong = SongModel::inRandomOrder()->get();
        $dbcategorysong = CategortMusicModel::limit(10)->get();
        return view('Frontend.music.homemusic',['dbcategorysongs'=>$dbcategorysong,'dbsongs'=>$dbsong]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dbsongbyid = SongModel::where('id', $id);
        return view('Frontend.music.songbyid',['dbsongbyids'=>$dbsongbyid]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
