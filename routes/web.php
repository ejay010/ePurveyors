<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerRequestController;
use App\Http\Controllers\IslandController;
use App\Http\Controllers\MarinaController;
use App\Models\Island;
use Illuminate\Foundation\Application;
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
    // dd(Island::with('marinas')->get());
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'islands' => Island::with('marinas')->get(),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/customer-request', [CustomerRequestController::class, 'store']);
Route::get('/customer-request/{customerRequest}', [CustomerRequestController::class, 'show'])->name('customerRequest.show');
Route::get('/customer-request/{customerRequest}/edit', [CustomerRequestController::class, 'edit'])->name('editCustomerRequest');
Route::post('/customer-request/{customerRequest}/edit', [CustomerRequestController::class, 'update'])->name('updateCustomerRequest');
//Admin routes
Route::get('/customer-requests', [CustomerRequestController::class, 'index'])->name('allCustomerRequests');
require __DIR__.'/auth.php';

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('islands', [IslandController::class, 'index'])->name('admin.islands');
    Route::get('/islands/create', [IslandController::class, 'create'])->name('admin.islands.create');
    Route::post('/islands/store', [IslandController::class, 'store'])->name('admin.islands.store');
    Route::get('/islands/{island:slug}', [IslandController::class, 'show'])->name('admin.islands.show');
    Route::get('/island/{island:slug}/edit', [IslandController::class, 'edit'])->name('admin.island.edit');
    Route::patch('/islands/{island:slug}/update', [IslandController::class, 'update'])->name('admin.islands.update');
    Route::get('/islands/{island:slug}/marina/create', [IslandController::class, 'createMarina'])->name('admin.island.marina.create');
    Route::get('/islands/{island:slug}/destroy', [IslandController::class, 'destroy'])->name('admin.island.delete');

    Route::post('marina/store', [MarinaController::class, 'store'])->name('admin.marina.store');
});