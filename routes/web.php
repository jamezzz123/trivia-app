<?php

use App\Http\Controllers\TriviaController;
use Illuminate\Support\Facades\Route;


Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');

Route::get('/trivia/questions', [TriviaController::class, 'index']);