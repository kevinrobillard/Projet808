@extends('templates.template1')

@section('content')

    <h1>GERER LES ALBUMS</h1>
    <p>Choisissez l'action à effectuer</p>  
    

    <a href="/interfaceAdmin/gererAlbums/ajouter"><image class="icones" img src=""></image>Ajouter</a>
    <table border=1>
        <tr>
            <th>Titre</th>
            <th>Artiste</th>
            <th>Date de sortie</th>
            <th>Nombre de ventes</th>
            <th>Actions</th>
        </tr>
        @foreach($albums as $album)
            <tr>
                <td><a href='/album/{{$album->id}}'>{{$album->titre}}</a></td>
                <td><a href='/artiste/{{$album->artiste->id}}'>{{$album->artiste->nom}}</a></td>
                <td>{{$album->dateSortie}}</td>
                <td>{{$album->nbVentes}}</td>
                <td>
                    <a href='/album/{{$album->id}}'>Voir</a>
                    <a href='/interfaceAdmin/gererAlbums/{{$album->id}}/modifier'>Modifier</a>
                    <a href='/interfaceAdmin/gererAlbums/{{$album->id}}/supprimer'>Supprimer</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection