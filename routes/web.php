<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::post('/', [ContactController::class,'post']);
Route::get('/',[ContactController::class,'index']);
Route::post('/add', [ContactController::class, 'create']);
Route::get('/admin',[ContactController::class,'admin']);
Route::get('/search',[ContactController::class,'show']);
Route::get('/reset',[ContactController::class, 'reset']);
Route::post('/delete',[ContactController::class,'destroy']);