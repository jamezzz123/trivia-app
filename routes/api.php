<?php

// routes/api.php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TriviaController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/questions', [TriviaController::class, 'index']);
});