@extends('templates.template1')

@section('content')

    <h1>GERER LES ALBUMS</h1>
    <p>Choisissez l'action à effectuer</p>  
    
<div class="center">
  
<span class="buton">
<i class="fa fa-plus-circle" aria-hidden="true"></i>
  <span class="hover"></span>
    <span class="text"><a class="ajouter" href="/interfaceAdmin/gererAlbums/ajouter">Ajouter</a></span>
</span>
  
</div>

<div id='gridtab'>
    <table>
        <tr>
            <th>Titre</th>
            <th>Artiste</th>
            <th>Date de sortie</th>
            <th>Actions</th>
        </tr>
        @foreach($albums as $album)
            <tr>
                <td><a href='/album/{{$album->id}}'>{{$album->titre}}</a></td>
                <td><a href='/artiste/{{$album->artiste->id}}'>{{$album->artiste->nom}}</a></td>
                <td>{{$album->dateSortie}}</td>
                <td>
                    <div class="buton2"><a class="btngerer" href='/album/{{$album->id}}'>Voir</a></div>
                    <div class="buton2"> <a class="btngerer" href='/interfaceAdmin/gererAlbums/{{$album->id}}/modifier'>Modifier</a></div>
                    <div class="buton2"> <a class="btngerer" href='/interfaceAdmin/gererAlbums/{{$album->id}}/supprimer'>Supprimer</a></div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection