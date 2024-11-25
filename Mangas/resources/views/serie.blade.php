@extends('canvas')

@section('title', 'serie')

@section('article-content')
<article>
<h1>Création d'une nouvelle série</h1>

<form action="{{ route('createSerie') }}" method="post">

    @csrf
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required><br><br>

    <label for="auteur">Auteur :</label>
    <input type="text" id="auteur" name="auteur" required><br><br>

    <label for="nombre_volumes">Nombre de volumes :</label>
    <input type="number" id="nombre_volumes" name="nombre_volumes" required><br><br>

    <label for="date_premiere_parution">Date de création :</label>
    <input type="date" id="date_premiere_parution" name="date_premiere_parution" required><br><br>

    <label for="couverture">Nom de couverture :</label>
    <input type="text" id="couverture" name="couverture" required><br><br>

    <label for="serie_finie">Série finie :</label>
    <input type="checkbox" id="serie_finie" name="serie_finie" value="1"><br><br>

    <input type="submit" value="Créer">
</form>
@if(Session::has('success'))
        <div style="background-color: green; color: white; padding: 10px;position : fixed;">
            {{ Session::get('success') }}
        </div>
    @endif
   
</article>
@endsection