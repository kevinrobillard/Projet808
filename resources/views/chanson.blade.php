@extends('templates.template1')

@section('content')
<div id='grid5'>
    <div class="maing">
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
</div>
<div class="maind">
    <h1 class="titrechanson">Informations</h1>
    <!--Description-->
    <div class="description">
    @if($chanson->description == false)
        <p> </p>
    @else
        <p class="titredescription">Description</p><p class="descriptionchanson">{{$chanson->description}}</p>
    @endif  
    </div>


    <!--Duree-->
    @if($chanson->duree == false)
        <p>Durée : Inconnue</p>
    @else
        <p>Durée<br> {{$chanson->duree}}</p>
    @endif
    
    
    
    
<!--<audio controls="controls">
  <source src="/music/Friday.mp3" type="audio/mp3" />
  Votre navigateur n'est pas compatible
</audio>-->
    
    
	<audio src="" id="hidden-player"></audio>
	<div id="player">
		<div class="player-song">
			<div class="title"></div>
			<div class="artist"></div>
			<progress value="0" max="1"></progress>
			<div class="timestamps">
				<div class="time-now">0:00:00</div>
				<div class="time-finish">0:00:00</div>
			</div>
			<div class="actions">
				<div class="prev">
					<i class="material-icons">fast_rewind</i>
				</div>
				<div class="play">
					<a class="play-button paused" href="#">
						<div class="left"></div>
						<div class="right"></div>
						<div class="triangle-1"></div>
						<div class="triangle-2"></div>
					</a>
				</div>
				<div class="next">
					<i class="material-icons">fast_forward</i>
				</div>
			</div>
		</div>
	</div>

    



    
</div>
</div>
    
<div id='grid2'>
    <!--Paroles-->
    <div class="paroles">
    @if($chanson->paroles == false)
        <p>Paroles : Indisponible</p>
    @else
        <p class="titredescription">Paroles</p><p> {{$chanson->paroles}}</p>
    @endif
    </div>




    <h2>Artistes présents sur cette chanson</h2>
<div class="similaires">     

            @foreach($chanson->apparaitdans as $artiste)
        <div class="news">
             <a href='/artiste/{{$artiste->id}}'><img src='{{$artiste->photo}}'></a><br>
        <a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a>
</div>
        @endforeach
  </div>   
    </div>   
@endsection
