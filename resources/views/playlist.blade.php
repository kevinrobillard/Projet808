@auth
    @extends('templates.template1')

    @section('content')

        <h1>{{$playlist->titre}}</h1>

        <a href='/playlist/{{$playlist->id}}/ajouterChansonsInPlaylist'>AJOUTER DES CHANSONS<img src=''></a>
        <a href='/playlist/{{$playlist->id}}/supprimerChansonsInPlaylist'>SUPPRIMER DES CHANSONS<img src=''></a>

            @foreach($playlist->contient as $chanson)
                <div>
                    <a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a> - {{$chanson->duree}}<br>
                    <a href='/album/{{$chanson->album->id}}'>{{$chanson->album->titre}}</a><br>
                    @foreach($chanson->apparaitdans as $artiste)
                        <a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a>
                    @endforeach
                </div>
            @endforeach

    @endsection
@endauth