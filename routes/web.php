<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminAccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
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

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Tambahkan route khusus admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [RoleController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/admin/add-account', [AdminAccountController::class, 'showAddAccountForm'])->name('admin.add-account-form');
        Route::post('/admin/add-account', [AdminAccountController::class, 'addAccount'])->name('admin.add-account');
    });

    // Tambahkan route khusus user
    Route::middleware('role:user')->group(function () {
        Route::get('/user/dashboard', [RoleController::class, 'userDashboard'])->name('user.dashboard');
    });
});
