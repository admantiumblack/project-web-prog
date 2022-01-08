<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SCCController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/form', [HomeController::class, 'viewForm']);

Route::get('/', [HomeController::class, 'viewHome'])
->name('home')->middleware('validateLoggedIn');

Route::get('/login', [AuthenticationController::class, 'viewLogin'])->name('login')
->middleware(['validateGuest']);

Route::get('/viewallform', [SCCController::class, 'viewAllForm'])->name('viewAllForm')->middleware('validateSCC');

Route::get('/viewallfeedback', [SCCController::class, 'viewAllFeedback'])->name('viewAllFeed')->middleware('validateSCC');

Route::get('/form/{id}', [FormController::class, 'viewInputForm'])->name('form')->middleware('validateLoggedIn');

// Route::get('/', [HomeController::class, 'viewHome']);