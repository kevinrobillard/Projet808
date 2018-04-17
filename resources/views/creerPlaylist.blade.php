@auth
    @extends('templates.template1')

    @section('content')

        <h1>Créer une playlist</h1>

            <form action='/playlist/insertPlaylist' method='POST'>
                @csrf
                <label>Titre :</label> <input type='text' name='titre' required/><br><br>
                <input type='submit' name='validerTitrePlaylist'/>
            </form>

    @endsection
@endauth