<?php

use App\Http\Controllers\VoitureController;
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

Route::get('/',function(){
    return response()->json(["message" => "bonjour gestion voitures"]);
});

Route::post('login',"App\Http\Controllers\AuthController@login");
Route::post('register',"App\Http\Controllers\AuthController@register");

///Liste des voitures
//Route::get('voitures','App\Http\Controllers\VoitureController@index');

Route::get('voitures/{id}',[VoitureController::class, 'getVoiture']);
Route::get('voitures',[VoitureController::class, 'index']);


Route::group(["middleware" => "auth.jwt"],function(){

    //les routes authentifiés
    Route::get("logout",'App\Http\Controllers\AuthController@logout');

    //Ajout voiture
    Route::post("voitures","App\Http\Controllers\VoitureController@save");

    //Modifier voiture
    Route::put("voitures",[VoitureController::class, 'update']);

    //supprimer voiture
    Route::delete('voitures/{id}',[VoitureController::class,'delete'] );


});
