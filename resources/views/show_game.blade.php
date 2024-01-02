<!DOCTYPE html>
<html lang="en">
<head>
    <title>Détails du jeu</title>
    <link href="../css/details.css" rel="stylesheet" />
    <link href="../css/footer.css" rel="stylesheet" />
    <link href="../css/header.css" rel="stylesheet" />
</head>
<body>
<x-header></x-header>
<h1>Détails du jeu</h1>
@if(isset($game))
    <ul>
        <div>
            <p>Nom du jeu : {{ $game['name'] }}</p>
            <p class="image">{{$game['image']}}</p>
        </div>
        <p>Description : {{ $game['description'] }}</p>
        <p>Prix : {{ $game['price'] }}</p>
        <p>Nombre de joueur : {{ $game['number_gamer'] }}</p>
        <p>Temps de jeu : {{ $game['playing_time'] }}</p>
        <p>Complexité : {{ $game['complexity'] }}</p>
        <p>Évaluation : {{ $game['rating'] }}</p>
        <p>Catégorie : {{ $game['category'] }}</p>
        <p>Date de publication : {{ $game['published_date'] }}</p>
    </ul>
@else
    <p>Le jeu n'a pas été trouvé.</p>
@endif
<x-footer></x-footer>
</body>
</html>
