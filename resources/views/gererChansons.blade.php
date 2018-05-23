@extends('templates.template1')

@section('content')

    <h1>GERER LES CHANSONS</h1>
    <p>Choisissez l'action à effectuer</p>  
    
<div class="center">
  
<span class="buton">
<i class="fa fa-plus-circle" aria-hidden="true"></i>
  <span class="hover"></span>
    <span class="text"><a class="ajouter" href="/interfaceAdmin/gererChansons/ajouter">Ajouter</a></span>
</span>
  
</div>
  
<div id='gridtab'>
<table>
        <tr>
            <th>Titre</th>
            <th>Album</th>
            <th>Artiste</th>
            <th>Actions</th>
        </tr>
        @foreach($chansons as $chanson)
            <tr>
                <td><a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a></td>
                <td><a href='/album/{{$chanson->album->id}}'>{{$chanson->album->titre}}</a></td>
                <td><a href='/artiste/{{$chanson->album->artiste->id}}'>{{$chanson->album->artiste->nom}}</a></td>
                <td>
                    <div class="buton2"><a class="btngerer" href='/chanson/{{$chanson->id}}'>Voir</a></div>
                    <div class="buton2"><a class="btngerer" href='/interfaceAdmin/gererChansons/{{$chanson->id}}/modifier'>Modifier</a></div>
                    <div class="buton2"><a class="btngerer" href='/interfaceAdmin/gererChansons/{{$chanson->id}}/supprimer'>Supprimer</a></div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection