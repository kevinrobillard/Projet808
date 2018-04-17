@extends('templates.template1')

@section('content')

    <h1>PARCOURIR</h1>
    <p class="trier">Trier par:</p>
    @include('_parcourirNavbar')

    
        @foreach($artistes as $artiste)
            <div class="news">
                <a href='/artiste/{{$artiste->id}}'><img src='{{$artiste->photo}}'></a><br>
                <a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a>
            </div>
        @endforeach
    

@endsection