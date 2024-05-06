<?php

use App\Http\Controllers\PeersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/{id}',  [PeersController::class, 'index']);
Route::post('/peer/save/{id}', [PeersController::class, 'store']);
Route::get('/peer/find/{id}', [PeersController::class, 'find']);
Route::get('/peer/list', [PeersController::class, 'show']);
