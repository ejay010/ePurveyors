<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CustomerRequestController;
use App\Http\Controllers\IslandController;
use App\Http\Controllers\MarinaController;
use App\Models\Island;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Guest/Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'islands' => Island::with('marinas')->get(),
    ]);
})->name('landing');

Route::get('/dashboard', function () {
    $customer = Auth::user();

    return Inertia::render('Customer/Dashboard', [
        'customer' => $customer,
        'provisionsRequested' => $customer->ProvisionRequests,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/customer-request', [CustomerRequestController::class, 'store']);
Route::get('customer-request/{customerRequest}', [CustomerRequestController::class, 'show'])->name('customer.customerRequest.show');

//Admin routes
require __DIR__.'/auth.php';

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdministratorController::class, 'login'])->name('admin.login.show');
    Route::post('/login', [AdministratorController::class, 'validateLogin'])->name('admin.login.post');
});

Route::prefix('admin')->middleware(['auth.admin'])->group(function () {

    Route::get('/', [AdministratorController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdministratorController::class, 'logout'])->name('admin.logout');

    Route::get('islands', [IslandController::class, 'index'])->name('admin.islands');
    Route::get('/islands/create', [IslandController::class, 'create'])->name('admin.islands.create');
    Route::post('/islands/store', [IslandController::class, 'store'])->name('admin.islands.store');
    Route::get('/islands/{island:slug}', [IslandController::class, 'show'])->name('admin.islands.show');
    Route::get('/island/{island:slug}/edit', [IslandController::class, 'edit'])->name('admin.island.edit');
    Route::patch('/islands/{island:slug}/update', [IslandController::class, 'update'])->name('admin.islands.update');
    Route::get('/islands/{island:slug}/marina/create', [IslandController::class, 'createMarina'])->name('admin.island.marina.create');
    Route::get('/islands/{island:slug}/destroy', [IslandController::class, 'destroy'])->name('admin.island.delete');

    Route::get('marinas', [MarinaController::class, 'index'])->name('admin.marinas.index');
    Route::post('marina/store', [MarinaController::class, 'store'])->name('admin.marina.store');
    Route::get('marina/{marina:slug}', [MarinaController::class, 'show'])->name('admin.marinas.show');
    Route::get('marina/{marina:slug}/edit', [MarinaController::class, 'edit'])->name('admin.marinas.edit');
    Route::get('marina/{marina:slug}/destroy', [MarinaController::class, 'destroy'])->name('admin.marinas.destroy');
    Route::patch('marina/{marina:slug}/update', [MarinaController::class, 'update'])->name('admin.marina.update');
    

    Route::get('customer-requests', [CustomerRequestController::class, 'index'])->name('admin.CustomerRequests.index');
    Route::get('customer-request/{customerRequest}', [CustomerRequestController::class, 'showAdmin'])->name('admin.customerRequest.show');
    Route::get('customer-request/{customerRequest}/edit', [CustomerRequestController::class, 'edit'])->name('admin.customerRequest.edit');
    Route::post('customer-request/{customerRequest}/edit', [CustomerRequestController::class, 'update'])->name('admin.customerRequest.update');

});