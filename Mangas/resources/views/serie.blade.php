@extends('canvas')

@section('title', 'Série')

@section('article-content')
<article class="container mt-5">
    <h1 class="text-center mb-4">Création d'une nouvelle série</h1>

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('createSerie') }}" method="post" class="p-4 border rounded shadow-sm bg-light">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" id="titre" name="titre" class="form-control" placeholder="Entrez le titre" required>
        </div>

        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur</label>
            <input type="text" id="auteur" name="auteur" class="form-control" placeholder="Entrez le nom de l'auteur" required>
        </div>

        <div class="mb-3">
            <label for="nombre_volumes" class="form-label">Nombre de volumes</label>
            <input type="number" id="nombre_volumes" name="nombre_volumes" class="form-control" placeholder="Ex: 10" required>
        </div>

        <div class="mb-3">
            <label for="date_premiere_parution" class="form-label">Date de création</label>
            <input type="date" id="date_premiere_parution" name="date_premiere_parution" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="couverture" class="form-label">Nom de couverture</label>
            <input type="text" id="couverture" name="couverture" class="form-control" placeholder="Entrez le nom de la couverture" required>
        </div>

        <div class="form-check mb-4">
            <input type="checkbox" id="serie_finie" name="serie_finie" class="form-check-input" value="1">
            <label for="serie_finie" class="form-check-label">Série finie</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Créer</button>
    </form>
</article>
@endsection
