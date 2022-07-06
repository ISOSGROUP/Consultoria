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

    

    //$snappy = App::make('snappy.pdf');
    //$snappy->generateFromHtml('<h1>test</h1>','exmple.pdf');


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
    Route::resource('riesgos', App\Http\Controllers\RiesgosController::class);

    Route::post('/userControlOfQualityObjectives', [App\Http\Controllers\ControlOfQualityObjectivesController::class, 'saveUserControlOfQualityObjectives'])->name('userControlOfQualityObjectives.save');;
    Route::post('/RisksChance', [App\Http\Controllers\RiesgosController::class, 'saveUserRisksChance'])->name('userRisksChance.save');;
    Route::post('/userConcernedParties', [App\Http\Controllers\ConcernedPartiesController::class, 'saveUserConcernedParties'])->name('userConcernedParties.save');;
    Route::resource('controlOfQualityObjectives', App\Http\Controllers\ControlOfQualityObjectivesController::class);

    Route::get('/downloadPDF',[App\Http\Controllers\ControlOfQualityObjectivesController::class, 'createPDF'])->name('downloadPdf');
    Route::get('/downloadPdfRiesgos',[App\Http\Controllers\RiesgosController::class, 'createPDF'])->name('downloadPdfRiesgos');

    Route::get('/downloadPdfConcernedParties',[App\Http\Controllers\ConcernedPartiesController::class, 'createPDF'])->name('downloadPdfConcernedParties');
    Route::get('/downloadPdfFoda',[App\Http\Controllers\FodaController::class, 'createPDF'])->name('downloadPdfFoda');


});

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register.index');
Route::get('/myperfil', [App\Http\Controllers\FodaController::class, 'index2'])->name('myperfil.index');








