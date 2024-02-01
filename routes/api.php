<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

// Route::get('list', [StudentController::class, 'list']);
Route::get('list/{id?}', [StudentController::class, 'list']);
Route::post('add', [StudentController::class, 'add']);
Route::put('update/{id}', [StudentController::class, 'update']);
Route::delete('delete/{id}', [StudentController::class, 'delete']);
Route::get('search/{name}', [StudentController::class, 'search']);