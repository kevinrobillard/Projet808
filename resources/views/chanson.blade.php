@extends('templates.template1')

@section('content')
    <h1>{{$chanson->titre}}</h1>

    <!--Pochette-->
    @if($chanson->pochette == false)
        <p>Pochette Indisponible</p>
    @else
        <img src='{{$chanson->pochette}}'>
    @endif


    <!--Tirée de l'album-->
    @if($chanson->album == false)
        <p> </p>
    @else
        <p>Tirée de l'album : <a href='/album/{{$chanson->album->id}}'>{{$chanson->album->titre}}</a></p>
    @endif 


    <!--Description-->
    @if($chanson->description == false)
        <p> </p>
    @else
        <p>Description : {{$chanson->description}}</p>
    @endif    


    <!--Duree-->
    @if($chanson->duree == false)
        <p>Durée : Inconnue</p>
    @else
        <p>Durée : {{$chanson->duree}}</p>
    @endif


    <!--Paroles-->
    @if($chanson->paroles == false)
        <p>Paroles : Indisponible</p>
    @else
        <p>Paroles : {{$chanson->paroles}}</p>
    @endif





    <h2>Artistes présents sur cette chanson</h2>

    <ul>
        @foreach($chanson->apparaitdans as $artiste)
        <li><a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a></li>
        @endforeach
    </ul>
    
@endsection