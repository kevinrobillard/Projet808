@extends('templates.template1')

@section('content')

    <h1>PARCOURIR</h1>
    
    @include('_parcourirNavbar')

    <ul>
        @foreach($chansons as $chanson)
            <li><a href='/chanson/{{$chanson->id}}'>{{$chanson->titre}}</a></li>
        @endforeach
    </ul>

@endsection