<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Content;
use App\Http\Controllers\ContactController;

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

    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/content', [AdminController::class, 'content'])->name('content');
    Route::get('/index', [AdminController::class, 'index'])->name('index');
    Route::get('/design', [AdminController::class, 'indexDesign'])->name('design.index');

    //Clients
    Route::get('/clients', [\App\Http\Controllers\Client::class, 'index'])->name('clients.index');
    Route::get('add-client', [\App\Http\Controllers\Client::class, 'create'])->name('add-client');
    Route::post('add-client', [\App\Http\Controllers\Client::class, 'store'])->name('add-client.store');
    Route::get('edit-client/{id}', [\App\Http\Controllers\Client::class, 'edit'])->name('edit-client');
    Route::put('update-client/{id}', [\App\Http\Controllers\Client::class, 'update'])->name('update-client');
    Route::get('delete-client/{id}', [\App\Http\Controllers\Client::class, 'destroy'])->name('delete-client');

    //Projects
    Route::get('/projects', [\App\Http\Controllers\Project::class, 'index'])->name('projects.index');
    Route::get('add-project', [\App\Http\Controllers\Project::class, 'create'])->name('add-project');
    Route::post('add-project', [\App\Http\Controllers\Project::class, 'store'])->name('add-project.store');
    Route::get('edit-project/{id}', [\App\Http\Controllers\Project::class, 'edit'])->name('edit-project');
    Route::put('update-project/{id}', [\App\Http\Controllers\Project::class, 'update'])->name('update-project');
    Route::get('delete-project/{id}', [\App\Http\Controllers\Project::class, 'destroy'])->name('delete-project');

    //Members
    Route::get('/members', [\App\Http\Controllers\Member::class, 'index'])->name('members.index');
    Route::get('add-member', [\App\Http\Controllers\Member::class, 'create'])->name('add-member');
    Route::post('add-member', [\App\Http\Controllers\Member::class, 'store'])->name('add-member.store');
    Route::get('edit-member/{id}', [\App\Http\Controllers\Member::class, 'edit'])->name('edit-member');
    Route::put('update-member/{id}', [\App\Http\Controllers\Member::class, 'update'])->name('update-member');
    Route::get('delete-member/{id}', [\App\Http\Controllers\Member::class, 'destroy'])->name('delete-member');

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
