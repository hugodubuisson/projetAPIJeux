<!DOCTYPE html>
<html lang="en">
<head>
    <title>Détails du jeu</title>
</head>
<body>

<h1>Détails du jeu</h1>

@if(isset($game))
    <ul>
        <li>Nom du jeu : {{ $game['name'] }}</li>
        @if(isset($game['image']))
            <li>Image : <img src="{{ $game['image'] }}" alt="Image du jeu"></li>
        @endif
        <li>Description : {{ $game['description'] }}</li>
        <li>Prix : {{ $game['price'] }}</li>
        <li>Nombre de joueur : {{ $game['number_gamer'] }}</li>
        <li>Temps de jeu : {{ $game['playing_time'] }}</li>
        <li>Complexité : {{ $game['complexity'] }}</li>
        <li>Évaluation : {{ $game['rating'] }}</li>
        <li>Catégorie : {{ $game['category'] }}</li>
        <li>Date de publication : {{ $game['published_date'] }}</li>
    </ul>
@else
    <p>Le jeu n'a pas été trouvé.</p>
@endif

</body>
</html>
