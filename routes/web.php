<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    } else {
        return view('auth.login');
    }
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Users
    Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::put('users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::delete('users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('usersDatatable', [App\Http\Controllers\UserController::class, 'service'])->name('users.datatable');

    // Tags (Tipos de cliente)
    Route::post('tags/store', [App\Http\Controllers\TagController::class, 'store'])->name('tags.store');
    Route::get('tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags.index');
    Route::get('tags/create', [App\Http\Controllers\TagController::class, 'create'])->name('tags.create');
    Route::put('tags/{tag}', [App\Http\Controllers\TagController::class, 'update'])->name('tags.update');
    Route::get('tags/{tag}', [App\Http\Controllers\TagController::class, 'show'])->name('tags.show');
    Route::delete('tags/{tag}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tags.destroy');
    Route::get('tags/{tag}/edit', [App\Http\Controllers\TagController::class, 'edit'])->name('tags.edit');
    Route::post('tagsDatatable', [App\Http\Controllers\TagController::class, 'service'])->name('tags.datatable');

    // DutyTypes
    Route::post('dutyTypes/store', [App\Http\Controllers\DutyTypeController::class, 'store'])->name('dutyTypes.store');
    Route::get('dutyTypes', [App\Http\Controllers\DutyTypeController::class, 'index'])->name('dutyTypes.index');
    Route::get('dutyTypes/create', [App\Http\Controllers\DutyTypeController::class, 'create'])->name('dutyTypes.create');
    Route::put('dutyTypes/{dutyType}', [App\Http\Controllers\DutyTypeController::class, 'update'])->name('dutyTypes.update');
    Route::get('dutyTypes/{dutyType}', [App\Http\Controllers\DutyTypeController::class, 'show'])->name('dutyTypes.show');
    Route::delete('dutyTypes/{dutyType}', [App\Http\Controllers\DutyTypeController::class, 'destroy'])->name('dutyTypes.destroy');
    Route::get('dutyTypes/{dutyType}/edit', [App\Http\Controllers\DutyTypeController::class, 'edit'])->name('dutyTypes.edit');
    Route::post('dutyTypesDatatable', [App\Http\Controllers\DutyTypeController::class, 'service'])->name('dutyTypes.datatable');

    // Clients
    Route::post('clients/store', [App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');
    Route::get('clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [App\Http\Controllers\ClientController::class, 'create'])->name('clients.create');
    Route::put('clients/{client}', [App\Http\Controllers\ClientController::class, 'update'])->name('clients.update');
    Route::get('clients/{client}', [App\Http\Controllers\ClientController::class, 'show'])->name('clients.show');
    Route::delete('clients/{client}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('clients/{client}/edit', [App\Http\Controllers\ClientController::class, 'edit'])->name('clients.edit');
    Route::post('clientsDatatable', [App\Http\Controllers\ClientController::class, 'service'])->name('clients.datatable');

    // Duties
    Route::post('duties/store', [App\Http\Controllers\DutyController::class, 'store'])->name('duties.store');
    Route::get('duties', [App\Http\Controllers\DutyController::class, 'index'])->name('duties.index');
    Route::get('duties/create', [App\Http\Controllers\DutyController::class, 'create'])->name('duties.create');
    Route::put('duties/{duty}', [App\Http\Controllers\DutyController::class, 'update'])->name('duties.update');
    Route::get('duties/{duty}', [App\Http\Controllers\DutyController::class, 'show'])->name('duties.show');
    Route::delete('duties/{duty}', [App\Http\Controllers\DutyController::class, 'destroy'])->name('duties.destroy');
    Route::get('duties/{duty}/edit', [App\Http\Controllers\DutyController::class, 'edit'])->name('duties.edit');
    Route::post('dutiesDatatable', [App\Http\Controllers\DutyController::class, 'service'])->name('duties.datatable');
});
