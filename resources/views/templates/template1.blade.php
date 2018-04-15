<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">
</head>

<body>
    
    <header>
        <img src='logo.png'>
    </header>
    
    <nav>
        <a href="/">Fil d'actualités</a><br>
        <a href="/nouveautes">Nouveautés</a><br>
        <a href="/playlists">Playlists</a><br>
        <a href="/parcourir/artistes">Parcourir</a><br>
        <br>
        @guest
            <a href="/login">Login</a>
        @endguest
        @auth
            <span>{{Auth::user()->name}} - ({{Auth::user()->email}})</span><br>
            <a href="/logout">Logout</a>
        @endauth
    </nav>
    
    <div class="container">
        @yield("content")
    </div>
    
    <footer>
        <p>Copyright HuitCentHuit.fr</p>
        <p>Developed by Thibaut DUREISSEIX, Thibault REMY, Kevin ROBILLARD</p>
    </footer>
</body>

</html>