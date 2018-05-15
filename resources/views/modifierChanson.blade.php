@extends('templates.template1')

@section('content')
<div id="gridajout">
    <h1>MODIFIER UNE CHANSON</h1>
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

        <form id="contact" action='/interfaceAdmin/gererChansons/{{$chanson->id}}/update' method='POST' enctype="multipart/form-data">    
            @csrf

            <fieldset>
                <label>Numéro de piste : </label><input placeholder="Numéro de piste" style=" width: 100%;" type='number' name='numeroChanson' size=50 value="{{ $chanson->idPiste }}" required/>
            </fieldset>
            <fieldset>
                <label>Titre : </label><input type='text' name='titreChanson' size=50 value="{{ $chanson->titre }}" required/>
            </fieldset>
            <fieldset>
                <label>Description : </label><textarea name='descriptionChanson' required rows="5" cols="50">{{ $chanson->description }}</textarea>
            </fieldset>
            <fieldset>
                <label>Duree : </label><input type='time' style=" width: 100%;" name='dureeChanson' step='1' value="{{ $chanson->duree }}" required/>
            </fieldset>
            <fieldset>
                <label>Paroles : </label><textarea name='parolesChanson' required rows="5" cols="50">{{ $chanson->paroles }}</textarea>
            </fieldset>
            <fieldset>
                <label>Pochette : </label><input type='url' name='pochetteChanson' placeholder='Entrez une URL' size=50 value="{{ $chanson->pochette }}" required/>
            </fieldset>
            <fieldset>
                <label>Audio : </label> <label id="labelAudioChanson"> Choisir un fichier <input type='file' style=" width: 100%;" name='audioChanson' id='audioChanson'/></label>
            </fieldset>
            <fieldset><label>Album : </label><select name='albumChanson' style=" width: 100%;">
                                                <option value='-1'>{{$chanson->album->titre}}</option>
                                                @foreach($albums as $album)
                                                    <option value='{{$album->id}}'>{{$album->titre}}</option>
                                                @endforeach
                                            </select>
            </fieldset>
            
            <h2>Artistes présents sur cette chanson</h2>
            
            @php($nbArtistesPresents = 0)
            
            @foreach($chanson->apparaitdans as $artistePresent)
                @php($nbArtistesPresents++)    
                 <fieldset>
                     <label>Artiste @php(print $nbArtistesPresents) : </label><select name='artistePresent-@php(print $nbArtistesPresents)' style=" width: 100%;">
                                                <option value='-1'>{{$artistePresent->nom}}</option>
                                                @foreach($artistes as $artiste)
                                                    <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                                @endforeach
                                                <option value='99999999'>Choisir un artiste supplémentaire</option>
                                             </select>
                </fieldset>
            @endforeach
            
            
            @while($nbArtistesPresents != 5)
                @php($nbArtistesPresents++)
                 <fieldset>
                     <label>Artiste @php(print $nbArtistesPresents) : </label><select name='artistePresent-@php(print $nbArtistesPresents)' style=" width: 100%;">
                                        <option value='-1'>Choisir un artiste supplémentaire</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
                </fieldset>
            @endwhile
            
             <fieldset><button id="contact-submit" type='submit' name='modifierChanson' data-submit="...Sending" value='Modifier'/>Modifier</fieldset>
        </form>
    </div>
</div>
@endsection