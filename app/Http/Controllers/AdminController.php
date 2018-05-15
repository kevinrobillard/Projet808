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
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    
    public function interfaceAdmin(){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            return view('interfaceAdmin');
        }
        return redirect('/');
    }
    
    public function gererArtistes(){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $artistes = Artiste::all()->sortBy("nom");
            return view('gererArtistes', ['artistes' => $artistes]);
        }
        return redirect('/');
    }
    
    public function ajouterArtiste(){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            return view('ajouterArtiste');
        }
        return redirect('/');
    }
    
    public function insertArtiste(Request $request){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            
            $request->validate([
                'nomArtiste' => 'required|min:1|max:50',
                'dateNaissanceArtiste' => 'required',
                'photoArtiste' => 'required'
            ]);
            
            $newArtist = new Artiste;
	        $newArtist->nom = $request->input('nomArtiste');
            $newArtist->dateNaissance = $request->input('dateNaissanceArtiste');
            $newArtist->photo= $request->input('photoArtiste');
	        $newArtist->save();
            
            $artistes = Artiste::all()->sortBy("nom");
            
            return view('gererArtistes', ['artistes' => $artistes]);
        }
        return redirect('/');
    }
    
    public function modifierArtiste($id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $artiste = Artiste::find($id);
            return view('modifierArtiste', ['artiste' => $artiste]);
        }
        return redirect('/');
    }
    
    public function updateArtiste(Request $request, $id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            
            $request->validate([
                'nomArtiste' => 'required|min:1|max:50',
                'dateNaissanceArtiste' => 'required',
                'photoArtiste' => 'required'
            ]);
            
            $artistToUpdate = Artiste::find($id);
	        $artistToUpdate->nom = $request->input('nomArtiste');
            $artistToUpdate->dateNaissance = $request->input('dateNaissanceArtiste');
            $artistToUpdate->photo= $request->input('photoArtiste');
	        $artistToUpdate->save();
            
            $artistes = Artiste::all()->sortBy("nom");
            
            return view('gererArtistes', ['artistes' => $artistes]);
        }
        return redirect('/');
    }
    
    public function supprimerArtiste($id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $artiste = Artiste::find($id);
            return view('supprimerArtiste', ['artiste' => $artiste]);
        }
        return redirect('/');
    }
    
    public function deleteArtiste(Request $request, $id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
                        
            $artistToDelete = Artiste::find($id);
            
            DB::table('apparaitdans')->where('idArtiste', $artistToDelete->id)->delete();
            DB::table('suit')->where('idArtiste', $artistToDelete->id)->delete();
            
            foreach($artistToDelete->albums as $album){
                
                foreach($album->chansons as $chanson){
                    DB::table('contient')->where('idChanson', $chanson->id)->delete();
                    DB::table('apparaitdans')->where('idChanson', $chanson->id)->delete();
                    $chanson->delete();
                }
                
                $album->delete();
            
            }
            
            $artistToDelete->delete();
            
            $artistes = Artiste::all()->sortBy("nom");
            
            return view('gererArtistes', ['artistes' => $artistes]);
        }
        return redirect('/');
    }
    
    public function gererAlbums(){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $albums = Album::all()->sortBy("titre");
            return view('gererAlbums', ['albums' => $albums]);
        }
        return redirect('/');
    }
    
    public function ajouterAlbum(){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $artistes = Artiste::all()->sortBy("nom");
            return view('ajouterAlbum', ['artistes' => $artistes]);
        }
        return redirect('/');
    }
    
    public function insertAlbum(Request $request){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            
            $request->validate([
                'titreAlbum' => 'required|min:1|max:50',
                'descriptionAlbum' => 'required',
                'dateSortieAlbum' => 'required',
                'pochetteAlbum' => 'required',
                'artisteAlbum' => 'required',
            ]);
            
            $newAlbum = new Album;
	        $newAlbum->titre = $request->input('titreAlbum');
            $newAlbum->description = $request->input('descriptionAlbum');
            $newAlbum->dateSortie = $request->input('dateSortieAlbum');
            $newAlbum->nbVentes = $request->input('nbVentesAlbum');
            $newAlbum->pochette = $request->input('pochetteAlbum');
            $newAlbum->idArtiste = $request->input('artisteAlbum');
	        $newAlbum->save();
            
            $albums = Album::all()->sortBy("titre");
            
            return view('gererAlbums', ['albums' => $albums]);
        }
        return redirect('/');
    }
    
    public function modifierAlbum($id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $album = Album::find($id);
            $artistes = Artiste::all()->sortBy("nom");
            return view('modifierAlbum', ['album' => $album, 'artistes' => $artistes]);
        }
        return redirect('/');
    }
    
    public function updateAlbum(Request $request, $id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            
            $request->validate([
                'titreAlbum' => 'required|min:1|max:50',
                'descriptionAlbum' => 'required',
                'dateSortieAlbum' => 'required',
                'pochetteAlbum' => 'required',
                'artisteAlbum' => 'required',
            ]);
            
            $albumToUpdate = Album::find($id);
	        $albumToUpdate->titre = $request->input('titreAlbum');
            $albumToUpdate->description = $request->input('descriptionAlbum');
            $albumToUpdate->dateSortie = $request->input('dateSortieAlbum');
            $albumToUpdate->nbVentes = $request->input('nbVentesAlbum');
            $albumToUpdate->pochette = $request->input('pochetteAlbum');
            $albumToUpdate->idArtiste = $request->input('artisteAlbum');
	        $albumToUpdate->save();
            
            $albums = Album::all()->sortBy("titre");
            
            return view('gererAlbums', ['albums' => $albums]);
        }
        return redirect('/');
    }
    
    public function supprimerAlbum($id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $album = Album::find($id);
            return view('supprimerAlbum', ['album' => $album]);
        }
        return redirect('/');
    }
    
    public function deleteAlbum(Request $request, $id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
                        
            $albumToDelete = Album::find($id);
            
            
            foreach($albumToDelete->chansons as $chanson){
                
                DB::table('contient')->where('idChanson', $chanson->id)->delete();
                DB::table('apparaitdans')->where('idChanson', $chanson->id)->delete();
                $chanson->delete();
            
            }
            
            $albumToDelete->delete();
            
            $albums = Album::all()->sortBy("titre");
            
            return view('gererAlbums', ['albums' => $albums]);
        }
        return redirect('/');
    }
    
    public function gererChansons(){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $chansons = Chanson::all()->sortBy("titre");
            return view('gererChansons', ['chansons' => $chansons]);
        }
        return redirect('/');
    }
    
    public function ajouterChanson(){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $albums = Album::all()->sortBy("titre");
            $artistes = Artiste::all()->sortBy("nom");
            return view('ajouterChanson', ['albums' => $albums, 'artistes' => $artistes]);
        }
        return redirect('/');
    }
    
    public function insertChanson(Request $request){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            
            $request->validate([
                'titreChanson' => 'required|min:1|max:50',
                'descriptionChanson' => 'required',
                'dureeChanson' => 'required',
                'parolesChanson' => 'required',
                'pochetteChanson' => 'required',
                'albumChanson' => 'required',
                'numeroChanson' => 'required',
                'artistePrincipalChanson'=> 'required',
            ]);
        
            $newChanson = new Chanson;
	        $newChanson->titre = $request->input('titreChanson');
            $newChanson->description = $request->input('descriptionChanson');
            $newChanson->duree = $request->input('dureeChanson');
            $newChanson->paroles = $request->input('parolesChanson');
            $newChanson->pochette = $request->input('pochetteChanson');

            if ($request->file('audioChanson')->isValid()) {
                $titreChansonSansEspaces = str_replace(" ", "_", $request->input('titreChanson'));
                
                $newChanson->audio = $request->file('audioChanson')->storeAs('public/tracks', $request->input('numeroChanson').'-'.$titreChansonSansEspaces.'.mp3');
                
                $newChanson->audio = str_replace("public/", "storage/", $newChanson->audio);
            }

            $newChanson->idAlbum = $request->input('albumChanson');
            $newChanson->idPiste = $request->input('numeroChanson');
	        $newChanson->save();
            
            DB::table('apparaitdans')->insert([
                'idArtiste' => $request->input('artistePrincipalChanson'), 
                'idChanson' => $newChanson->id
            ]);
            
            if($request->input('artisteDeuxChanson') != -1){
                DB::table('apparaitdans')->insert([
                'idArtiste' => $request->input('artisteDeuxChanson'), 
                'idChanson' => $newChanson->id
            ]);
            }
            
            if($request->input('artisteTroisChanson') != -1){
                DB::table('apparaitdans')->insert([
                'idArtiste' => $request->input('artisteTroisChanson'), 
                'idChanson' => $newChanson->id
            ]);
            }
            
            if($request->input('artisteQuatreChanson') != -1){
                DB::table('apparaitdans')->insert([
                'idArtiste' => $request->input('artisteQuatreChanson'), 
                'idChanson' => $newChanson->id
            ]);
            }
            
            if($request->input('artisteCinqChanson') != -1){
                DB::table('apparaitdans')->insert([
                'idArtiste' => $request->input('artisteCinqChanson'), 
                'idChanson' => $newChanson->id
            ]);
            }
            
            $chansons = Chanson::all()->sortBy("titre");
            
            return view('gererChansons', ['chansons' => $chansons]);
        }
        return redirect('/');
    }
    
    public function modifierChanson($id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $chanson = Chanson::find($id);
            $albums = Album::all()->sortBy("titre");
            $artistes = Artiste::all()->sortBy("nom");
            
            return view('modifierChanson', ['chanson' => $chanson, 'albums' => $albums, 'artistes' => $artistes]);
        }
        return redirect('/');
    }
    
    public function updateChanson(Request $request, $id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            
            $request->validate([
                'titreChanson' => 'required|min:1|max:50',
                'descriptionChanson' => 'required',
                'dureeChanson' => 'required',
                'parolesChanson' => 'required',
                'pochetteChanson' => 'required',
                'albumChanson' => 'required',
                'numeroChanson' => 'required',
                'artistePresent-1'=> 'required',
            ]);
            
            $chansonToUpdate = Chanson::find($id);
	        $chansonToUpdate->titre = $request->input('titreChanson');
            $chansonToUpdate->description = $request->input('descriptionChanson');
            $chansonToUpdate->duree = $request->input('dureeChanson');
            $chansonToUpdate->paroles = $request->input('parolesChanson');
            $chansonToUpdate->pochette = $request->input('pochetteChanson');
            if ($request->file('audioChanson') && $request->file('audioChanson')->isValid()) {
                $titreChansonSansEspaces = str_replace(" ", "_", $request->input('titreChanson'));
                
                $chansonToUpdate->audio = $request->file('audioChanson')->storeAs('public/tracks', $request->input('numeroChanson').'-'.$titreChansonSansEspaces.'.mp3');
                
                $chansonToUpdate->audio = str_replace("public/", "storage/", $chansonToUpdate->audio);
            }
            if($request->input('albumChanson') != -1){
                $chansonToUpdate->idAlbum = $request->input('albumChanson');
            }
            $chansonToUpdate->idPiste = $request->input('numeroChanson');
	        $chansonToUpdate->save();
            
            //Suppression des artistes présents sur cette chanson
            DB::table('apparaitdans')->where('idChanson', $id)->delete();
            
            //Insertion des artistes présents sur cette chanson
            if($request->input('artistePresent-1') != -1 && $request->input('artistePresent-1') != 99999999){
                DB::table('apparaitdans')->insert([
                    'idArtiste' => $request->input('artistePresent-1'), 
                    'idChanson' => $id
                ]);
            }
            
            if($request->input('artistePresent-2') != -1 && $request->input('artistePresent-2') != 99999999){
                DB::table('apparaitdans')->insert([
                    'idArtiste' => $request->input('artistePresent-2'), 
                    'idChanson' => $id
                ]);
            }
            
            if($request->input('artistePresent-3') != -1 && $request->input('artistePresent-3') != 99999999){
                DB::table('apparaitdans')->insert([
                    'idArtiste' => $request->input('artistePresent-3'), 
                    'idChanson' => $id
                ]);
            }
            
            if($request->input('artistePresent-4') != -1 && $request->input('artistePresent-4') != 99999999){
                DB::table('apparaitdans')->insert([
                    'idArtiste' => $request->input('artistePresent-4'), 
                    'idChanson' => $id
                ]);
            }
            
            if($request->input('artistePresent-5') != -1 && $request->input('artistePresent-5') != 99999999){
                DB::table('apparaitdans')->insert([
                    'idArtiste' => $request->input('artistePresent-5'), 
                    'idChanson' => $id
                ]);
            }
            
            $chansons = Chanson::all()->sortBy("titre");
            
            return view('gererChansons', ['chansons' => $chansons]);
        }
        return redirect('/');
    }
    
    public function supprimerChanson($id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
            $chanson = Chanson::find($id);
            return view('supprimerChanson', ['chanson' => $chanson]);
        }
        return redirect('/');
    }
    
    public function deleteChanson(Request $request, $id){
        if(Auth::user() && Auth::user()->email == 'admin@gmail.com'){
                        
            $chansonToDelete = Chanson::find($id);
            
            DB::table('contient')->where('idChanson', $chansonToDelete->id)->delete();
            DB::table('apparaitdans')->where('idChanson', $chansonToDelete->id)->delete();

            //Suppression du fichier audio
            $fileName = str_replace("/", "\\", $chansonToDelete->audio);
            unlink(public_path($fileName));
            
            $chansonToDelete->delete();
            
            $chansons = Chanson::all()->sortBy("titre");
            
            return view('gererChansons', ['chansons' => $chansons]);
        }
        return redirect('/');
    }
    
}
