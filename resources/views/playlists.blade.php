@extends('templates.template1')

@section('content')

    <h1>MES PLAYLISTS</h1>
    
    <ul>
        @foreach($playlists as $playlist)
        <li><a href='/playlist/{{$playlist->id}}'>{{$playlist->titre}}</a></li>
        @endforeach
    </ul>

@endsection