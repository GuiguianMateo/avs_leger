<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ProfileController;
use App\Models\Consultation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view( view: 'auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('/consultation', ConsultationController::class)->withTrashed();

    // Route::get('/motif/{motif}/restore', [MotifController::class, 'restore'])->withTrashed()->name('motif.restore');

    // Route::get('/demande', [AbsenceController::class, 'demande'])->name('absence.demande');

    // Route::get('language/{code_iso}', [LanguageController::class, 'change'])->name('language.change');
});

require __DIR__.'/auth.php';
