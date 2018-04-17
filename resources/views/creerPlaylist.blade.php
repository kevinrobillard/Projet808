@auth
    @extends('templates.template1')

    @section('content')

        <h1>Créer une playlist</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action='/playlist/insertPlaylist' method='POST'>
                @csrf
                <label>Titre :</label> <input type='text' name='titre' value="{{ old('titre') }}" required/><br><br>
                <input type='submit' name='validerTitrePlaylist'/>
            </form>

    @endsection
@endauth