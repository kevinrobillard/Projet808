@extends('templates.template1')

@section('content')

    <h1>SUPPRIMER UNE PLAYLIST</h1>

        @foreach($playlists as $playlist)
            <form action='/playlist/deletePlaylist' method='POST'>    
                @csrf
                <a href='/playlist/{{$playlist->id}}'>{{$playlist->titre}}</a>
                <input type='hidden' name='idPlaylist' value='{{$playlist->id}}'/>
                <input class="bouton2" type='submit' name='supprimerPlaylist' value='Supprimer'/>
            </form>
        @endforeach

@endsection