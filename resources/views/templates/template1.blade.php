<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 

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
        <li class="login">    <span>{{Auth::user()->name}} - ({{Auth::user()->email}})</span><br>
            <a href="/logout">Logout</a>
        </li>    
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

</html>