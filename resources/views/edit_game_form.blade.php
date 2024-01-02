<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le jeu</title>
</head>
<body>

<h1>Modifier le jeu</h1>

<form method="post" action="{{ route('updateGame', ['id' => $game['id']]) }}">
    @csrf
    @method('PUT')


    <label for="name">Nom du jeu:</label>
    <input type="text" name="name" value="{{ $game['name'] }}" required>
    <br>

    <label for="description">Description:</label>
    <textarea name="description" required>{{ $game['description'] }}</textarea>
    <br>

    <label for="price">Prix:</label>
    <input type="number" name="price" value="{{ $game['price'] }}" required>
    <br>

    <label for="number_gamer">Nombre de joueurs:</label>
    <input type="number" name="number_gamer" value="{{ $game['number_gamer'] }}" required>
    <br>

    <label for="playing_time">Temps de jeu:</label>
    <input type="text" name="playing_time" value="{{ $game['playing_time'] }}" required>
    <br>

    <label for="complexity">Complexité:</label>
    <input type="text" name="complexity" value="{{ $game['complexity'] }}" required>
    <br>

    <label for="rating">Évaluation:</label>
    <input type="number" name="rating" value="{{ $game['rating'] }}" required>
    <br>

    <label for="category">Catégorie:</label>
    <input type="text" name="category" value="{{ $game['category'] }}" required>
    <br>

    <label for="published_date">Date de publication:</label>
    <input type="date" name="published_date" value="{{ $game['published_date'] }}" required>
    <br>

    <button type="submit">Mettre à jour le jeu</button>
</form>

</body>
</html>

