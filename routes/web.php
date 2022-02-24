<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\LikeController;

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

Auth::routes(['verify' => 'true']);

Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/plant/{plant}', [PlantController::class, 'show'])->name('Plant_info');
    Route::get('/plant/delete/{plant}', [PlantController::class, 'destroy'])->name('Delete_plant');

    Route::post('/like/{image}', [LikeController::class, 'store'])->name('Create_like');
});

