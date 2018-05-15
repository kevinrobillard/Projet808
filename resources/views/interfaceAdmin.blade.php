@extends('templates.template1')

@section('content')

    <h1>INTERFACE ADMIN</h1>
    <p>Choisissez le type de données à administrer</p>  
    

    <div id='gridadmin'>
        <a href="/interfaceAdmin/gererArtistes"><image class="iconesadmin" img src="/img/micro.png" alt="Artistes"></image>Artistes</a>
        <a href="/interfaceAdmin/gererAlbums"><image class="iconesadmin" img src="/img/cd.png" alt="Albums"></image>Albums</a>
        <a href="/interfaceAdmin/gererChansons"><image class="iconesadmin" img src="/img/mp3.png" alt="Chansons"></image>Chansons</a>
    </div>

@endsection