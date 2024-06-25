<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\RecordsReportMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendRecordsReport extends Command
{
    protected $signature = 'report:send';
    protected $description = 'Send an Excel report via email';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $emails = ['ishtiaqueferdous109@gmail.com', 'forhad.anam@asdbd.com', 'jamil.hossain@asdbd.com'];
        try {
            Mail::to($emails)->send(new RecordsReportMail());
            $this->info('The records report has been sent successfully!');
        } catch (\Exception $e) {
            $this->error('Failed to send records report: ' . $e->getMessage());
            Log::error('Failed to send records report', ['error' => $e->getMessage()]);
        }
    }
}
