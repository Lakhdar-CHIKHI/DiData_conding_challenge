<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GraphController;
use App\Http\Controllers\Api\NodeController;
use App\Http\Controllers\Api\RelationController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('empty_graph', [GraphController::class, 'CreateEmptyGraph']);
Route::post('graph', [GraphController::class, 'CreateGraph']);
Route::put('/graph/{id}', [GraphController::class, 'EditGraph']);
Route::delete('graph/{id}', [GraphController::class, 'destroy'])->name('graphs.destroy');
Route::get('graphs', [GraphController::class, 'AllGraph_meta_data']);
Route::get('graphs/{id}', [GraphController::class, 'singleGraph']);


Route::post('node', [NodeController::class, 'AddNode']);
Route::delete('node/{id}', [NodeController::class, 'destroy']);

Route::post('relation', [RelationController::class, 'AddRelation']);





