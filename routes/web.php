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

Route::get('/', [clientController::class, 'showWelcomePage'])->name('welcome');
Route::get('/home', [clientController::class, 'showHomePage'])->name('HomePage');
Route::get('/home/citizenCharter', [clientController::class, 'showCitizenCharter'])->name('CitizenCharter');
Route::get('/home/clientSurvey', [clientController::class, 'showClientSurvey'])->name('ClientSurvey');
Route::post('/home/clientSurvey/Search', [clientController::class, 'fetchData']); //associate to fetch the data
Route::post('/home/clientSurvey/StoreData', [clientController::class, 'storeSurveyData']);


Route::controller(adminController::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::post('/login/process', 'process');
    Route::get('/register', 'register');
    Route::post('/register/storeData', 'storeUserData');
    Route::post('/logout', 'logout');

    Route::middleware(['auth'])->group(function () {

        Route::get('/indexAdmin',  'index')->name('index');
        Route::get('/indexAdmin/addService', 'addServicePage')->name('AddService');
        Route::get('/indexAdmin/account',  'showAccountPage')->name('Account');
        Route::put('/indexAdmin/account', 'update');
        Route::get('/indexAdmin/storageService', 'storagePage')->name('Storage');
        Route::get('/indexAdmin/draftService',  'draftPage')->name('Draft');
        Route::get('/indexAdmin/generateCode',  'codeGeneratorPage')->name('Generator');
        Route::get('/indexAdmin/report',  'reportPage')->name('Report');
    });
    Route::get('/edit/questionnaire', 'editQuestion');
});



Route::get('/reportService', [adminController::class, 'report']);
