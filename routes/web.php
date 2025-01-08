<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ProfileController;
use App\Models\Consultation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view( view: 'auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('/consultation', ConsultationController::class)->withTrashed();

    Route::get('/consultation/{consultation}/restore', [ConsultationController::class, 'restore'])->withTrashed()->name('consultation.restore');

    Route::get('/demande', [ConsultationController::class, 'demande'])->name('consultation.demande');
    Route::get('/statu/{consultation}/statu', [ConsultationController::class, 'statu'])->name('consultation.statu');

    // Route::get('language/{code_iso}', [LanguageController::class, 'change'])->name('language.change');
});

require __DIR__.'/auth.php';
