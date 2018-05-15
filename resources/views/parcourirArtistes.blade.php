@extends('templates.template1')

@section('content')

    <h1>PARCOURIR</h1>
    <p class="trier">Trier par:</p>
    @include('_parcourirNavbar')

<div id='gridartistes'>
        @foreach($artistes as $artiste)
            <div class="main">
                <a href='/artiste/{{$artiste->id}}'><img src='{{$artiste->photo}}'></a><br>
                <a href='/artiste/{{$artiste->id}}'>{{$artiste->nom}}</a>
            </div>
        @endforeach
    
</div>
@endsection