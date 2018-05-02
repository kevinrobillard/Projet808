@extends('templates.template1')

@section('content')

    <h1>MODIFIER UN ARTISTE</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action='/interfaceAdmin/gererArtistes/{{$artiste->id}}/update' method='POST'>    
            @csrf
            <label>Nom : </label><input type='text' name='nomArtiste' size=50 value="{{ $artiste->nom }}" required/><br>
            <label>Date de naissance : </label><input type='date' name='dateNaissanceArtiste' size=50 value="{{ $artiste->dateNaissance }}" required/><br>
            <label>Photo : </label><input type='url' name='photoArtiste' placeholder='Entrez une URL' size=50 value="{{ $artiste->photo }}" required/><br><br>
            <input type='submit' name='modifierArtiste' value='Modifier'/>
        </form>

@endsection