<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
use \App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/file', [FileController::class, 'showFile'])->name('file.show');
Route::post('/file', [FileController::class, 'uploadFile'])->name('file.upload');
Route::get('/file', [FileController::class, 'downloadFile'])->name('file.download');
