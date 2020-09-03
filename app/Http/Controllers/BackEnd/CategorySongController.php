<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategorySongRequest;
use App\Http\Requests\editCategorySongRequest;
use App\BackEnd\CategortMusicModel;

class CategorySongController extends Controller
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
        $dbSelect = CategortMusicModel::get();
        return view('Backend.CategorySong.new', ['GetCategory' => $dbSelect]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorySongRequest $request)
    {
        $ImageCategorySong = $request->file('ImageCategorySong')->getClientOriginalName();
        $request->file('ImageCategorySong')->move('images/categorysong/', $ImageCategorySong);


        $dbinsert = new CategortMusicModel;
        $dbinsert->nameSong = $request->nameSong;
        $dbinsert->ImageCategorySong = $ImageCategorySong;
        $dbinsert->save();

        return redirect()->back()->with('notify', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dbEdit = CategortMusicModel::where('id', $id)->get();
        $dbSelect = CategortMusicModel::get();
        return view('Backend.CategorySong.edit', ['dbEdit' => $dbEdit, 'GetCategory' => $dbSelect]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editCategorySongRequest $request)
    {
        $ImageCategorySong = $request->ImageCategorySong;
        if (($request->file('XImageCategorySong')) != '') {
            $ImageCategorySong = $request->file('XImageCategorySong')->getClientOriginalName();
            $request->file('XImageCategorySong')->move('images/categorysong/', $ImageCategorySong);
        }

        CategortMusicModel::where('id', $request->id)->update([
            'nameSong' => $request->nameSong,
            'ImageCategorySong' => $ImageCategorySong,
        ]);

        return redirect()->back()->with('notify','Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategortMusicModel::where('id', $id)->delete();
        return redirect()->back();
    }
}
