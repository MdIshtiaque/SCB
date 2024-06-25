<?php

namespace App\Exports;

use App\Models\Record;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RecordsExport implements FromCollection, WithHeadings, WithMapping
{
    private $serialNumber = 0;
    public function collection()
    {
        $yesterday = Carbon::yesterday('Asia/Dhaka');
        return Record::whereDate('created_at', '=', $yesterday)->get();
    }

    public function map($record): array
    {
        $this->serialNumber++;
        return [
            $this->serialNumber,
            $record->full_name,
            $record->mobile,
            $record->city,
            $record->created_at->format('d-m-Y'),  // Date in Y-m-d format
            Carbon::parse($record->created_at)->timezone('Asia/Dhaka')->format('h:i A')
        ];
    }

    public function headings(): array
    {
        return ["Sl no", "Full Name", "Mobile", "City", "Date", "Time"];
    }
}
