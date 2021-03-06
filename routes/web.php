<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => 'language'], function () {
    Route::get('/', [PlantController::class, 'index'])->name('welcome');

    Route::get('generate/pdf/{plant}', [PDFController::class, 'generatePDF'])->name('Generate_pdf');

    Route::get('/plant/{plant}', [PlantController::class, 'show'])->name('Plant_info');

    Auth::routes(['verify' => 'true']);
    Route::group(['middleware' => 'verified'], function () {
        Route::get('be/mod/{user}', [UserController::class, 'update'])->name('User_update');

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/plant', [PlantController::class, 'create'])->name('Create_plant');
        Route::post('/plant', [PlantController::class, 'store'])->name('Store_plant');
        Route::get('/plant/edit/{plant}', [PlantController::class, 'edit'])->name('Edit_plant');
        Route::post('/plant/edit/{plant}', [PlantController::class, 'update'])->name('Update_plant');
        Route::get('/plant/delete/{plant}', [PlantController::class, 'destroy'])->name('Delete_plant');

        Route::post('/like/{image}', [LikeController::class, 'store'])->name('Create_like');

        Route::get('/image/{plant}', [ImageController::class, 'create'])->name('Upload_image');
        Route::post('/image', [ImageController::class, 'store'])->name('Store_image');
    });
});