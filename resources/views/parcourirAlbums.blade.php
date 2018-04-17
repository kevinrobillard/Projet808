@extends('templates.template1')

@section('content')

    <h1>PARCOURIR</h1>
    <p class="trier">Trier par:</p>
    @include('_parcourirNavbar')

    <ul>
        @foreach($albums as $album)
            <li><a href='/album/{{$album->id}}'>{{$album->titre}}</a></li>
        @endforeach
    </ul>

@endsection