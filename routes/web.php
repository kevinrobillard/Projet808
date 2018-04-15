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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'MainController@index');
Route::get('/nouveautes', 'MainController@nouveautes');
Route::get('/playlists', 'MainController@playlists');
Route::get('/playlist/{id}', 'MainController@playlist')->where('id', '[0-9]+');
Route::get('/parcourir/artistes', 'MainController@parcourirArtistes');
Route::get('/parcourir/albums', 'MainController@parcourirAlbums');
Route::get('/parcourir/chansons', 'MainController@parcourirChansons');
Route::get('/artiste/{id}', 'MainController@artiste')->where('id', '[0-9]+');
Route::get('/album/{id}', 'MainController@album')->where('id', '[0-9]+');
Route::get('/chanson/{id}', 'MainController@chanson')->where('id', '[0-9]+');
Route::get('/logout', 'MainController@logout');
