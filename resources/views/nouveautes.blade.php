@extends('templates.template1')

@section('content')
     
    <h1>NOUVEAUTÉS</h1>
<div id='gridnouveautes'>
    
        @foreach($lastAlbums as $album)
            <div class="main">
                <a href='/album/{{$album->id}}'><img src='{{$album->pochette}}'></a><br>
                <a href='/artiste/{{$album->artiste->id}}'>{{$album->artiste->nom}} - </a> 
                <a href='/album/{{$album->id}}'>{{$album->titre}}</a><br>  
                <p class="date">{{$album->dateSortie}}</p>     
            </div>
        @endforeach
    </div>
@endsection