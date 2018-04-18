<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
        <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
<header class="header">
  <a href="logo.png" class="logo">Projet 808</a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <ul class="menu">
    <li><a href="/">Fil d'actualités</a></li>
    <li><a href="/nouveautes">Nouveautés</a></li>
    <li><a href="/playlists">Playlists</a></li>
    <li><a href="/parcourir/artistes">Parcourir</a></li>
    @guest 
      <li class="login"><a href="/login">Login</a></li> 
    @endguest
    @auth
        <li class="login"><a href="/logout">Logout</a></li>    
    @endauth
  </ul>
</header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
 <footer>
        <p>Copyright HuitCentHuit.fr</p>
        <p>Developed by Thibaut DUREISSEIX, Thibault REMY, Kevin ROBILLARD</p>
    </footer>    

</body>
</html>
