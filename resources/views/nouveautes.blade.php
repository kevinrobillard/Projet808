@extends('templates.template1')

@section('content')
    
    <h2>NOUVEAUTES</h2>
    
        @foreach($lastAlbums as $album)
            <div>
                <a href='/album/{{$album->id}}'><img src='{{$album->pochette}}'></a><br>
                <a href='/album/{{$album->id}}'>{{$album->titre}}</a><br>
                <a href='/artiste/{{$album->artiste->id}}'>{{$album->artiste->nom}}</a>
            </div>
        @endforeach

@endsection