<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chanson extends Model
{
    protected $table = "chanson";
    public $timestamps = false;
    
    public function album(){
        return $this->belongsTo('App\Album', 'idAlbum');
    }
    
    public function apparaitdans(){
        return $this->belongsToMany('App\Artiste', 'apparaitdans', 'idChanson', 'idArtiste');
    }
}
