<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SCCController;
use App\Http\Controllers\SubjectLecturerController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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

Route::get('/manage', [SubjectController::class, 'ManageSubject'])->name('manage.subjects')->middleware('validateDean');

Route::get('/manage', [SubjectController::class, 'ManageSubjectbyClusandPe']);

Route::get('/forms/{formId}', 
    [FormController::class, 'viewFormDetail'])
    ->name('view.form.detail')
    ->middleware('validateSCC');

Route::get('/manage', 
    [SubjectLecturerController::class, 'viewManageSubjectLecturer'])
    ->name('manage')
    ->middleware('validateDean');

// Route::get('/urlhere', function () {return view('manage.subjects');});
// ^ Testing untuk View manage Subjects

// Route::get('/', [HomeController::class, 'viewHome']);
