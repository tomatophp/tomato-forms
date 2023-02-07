<?php

use TomatoPHP\TomatoForms\Http\Controllers\FieldController;
use TomatoPHP\TomatoForms\Http\Controllers\FormController;
use TomatoPHP\TomatoForms\Http\Controllers\GroupController;

Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/forms', [FormController::class, 'index'])->name('forms.index');
    Route::get('admin/forms/api', [FormController::class, 'api'])->name('forms.api');
    Route::get('admin/forms/create', [FormController::class, 'create'])->name('forms.create');
    Route::post('admin/forms', [FormController::class, 'store'])->name('forms.store');
    Route::get('admin/forms/{model}', [FormController::class, 'show'])->name('forms.show');
    Route::get('admin/forms/{model}/edit', [FormController::class, 'edit'])->name('forms.edit');
    Route::post('admin/forms/{model}', [FormController::class, 'update'])->name('forms.update');
    Route::delete('admin/forms/{model}', [FormController::class, 'destroy'])->name('forms.destroy');
});

Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/fields', [FieldController::class, 'index'])->name('fields.index');
    Route::get('admin/fields/api', [FieldController::class, 'api'])->name('fields.api');
    Route::get('admin/fields/create', [FieldController::class, 'create'])->name('fields.create');
    Route::post('admin/fields', [FieldController::class, 'store'])->name('fields.store');
    Route::get('admin/fields/{model}', [FieldController::class, 'show'])->name('fields.show');
    Route::get('admin/fields/{model}/edit', [FieldController::class, 'edit'])->name('fields.edit');
    Route::post('admin/fields/{model}', [FieldController::class, 'update'])->name('fields.update');
    Route::delete('admin/fields/{model}', [FieldController::class, 'destroy'])->name('fields.destroy');
});

Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('admin/groups/api', [GroupController::class, 'api'])->name('groups.api');
    Route::get('admin/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('admin/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::get('admin/groups/{model}', [GroupController::class, 'show'])->name('groups.show');
    Route::get('admin/groups/{model}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::post('admin/groups/{model}', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('admin/groups/{model}', [GroupController::class, 'destroy'])->name('groups.destroy');
});

