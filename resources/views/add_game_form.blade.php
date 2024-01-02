<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/footer.css" rel="stylesheet" />
    <link href="../css/header.css" rel="stylesheet" />
    <title>Ajouter un jeu</title>
</head>
<body>
<x-header></x-header>
<h1>Ajouter un jeu</h1>

<form method="post" action="{{ route('addGame') }}">
    @csrf
    <label for="name">Nom du jeu :</label>
    <input type="text" name="name" required>
    <br>

    <label for="description">Description :</label>
    <textarea name="description" required></textarea>
    <br>


    <label for="price">Prix :</label>
    <input type="number" name="price" required>
    <br>

    <label for="number_gamer">Nombre de joueur :</label>
    <input type="number" name="number_gamer" required>
    <br>


    <label for="complexity">Complexite :</label>
    <input type="number" name="complexity" required>
    <br>


    <label for="playing_time">Temps de jeu :</label>
    <input type="number" name="playing_time" required>
    <br>


    <button type="submit">Ajouter le jeu</button>
</form>
<x-footer></x-footer>
</body>
</html>
