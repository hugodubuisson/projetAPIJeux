<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class JeuxService{

    public function getGames(){
        return Http::get('http://127.0.0.1:8080/api/board-games');
    }

    public static function getGamesStatic(){
        return Http::get('http://127.0.0.1:8080/api/board-games');
    }
}
