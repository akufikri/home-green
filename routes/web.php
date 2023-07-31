<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StuffController;
use App\Models\Stuff;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [FrontController::class , 'index'])->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
    $data = Stuff::all();
    return view('dashboard', compact('data'));
});
Route::get('/stuff', [StuffController::class, 'stuff']);


});
Route::post('store/', [StuffController::class, 'store']);
Route::get('destroy/{id}', [StuffController::class, 'destroy']);
Route::get('/show/{id}', [StuffController::class, 'show']);
Route::put('/update/{id}', [StuffController::class, 'update']);


Route::post('/login_actions', [LoginController::class, 'login_actions']);
Route::get('/sign_out', [LoginController::class,'sign_out']);
Route::post('/register', [LoginController::class, 'register']);