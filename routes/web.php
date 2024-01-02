<?php

use App\Http\Controllers\JeuxController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [JeuxController::class, 'vue_tableau_jeux'])->name('index');

Route::get('/game/{id}', [JeuxController::class, 'showGame'])->name('showGame');

Route::delete('/delete-game/{id}', [JeuxController::class, 'deleteGame'])->name('deleteGame');

Route::get('/add-game', [JeuxController::class, 'showAddGameForm'])->name('showAddGameForm');

Route::post('/add-game', [JeuxController::class, 'addGame'])->name('addGame');

Route::get('/edit-game/{id}', [JeuxController::class, 'showEditGameForm'])->name('editGameForm');

Route::put('/update-game/{id}', [JeuxController::class, 'updateGame'])->name('updateGame');

