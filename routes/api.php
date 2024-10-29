<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GoodController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/registration', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/profile', [AuthController::class, 'profile']);

Route::middleware('auth:sanctum')->get('/items', [GoodController::class, 'index']);
Route::middleware('auth:sanctum')->get('/items/{item_id}', [GoodController::class, 'show']);

Route::middleware('auth:sanctum')->get('/categories', [CategoryController::class, 'index']);
Route::middleware('auth:sanctum')->get('/category/{category_id}', [CategoryController::class, 'show']);
