@extends('templates.template1')

@section('content')
<div id="gridajout">
    <h1>MODIFIER UN ARTISTE</h1>
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

        <form id="contact" action='/interfaceAdmin/gererArtistes/{{$artiste->id}}/update' method='POST'>    
            @csrf
            <fieldset>
                <label>Nom: </label>
                <input type='text' placeholder="Nom" name='nomArtiste' size=50 value="{{ $artiste->nom }}" required/>
            </fieldset>
            <fieldset>
                <label>Date de naissance: </label>
                <input placeholder="dateNaissanceArtiste" style=" width: 100%;" type='date' name='dateNaissanceArtiste' size=50 value="{{ $artiste->dateNaissance }}" required/>
            </fieldset>
            <fieldset>
                <label>Photo: </label>
                <input type='url' placeholder="Photo" name='photoArtiste' placeholder='Entrez une URL' size=50 value="{{ $artiste->photo }}" required/></fieldset>
                <button name="ajouterChanson" type="submit" id="contact-submit" data-submit="...Sending">Modifier</button>
        </form>
    </div>
</div>
@endsection