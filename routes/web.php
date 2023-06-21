<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'login'])->middleware('guest')->name('login');
Route::post('/auth', [DashboardController::class, 'auth']);
Route::post('/logout', [DashboardController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/kelas', [KelasController::class, 'index'])->middleware('auth');
Route::post('/kelas', [KelasController::class, 'store']);
Route::post('/kelas/update', [KelasController::class, 'update']);
Route::delete('/kelas/delete', [KelasController::class, 'destroy']);

Route::get('/siswa', [StudentController::class, 'index'])->middleware('auth');
Route::get('/siswa/edit/{student:id}', [StudentController::class, 'edit'])->middleware('auth');
Route::get('/siswa/add', [StudentController::class, 'add'])->middleware('auth');
Route::post('/siswa/add', [StudentController::class, 'store']);
Route::post('/siswa/edit', [StudentController::class, 'update']);
Route::delete('/siswa/delete', [StudentController::class, 'destroy']);

Route::get('/status', [StatusController::class, 'index'])->middleware('auth');
Route::get('/status/{kelas}', [StatusController::class, 'show'])->middleware('auth');
Route::post('/status', [StatusController::class, 'update']);

// API
Route::get('/api/siswa/{nisn}', [StudentController::class, 'APIget']);
Route::get('/skl/{nisn}', [StudentController::class, 'skl']);
