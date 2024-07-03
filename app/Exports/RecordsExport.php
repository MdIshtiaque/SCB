<?php

namespace App\Exports;

use App\Models\Record;
use App\Models\Timer;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RecordsExport implements FromCollection, WithHeadings, WithMapping
{
    private $serialNumber = 0;
    public function collection()
    {
//        $yesterday = Carbon::yesterday('Asia/Dhaka');
//        return Record::whereDate('created_at', '=', $yesterday)->get();
        $records = collect();
        $timer = Timer::first();
        if ($timer) {
            $time = $timer->timer;  // Assuming 'timer' field contains the time as string in 24-hour format

            // Parse the time to get the hour
            $timeHour = Carbon::createFromFormat('H:i', $time)->format('H');

            // Determine the date based on the time
            if ($timeHour < 12) {
                // If time is before noon, use yesterday's date
                $date = Carbon::yesterday('Asia/Dhaka');
            } else {
                // If time is noon or later, use today's date
                $date = Carbon::today('Asia/Dhaka');
            }

            // Fetch records based on the determined date
            $records = Record::whereDate('created_at', '=', $date)->get();
        }
        return $records;
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
