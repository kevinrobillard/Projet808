@extends('templates.template1')

@section('content')

    <h1>PARCOURIR</h1>

    @include('_parcourirNavbar')

    <ul>
        @foreach($artistes as $artiste)
            <li><a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a></li>
        @endforeach
    </ul>

@endsection