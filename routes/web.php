<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\clientController;
use Illuminate\Support\Facades\Route;

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


Route::controller(clientController::class)->group(function () {
    Route::get('/', 'showWelcomePage')->name('welcome');
    Route::get('/home',  'showHomePage')->name('HomePage');
    Route::get('/home/citizenCharter', 'showCitizenCharter')->name('CitizenCharter');
    Route::get('/home/Document/{id}', 'citizenDocument');
    Route::get('/home/clientSurvey', 'showClientSurvey')
        ->name('ClientSurvey');
    Route::post('/home/clientSurvey/Search', 'fetchData'); //associate to fetch the data
    Route::post('/home/clientSurvey/StoreData', 'storeSurveyData');

    Route::get('/home/clientSecurity', 'surveySecurity')->name('clientSecurity');
    Route::post('/clientSecurity', 'checkSecurity');

    Route::get('/home/word', 'word');

    Route::get('/example', 'example');
});


Route::controller(adminController::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::post('/login/process', 'process');
    Route::get('/register', 'register');
    Route::post('/register/storeData', 'storeUserData');
    Route::post('/logout', 'logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/indexAdmin',  'index')->name('index');
        Route::get('/indexAdmin/addService', 'addServicePage')->name('AddService');
        Route::post('/indexAdmin/addService', 'storeService');
        Route::get('/indexAdmin/account',  'showAccountPage')->name('Account');
        Route::put('/indexAdmin/account', 'update');
        Route::get('/indexAdmin/storageService', 'storagePage')->name('Storage');
        Route::get('/indexAdmin/editService/{id}', 'editService')->name('editService');
        Route::put('/indexAdmin/editService/{id}', 'saveEditService');
        Route::get('/indexAdmin/draftService',  'draftPage')->name('Draft');
        Route::get('/indexAdmin/generateCode',  'codeGeneratorPage')->name('Generator');
        Route::post('/indexAdmin/generateCode', 'createCode');
        // Route::get('/indexAdmin/report',  'reportPage');
        Route::get('/indexAdmin/Create-questionnaire', 'createQuestion')->name('CreateSurvey');
        Route::post('/indexAdmin/Create-questionnaire', 'saveQuestion');
        Route::get('/indexAdmin/report2', 'report2')->name('Report');

        Route::get('/superAdmin', 'indexAdmin')->name('Admin');
        Route::get('/superAdmin/report', 'reportAdmin')->name('reportAdmin');
    });
});



Route::get('/reportService', [adminController::class, 'report']);
