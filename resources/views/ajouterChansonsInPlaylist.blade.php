@extends('templates.template1')

@section('content')

    <h1>SELECTIONNEZ LES CHANSONS A AJOUTER A " {{$playlist->titre}} "</h1>

        @foreach($chansons as $chanson)
            <form action='/playlist/{{$playlist->id}}/insertChansonsInPlaylist' method='POST'>    
                @csrf
                <a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}} - {{$chanson->album->titre}} - {{$chanson->album->artiste->nom}}</a>
                <input type='hidden' name='idPlaylist' value='{{$playlist->id}}'/>
                <input type='hidden' name='idChanson' value='{{$chanson->id}}'/>
                
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
                    <input type='submit' name='ajouterChansonsDansPlaylist' value='Ajouter'/>
                 @else
                    <span>Ce morceau est déjà présent dans cette playlist</span>
                @endif
            </form>
        @endforeach

@endsection