<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('companies.index');
});


Route::resource('companies', CompanyController::class);

Route::get('/companies/search', [CompanyController::class, 'search'])->name('companies.search');

Route::get('companies/deleted', [CompanyController::class, 'deleted'])->name('companies.deleted');

Route::post('companies/{id}/restore', [CompanyController::class, 'restore'])->name('companies.restore');
