<?php

namespace App\Http\Controllers;

use App\Models\BoardGame;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Csv\Reader;

class BoardGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $boardGames = BoardGame::all();
        return response()->json($boardGames, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $boardGame = BoardGame::create($request->all());
        return response()->json($boardGame, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BoardGame $boardGame
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(BoardGame $boardGame): JsonResponse
    {
        return response()->json($boardGame, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BoardGame $boardGame
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, BoardGame $boardGame): JsonResponse
    {
        $boardGame->update($request->all());
        return response()->json($boardGame, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BoardGame $boardGame
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(BoardGame $boardGame): JsonResponse
    {
        $boardGame->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @return JsonResponse
     * @throws \League\Csv\Exception
     * @throws \League\Csv\UnavailableStream
     */
    public function importCSV()
    {
        $filePath = storage_path('app/data/starter_board_game.csv');

        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);

        // Insérer chaque ligne dans la base de données
        foreach ($csv->getRecords() as $record) {
            BoardGame::create([
                'name' => $record['name'],
                'description' => $record['description'],
                'price' => $record['price'],
                'image' => $record['image'],
                'category' => $record['category'],
                'video' => $record['video'],
                'number_gamer' => $record['number_gamer'],
                'playing_time' => $record['playing_time'],
                'complexity' => $record['complexity'],
                'rating' => $record['rating'],
                'number_rating' => $record['number_rating'],
                'published_date' => $record['published_date'],
                'rank' => $record['rank'],
            ]);
        }

        return response()->json(['message' => 'Importation réussie'], 200);
    }
}
