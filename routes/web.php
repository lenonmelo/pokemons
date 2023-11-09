<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

//Rotas de login e logout
Route::get('login', [AuthUserController::class, 'index'])->name('login');
Route::post('login', [AuthUserController::class, 'login'])->name('login');
Route::post('logout', [AuthUserController::class, 'logout'])->name('logout');

Route::resource('users', UserController::class);

Route::get('/pokemonList', [PokemonController::class, 'index'])->name('pokemons.index');
Route::get('/pokemonShow', [PokemonController::class, 'show'])->name('pokemons.show');