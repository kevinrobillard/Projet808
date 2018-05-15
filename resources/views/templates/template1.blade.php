<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="{{ asset('js/player.js') }}" ></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
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
      @if(Auth::user() && Auth::user()->email == 'admin@gmail.com')
            <li class="login"><a href="/interfaceAdmin">Interface Admin</a></li>
        @endif
    @endauth
  </ul>
</header>
    



    
    <div class="container">
        @yield("content")
    </div>
    
    <footer>
        <p>Copyright HuitCentHuit.fr</p>
        <p>Developed by Thibaut DUREISSEIX, Thibault REMY, Kevin ROBILLARD</p>
    </footer>
</body>
    
    <script src="{{ asset('js/player.js') }}" defer></script>
</html>