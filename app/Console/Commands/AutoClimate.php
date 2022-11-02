<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Devices\Climate\Sensor;
use App\Models\Devices\Climate\ClimateState;
use App\Models\Devices\Climate\Climate;


class AutoClimate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:autoclimate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A klima automatikus vezerleseert felelos';

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
        $currentTemperature = Sensor::getTemperature();
        $requestedTemperature = ClimateState::where('climate_type','auto')->first()->state;

        if($currentTemperature + 1 < $requestedTemperature){
            Climate::toggleHeating("on");
        }
        else if($currentTemperature - 1 > $requestedTemperature){
            Climate::toggleCooling("on");
        }
        else{
            Climate::stopAllClimateProcess();
        }

        return 0;
    }
}
