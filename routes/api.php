<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Middleware\Checkrole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::apiResource('/tasks',TaskController::class)->middleware('auth');
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class)->middleware('auth:sanctum')->middleware(Checkrole::class);
});

Route::controller(AuthController::class)->group(function(){
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
}); 

Route::get('/sanctum/csrf-cookie', function (Request $request) {
    return response()->json(['csrf' => csrf_token()]);
});

Route::get('/user', function (Request $request) {
    return $request->user();    
})->middleware('auth:sanctum');

