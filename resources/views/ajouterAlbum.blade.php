@extends('templates.template1')

@section('content')
<div id="gridajout">
    <h1>AJOUTER UN ALBUM</h1>
<div class="containerform">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    
        <form id="contact" action='/interfaceAdmin/gererAlbums/insert' method="post">
           @csrf
            <h3>Veuillez remplir tous les champs</h3>
            <fieldset>
                <label>Titre: </label>
                <input placeholder="Titre" type="text" tabindex="1" name='titreAlbum' size=50 value="{{ old('titreAlbum') }}"  required autofocus>
            </fieldset>
            <fieldset>
                <label>Date de sortie: </label>
                <input placeholder="Date de sortie" type="date" tabindex="2" name='dateSortieAlbum' style=" width: 100%;" size=50 value="{{ old('dateSortieAlbum') }}" required>
            </fieldset>
            <fieldset>
                <label>Pochette: </label>
                <input placeholder="Pochette (Entrer une URL)" type="url" tabindex="3" name='pochetteAlbum' size=50 value="{{ old('pochetteAlbum') }}" required>
            </fieldset>
            <fieldset>
                <label>Description: </label>
                <textarea placeholder="Description" tabindex="4" name='descriptionAlbum' required rows="5" cols="50">{{ old('descriptionAlbum') }}</textarea>
            </fieldset>
            <fieldset>
                <label>Nombre de ventes: </label>
                <input type="number" placeholder="Nombre de ventes" style=" width: 100%;" tabindex="5" name='nbVentesAlbum' size=50 value="{{ old('nbVentesAlbum') }}"/>
            </fieldset>
            <fieldset>
                <label>Artiste: </label>
                <select style=" width: 100%;" name='artisteAlbum'>
                    @foreach($artistes as $artiste)
                        <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                            @endforeach
                </select>            
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Ajouter</button>
            </fieldset>
  </form>
    
</div>
</div>
@endsection