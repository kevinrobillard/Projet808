@extends('templates.template1')

@section('content')
<div id="gridajout">
    <h1>MODIFIER UN ALBUM</h1>
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

        <form id="contact" action='/interfaceAdmin/gererAlbums/{{$album->id}}/update' method='POST'>    
            @csrf
            <fieldset>
                <label>Titre: </label>
                <input type='text'  placeholder="Titre" name='titreAlbum' size=50 value="{{ $album->titre }}" required/>
            </fieldset>
            <fieldset> 
                    <label>Description: </label>
                    <textarea  placeholder="Description" name='descriptionAlbum' required rows="5" cols="50">{{ $album->description }}</textarea>
            </fieldset>
            <fieldset> 
                   <label>Date de sortie: </label>
                   <input type='date'  placeholder="Date de sortie" name='dateSortieAlbum' style=" width: 100%;" size=50 value="{{ $album->dateSortie }}" required/>
            </fieldset>
            <fieldset>
                <label>Nombre de vente: </label>
                   <input type='number'  placeholder="Nombre de vente" style=" width: 100%;" name='nbVentesAlbum' size=50 value="{{ $album->nbVentes }}"/>
            </fieldset>
            <fieldset>
            <label>Pochette: </label>
                   <input type='url'  placeholder="Pochette" name='pochetteAlbum' placeholder='Entrez une URL' size=50 value="{{ $album->pochette }}" required/>
            </fieldset>
            <fieldset><label>Artiste : </label><select name='artisteAlbum' style=" width: 100%;">
                                        <option value='-1'>{{$album->artiste->nom}}</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
               </fieldset>
                <button name="ajouterChanson" type="submit" id="contact-submit" data-submit="...Sending">Modifier</button>
        </form>
    </div>
</div>
@endsection