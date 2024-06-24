<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        $items = Record::all();
        return view('pages.dashboard', ['items' => $items]);
    }
}
