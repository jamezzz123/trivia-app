<?php

use App\Http\Controllers\TriviaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/trivia/questions', [TriviaController::class, 'index']);