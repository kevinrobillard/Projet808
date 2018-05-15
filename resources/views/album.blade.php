@extends('templates.template1')

@section('content')
<div id='grid1'>
<div class="maing">
    <h1 class="titrealbum">{{$album->titre}}</h1>

    <!--Pochette-->
    @if($album->pochette == false)
        <p>Pochette Indisponible</p>
    @else
        <img class="imgalbum" src='{{$album->pochette}}'>
    @endif
    
</div>
    <div class="maind">
    <h2>Tracklist</h2>
        <ul>
            @foreach($album->chansons as $chanson)
                <li>{{$chanson->idPiste}}.<a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a> - {{$chanson->duree}}</li>
            @endforeach
        </ul>
</div>
</div>

<div class="grid2">
    <div class="infos">
    <!--Description-->
    @if($album->description == false)
        <p> </p>
    @else
        <p class="infos2"><span class="infos">Description</span><br> {{$album->description}}</p>
    @endif    


    <!--Date de sortie-->
    @if($album->dateSortie == false)
        <p class="infos2"><span class="infos">Date de sortie</span><br> Inconnue</p>
    @else
        <p class="infos2"><span class="infos">Date de sortie</span><br> {{$album->dateSortie}}</p>
    @endif


    <!--Nombre de ventes-->
    @if($album->nbVentes == false)
        <p class="infos2"><span class="infos">Nombre de ventes</span><br> Inconnu</p>
    @else
        <p class="infos2"><span class="infos">Nombre de ventes</span><br> {{$album->nbVentes}}</p>
    @endif
</div>




    <h2>Artistes présents sur cet album</h2>
    
    @php ($artists = []) @endphp
<div class="similaires">     
        @foreach($album->chansons as $chanson)

            @foreach($chanson->apparaitdans as $artiste)
  
                @if(!in_array($artiste->nom, $artists))
                    <div class="news">
                        <a href='/artiste/{{$artiste->id}}'><img src='{{$artiste->photo}}'></a><br>
                        <a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a>
                    </div>
                    @php ($artists[] = $artiste->nom) @endphp
                @endif
            @endforeach
        @endforeach
</div>
</div>
     
@endsection