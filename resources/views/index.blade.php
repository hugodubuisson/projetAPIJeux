<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/footer.css" rel="stylesheet" />
    <link href="../css/header.css" rel="stylesheet" />
    <title>Liste des jeux</title>
</head>
<body>
<x-header></x-header>
<h1>Liste des jeux</h1>

<button><a href="{{ route('showAddGameForm') }}">Ajouter un jeu</a></button>

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
            <li>
                <button><a href="{{ route('editGameForm', ['id' => $jeu['id']]) }}">Modifier</a></button>
            </li>
        @endforeach
    </ul>
@else
    <p>Aucun jeu disponible pour le moment.</p>
@endif
<x-footer></x-footer>
</body>
</html>
