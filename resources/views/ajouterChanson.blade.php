@extends('templates.template1')

@section('content')

    <h1>AJOUTER UNE CHANSON</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action='/interfaceAdmin/gererChansons/insert' method='POST' enctype="multipart/form-data">    
            @csrf
            <label>Numéro de piste : </label><input type='number' name='numeroChanson' size=50 value="{{ old('numeroChanson') }}" required/><br>
            <label>Titre : </label><input type='text' name='titreChanson' size=50 value="{{ old('titreChanson') }}" required/><br>
            <label>Description : </label><textarea name='descriptionChanson' required rows="5" cols="50">{{ old('descriptionChanson') }}</textarea><br>
            <label>Duree : </label><input type='time' name='dureeChanson' step='1' value="{{ old('dureeChanson') }}" required/><br>
            <label>Paroles : </label><textarea name='parolesChanson' required rows="5" cols="50">{{ old('parolesChanson') }}</textarea><br>
            <label>Pochette : </label><input type='url' name='pochetteChanson' placeholder='Entrez une URL' size=50 value="{{ old('pochetteChanson') }}" required/><br>
            <label>Audio : </label><input type='file' name='audioChanson' value="{{ old('audioChanson') }}"/><br>
            <label>Album : </label><select name='albumChanson'>
                                        @foreach($albums as $album)
                                            <option value='{{$album->id}}'>{{$album->titre}}</option>
                                        @endforeach
                                     </select>
            
            <h2>Artistes présents sur cette chanson</h2>
            <label>Artiste principal *: </label><select name='artistePrincipalChanson'>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
            <br>
            
            <label>Artiste numéro 2 (optionnel) : </label><select name='artisteDeuxChanson'>
                                        <option value='-1'>Choisir un artiste supplémentaire pour cette chanson</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
            <br>
            
            <label>Artiste numéro 3 (optionnel) : </label><select name='artisteTroisChanson'>
                                        <option value='-1'>Choisir un artiste supplémentaire pour cette chanson</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
            <br>
            
            <label>Artiste numéro 4 (optionnel) : </label><select name='artisteQuatreChanson'>
                                        <option value='-1'>Choisir un artiste supplémentaire pour cette chanson</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
            <br>
            
            <label>Artiste numéro 5 (optionnel) : </label><select name='artisteCinqChanson'>
                                        <option value='-1'>Choisir un artiste supplémentaire pour cette chanson</option>
                                        @foreach($artistes as $artiste)
                                            <option value='{{$artiste->id}}'>{{$artiste->nom}}</option>
                                        @endforeach
                                     </select>
            <br><br>
            <input type='submit' name='ajouterChanson' value='Ajouter'/>
        </form>

@endsection