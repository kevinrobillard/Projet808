@extends('templates.template1')

@section('content')
    <h1>{{$artiste->nom}}</h1>

    @if($artiste->dateNaissance == false)
        <p>Date de naissance : Inconnue</p>
    @else
        <p>Date de naissance: {{$artiste->dateNaissance}}</p>
    @endif

    <h4>Albums</h4>
    <ul>
        @foreach($artiste->albums as $album)
            <li><a href='/album/{{$album->id}}'>{{$album->titre}}</a></li>
        @endforeach
    </ul>
@endsection