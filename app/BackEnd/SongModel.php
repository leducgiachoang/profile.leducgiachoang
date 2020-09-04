<?php

namespace App\BackEnd;

use Illuminate\Database\Eloquent\Model;

class SongModel extends Model
{
    protected $table = 'song';
    public $timestamps = false;

    

    public function CategorySong()
    {
        return $this->belongsTo('App\BackEnd\CategortMusicModel', 'idCategorySong', 'id');
    }
    

    public function CategotySinger()
    {
        return $this->belongsTo('App\BackEnd\singerModel', 'idSinger', 'id');
    }
}
