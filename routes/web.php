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
    Route::get('/search', 'search')->name('search');
    Route::get('/home/Document/{id}', 'citizenDocument');
    Route::get('/home/clientSurvey/{code}', 'showClientSurvey')
        ->name('ClientSurvey');
    Route::get('/home/WalkIn-clientSurvey', 'walkInSurvey')->name('Step1');
    Route::post('/home/WalkIn-clientSurvey', 'processWalkInSurvey');
    Route::get('/home/WalkIn-clientSurvey2', 'walkInSurvey2');
    Route::post('/home/WalkIn-clientSurvey2', 'processWalkInSurvey2');
    // Route::post('/home/clientSurvey/Search', 'fetchData'); //associate to fetch the data
    Route::get('/clientSurvey/selectService', 'selectService');
    Route::post('/home/clientSurvey/StoreData', 'storeSurveyData');

    Route::get('/home/clientSecurity', 'surveySecurity')->name('clientSecurity');
    Route::get('/home/clientButton', 'clientButtons')->name('clientButton');
    Route::post('/clientSecurity', 'checkSecurity');
    Route::get('/thankyou/{name}', 'thankYouPage');


    Route::get('/home/word', 'word');
    Route::get('/example', 'example');
});


Route::controller(adminController::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::post('/login/process', 'process');
    Route::get('/register', 'register')->name('Register');
    Route::post('/register/storeData', 'storeUserData');
    Route::post('/logout', 'logout');
    Route::get('/forgot-pasword', 'forgotPasswordPage')->name('password.request');
    Route::post('/forgot-pasword', 'getPasword');
    Route::get('/forgot-password-email/{token}', 'emailResetPassword')->name('emailResetPassword');
    Route::post('forgot-password-email/{token}', 'confirmResetPassword');

    Route::middleware(['auth'])->group(function () {
        Route::get('/indexAdmin',  'index')->name('index');
        Route::get('/indexAdmin/addService', 'addServicePage')->name('AddService');
        Route::post('/indexAdmin/addService', 'storeService');
        Route::get('/indexAdmin/account',  'showAccountPage')->name('Account');
        Route::put('/indexAdmin/account', 'update');
        Route::get('/indexAdmin/storageService', 'storagePage')->name('Storage');
        Route::get('/indexAdmin/editService/{id}', 'editService')->name('editService');
        Route::put('/indexAdmin/editService/{id}', 'saveEditService')->name('updateService');
        Route::put('/indexAdmin/serviceArchive/{id}', 'archiveService')->name('archiveService');
        Route::get('/indexAdmin/draftService',  'draftPage')->name('Draft');
        Route::get('/indexAdmin/generateCode',  'codeGeneratorPage')->name('Generator');
        Route::post('/indexAdmin/generateCode', 'createCode');
        Route::get('/indexAdmin/Create-questionnaire', 'createQuestion')->name('CreateSurvey'); //For the CC Question
        Route::get('/indexAdmin/Create-CC-Questionnaire', 'createCcQuestion')->name('CreateCcSurvey'); //For the CC Question
        Route::post('/indexAdmin/Create-CC-Questionnaire', 'saveCcQuestion'); //For the CC Question


        Route::get('/indexAdmin/Edit-CC-Questionnaire', 'editCcQuestion')->name('EditCcSurvey');

        Route::get('/indexAdmin/Create-Survey-Questionnaire', 'createSurveyQuestion')->name('CreateClientSurvey'); //For the Client Satisfaction Survey
        Route::post('/indexAdmin/Create-Survey-Questionnaire', 'saveSurveyQuestion'); //For the Client Satisfaction Survey
        Route::post('/indexAdmin/Create-questionnaire', 'saveQuestion'); //For the Client Satisfaction Survey

        Route::get('/indexAdmin/edit/Css-Instruction/{id}', 'editPageSrvyInstruction'); //For the Client Satisfaction Survey Instruction
        Route::put('/indexAdmin/edit/Css-Instruction/{id}', 'saveSrvyInstruction'); //For the Client Satisfaction Survey Instruction
        Route::delete('/indexAdmin/delete/Css-Instruction/{id}', 'deleteSrvyInstruction'); //For the Client Satisfaction Survey Instruction

        Route::get('/indexAdmin/edit/Css-Question/{id}', 'editPageSrvyQuestion'); //For the Client Satisfaction Survey Question
        Route::put('/indexAdmin/save/Css-Question/{id}', 'saveSrvyQuestion'); //For the Client Satisfaction Survey Question
        Route::delete('/indexAdmin/delete/Css-Question/{id}', 'deleteSrvyQuestion'); //For the Client Satisfaction Survey Question

        Route::get('/indexAdmin/edit/Css-Comment/{id}', 'editPageSrvyComment'); //For the Client Satisfaction Survey Comment
        Route::put('/indexAdmin/save/Css-Comment/{id}', 'saveSrvyComment'); //For the Client Satisfaction Survey Comment
        Route::delete('/indexAdmin/delete/Css-Comment/{id}', 'deleteSrvyComment'); //For the Client Satisfaction Survey Comment

        Route::get('/indexAdmin/Storage/CC/CSS', 'EditingCcQuestionsPage')->name('CcAndCssPage');
        Route::get('/indexAdmin/edit/ccInsruction/{id}', 'EditingCcInstruction'); //For the CC Instruction
        Route::put('/indexAdmin/edit/ccInsruction/{id}', 'saveCcInstruction'); //For the CC Instruction
        Route::delete('/indexAdmin/delete/ccInsruction/{id}', 'deleteInstructionCc'); //For the CC Instruction

        Route::get('/indexAdmin/edit/ccQuestion/{id}', 'EditingCcQuestion'); //For the CC Question
        Route::put('/indexAdmin/edit/ccQuestion/{id}', 'updateCcQuestion'); //For the CC Question
        Route::delete('/indexAdmin/delete/ccQuestion/{id}', 'deleteCcQuestion'); //For the CC Question


        Route::get('/indexAdmin/report2', 'report2')->name('Report'); //For the sub-Admin
        Route::post('/indexAdmin/report2', 'filterResult')->name('filterResult'); //For the sub-Admin
        Route::post('/indexAdmin/assessReport', 'assessmentResult')->name('assessResult'); //For the sub-Admin


        Route::get('/superAdmin', 'indexAdmin')->name('Admin');
        Route::get('/superAdmin/Storage', 'storageOfAllService')->name('storageOfAllService');
        Route::get('/superAdmin/report', 'reportAdmin')->name('reportAdmin');
        Route::post('/superAdmin/report', 'filterReport')->name('filterReport');
        Route::post('/superAdmin/assessment', 'assessReport')->name('assesmentReport');
        Route::post('/superAdmin/delete-service/{serviceId}', 'deleteService');
    });
});
