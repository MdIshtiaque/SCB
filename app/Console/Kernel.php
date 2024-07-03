<?php

namespace App\Console;

use App\Models\Timer;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $timer = Timer::first();
        $time = $timer->timer;
        if ($time) {
            $schedule->command('report:send')
                ->dailyAt($time)
                ->timezone('Asia/Dhaka')
                ->before(function () {
                    Log::info("Attempting to run report:send");
                })
                ->after(function () {
                    Log::info("Completed running report:send");
                });
        }else {
            $schedule->command('report:send')
                ->dailyAt('18:00')
                ->timezone('Asia/Dhaka')
                ->before(function () {
                    Log::info("Attempting to run report:send");
                })
                ->after(function () {
                    Log::info("Completed running report:send");
                });
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
