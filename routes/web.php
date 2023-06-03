<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

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

Route::get('/', [TodoListController::class, 'index']);
Route::post('/store', [TodoListController::class, 'store'])->name('store');
Route::post('/done/{id}', [TodoListController::class, 'done'])->name('done');
Route::delete('/delete/{id}', [TodoListController::class, 'delete'])->name('delete');
