<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    
    Route::group(['prefix' => 'laravel-filemanager'], function (){

        \UniSharp\LaravelFilemanager\Lfm::routes();
    
    });
    Route::get('/filemanager', [App\Http\Controllers\UserController::class, 'filemanagerIndex'])->name('filemanager.index');


    Route::resource('tests', App\Http\Controllers\testController::class);
    Route::get('/query/{folder_name}', [App\Http\Controllers\RoleController::class, 'getPermissions']);

    Route::get('/foda', [App\Http\Controllers\FodaController::class, 'index'])->name('foda.index');
    Route::get('/save_foda/{name}/{id}/{input}', [App\Http\Controllers\FodaController::class, 'save']);
    Route::delete('/foda/{name}/{id}', [App\Http\Controllers\FodaController::class, 'deleteFodaDetail']);
    Route::get('/allFoda', [App\Http\Controllers\FodaController::class, 'getFoda']);
    Route::get('/getFoda/{value_1}/{value_2}/{id}', [App\Http\Controllers\FodaController::class, 'getFodaStrategies']);

    Route::get('/savefodaStrategies', [App\Http\Controllers\FodaController::class, 'savefodaStrategies']);
    Route::delete('/foda_strategies_details/{id}', [App\Http\Controllers\FodaController::class, 'deletefodaStrategiesDetails']);

    Route::post('/fodaUser', [App\Http\Controllers\FodaController::class, 'saveFodaUser'])->name('userFoda.save');;
    Route::get('/fodaUser', [App\Http\Controllers\FodaController::class, 'getFodaUser'])->name('userFoda.get');;

    Route::resource('ConcernedParties', App\Http\Controllers\ConcernedPartiesController::class);
});



