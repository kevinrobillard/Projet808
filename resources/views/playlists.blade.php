@extends('templates.template1')

@section('content')

    @auth
        <h1>MES PLAYLISTS</h1>
<div id='gridp'>
       <div class="maing"> 
           <a class="playlist" href='/playlist/creer'>CREER UNE PLAYLIST<image class="iconeplaylist" img src="/img/playlistb.png" alt="Créer une playlist"></image></a>
        </div>
    
    <div class="maind">
        <a class="playlist" href='/playlist/supprimer'>SUPPRIMER UNE PLAYLIST<image class="iconeplaylist" img src="/img/playlist2b.png" alt="Supprimer une playlist"></image></a>
    </div>
</div>

<div class="liste">
        <ol>
            @foreach($playlists as $playlist)
            <li><a class="listeplaylist" href='/playlist/{{$playlist->id}}'>{{$playlist->titre}}</a></li>
            @endforeach
        </ol>
</div>
    @endauth

    @guest
       <p class="logaccueil"> Pour avoir accès à toutes les fonctionnalités du site et pouvoir suivre des artistes vous devez être connectés.</p> 
        <p><b><a href='/login'>Connectez-vous</a></b> <br> ou <br> <b><a href='/register'>Créez un compte</a></b></p>
    @endguest
@endsection