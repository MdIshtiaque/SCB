<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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
});
Route::post('save-data', function (DataRequest $request) {
    try {
        Record::create([
            'full_name' => $request->full_name,
            'mobile' => $request->mobile,
            'city' => $request->city
        ]);
        return redirect()->back()->with('success', 'For choosing Standard Chartered Priority! A relationship manager of Standard Chartered will contact you shortly');
    }catch (Exception $exception) {
        return redirect()->back()->with('error', 'Something Went Wrong.');
    }

})->name('save');
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
