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
        if(Auth::user()){
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
        return view('index');
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
    
    public function creerPlaylist(){
        if(Auth::user()){
            return view('creerPlaylist');
        }
        return view('playlists');
    }
    
    public function insertPlaylist(Request $request){
        if(Auth::user()){
            $request->validate([
                'titre' => 'required|min:1|max:50',
            ]);
            
            $newPlaylist = new Playlist;
	        $newPlaylist->titre = $request->input('titre');
            $newPlaylist->idUser = Auth::user()->id;
	        $newPlaylist->save();
            return redirect('/playlist/'.$newPlaylist->id);
        }
        return view('playlists');
    }
    
    public function supprimerPlaylist(){
        if(Auth::user()){
            $playlists = Playlist::all()->where('idUser', '=', Auth::user()->id);
            return view('supprimerPlaylist', ['playlists' => $playlists]);
        }
        return view('playlists');
    }
    
    public function deletePlaylist(Request $request){
        if(Auth::user()){
            /*Supression des musiques de la playlist dans la table contient*/
            DB::table('contient')->where('idPlaylist', $request->input('idPlaylist'))->delete();
            
            /*Suppression de la playlist en elle même*/
            $playlistToDelete = Playlist::find($request->input('idPlaylist'));
            $playlistToDelete->delete();
            return back();
        }
        return view('playlists');
    }
    
    public function ajouterChansonsInPlaylist($idPlaylist){
        if(Auth::user()){
            $all = Chanson::all()->sortBy("titre");
            $playlist = Playlist::find($idPlaylist);
            return view('ajouterChansonsInPlaylist', ['chansons' => $all, 'playlist' => $playlist]);
        }
        return view('playlists');
    }
    
    public function insertChansonsInPlaylist(Request $request){
        if(Auth::user()){
            DB::table('contient')->insert([
                'idPlaylist' => $request->input('idPlaylist'), 
                'idChanson' => $request->input('idChanson')
            ]);
            return back();
        }
        return view('playlists');
    }
    
    public function supprimerChansonsInPlaylist($idPlaylist){
        if(Auth::user()){
            $playlist = Playlist::find($idPlaylist);
            return view('supprimerChansonsInPlaylist', ['playlist' => $playlist]);
        }
        return view('playlists');
    }
    
    public function deleteChansonsInPlaylist(Request $request){
        if(Auth::user()){
            DB::table('contient')->where('idPlaylist', $request->input('idPlaylist'))->where('idChanson', $request->input('idChanson'))->delete();
            return back();
        }
        return view('playlists');
    }
    
    public function suivreArtiste(Request $request){
        if(Auth::user()){
            DB::table('suit')->insert([
                'idUser' => Auth::user()->id,
                'idArtiste' => $request->input('idArtiste')
            ]);
            return back();
        }
        return back();
    }
    
    public function nePlusSuivreArtiste(Request $request){
        if(Auth::user()){
            DB::table('suit')->where('idArtiste', $request->input('idArtiste'))->where('idUser', Auth::user()->id)->delete();
            return back();
        }
        return back();
    }
    
    public function parcourirArtistes(){
        $all = Artiste::all()->sortBy("nom");
        return view('parcourirArtistes', ['artistes' => $all]);
    }
    
    public function parcourirAlbums(){
        $all = Album::all()->sortBy("titre");
        return view('parcourirAlbums', ['albums' => $all]);
    }
    
    public function parcourirChansons(){
        $all = Chanson::all()->sortBy("titre");
        return view('parcourirChansons', ['chansons' => $all]);
    }
    
    public function artiste($id){
        $artiste = Artiste::find($id);
        if($artiste == false){
            return redirect('404');
        }
        
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            return view('artiste', ['artiste' => $artiste, 'user' => $user]);
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
