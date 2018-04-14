@extends('templates.template1')

@section('content')

    <h1>PARCOURIR</h1>
    
    @include('_parcourirNavbar')

    <ul>
        @foreach($albums as $album)
            <li><a href='/album/{{$album->id}}'>{{$album->titre}}</a></li>
        @endforeach
    </ul>

@endsection