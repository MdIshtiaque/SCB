<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GroupEmailController;
use App\Http\Controllers\RecordExportController;
use App\Http\Controllers\UserManagementController;
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
Route::delete('delete/{record}', [DashboardController::class, 'deleteRecord'])->middleware(['auth'])->name('record.delete');
Route::post('/records/bulk-delete', [DashboardController::class, 'bulkDelete'])->middleware(['auth'])->name('records.bulkDelete');
//Route::get('/export-records', [RecordExportController::class, 'export']);

Route::prefix('user-management')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/add-new-user', [UserManagementController::class, 'addNewUser'])->name('user-management.add-new-user');
    Route::get('/user-list', [UserManagementController::class, 'userList'])->name('user-management.user-list');
    Route::post('/store-user', [UserManagementController::class, 'saveUser'])->name('user-management.save-user');
    Route::post('/toggle/{user}', [UserManagementController::class, 'toggle'])->name('user.toggle');
    Route::get('/edit/{user}', [UserManagementController::class, 'editUser'])->name('user.edit');
    Route::patch('/update/{user}', [UserManagementController::class, 'updateUser'])->name('user.update');
    Route::delete('/delete/{user}', [UserManagementController::class, 'delete'])->name('user.delete');
});

Route::prefix('email-recipients')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/add-new-email', [GroupEmailController::class, 'addNewEmail'])->name('email-recipients.add-new-email');
    Route::get('/email-list', [GroupEmailController::class, 'emailList'])->name('email-recipients.email-list');
    Route::post('/store-email', [GroupEmailController::class, 'store'])->name('email-recipients.save-email');
    Route::post('/toggle/{groupEmail}', [GroupEmailController::class, 'toggle'])->name('email.toggle');
    Route::delete('/delete/{groupEmail}', [GroupEmailController::class, 'delete'])->name('email.delete');
});


require __DIR__.'/auth.php';
