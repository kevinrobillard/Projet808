<?php

namespace App\Http\Controllers;


use App\Artiste;
use App\Album;
use App\Chanson;
use App\Playlist;
use App\User;
use Auth;
use Redirect;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $followedArtistsAlbums = DB::table('album')
                                ->join('artiste', 'album.idArtiste', '=', 'artiste.id')
                                ->join('suit', 'artiste.id', '=', 'suit.idArtiste')
                                ->join('users', 'suit.idUser', '=', 'users.id')
                                ->select('album.*')
                                ->where('idUser', '=', Auth::user()->id)
                                ->orderBy("dateSortie", "desc")
                                ->get();
        return view('index', ['followedArtistsAlbums' => $followedArtistsAlbums]);
    }
    
    public function nouveautes(){
        $lastAlbums = Album::all()->sortByDesc("dateSortie")->take(9);
        return view('nouveautes', ['lastAlbums' => $lastAlbums]);
    }
    
    public function playlists(){
        if(Auth::user()){
            $playlists = Playlist::all()->where('idUser', '=', Auth::user()->id);
            return view('playlists', ['playlists' => $playlists]);
        }
        return view('playlists');
    }
    
    public function playlist($id){
        if(Auth::user()){
            $playlist = Playlist::find($id);
            if($playlist == false){
                return redirect('404');
            }
            return view('playlist', ['playlist' => $playlist]);
        }
        else{
            return view('playlists');
        }
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
    
    public function logout(){
        Auth::logout(); // log the user out of our application
        return Redirect::to('/'); // redirect the user to the login screen
    }
}
