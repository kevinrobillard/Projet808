@extends('templates.template1')

@section('content')

    <h1>SELECTIONNEZ LA/LES PLAYLIST(S)</h1>

        @foreach($playlists as $playlist)
            <form action='/playlist/deletePlaylist' method='POST'>    
                @csrf
                <a href='/playlist/{{$playlist->id}}'>{{$playlist->titre}}</a>
                <input type='hidden' name='idPlaylist' value='{{$playlist->id}}'/>
                <input type='submit' name='supprimerPlaylist' value='Supprimer'/>
            </form>
        @endforeach

@endsection