<?php

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
