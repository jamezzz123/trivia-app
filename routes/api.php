<?php

// routes/api.php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TriviaController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/questions', [TriviaController::class, 'index']);
});