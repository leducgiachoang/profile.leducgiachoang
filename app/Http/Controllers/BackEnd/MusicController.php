<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\SongRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\CategortMusicModel;
use App\BackEnd\singerModel;
use App\BackEnd\SongModel;
use Carbon\Carbon;
use App\Http\Requests\editSongRequest;
use Illuminate\Support\Facades\Auth;


class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dbsong = SongModel::get();
        $dbsinger = singerModel::get();
        $dbcategorysong = CategortMusicModel::get();
        return view('Backend.Music.new', ['dbsingers' => $dbsinger, 'dbcategorysongs' => $dbcategorysong, 'dbsongs' => $dbsong]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongRequest $request)
    {
        $ImageSong = $request->file('ImageSong')->getClientOriginalName();
        $request->file('ImageSong')->move('images/imgsong/', $ImageSong);

        $fileSong = $request->file('fileSong')->getClientOriginalName();
        $request->file('fileSong')->move('images/fileSong/', $fileSong);

        $insertSong = new SongModel;
        $insertSong->NameSong = $request->NameSong;
        $insertSong->ImageSong = $ImageSong;
        $insertSong->Lyrics = $request->Lyrics;
        $insertSong->idCategorySong = $request->idCategorySong;
        $insertSong->idSinger = $request->idSinger;
        $insertSong->idUser = Auth::user()->id;
        $insertSong->fileSong = $fileSong;
        $insertSong->created_at = Carbon::now();
        $insertSong->save();

        return redirect()->back()->with('notify', 'Thêm bài hát thành công');
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
        $dbsong = SongModel::get();
        $dbsinger = singerModel::get();
        $dbcategorysong = CategortMusicModel::get();
        $dbshow = SongModel::where('id', $id)->get();
        return view('Backend.Music.edit', ['dbshows' => $dbshow,'dbsongs'=>$dbsong, 'dbsingers'=>$dbsinger, 'dbcategorysongs'=>$dbcategorysong]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editSongRequest $request)
    {
        $ImageSong = $request->ImageSong;
        if (($request->file('XImageSong')) != '') {
            $ImageSong = $request->file('XImageSong')->getClientOriginalName();
            $request->file('XImageSong')->move('images/imgsong/', $ImageSong);
        }

        $fileSong = $request->fileSong;
        if (($request->file('XfileSong')) != '') {
            $fileSong = $request->file('XfileSong')->getClientOriginalName();
            $request->file('XfileSong')->move('images/filesong/', $fileSong);
        }

        SongModel::where('id', $request->id)->update([
            'NameSong' => $request->NameSong,
            'ImageSong' => $ImageSong,
            'Lyrics' => $request->Lyrics,
            'idCategorySong' => $request->idCategorySong,
            'idSinger' => $request->idSinger,
            'idUser' => Auth::user()->id,
            'fileSong' => $fileSong,
        ]);
        return redirect()->back()->with('notify', 'Cập nhập thông tin bài hát thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SongModel::where('id', $id)->delete();
        return redirect()->back()->with('notify', 'Xóa bài hát thành công');
    }
}
