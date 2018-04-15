@extends('templates.template1')

@section('content')
    @auth
    <p>Ceci est la page d'accueil</p>
    @endauth
@endsection