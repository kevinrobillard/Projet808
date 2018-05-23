@extends('templates.template1')

@section('content')

    <h1>SELECTIONNEZ LES CHANSONS A AJOUTER A " {{$playlist->titre}} "</h1>

<div class=""> 
    <form class="" action='/playlist/{{$playlist->id}}/' method='GET'>    
        @csrf
        <input class="" type='submit' name='returnToPlaylist' value='Terminé'/>
    </form>
</div>

<div id="gridartistes">
        @foreach($chansons as $chanson)
            <form class="ajouterchansons" action='/playlist/{{$playlist->id}}/insertChansonsInPlaylist' method='POST'>    
                @csrf
                <div class="main2">
                    <a href='/chanson/{{$chanson->id}}'><img src='{{$chanson->pochette}}'></a><br>
                    <audio controls="controls"> <source src="/{{$chanson->audio}}" type="audio/mp3" />Votre navigateur n'est pas compatible</audio><br>
                    <a href='/chanson/{{$chanson->id}}'><span class="artistealbum">{{$chanson->titre}}</span> <br>{{$chanson->album->titre}} - {{$chanson->album->artiste->nom}}</a>
                    <input type='hidden' name='idPlaylist' value='{{$playlist->id}}'/>
                    <input type='hidden' name='idChanson' value='{{$chanson->id}}'/>
                </div>
                @php(
                $alreadyInPlaylist = []
                )@endphp
                
                
               @foreach($playlist->contient as $morceau)
                    @php(
                        $alreadyInPlaylist [] = $morceau->id
                    )
                @endforeach
                
                
                @if(empty($alreadyInPlaylist))
                    @php(
                            $alreadyInPlaylist = []
                        )
                @endif
                
                
                @if(!in_array($chanson->id, $alreadyInPlaylist))  
                    <input class="bouton2" type='submit' name='ajouterChansonsDansPlaylist' value='Ajouter'/>
                 @else
                    <span>Ce morceau est déjà présent dans cette playlist</span>
                @endif
            </form>
        @endforeach
</div>
@endsection