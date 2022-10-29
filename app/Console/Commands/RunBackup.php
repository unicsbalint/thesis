<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Devices\Leds\MoodLight;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class RunBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:runbackup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command a cloud fajlairol keszit biztonsagi mentest';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $process = new Process(['python', '/var/www/html/tasks/Cloud/cloudBackup.py']);
        $process->run();
    }
}
