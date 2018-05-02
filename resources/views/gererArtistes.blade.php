@extends('templates.template1')

@section('content')

    <h1>GERER LES ARTISTES</h1>
    <p>Choisissez l'action à effectuer</p>  


    <a href="/interfaceAdmin/gererArtistes/ajouter"><image class="icones" img src=""></image>Ajouter</a>
    <table border=1>
        <tr>
            <th>Artiste</th>
            <th>Date de naissance</th>
            <th>Actions</th>
        </tr>
        @foreach($artistes as $artiste)
            <tr>
                <td><a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a></td>
                <td>{{$artiste->dateNaissance}}</td>
                <td>
                    <a href='/artiste/{{$artiste->id}}'>Voir</a>
                    <a href='/interfaceAdmin/gererArtistes/{{$artiste->id}}/modifier'>Modifier</a>
                    <a href='/interfaceAdmin/gererArtistes/{{$artiste->id}}/supprimer'>Supprimer</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection