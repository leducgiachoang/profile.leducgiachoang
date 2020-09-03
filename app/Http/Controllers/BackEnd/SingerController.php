<?php

namespace App\Http\Controllers\Backend;

use App\BackEnd\singerModel;
use App\Http\Requests\SingerRequest;
use App\Http\Requests\editSingerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SingerController extends Controller
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
        $dbSinger = singerModel::get();
        return view('Backend.CategorySinger.new', ['dbsinger' => $dbSinger]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SingerRequest $request)
    {

        $ImageSinger = $request->file('ImageSinger')->getClientOriginalName();
        $request->file('ImageSinger')->move('images/categorysinger/', $ImageSinger);

        $indert = new singerModel;
        $indert->NameSinger = $request->NameSinger;
        $indert->description = $request->description;
        $indert->ImageSinger = $ImageSinger;
        $indert->save();

        return redirect()->back()->with('notify', 'Thêm ca sỹ thành công');
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
        $dbSinger = singerModel::get();
        $dbeditSinger = singerModel::where('id', $id)->get();
        return view('Backend.CategorySinger.edit', ['dbeditSinger' => $dbeditSinger, 'dbsinger' => $dbSinger]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editSingerRequest $request)
    {
        $ImageSinger = $request->ImageSinger;
        if (($request->file('XImageSinger')) != '') {
            $ImageSinger = $request->file('XImageSinger')->getClientOriginalName();
            $request->file('XImageSinger')->move('images/categorysinger/', $ImageSinger);
        }
        singerModel::where('id', $request->id)->update([
            'NameSinger' => $request->NameSinger,
            'description' => $request->description,
            'ImageSinger' => $ImageSinger
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
        singerModel::where('id', $id)->delete();
        return redirect()->back()->with('notify', 'Xóa thành công');
    }
}
