<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisciplinaController;

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

Route::get('/', [DisciplinaController::class, 'index']);
Route::get('/disciplinas/cadastro', [DisciplinaController::class, 'create'])->middleware('auth');
Route::post('/disciplinas', [DisciplinaController::class, 'store']);
Route::get('/disciplinas/{id}', [DisciplinaController::class, 'show']);
Route::delete('/disciplinas/{id}', [DisciplinaController::class, 'destroy'])->middleware('auth');
Route::get('/disciplinas/edit/{id}', [DisciplinaController::class, 'edit'])->middleware('auth');
Route::put('/disciplinas/update/{id}', [DisciplinaController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [DisciplinaController::class, 'dashboard'])->middleware('auth');