@extends('templates.template1')

@section('content')

    <h1>SUPPRIMER UN ALBUM</h1>

    <p>Etes-vous sur de vouloir supprimer l'album suivant ainsi que ses chansons ?</p>

    <div>
        <a href='/album/{{$album->id}}'><img src='{{$album->pochette}}'></a><br>
        <a href='/album/{{$album->id}}'>{{$album->titre}}</a><br>
        <a href='/artiste/{{$album->artiste->id}}'>{{$album->artiste->nom}}</a><br>
        {{$album->dateSortie}}
    </div>

    <br>

    <form action='/interfaceAdmin/gererAlbums/{{$album->id}}/delete' method='POST'>    
        @csrf
        <input type='submit' name='ouiSupprimerAlbum' value='Oui'/>
    </form>

    <form action='/interfaceAdmin/gererAlbums' method='GET'>    
        @csrf
        <input type='submit' name='nonSupprimerAlbum' value='Non'/>
    </form>

@endsection