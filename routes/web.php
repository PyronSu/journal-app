<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\CategoryController;

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

Route::get('/',[CategoryController::class,'home'])->name('journal#home');
Route::post('journal/home',[CategoryController::class,'home'])->name('journal#homepage');

Route::post('journal/category',[CategoryController::class,'createCategory'])->name('create#Category');

Route::get('/journal/create',[JournalController::class,'create'])->name('create#journal');
Route::post('/journal/save',[JournalController::class,'save'])->name('save#journal');
Route::get('/journal/read',[JournalController::class,'read'])->name('read#journal');
Route::get('/settings',[CategoryController::class,'setting'])->name('setting#setting');

//cateogry store
Route::post('store',[CategoryController::class,'store']);
Route::post('/edit-category',[CategoryController::class,'edit'])->name('edit-category');
