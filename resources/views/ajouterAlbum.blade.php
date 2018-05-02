@extends('templates.template1')

@section('content')

    <h1>AJOUTER UN ALBUM</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action='/interfaceAdmin/gererAlbums/insert' method='POST'>    
            @csrf
            <label>Titre : </label><input type='text' name='titreAlbum' size=50 value="{{ old('titreAlbum') }}" required/><br>
            <label>Description : </label><textarea name='descriptionAlbum' required rows="5" cols="50">{{ old('descriptionAlbum') }}</textarea><br>
            <label>Date de sortie : </label><input type='date' name='dateSortieAlbum' size=50 value="{{ old('dateSortieAlbum') }}" required/><br>
            <label>Nombre de ventes : </label><input type='number' name='nbVentesAlbum' size=50 value="{{ old('nbVentesAlbum') }}"/><br>
            <label>Pochette : </label><input type='url' name='pochetteAlbum' placeholder='Entrez une URL' size=50 value="{{ old('pochetteAlbum') }}" required/><br>
            <label>Artiste : </label><select name='artisteAlbum'>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
            <br><br>
            <input type='submit' name='ajouterAlbum' value='Ajouter'/>
        </form>

@endsection