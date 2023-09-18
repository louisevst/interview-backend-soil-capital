<?php

use App\Http\Controllers\v1\JokeController;
use Illuminate\Support\Facades\Route;

/**
 * Joke
 */
Route::controller(JokeController::class)
    ->prefix('joke')
    ->group(function () {
        Route::get('/', 'fetchDataFromExternalAPI');
    });
