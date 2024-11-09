<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\TeamController;
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
        Route::get('/admin/dashboard', [RoleController::class, 'Dashboard'])->name('admin.dashboard');
        Route::get('/admin/add-account', [AdminAccountController::class, 'showAddAccountForm'])->name('admin.add-account-form');
        Route::post('/admin/add-account', [AdminAccountController::class, 'addAccount'])->name('admin.add-account');
        // Route untuk melihat klien (hanya admin)
        Route::get('/admin/clients', [ClientController::class, 'index'])->name('admin.clients'); // Pastikan method 'index' di ClientController ada
    });

    // route khusus staff
    Route::middleware('role:staff')->group(function () {
        Route::get('/user/dashboard', [RoleController::class, 'Dashboard'])->name('user.dashboard');
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
Route::post('/project/store', [ProjectController::class, 'Pstore'])->name('project.store');
Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::post('/project/delete-multiple', [ProjectController::class, 'deleteMultiple'])->name('project.deleteMultiple');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
// route data domain
Route::resource('domain', DomainController::class);
Route::get('/domain', [DomainController::class, 'View'])->name('domain.view');
Route::post('/domain/store', [DomainController::class, 'Dstore'])->name('domain.store');
Route::delete('/domain/{id}', [DomainController::class, 'destroy'])->name('domain.destroy');
Route::post('/domain/delete-multiple', [DomainController::class, 'deleteMultiple'])->name('domain.deleteMultiple');
Route::get('/domain/{id}/edit', [DomainController::class, 'edit'])->name('domain.edit');
Route::put('/domain/{id}', [DomainController::class, 'update'])->name('domain.update');
Route::put('/domain/{domain}', [DomainController::class, 'update'])->name('domain.update');
// route data team
Route::resource('team', TeamController::class);
Route::get('/team', [TeamController::class, 'View'])->name('team.view');
Route::post('/team/store', [TeamController::class, 'Dstore'])->name('team.store');
Route::delete('/team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
Route::post('/team/delete-multiple', [TeamController::class, 'deleteMultiple'])->name('team.deleteMultiple');
Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
Route::put('/team/{id}', [TeamController::class, 'update'])->name('team.update');
Route::put('/team/{team}', [TeamController::class, 'update'])->name('team.update');
