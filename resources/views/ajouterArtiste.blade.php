@extends('templates.template1')

@section('content')

    <h1>AJOUTER UN ARTISTE</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action='/interfaceAdmin/gererArtistes/insert' method='POST'>    
            @csrf
            <label>Nom : </label><input type='text' name='nomArtiste' size=50 value="{{ old('nomArtiste') }}" required/><br>
            <label>Date de naissance : </label><input type='date' name='dateNaissanceArtiste' size=50 value="{{ old('dateNaissanceArtiste') }}" required/><br>
            <label>Photo : </label><input type='url' name='photoArtiste' placeholder='Entrez une URL' size=50 value="{{ old('photoArtiste') }}" required/><br><br>
            <input type='submit' name='ajouterArtiste' value='Ajouter'/>
        </form>

@endsection