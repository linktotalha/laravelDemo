<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
Route::get('categories/create',[CategoryController::class,'create']);
Route::post('categories/create',[CategoryController::class,'postCreate']);
Route::get('category-list',[CategoryController::class,'list']);
Route::get('delete-category',[CategoryController::class,'delete']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

require __DIR__.'/auth.php';
