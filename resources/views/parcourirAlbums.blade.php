@extends('templates.template1')

@section('content')

    <h1>PARCOURIR</h1>
    <p class="trier">Trier par:</p>
    @include('_parcourirNavbar')


        @foreach($albums as $album)
            <div class="news">
                <a href='/album/{{$album->id}}'><img src='{{$album->pochette}}'></a><br>
                <a href='/artiste/{{$album->artiste->id}}'>{{$album->artiste->nom}} - </a> 
                <a href='/album/{{$album->id}}'>{{$album->titre}}</a>
            </div>
        @endforeach

@endsection