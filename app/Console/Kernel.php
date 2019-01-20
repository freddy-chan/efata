<?php

namespace App\Console;

use App\Console\Commands\SendBirthdayTextReminderTomorrow;
use App\Console\Commands\SendBirthdayTextReminderWeekly;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SendBirthdayTextReminderWeekly::class,
        SendBirthdayTextReminderTomorrow::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('efata:sendBirthdayTextReminderWeekly')
            ->weekly();

        $schedule->command('efata:sendBirthdayTextReminderTomorrow')
            ->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
