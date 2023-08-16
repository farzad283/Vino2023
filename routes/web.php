<?php

 use App\Http\Controllers\BottleController;
 use App\Http\Controllers\CellarController;
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\SAQController;
 
 use App\Http\Livewire\SingleBottle;
 use App\Http\Livewire\SingleCellar;

 use App\Http\Livewire\ManyBottles;
 use App\Http\Livewire\ManyCellars;


use App\Http\Livewire\AddCellar;
use App\Http\Livewire\AddBottle;
use App\Http\Controllers\CustomAuthController;
use App\Http\Livewire\BottleAdvancedForm;
use App\Http\Livewire\SearchAdvancedResults;
use App\Http\Livewire\BottleSearch;
use App\Http\Livewire\AddBottlesToCellar;
use App\Http\Livewire\AdminPanel;
use App\Http\Livewire\BottlesStatistics;
use App\Http\Livewire\CellarsStatistics;
use App\Http\Livewire\ConsumedBottle;
use App\Http\Livewire\UpdateBottle;
use App\Http\Livewire\UsersStatistics;
use App\Http\Livewire\AddToWishlist;
use App\Http\Livewire\CellarUserStatistics;

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
Route::middleware('auth')->group(function (){ 
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',ManyBottles::class)->name('bottles');
// À refaire avec LiveWire  N'oublier pas de mettre des commentaire en Français et le phpDoc aussi. 


/////////////////////// Farzad ///////
Route::get('/bottles/{bottle_id}', SingleBottle::class);
Route::get('/cellars', ManyCellars::class)->name('cellars');
Route::get('/bottle', BottleAdvancedForm::class)->name('bottle-advanced-form');
Route::get('/search', SearchAdvancedResults::class)->name('search-advanced-results');
Route::get('/bottlesearch', BottleSearch::class)->name('bottle-search');

Route::get('/add-to-wishlist', AddToWishlist::class)->name('add-to-wishlist');



/////////////////////// Fin Farzad ///////



/////////////////////// Camille ///////

Route::get('add-bottle', AddBottle::class)->name('add-bottle');

/////////////////////// Safoora //////////////////

 


Route::get('/bottles/{bottle_id}', SingleBottle::class);
Route::get('/single-bottle/{bottle_id}', SingleBottle::class)->name('single-bottle');

Route::get('/add-cellar', AddCellar::class)->name('add-cellar');


Route::get('/update_bottle/{cellar_id}/{bottle_id}', UpdateBottle::class)->name('update_bottle');
Route::get('/add-bottles-to-cellar/{bottle_id}', AddBottlesToCellar::class)->name('add-bottles-to-cellar');

Route::get('/bouteille-consumee/{cellar_id}/{bottle_id}', ConsumedBottle::class)->name('bouteille-consumee');

////////Admin/////////////
Route::get('/admin-panel', AdminPanel::class)->name('admin-panel');
 Route::get('/user-cellars-statistics', CellarUserStatistics::class)->name('user-cellars-statistics');
 Route::get('/cellars-statistics', CellarsStatistics::class)->name('cellars-statistics');
 Route::get('/users-statistics', UsersStatistics::class)->name('users-statistics');
 Route::get('/bottles-statistics', BottlesStatistics::class)->name('bottles-statistics');

//////////////////////////////////////////////////////////////////////////////////////



/////////////////////// Xavier ///////
Route::get('/singleCellar/{cellar_id}',SingleCellar::class)->name('singleCellar');
}); 

Route::post('register', [CustomAuthController::class, 'store']);
Route::get('register', [CustomAuthController::class, 'create'])->name('register');
Route::get('login', [CustomAuthController::class,'index'])->name('login');
Route::post('login', [CustomAuthController::class,'authentication']);