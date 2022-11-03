<?php

use App\Http\Controllers\CustomerRequestController;
use App\Models\CustomerRequest;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
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
