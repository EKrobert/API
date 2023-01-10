<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EtudiantsController;


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

///API ROUTE
Route::get('etudiant',[EtudiantsController::class, 'listEtudiants']);
Route::get('index/{id}',[EtudiantsController::class, 'getEtudiant']);
Route::post('creer-etudiant',[EtudiantsController::class, 'create']);
Route::put('update/{id}',[EtudiantsController::class, 'update']);
Route::delete('delete/{id}',[EtudiantsController::class, 'delete']);
