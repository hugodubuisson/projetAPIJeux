<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/footer.css" rel="stylesheet" />
    <link href="../css/header.css" rel="stylesheet" />
    @vite(['resources/css/header.css', 'resources/css/footer.css', 'resources/css/index.css'])
    <title>Liste des jeux</title>
</head>
<body>
<x-header></x-header>
<h1>Liste des jeux</h1>

<button><a href="{{ route('showAddGameForm') }}">Ajouter un jeu</a></button>
@if(count($jeux) > 0)
    <div class="contenu">

            @foreach($jeux as $jeu)
            <ul>
                @if(isset($jeu['image']))
                    <img src="{{ $jeu['image'] }}" alt="Image du jeu" />
                @endif

                <h3>Nom du jeu : {{ $jeu['name'] }}</h3>
                <div class="info">
                    <p>Nombre de joueur : {{ $jeu['number_gamer'] }}</p>

                    <p>Prix : {{ $jeu['price'] }}</p>
                </div>
                <div class="bouton">
                    <p>
                    <form
                        method="post"
                        action="{{ route('deleteGame', ['id' => $jeu['id']]) }}"
                    >
                        @csrf @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                    </p>
                    <p>
                        <button>
                            <a href="{{ route('showGame', ['id' => $jeu['id']]) }}"
                            >Voir les détails</a></button>
                    </p>
                    <p>
                        <button class="modif">
                            <a href="{{ route('editGameForm', ['id' => $jeu['id']]) }}">Modifier</a>
                        </button>
                    </p>
                </div></ul>
            @endforeach

    </div>
@else
    <p>Aucun jeu disponible pour le moment.</p>
@endif
<x-footer></x-footer>
</body>

</html>
