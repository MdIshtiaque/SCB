<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Requests\DataRequest;
use App\Models\Record;
use Illuminate\Support\Facades\Route;

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
   return view('welcome');
})->name('home');

Route::post('save-data', [FormController::class, 'storeData'])->name('save');

Route::get('success', function () {
    return view('success');
})->name('success');
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';