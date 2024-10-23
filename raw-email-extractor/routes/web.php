<?php

use App\Http\Controllers\SuccessfulEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('successful-emails')->group(function () {
    Route::post('/storeEmail', [SuccessfulEmailController::class, 'storeEmail'])->name('successful-emails.storeEmail');
    Route::get('/getEmailById/{id}', [SuccessfulEmailController::class, 'getEmailById'])->name('successful-emails.getEmailById');
    Route::put('/updateEmail/{id}', [SuccessfulEmailController::class, 'updateEmail'])->name('successful-emails.updateEmail');
    Route::get('/getAllEmails', [SuccessfulEmailController::class, 'getAllEmails'])->name('successful-emails.getAllEmails');
    Route::delete('/deleteEmailById/{id}', [SuccessfulEmailController::class, 'deleteEmailById'])->name('successful-emails.deleteEmailById');
});
