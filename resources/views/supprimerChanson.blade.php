@extends('templates.template1')

@section('content')
<div id="gridsupp">
    <h1>SUPPRIMER UNE CHANSON</h1>

    <p>Etes-vous sur de vouloir supprimer la chanson suivante ?</p>

    <div>
        <a href='/chanson/{{$chanson->id}}'><img src='{{$chanson->pochette}}'></a><br>
        <a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a><br>
        <a href='/artiste/{{$chanson->album->artiste->id}}'>{{$chanson->album->artiste->nom}}</a> - <a href='/album/{{$chanson->album->id}}'>{{$chanson->album->titre}}</a><br><br>
        Duree : {{$chanson->duree}} <br><br>
        {{$chanson->description}}
    </div>

    <br>

    <form action='/interfaceAdmin/gererChansons/{{$chanson->id}}/delete' method='POST'>    
        @csrf
        <input class="bouton2" type='submit' name='ouiSupprimerChanson' value='Oui'/>
    </form>

    <form action='/interfaceAdmin/gererChansons' method='GET'>    
        @csrf
        <input class="bouton2" type='submit' name='nonSupprimerChanson' value='Non'/>
    </form>
</div>
@endsection