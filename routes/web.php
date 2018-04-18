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

Route::get('/logout', 'MainController@logout');
