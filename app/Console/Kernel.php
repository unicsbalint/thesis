<?php

namespace App\Console;

use App\Models\Cloud\CloudBackup;
use Illuminate\Console\Scheduling\Schedule;
use App\Models\Devices\Climate\ClimateState;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->exec('python /var/www/html/Leds/moodLight.py red')->everyMinute();

        
        $backupSetting = CloudBackup::select('*')->first();

        switch($backupSetting->backup_time_interval){
            case "disabled":
                break;
            case "everyFiveMinutes":
                $schedule->command('command:runbackup')->everyFiveMinutes(); 
                break;
            case "hourly":
                $schedule->command('command:runbackup')->hourly(); 
                break;
            case "daily":
                $schedule->command('command:runbackup')->dailyAt('10:00');
                break;
            case "weekly":
                $schedule->command('command:runbackup')->weekly();
                break;
            case "monthly":
                $schedule->command('command:runbackup')->monthly();
                break;
            default: break;
        }

        // Sensor értékek eltárolása
        $schedule->command('command:storesensordata')->everyThreeMinutes();

        // Ha a klíma automatikusra van állítva akkor beállítja a hőmérsékletet.

        $isClimateAuto = ClimateState::where('climate_type','auto')->first()->state != 0;

        if($isClimateAuto){
            $schedule->command('command:autoclimate')->everyTwoMinutes();
        }

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
