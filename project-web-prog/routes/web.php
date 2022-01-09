<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ComplaintController;
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

Route::get('/forms', [FormController::class, 'viewAllForm'])->name('view.forms')->middleware('validateSCC');

Route::get('/feedbacks', [ComplaintController::class, 'viewAllFeedback'])->name('view.complaints')->middleware('validateSCC');

Route::get('/form/{id}', [FormController::class, 'viewInputForm'])->name('form')->middleware('validateLoggedIn');

Route::get('/forms/{formId}', 
    [FormController::class, 'viewFormDetail'])
    ->name('view.form.detail')
    ->middleware('validateSCC');

// Route::get('/urlhere', function () {return view('manage.subjects');});
// ^ Testing untuk View manage Subjects

// Route::get('/', [HomeController::class, 'viewHome']);
