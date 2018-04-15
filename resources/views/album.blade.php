@extends('templates.template1')

@section('content')
    <h1>{{$album->titre}}</h1>

    <!--Pochette-->
    @if($album->pochette == false)
        <p>Pochette Indisponible</p>
    @else
        <img src='{{$album->pochette}}'>
    @endif


    <!--Description-->
    @if($album->description == false)
        <p> </p>
    @else
        <p>Description : {{$album->description}}</p>
    @endif    


    <!--Date de sortie-->
    @if($album->dateSortie == false)
        <p>Date de sortie : Inconnue</p>
    @else
        <p>Date de sortie : {{$album->dateSortie}}</p>
    @endif


    <!--Nombre de ventes-->
    @if($album->nbVentes == false)
        <p>Nombre de ventes : Inconnu</p>
    @else
        <p>Nombre de ventes : {{$album->nbVentes}}</p>
    @endif





    <h2>Chansons de l'album</h2>
    <ul>
        @foreach($album->chansons as $chanson)
            <li><a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a></li>
        @endforeach
    </ul>





    <h2>Artistes présents sur cet album</h2>
    
    @php ($artists = []) @endphp

    <ul>
        @foreach($album->chansons as $chanson)
            @foreach($chanson->apparaitdans as $artiste)
                @if(!in_array($artiste->nom, $artists))
                    <li><a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a></li>
                    @php ($artists[] = $artiste->nom) @endphp
                @endif
            @endforeach
        @endforeach
    </ul>
@endsection