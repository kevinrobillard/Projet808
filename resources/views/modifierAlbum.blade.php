@extends('templates.template1')

@section('content')

    <h1>MODIFIER UN ALBUM</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action='/interfaceAdmin/gererAlbums/{{$album->id}}/update' method='POST'>    
            @csrf
            <label>Titre : </label><input type='text' name='titreAlbum' size=50 value="{{ $album->titre }}" required/><br>
            <label>Description : </label><textarea name='descriptionAlbum' required rows="5" cols="50">{{ $album->description }}</textarea><br>
            <label>Date de sortie : </label><input type='date' name='dateSortieAlbum' size=50 value="{{ $album->dateSortie }}" required/><br>
            <label>Nombre de ventes : </label><input type='number' name='nbVentesAlbum' size=50 value="{{ $album->nbVentes }}"/><br>
            <label>Pochette : </label><input type='url' name='pochetteAlbum' placeholder='Entrez une URL' size=50 value="{{ $album->pochette }}" required/><br>
            <label>Artiste : </label><select name='artisteAlbum'>
                                        <option value='-1'>{{$album->artiste->nom}}</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
            <br><br>
            <input type='submit' name='modifierAlbum' value='Modifier'/>
        </form>

@endsection