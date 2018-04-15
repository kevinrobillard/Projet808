<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = "playlist";
    public $timestamps = false;
    
    
    public function contient(){
        return $this->belongsToMany('App\Chanson', 'contient', 'idPlaylist', 'idChanson');
    }
}
