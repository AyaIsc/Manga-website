<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/manga.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div id="header">
        <h1> WEB4 serie-Manga @yield('title')</h1>
    </div>
    <br>
    @yield('content')

    <div id="nav">
        <nav>
            <ul>
                <li><a href="/home">Accueil</a></li>
                <li><a href="/serie/create">Nouvelle Serie</a></li>
            </ul>
        </nav>
    </div>
    @section('content')
    <div id="article">
        <article>
        @yield('article-content')
        </article>
    </div>

    <div id="footer">
        <footer>
            <p>WEBG4 - WEBII - g58414 Kaoun Aya</p>
        </footer>
    </div>
</body>
</html>
