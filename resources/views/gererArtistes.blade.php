@extends('templates.template1')

@section('content')
    <h1>GERER LES ARTISTES</h1>
    <p>Choisissez l'action à effectuer</p>  

<div id='gridtab'>
<div class="center">
  
<span class="buton">
<i class="fa fa-plus-circle" aria-hidden="true"></i>
  <span class="hover"></span>
    <span class="text"><a class="ajouter" href="/interfaceAdmin/gererArtistes/ajouter">Ajouter</a></span>
</span>
  
</div>


    <table>
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
                    <div class="buton2"><a class="btngerer" href='/artiste/{{$artiste->id}}'>Voir</a></div>
                    <div class="buton2"><a class="btngerer" href='/interfaceAdmin/gererArtistes/{{$artiste->id}}/modifier'>Modifier</a></div>
                    <div class="buton2"><a class="btngerer" href='/interfaceAdmin/gererArtistes/{{$artiste->id}}/supprimer'>Supprimer</a></div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection