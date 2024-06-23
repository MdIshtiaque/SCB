<?php

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

Route::get('/dashboard', function () {
    $items = Record::all();
    return view('pages.dashboard', ['items' => $items]);
})->name('dashboard');


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