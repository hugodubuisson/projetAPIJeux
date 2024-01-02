<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JeuxController extends Controller
{
    public function vue_tableau_jeux() {
        $res = http::get('http://localhost:8080/api/board-games')->json();
        return view('index', ['jeux' => $res]);
    }

    public function getnomJeu(){
        $all = http::get('http://localhost:8080/api/board-games')->json();
        $res = array();
        foreach($all as $jeu){
            array_push($res,$jeu["name"]);
        }
        return $res;
    }

    public function getNombreJeu(){
        return count(http::get('http://localhost:8080/api/board-games')->json());
    }

    public function getJeuAvecId(int $id){
        return http::get('http://localhost:8080/api/board-games')->json()[$id];
    }

    public function filterGames()
    {
        $allGames = http::get('http://localhost:8080/api/board-games')->json();
        $filteredGames = array_filter($allGames, function ($jeu) {
            return strpos(strtolower($jeu['name']), 'a') !== false;
        });

        return view('index', ['jeux' => $filteredGames]);
    }

    public function addGame(Request $request)
    {
        $newGame = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'number_gamer' => $request->input('number_gamer'),
            'playing_time' => $request->input('playing_time'),
            'complexity' => $request->input('complexity'),
            'rating' => $request->input('rating'),
            'category' => $request->input('category'),
            'published_date' => $request->input('published_date'),

        ];

        $response = Http::post('http://localhost:8080/api/board-games', $newGame);

        if ($response->successful()) {
            return redirect()->route('index')->with('success', 'Le jeu a été ajouté avec succès à l\'API.');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'ajout du jeu à l\'API.');
        }
    }

    public function showAddGameForm()
    {
        return view('add_game_form');
    }

    public function showGame($id)
    {
        $games = http::get('http://localhost:8080/api/board-games')->json();
        $game = null;

        foreach ($games as $jeu) {
            if ($jeu['id'] == $id) {
                $game = $jeu;
                break;
            }
        }

        if (!$game) {
            return "Jeu non trouvé.";
        }

        return view('show_game', ['game' => $game]);
    }

    public function deleteGame($id)
    {
        $response = Http::delete("http://localhost:8080/api/board-games/{$id}");

        if ($response->successful()) {

            return redirect()->route('index')->with('success', 'Le jeu a été supprimé avec succès.');
        } else {

            return redirect()->route('index')->with('error', 'Une erreur est survenue lors de la suppression du jeu.');
        }
    }

}
