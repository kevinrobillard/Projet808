@extends('templates.template1')

@section('content')

    <h1>MODIFIER UNE CHANSON</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action='/interfaceAdmin/gererChansons/{{$chanson->id}}/update' method='POST' enctype="multipart/form-data">    
            @csrf
            <label>Numéro de piste : </label><input type='number' name='numeroChanson' size=50 value="{{ $chanson->idPiste }}" required/><br>
            <label>Titre : </label><input type='text' name='titreChanson' size=50 value="{{ $chanson->titre }}" required/><br>
            <label>Description : </label><textarea name='descriptionChanson' required rows="5" cols="50">{{ $chanson->description }}</textarea><br>
            <label>Duree : </label><input type='time' name='dureeChanson' step='1' value="{{ $chanson->duree }}" required/><br>
            <label>Paroles : </label><textarea name='parolesChanson' required rows="5" cols="50">{{ $chanson->paroles }}</textarea><br>
            <label>Pochette : </label><input type='url' name='pochetteChanson' placeholder='Entrez une URL' size=50 value="{{ $chanson->pochette }}" required/><br>
            <label>Audio : </label><input type='file' name='audioChanson' value="{{ $chanson->audio }}"/><br>
            <label>Album : </label><select name='albumChanson'>
                                        <option value='-1'>{{$chanson->album->titre}}</option>
                                        @foreach($albums as $album)
                                            <option value='{{$album->id}}'>{{$album->titre}}</option>
                                        @endforeach
                                     </select>
            
            <h2>Artistes présents sur cette chanson</h2>
            
            @php($nbArtistesPresents = 0)
            
            @foreach($chanson->apparaitdans as $artistePresent)
                @php($nbArtistesPresents++)    
                <label>Artiste @php(print $nbArtistesPresents) : </label><select name='artistePresent-@php(print $nbArtistesPresents)'>
                                                <option value='-1'>{{$artistePresent->nom}}</option>
                                                @foreach($artistes as $artiste)
                                                    <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                                @endforeach
                                                <option value='99999999'>Choisir un artiste supplémentaire pour cette chanson</option>
                                             </select>
                <br>
            @endforeach
            
            
            @while($nbArtistesPresents != 5)
                @php($nbArtistesPresents++)
                <label>Artiste @php(print $nbArtistesPresents) : </label><select name='artistePresent-@php(print $nbArtistesPresents)'>
                                        <option value='-1'>Choisir un artiste supplémentaire pour cette chanson</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
                <br>
            @endwhile
            
            <br><br>
            <input type='submit' name='modifierChanson' value='Modifier'/>
        </form>

@endsection