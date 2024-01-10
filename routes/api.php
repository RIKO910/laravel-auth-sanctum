<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class,'login']);

Route::get("/users",function(){
    return User::whereYear('created_at', 2022)->count();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
