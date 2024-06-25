<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RecordsExport;

class RecordExportController extends Controller
{
    public function export()
    {
        return Excel::download(new RecordsExport, 'SCB Priority List.xlsx');
    }
}
