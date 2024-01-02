<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des jeux</title>
</head>
<body>

<h1>Liste des jeux</h1>

<a href="{{ route('addGameForm') }}">Ajouter un jeu</a>

@if(count($jeux) > 0)
    <ul>
        @foreach($jeux as $jeu)
            <li>Nom du jeu : {{ $jeu['name'] }}</li>
            <li>prix : {{ $jeu['price'] }}</li>
            <li>{{ $jeu['image'] }}</li>
            <li>Nombre de joueur : {{ $jeu['number_gamer'] }}</li>
            <li><a href="{{ route('showGame', ['id' => $jeu['id']]) }}">Voir les détails</a></li>
            <li>
                <form method="post" action="{{ route('deleteGame', ['id' => $jeu['id']]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>Aucun jeu disponible pour le moment.</p>
@endif

</body>
</html>
