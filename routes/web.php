<?php

use App\Http\Controllers\BottleController;
use App\Http\Controllers\CellarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SAQController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// À refaire avec LiveWire  N'oublier pas de mettre des commentaire en Français et le phpDoc aussi. 

Route::get('update',[SaqController::class,'updateSAQ']);
Route::get('bottles',[BottleController::class,'index']);
Route::get('single-bottle/{bottle}',\App\Http\Livewire\SingleBottle::class);
Route::get('cellar',[CellarController::class,'index']);
Route::post('cellar',[CellarController::class,'store']);


Route::post('ajouter-nouvelle-bottleCellier',[BottleController::class,'ajouterNouvelleBottleCellier']);
Route::post('boireBottleCellier',[BottleController::class,'boireBottleCellier']);
Route::post('ajouterBottleCellier',[BottleController::class,'ajouterBottleCellier']);
Route::get('autocompleteBottle',[BottleController::class,'autocompleteBottle']);



