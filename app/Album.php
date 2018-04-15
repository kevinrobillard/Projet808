<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Album extends Model
{
    protected $table = "album";
    public $timestamps = false;
    
    public function chansons(){
        return $this->hasMany('App\Chanson', 'idAlbum');
    }
    
    public function artiste(){
        return $this->belongsTo('App\Artiste', 'idArtiste');
    }
    
}
    
