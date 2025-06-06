<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PraticienController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('auth.login'))->middleware('guest')->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/consultation', ConsultationController::class)->withTrashed();
    Route::resource('/praticien', PraticienController::class)->withTrashed();
    Route::resource('/prescription',PrescriptionController::class)->withTrashed();

    Route::get('/consultation/{consultation}/restore', [ConsultationController::class, 'restore'])->withTrashed()->name('consultation.restore');
    Route::get('/praticien/{praticien}/restore', [PraticienController::class, 'restore'])->withTrashed()->name('praticien.restore');
    Route::get('/prescription/{prescription}/restore', [PrescriptionController::class, 'restore'])->withTrashed()->name('prescription.restore');

    Route::get('/demande', [ConsultationController::class, 'demande'])->name('consultation.demande');
    Route::get('/statu/{consultation}/statu', [ConsultationController::class, 'statu'])->name('consultation.statu');
});

Route::get('language/{code_iso}', [LanguageController::class, 'change'])->name('language.change');

require __DIR__.'/auth.php';
