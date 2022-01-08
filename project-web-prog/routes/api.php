<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationAPIController;
use App\Http\Controllers\FormAPIController;
use App\Http\Controllers\ComplaintAPIController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/auth/login', 
    [AuthenticationAPIController::class, 'login'])->name('api.login')
    ->middleware('validateGuest');

Route::get('/auth/logout', 
    [AuthenticationAPIController::class, 'logout'])->name('api.logout')
    ->middleware('validateLoggedIn');


// form data
Route::post('/form/insert', 
    [FormAPIController::class, 'insertAnswer'])->name('api.form.insert')
    ->middleware('validateLoggedIn');

Route::post('/form/create', 
    [FormAPIController::class, 'createForm'])->name('api.form.create')
    ->middleware('validateSCC');

Route::post('/complaint', 
    [ComplaintAPIController::class, 'insertNewComplaint'])
    ->name('api.complaint.insert')->middleware('validateLoggedIn');