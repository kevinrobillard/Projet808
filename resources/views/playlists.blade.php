@extends('templates.template1')

@section('content')

    @auth
        <h1>MES PLAYLISTS</h1>

        <a href='/playlist/creer'>CREER UNE PLAYLIST<img src=''></a>
        <a href='/playlist/supprimer'>SUPPRIMER UNE PLAYLIST<img src=''></a>

        <ul>
            @foreach($playlists as $playlist)
            <li><a href='/playlist/{{$playlist->id}}'>{{$playlist->titre}}</a></li>
            @endforeach
        </ul>
    @endauth

    @guest
       <p class="logaccueil"> Pour avoir accès à toutes les fonctionnalités du site et pouvoir suivre des artistes vous devez être connectés.</p> 
        <p><b><a href='/login'>Connectez-vous</a></b> <br> ou <br> <b><a href='/register'>Créez un compte</a></b></p>
    @endguest

@endsection