@extends('templates.template1')

@section('content')
    <h1 class="titrechanson">{{$chanson->titre}}</h1>

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
<div class="infoChanson">
       <div class="chansonalbum"> Artiste<br> <a href='/album/{{$chanson->album->id}}'>{{$chanson->album->artiste->nom}}</a><br></div>
    <div class="chansonalbum">Album<br> <a href='/album/{{$chanson->album->id}}'>{{$chanson->album->titre}}</a></div>
</div>
    @endif 


    <!--Description-->
    <div class="description">
    @if($chanson->description == false)
        <p> </p>
    @else
        <p class="titredescription">Description</p><p>{{$chanson->description}}</p>
    @endif  
    </div>


    <!--Duree-->
    @if($chanson->duree == false)
        <p>Durée : Inconnue</p>
    @else
        <p>Durée<br> {{$chanson->duree}}</p>
    @endif
<audio controls="controls">
  <source src="/music/Friday.mp3" type="audio/mp3" />
  Votre navigateur n'est pas compatible
</audio>

    <!--Paroles-->
    <div class="paroles">
    @if($chanson->paroles == false)
        <p>Paroles : Indisponible</p>
    @else
        <p class="titredescription">Paroles</p><p> {{$chanson->paroles}}</p>
    @endif
    </div>




    <h2>Artistes présents sur cette chanson</h2>

            @foreach($chanson->apparaitdans as $artiste)
        <div class="news">
             <a href='/artiste/{{$artiste->id}}'><img src='{{$artiste->photo}}'></a><br>
        <a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a>
</div>
        @endforeach
    
    
@endsection