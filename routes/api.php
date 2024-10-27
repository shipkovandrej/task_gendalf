<?php

use App\Http\Controllers\Api\GoodController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/registration', [AuthController::class, 'registration']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/profile', [AuthController::class, 'profile']);

Route::middleware('auth:sanctum')->get('/', [GoodController::class, 'index']);
