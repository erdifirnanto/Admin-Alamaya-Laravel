<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\ClientController;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
// Your existing routes...
|-------------------------------------------------------------------------- 
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Route dengan middleware role-based
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [RoleController::class, 'Dashboard'])->name('dashboard');
    // Route::get('/dashboard', [RoleController::class, 'userDashboard'])->name('dashboard');


    // route khusus admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [RoleController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/admin/add-account', [AdminAccountController::class, 'showAddAccountForm'])->name('admin.add-account-form');
        Route::post('/admin/add-account', [AdminAccountController::class, 'addAccount'])->name('admin.add-account');

        // Route untuk melihat klien (hanya admin)
        Route::get('/admin/clients', [ClientController::class, 'index'])->name('admin.clients'); // Pastikan method 'index' di ClientController ada
    });

    // route khusus staff
    Route::middleware('role:user')->group(function () {
        Route::get('/user/dashboard', [RoleController::class, 'userDashboard'])->name('user.dashboard');

        // Route untuk melihat klien (hanya staff)
        Route::get('/user/clients', [ClientController::class, 'index'])->name('user.clients'); // Pastikan method 'index' di ClientController ada
    });
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/account-management', [AdminAccountController::class, 'index'])->name('account.management');
        Route::delete('/account-management/{user}', [AdminAccountController::class, 'destroy'])->name('account.destroy');
    });

// fungsi data clients
Route::post('/clients/store', [ClientController::class, 'Cstore'])->name('clients.store');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::post('/clients/delete-multiple', [ClientController::class, 'deleteMultiple'])->name('clients.deleteMultiple');
