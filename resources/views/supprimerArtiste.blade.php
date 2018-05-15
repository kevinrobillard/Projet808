@extends('templates.template1')

@section('content')
<div id="gridsupp">
    <h1>SUPPRIMER UN ARTISTE</h1>

    <p>Etes-vous sur de vouloir supprimer l'artiste suivant ainsi que ses albums et chansons ?</p>

    <div>
        <a href='/artiste/{{$artiste->id}}'><img src='{{$artiste->photo}}'></a><br>
        <a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a><br>
        {{$artiste->dateNaissance}}
    </div>

    <br>

    <form action='/interfaceAdmin/gererArtistes/{{$artiste->id}}/delete' method='POST'>    
        @csrf
        <input class="bouton2" type='submit' name='ouiSupprimerArtiste' value='Oui'/>
    </form>

    <form action='/interfaceAdmin/gererArtistes' method='GET'>    
        @csrf
        <input class="bouton2" type='submit' name='nonSupprimerArtiste' value='Non'/>
    </form>
</div>
@endsection