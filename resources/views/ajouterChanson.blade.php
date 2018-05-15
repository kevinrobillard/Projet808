@extends('templates.template1')

@section('content')
<div id="gridajout">
    <h1>AJOUTER UNE CHANSON</h1>
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
    
    
    
        <form id="contact" action='/interfaceAdmin/gererChansons/insert' method='POST' enctype="multipart/form-data">    
           @csrf
            <h3>Veuillez remplir tous les champs</h3>
            <fieldset>
                <label>Numéro de piste: </label><input placeholder="Numéro de piste" style=" width: 100%;" type="number" tabindex="1" name='numeroChanson' size=50 value="{{ old('numeroChanson') }}"  required autofocus>
            </fieldset>
            <fieldset>
                <label>Titre: </label><input placeholder="Titre" type="text" tabindex="2" name='titreChanson' size=50 value="{{ old('titreChanson') }}"  required autofocus>
            </fieldset>

            <fieldset>
                <label>Pochette: </label><input placeholder="Pochette (Entrer une URL)" type="url" tabindex="3" name='pochetteChanson' size=50 value="{{ old('pochetteChanson') }}" required>
            </fieldset>
            <fieldset>
                <label>Description: </label><textarea placeholder="Description" tabindex="4" name='descriptionChanson' required rows="5" cols="50">{{ old('descriptionChanson') }}</textarea>
            </fieldset>
            <fieldset>
                <label>Durée: </label><input type="time" placeholder="Durée" style=" width: 100%;" tabindex="5" name='dureeChanson' step='1' value="{{ old('dureeChanson') }}"/>
            </fieldset>
            <fieldset>
                <label>Paroles: </label><textarea placeholder="Paroles" tabindex="6" name='parolesChanson' required rows="5" cols="50">{{ old('parolesChanson') }}</textarea>
            </fieldset>
            <fieldset>
                <label>Audio : </label><input type="file" placeholder="Audio" tabindex="7" name='audioChanson' value="{{ old('audioChanson') }}" />
            </fieldset>
            <fieldset>
                <label>Album: </label><select style=" width: 100%;" name='albumChanson'>
                    @foreach($albums as $album)
                        <option value='{{$album->id}}'>{{$album->titre}}</option>
                        @endforeach
                </select>           
            </fieldset>
            
             <h2>Artistes présents sur cette chanson</h2>
            
            <fieldset>
            <label>Artiste principal *: </label><select name='artistePrincipalChanson' style=" width: 100%;">
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>           
            </fieldset>
            
            <fieldset>
                <label>Artiste numéro 2 (optionnel) : </label><select name='artisteDeuxChanson' style=" width: 100%;">
                            <option value='-1'>Choisir un artiste supplémentaire</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                            </select>         
            </fieldset>
            
            
                      <fieldset>
            <label>Artiste numéro 3 (optionnel) : </label><select name='artisteTroisChanson' style=" width: 100%;">
                                        <option value='-1'>Choisir un artiste supplémentaire</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>        
            </fieldset>
            
                       <fieldset>
                <label>Artiste numéro 4 (optionnel) : </label><select name='artisteQuatreChanson' style=" width: 100%;">
                            <option value='-1'>Choisir un artiste supplémentaire</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                            </select>         
            </fieldset>
            
            
                      <fieldset>
            <label>Artiste numéro 5 (optionnel) : </label><select name='artisteCinqChanson' style=" width: 100%;">
                                        <option value='-1'>Choisir un artiste supplémentaire/option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>        
            </fieldset>
            
            <fieldset>
                <button name="ajouterChanson" type="submit" id="contact-submit" data-submit="...Sending">Ajouter</button>
            </fieldset>
  </form>
    </div>
</div>
@endsection