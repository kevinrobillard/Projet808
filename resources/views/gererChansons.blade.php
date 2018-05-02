@extends('templates.template1')

@section('content')

    <h1>GERER LES CHANSONS</h1>
    <p>Choisissez l'action à effectuer</p>  
    

    <a href="/interfaceAdmin/gererChansons/ajouter"><image class="icones" img src=""></image>Ajouter</a>
    <table border=1>
        <tr>
            <th>Titre</th>
            <th>Duree</th>
            <th>Album</th>
            <th>Artiste</th>
            <th>Actions</th>
        </tr>
        @foreach($chansons as $chanson)
            <tr>
                <td><a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a></td>
                <td>{{$chanson->duree}}</td>
                <td><a href='/album/{{$chanson->album->id}}'>{{$chanson->album->titre}}</a></td>
                <td><a href='/artiste/{{$chanson->album->artiste->id}}'>{{$chanson->album->artiste->nom}}</a></td>
                <td>
                    <a href='/chanson/{{$chanson->id}}'>Voir</a>
                    <a href='/interfaceAdmin/gererChansons/{{$chanson->id}}/modifier'>Modifier</a>
                    <a href='/interfaceAdmin/gererChansons/{{$chanson->id}}/supprimer'>Supprimer</a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection