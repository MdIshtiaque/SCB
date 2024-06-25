<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RecordsExport;

class RecordsReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        $excelFile = Excel::raw(new RecordsExport, \Maatwebsite\Excel\Excel::XLSX);

        return $this->subject('Daily Records Report')
            ->view('emails.recordsReport')
            ->attachData($excelFile, 'SCB Priority List.xlsx', [
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
    }
}
