<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OlahanController;
use App\Http\Controllers\PipaController;
use App\Http\Controllers\ProfilController;

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

Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'autenticating']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/signUp', [AuthController::class, 'signUp']);
Route::post('/signUp', [AuthController::class, 'createAccount']);

Route::get('/dasboard', [AdminController::class, 'dasboard'])->middleware('auth');

Route::get('/pipa', [PipaController::class, 'index'])->middleware('auth');
Route::post('/pipa_add', [PipaController::class, 'store'])->middleware('auth');
Route::put('/pipa_edit/{id}', [PipaController::class, 'update'])->middleware('auth');
Route::delete('/pipa_delete/{id}', [PipaController::class, 'delete'])->middleware('auth');

Route::get('/olahan', [OlahanController::class, 'index'])->middleware('auth');
Route::post('/olahan_add', [OlahanController::class, 'store'])->middleware('auth');
Route::put('/olahan_edit/{id}', [OlahanController::class, 'update'])->middleware('auth');
Route::delete('/olahan_delete/{id}', [OlahanController::class, 'delete'])->middleware('auth');


Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth');
Route::put('/profil_edit/{id}', [ProfilController::class, 'update'])->middleware('auth');

Route::get('/member', [MemberController::class, 'index'])->middleware(['auth', 'admin']);
Route::delete('/member_delete/{id}', [MemberController::class, 'delete'])->middleware(['auth', 'admin']);
