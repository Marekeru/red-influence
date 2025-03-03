<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Content;

Route::get('/', function () {
    $contents = Content::where('published', true)->get();
    return view('welcome', compact('contents'));
});

// Dashboard für authentifizierte Benutzer leitet direkt zu /admin um
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return redirect('/admin');
})->name('dashboard');

// Admin-Routen (Admins & Editoren haben Zugriff!)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/update', [AdminController::class, 'update'])->name('update');
    Route::patch('/updateContent', [AdminController::class, 'updateContent'])->name('updateContent');

    // Benutzerverwaltung (Nur für Admins)
    Route::middleware(['role:admin'])->group(function () {
        Route::post('/store-editor', [AdminController::class, 'storeEditor'])->name('storeEditor');
        Route::patch('/update-editor/{user}', [AdminController::class, 'updateEditor'])->name('updateEditor');
        Route::delete('/delete-editor/{user}', [AdminController::class, 'deleteEditor'])->name('deleteEditor');
    });
});

// Profilverwaltung für alle authentifizierten Nutzer
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Impressum
Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

// Datenschutz
Route::get('/datenschutz', function () {
    return view('datenschutz');
})->name('datenschutz');

require __DIR__.'/auth.php';
