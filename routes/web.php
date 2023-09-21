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

Route::get('/indexAdmin', [adminController::class, 'index'])->middleware('auth')->name('index');
Route::get('/register', [adminController::class, 'register']);
Route::post('/register/storeData', [adminController::class, 'storeUserData']);
Route::get('/login', [adminController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process', [adminController::class, 'process']);
Route::post('/logout', [adminController::class, 'logout']);
Route::get('/indexAdmin/addService', [adminController::class, 'addServicePage'])->name('AddService')->middleware('auth');
Route::get('/indexAdmin/account', [adminController::class, 'accountPage'])->name('Account')->middleware('auth');
Route::get('/indexAdmin/storageService', [adminController::class, 'storagePage'])->name('Storage')->middleware('auth');
Route::get('/indexAdmin/draftService', [adminController::class, 'draftPage'])->name('Draft')->middleware('auth');
Route::get('/indexAdmin/generateCode', [adminController::class, 'codeGeneratorPage'])->name('Generator')->middleware('auth');
Route::get('/indexAdmin/report', [adminController::class, 'reportPage'])->name('Report')->middleware('auth');
