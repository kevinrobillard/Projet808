<?php

namespace App\Http\Controllers;

use App\Artiste;
use App\Album;
use App\Chanson;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }
    
    public function nouveautes(){
        return view('nouveautes');
    }
    
    public function playlists(){
        return view('playlists');
    }
    
    public function parcourirArtistes(){
        $all = Artiste::all();
        return view('parcourirArtistes', ['artistes' => $all]);
    }
    
    public function parcourirAlbums(){
        $all = Album::all();
        return view('parcourirAlbums', ['albums' => $all]);
    }
    
    public function parcourirChansons(){
        $all = Chanson::all();
        return view('parcourirChansons', ['chansons' => $all]);
    }
    
    public function artiste($id){
        $artiste = Artiste::find($id);
        if($artiste == false){
            return redirect('404');
        }
        return view('artiste', ['artiste' => $artiste]);
    }
    
    public function album($id){
        $album = Album::find($id);
        if($album == false){
            return redirect('404');
        }
        return view('album', ['album' => $album]);
    }
    
    public function chanson($id){
        $chanson = Chanson::find($id);
        if($chanson == false){
            return redirect('404');
        }
        return view('chanson', ['chanson' => $chanson]);
    }
}
