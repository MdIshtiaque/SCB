<?php

namespace Database\Seeders;

use App\Models\Timer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timer::create([
            'timer' => '00:00',
        ]);
    }
}
