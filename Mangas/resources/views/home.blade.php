@extends('canvas')

@section('title', 'home')

@section('article-content')
    <article>
        <h2>Les meilleurs séries mangas</h2>
        @foreach($arrayMangas as $manga)
            <div>
                <a href="#" class="serie-link" data-id="{{ $manga['id'] }}">
                    <h1 class="serie-title">{{ $manga['titre'] }}</h1>
                </a>
                <div style="display: flex; align-items: flex-start;">
                    <img src="{{ asset('img/couverture/'.$manga['couverture']) }}" alt="manga couverture" width="100" height="150" style="margin-right: 20px;">
                    <div>
                        <ul style="list-style: none; padding: 0;">
                            <li><strong>Auteur:</strong> {{ $manga['auteur'] }}</li>
                            <li><strong>Nombre de volumes:</strong> {{ $manga['nombre_volumes'] }}</li>
                            <li><strong>Date de création:</strong> {{ $manga['date_premiere_parution'] }}</li>
                            <li><strong>La série est finie:</strong> {{ $manga['serie_finie'] ? 'Oui' : 'Non' }}</li>
                            
                            
                            <li><strong>Description:</strong> {{ $manga['description'] }}</li>
                         

                            <div class="characters-list" style="display: none;">
                                <ul>
                                    @foreach($arrayPerso[$manga['id']] as $character)
                                        <li>{{ $character->nom }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
                <br>
            </div>
        @endforeach
    </article>

    <!-- JavaScript (no need to change) -->
    <script>
        $(document).ready(function () {
            $('.serie-link').on('click', function (e) {
                e.preventDefault();
                var charactersList = $(this).next().find('.characters-list');
                var serieId = $(this).data('id');

                if (charactersList.is(':visible')) {
                    charactersList.hide();
                } else {
                    $('.characters-list').hide();
                    charactersList.show();
                }
            });
        });
    </script>
@endsection



