<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\AnalysesController;
use App\Http\Controllers\Admin\DiseasesController;
use App\Http\Controllers\Admin\CatsController;

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/patients', [PatientController::class, 'index'])->name('admin.patients.index');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('admin.patients.create');
    Route::post('/patients/store', [PatientController::class, 'store'])->name('admin.patients.store');
    Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('admin.patients.edit');
    Route::post('/patients/{id}/update', [PatientController::class, 'update'])->name('admin.patients.update');

    Route::get('/analyses', [AnalysesController::class, 'index'])->name('admin.analyses.index');
    Route::get('/analyses/create', [AnalysesController::class, 'create'])->name('admin.analyses.create');
    Route::post('/analyses/store', [AnalysesController::class, 'store'])->name('admin.analyses.store');
    Route::get('/analyses/{id}/edit', [AnalysesController::class, 'edit'])->name('admin.analyses.edit');
    Route::post('/analyses/{id}/update', [AnalysesController::class, 'update'])->name('admin.analyses.update');

    Route::get('/diseases', [DiseasesController::class, 'index'])->name('admin.diseases.index');
    Route::get('/diseases/create', [DiseasesController::class, 'create'])->name('admin.diseases.create');
    Route::post('/diseases/store', [DiseasesController::class, 'store'])->name('admin.diseases.store');
    Route::get('/diseases/{id}/edit', [DiseasesController::class, 'edit'])->name('admin.diseases.edit');
    Route::post('/diseases/{id}/update', [DiseasesController::class, 'update'])->name('admin.diseases.update');

    Route::get('/cats', [CatsController::class, 'index'])->name('admin.cats.index');
    Route::get('/cats/create', [CatsController::class, 'create'])->name('admin.cats.create');
    Route::post('/cats/store', [CatsController::class, 'store'])->name('admin.cats.store');
    Route::get('/cats/{cat}/edit', [CatsController::class, 'edit'])->name('admin.cats.edit');
    Route::put('/cats/{cat}/update', [CatsController::class, 'update'])->name('admin.cats.update');
    Route::post('/cats/{cat}/destroy', [CatsController::class, 'update'])->name('admin.cats.destroy');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
