<?php

use App\Http\Controllers\BottleController;
use App\Http\Controllers\CellarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SAQController;

use App\Http\Livewire\SingleBottle;
use App\Http\Livewire\ManyBottles;


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


/////////////////////// Maryline ///////






















/////////////////////// Fin Maryline ///////


/////////////////////// Farzad ///////


























/////////////////////// Fin Farzad ///////



/////////////////////// Camille ///////



















/////////////////////// Fin Camille ///////


/////////////////////// Safoora ///////

Route::get('update',[SaqController::class,'updateSAQ']);
////////////////////////////////////////////////////////////////////////////////////////

Route::get('bottles',ManyBottles::class);
Route::get('/bottles/{bottle_id}', SingleBottle::class);

//////////////////////////////////////////////////////////////////////////////////////
Route::get('cellar',[CellarController::class,'index']);
Route::post('cellar',[CellarController::class,'store']);


Route::post('ajouter-nouvelle-bottleCellier',[BottleController::class,'ajouterNouvelleBottleCellier']);
Route::post('boireBottleCellier',[BottleController::class,'boireBottleCellier']);
Route::post('ajouterBottleCellier',[BottleController::class,'ajouterBottleCellier']);
Route::get('autocompleteBottle',[BottleController::class,'autocompleteBottle']);
















/////////////////////// Fin Safoora ///////