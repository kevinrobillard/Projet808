<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'MainController@index');

Route::get('/nouveautes', 'MainController@nouveautes');

Route::get('/playlists', 'MainController@playlists');
Route::get('/playlist/{id}', 'MainController@playlist')->where('id', '[0-9]+');
Route::get('/playlist/creer', 'MainController@creerPlaylist');
Route::post('/playlist/insertPlaylist', 'MainController@insertPlaylist');
Route::get('/playlist/supprimer', 'MainController@supprimerPlaylist');
Route::post('/playlist/deletePlaylist', 'MainController@deletePlaylist');
Route::get('/playlist/{id}/ajouterChansonsInPlaylist', 'MainController@ajouterChansonsInPlaylist')->where('id', '[0-9]+');
Route::post('/playlist/{id}/insertChansonsInPlaylist', 'MainController@insertChansonsInPlaylist');
Route::get('/playlist/{id}/supprimerChansonsInPlaylist', 'MainController@supprimerChansonsInPlaylist')->where('id', '[0-9]+');
Route::post('/playlist/{id}/deleteChansonsInPlaylist', 'MainController@deleteChansonsInPlaylist');

Route::post('/artiste/{id}/suivreArtiste', 'MainController@suivreArtiste');
Route::post('/artiste/{id}/nePlusSuivreArtiste', 'MainController@nePlusSuivreArtiste');

Route::get('/parcourir/artistes', 'MainController@parcourirArtistes');
Route::get('/parcourir/albums', 'MainController@parcourirAlbums');
Route::get('/parcourir/chansons', 'MainController@parcourirChansons');

Route::get('/artiste/{id}', 'MainController@artiste')->where('id', '[0-9]+');

Route::get('/album/{id}', 'MainController@album')->where('id', '[0-9]+');

Route::get('/chanson/{id}', 'MainController@chanson')->where('id', '[0-9]+');



Route::get('/interfaceAdmin', 'AdminController@interfaceAdmin');

Route::get('/interfaceAdmin/gererArtistes', 'AdminController@gererArtistes');
Route::get('/interfaceAdmin/gererArtistes/ajouter', 'AdminController@ajouterArtiste');
Route::post('/interfaceAdmin/gererArtistes/insert', 'AdminController@insertArtiste');
Route::get('/interfaceAdmin/gererArtistes/{id}/modifier', 'AdminController@modifierArtiste');
Route::post('/interfaceAdmin/gererArtistes/{id}/update', 'AdminController@updateArtiste');
Route::get('/interfaceAdmin/gererArtistes/{id}/supprimer', 'AdminController@supprimerArtiste');
Route::post('/interfaceAdmin/gererArtistes/{id}/delete', 'AdminController@deleteArtiste');

Route::get('/interfaceAdmin/gererAlbums', 'AdminController@gererAlbums');
Route::get('/interfaceAdmin/gererAlbums/ajouter', 'AdminController@ajouterAlbum');
Route::post('/interfaceAdmin/gererAlbums/insert', 'AdminController@insertAlbum');
Route::get('/interfaceAdmin/gererAlbums/{id}/modifier', 'AdminController@modifierAlbum');
Route::post('/interfaceAdmin/gererAlbums/{id}/update', 'AdminController@updateAlbum');
Route::get('/interfaceAdmin/gererAlbums/{id}/supprimer', 'AdminController@supprimerAlbum');
Route::post('/interfaceAdmin/gererAlbums/{id}/delete', 'AdminController@deleteAlbum');

Route::get('/interfaceAdmin/gererChansons', 'AdminController@gererChansons');
Route::get('/interfaceAdmin/gererChansons/ajouter', 'AdminController@ajouterChanson');
Route::post('/interfaceAdmin/gererChansons/insert', 'AdminController@insertChanson');
Route::get('/interfaceAdmin/gererChansons/{id}/modifier', 'AdminController@modifierChanson');
Route::post('/interfaceAdmin/gererChansons/{id}/update', 'AdminController@updateChanson');
Route::get('/interfaceAdmin/gererChansons/{id}/supprimer', 'AdminController@supprimerChanson');
Route::post('/interfaceAdmin/gererChansons/{id}/delete', 'AdminController@deleteChanson');

    
    
Route::get('/logout', 'MainController@logout');
