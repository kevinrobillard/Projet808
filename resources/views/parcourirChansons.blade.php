@extends('templates.template1')

@section('content')

    <h1>PARCOURIR</h1>
    <p class="trier">Trier par:</p>
    @include('_parcourirNavbar')

<div id='gridartistes'>
        @foreach($chansons as $chanson)
            <div class="main">
                <a href='/chanson/{{$chanson->id}}'><img src='{{$chanson->pochette}}'></a><br>
                <a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a><br>
                <a class="artistealbum" href='/artiste/{{$chanson->album->artiste->id}}'>{{$chanson->album->artiste->nom}} - </a> 
                <a class="artistealbum" href='/album/{{$chanson->album->id}}'>{{$chanson->album->titre}}</a>
            </div>
        @endforeach
</div>  

@endsection