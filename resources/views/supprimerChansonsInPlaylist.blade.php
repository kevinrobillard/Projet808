@extends('templates.template1')

@section('content')

    <h1>SELECTIONNEZ LES CHANSONS A SUPPRIMER POUR " {{$playlist->titre}} "</h1>

        @foreach($playlist->contient as $chanson)
            <form action='/playlist/{{$playlist->id}}/deleteChansonsInPlaylist' method='POST'>    
                @csrf
                <a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}} - {{$chanson->album->titre}} - {{$chanson->album->artiste->nom}}</a>
                <input type='hidden' name='idPlaylist' value='{{$playlist->id}}'/>
                <input type='hidden' name='idChanson' value='{{$chanson->id}}'/> 
                <input type='submit' name='supprimerChansonsDansPlaylist' value='Supprimer'/>
            </form>
        @endforeach

@endsection