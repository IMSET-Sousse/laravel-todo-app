<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

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


// Home page
Route::get('/', [TodoListController::class, 'index']) ->name('home');
Route::post('/', [TodoListController::class, 'saveItem']) -> name('saveItem');
Route::post('/markComplete/{id}', [TodoListController::class, 'markComplete']) -> name('markComplete');
Route::post('/markNotYet/{id}', [TodoListController::class, 'markNotYet']) -> name('markNotYet');
Route::post('/delete/{id}', [TodoListController::class, 'delete']) -> name('delete');
