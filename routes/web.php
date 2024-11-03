<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DomainController;
use App\Models\Domain;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;

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

// route data clients
Route::resource('clients', ClientController::class);
Route::post('/clients/store', [ClientController::class, 'Cstore'])->name('clients.store');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::post('/clients/delete-multiple', [ClientController::class, 'deleteMultiple'])->name('clients.deleteMultiple');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');


// route data project
Route::resource('project', ProjectController::class);
Route::get('/project', [ProjectController::class, 'View'])->name('project.view');

// 
Route::resource('domain', DomainController::class);
Route::get('/domain', [DomainController::class, 'View'])->name('domain.view');
