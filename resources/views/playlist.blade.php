@auth
    @extends('templates.template1')

    @section('content')

        <h1>{{$playlist->titre}}</h1>
<div id='gridp'>
    <div class="maing"> 
        <a class="playlist" href='/playlist/{{$playlist->id}}/ajouterChansonsInPlaylist'>AJOUTER DES CHANSONS<image class="iconeplaylist" img src="/img/plus.png" alt="Ajouter une chanson"></image></a>
    </div>
    <div class="maind">
        <a class="playlist" href='/playlist/{{$playlist->id}}/supprimerChansonsInPlaylist'>SUPPRIMER DES CHANSONS<image class="iconeplaylist" img src="/img/moins.png" alt="Supprimer une chanson"></image></a>
    </div>
</div>

<div id="gridartistes">
            @foreach($playlist->contient as $chanson)
                <div class="main">
                    <a href='/chanson/{{$chanson->id}}'><img src='{{$chanson->pochette}}'></a><br>
                    <audio controls="controls"> <source src="/music/Friday.mp3" type="audio/mp3" />Votre navigateur n'est pas compatible</audio><br>
                    <a class="artistealbum" href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a><br>
                    <a href='/album/{{$chanson->album->id}}'>{{$chanson->album->titre}}</a> -
                    <a href='/artiste/{{$chanson->album->artiste->id}}'>{{$chanson->album->artiste->nom}}</a>
                    
                </div>
            @endforeach
</div>

    @endsection
@endauth