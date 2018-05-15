@extends('templates.template1')

@section('content')
<div id="gridajout">
    <h1>AJOUTER UN ARTISTE</h1>
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
    
      <form id="contact" action='/interfaceAdmin/gererArtistes/insert' method="post">
           @csrf
            <h3>Veuillez remplir tous les champs</h3>
            <fieldset>
                <label>Nom: </label>
                <input placeholder="Nom" type="text" tabindex="1" name='nomArtiste' size=50 value="{{ old('nomArtiste') }}" required autofocus>
            </fieldset>
            <fieldset>
                <label>Date de naissance: </label>
                <input placeholder="Date de naissance" type="date" tabindex="2" name='dateNaissanceArtiste' style=" width: 100%;" size=50 value="{{ old('dateNaissanceArtiste') }}" required>
            </fieldset>
            <fieldset>
                <label>Photo: </label>
                <input placeholder="Photo (Entrer une URL)" type="url" tabindex="3" name='photoArtiste' size=50 value="{{ old('photoArtiste') }}" required>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Ajouter</button>
            </fieldset>
  </form>
</div>
</div>
@endsection