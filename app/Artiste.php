<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    protected $table = "artiste";
    public $timestamps = false;
    
    
    public function albums(){
        return $this->hasMany('App\Album', 'idArtiste');
    }
    
    public function apparaitDans(){
        return $this->belongsToMany('App\Chanson', 'apparaitdans', 'idArtiste', 'idChanson');
    }
}
