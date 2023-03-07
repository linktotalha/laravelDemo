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

// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('categories',[CategoryController::class,'categories']);
Route::post('add_categories',[CategoryController::class,'add_categories']);


require __DIR__ . '/auth.php';
