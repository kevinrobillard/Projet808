@extends('templates.template1')

@section('content')

    <h1>PARCOURIR</h1>
    <p class="trier">Trier par:</p>
    @include('_parcourirNavbar')

    <ul>
        @foreach($artistes as $artiste)
            <li><a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a></li>
        @endforeach
    </ul>

@endsection