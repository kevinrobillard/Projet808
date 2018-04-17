@extends('templates.template1')

@section('content')

    @auth
        <h1>FIL D'ACTUALITÉS</h1>

            @foreach($followedArtistsAlbums as $album)
                
                @php ($dates = []) @endphp

                <div>
                    @if(!in_array($album->dateSortie, $dates))
                        {{$album->dateSortie}}<br>
                        @php ($dates[] = $album->dateSortie) @endphp
                    @endif
        
                    <a  href='/album/{{$album->id}}'><img src='{{$album->pochette}}'/></a><br>
                    <a  href='/album/{{$album->id}}'>{{$album->titre}}</a><br>
                     @php ($artiste = App\Artiste::find($album->idArtiste)) @endphp
                    <a class="artistealbum" href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a>
                </div>
            @endforeach

    @endauth

    @guest
        Pour avoir accès à toutes les fonctionnalités du site et pouvoir suivre des artistes, <b><a href='login'>Connectez-vous</a></b> ou <b><a href='register'>Créez un compte</a></b>
    @endguest

@endsection