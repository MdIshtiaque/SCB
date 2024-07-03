<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        $items = Record::all();
        return view('pages.dashboard', ['items' => $items]);
    }

    public function deleteRecord(Record $record)
    {
        try {
            $record->delete();
        } catch (Exception $exception) {
            return Response::json(['success' => true, 'message' => 'Record deleted successfully']);
        }
        return Response::json(['success' => false, 'message' => 'Error deleting Record']);
    }

    public function bulkDelete(Request $request)
    {
        try {
            $ids = $request->input('ids');// Assuming you have a model named Record
            Record::whereIn('id', $ids)->delete();
        } catch (Exception $exception) {
            return Response::json(['success' => true, 'message' => 'Record deleted successfully']);
        }
        return response()->json(['success' => true]);
    }
}
