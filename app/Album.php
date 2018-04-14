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
    
    public function artistes(){
        $artistes = DB::select('SELECT artiste.nom 
                            FROM album
                            JOIN chanson
                            ON album.id = chanson.idAlbum
                            JOIN apparaitdans
                            ON apparaitdans.idChanson = chanson.id
                            JOIN artiste
                            ON apparaitdans.idArtiste = artiste.id
                            WHERE album.id = :idAlbum', ['idAlbum' => 1]);
        
        $artistes = DB::select('SELECT artiste.nom 
                            FROM artiste
                            WHERE artiste.id = :id', ['id' => 1]);
        
        $artistes = DB::select(DB::raw('SELECT artiste.nom 
                            FROM artiste
                            WHERE artiste.id = :id', ['id' => 1]));
        
        $artistes = DB::table('album')
                    ->join('chanson', 'album.id', '=', 'chanson.idAlbum')
                    ->join('apparaitdans', 'apparaitdans.idChanson', '=', 'chanson.id')
                    ->join('artiste', 'apparaitdans.idArtiste', '=', 'artiste.id')
                    ->select('artiste.nom')
                    ->where('artiste.id', '=', 1)
                    ->get();

        return view('album', ['artistes' => $artistes]);
    }
}
    
