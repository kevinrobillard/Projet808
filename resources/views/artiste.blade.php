@extends('templates.template1')

@section('content')
    <h1>{{$artiste->nom}}</h1>
    @php ($artistOfThePage = $artiste->nom) @endphp

    @if($artiste->dateNaissance == false)
        <p>Date de naissance : Inconnue</p>
    @else
        <p>Date de naissance: {{$artiste->dateNaissance}}</p>
    @endif


    <h2>Albums</h2>
    <ul>
        @foreach($artiste->albums as $album)
            <li><a href='/album/{{$album->id}}'>{{$album->titre}}</a></li>
        @endforeach
    </ul>


    <h2>Chansons dans lesquelles apparait {{$artiste->nom}}</h2>
    <ul>
        @foreach($artiste->apparaitdans as $chanson)
            <li><a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a></li>
        @endforeach
    </ul>


    <h2>Artistes similaires</h2>
    
    @php ($artists = [$artistOfThePage]) @endphp

    <ul>
        @foreach($artiste->apparaitdans as $chanson)
            @foreach($chanson->apparaitdans as $artiste)
                @if(!in_array($artiste->nom, $artists))
                    <li><a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a></li>
                    @php ($artists[] = $artiste->nom) @endphp
                @endif
            @endforeach
        @endforeach
    </ul>

@endsection