@extends('templates.template1')

@section('content')
<div class="section1">
<div class="div1">
    <h1 class="titrealbum">{{$artiste->nom}}</h1>
        <!--Pochette-->
    @if($artiste->photo == false)
        <p>Photo Indisponible</p>
    @else
        <img class="imgalbum" src='{{$artiste->photo}}'>
    @endif
    @php ($artistOfThePage = $artiste->nom) @endphp

    @if($artiste->dateNaissance == false)
        <p>Date de naissance : Inconnue</p>
    @else
        <p>Date de naissance: <br> {{$artiste->dateNaissance}}</p>
    @endif
</div>

<div class="div2">
    <h2>Albums</h2>
@if(count($artiste->albums)==0)
    <p>Aucun album disponible</p>    
    @else
        @foreach($artiste->albums as $album)
        <div class="news2">
            <a href='/album/{{$album->id}}'><img class="imgalbum2" src='{{$album->pochette}}'></a><br>
            <a href='/album/{{$album->id}}'>{{$album->titre}}</a>
        </div>
        @endforeach
    @endif
</div>  

<div class="chansons">
    <h2>Chansons dans lesquelles apparait {{$artiste->nom}}</h2>
    <ul>
        @foreach($artiste->apparaitdans as $chanson)
            <li><a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a></li>
        @endforeach
    </ul></div>
</div>

<div class="section5">
<div class="div4">
    <h2>Artistes similaires</h2>
    
    @php ($artists = [$artistOfThePage]) @endphp

 
        @foreach($artiste->apparaitdans as $chanson)
            @foreach($chanson->apparaitdans as $artiste)
                @if(!in_array($artiste->nom, $artists))
                    <div class="news">
                        <a href='/artiste/{{$artiste->id}}'><img src='{{$artiste->photo}}'></a><br>
                        <a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a>
                    @php ($artists[] = $artiste->nom) @endphp
                </div>
                    @endif
            @endforeach
        @endforeach
 
</div>
</div>
@endsection