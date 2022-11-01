<?php

namespace App\Models\Devices\Climate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Devices\Climate\ClimateState;

class Climate extends Model
{

    public static function toggleCooling($state){
        $process = new Process(['python3', '/var/www/html/tasks/Climate/cooling.py', $state]);
        $process->run();

		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

        if($state == "on"){
            ClimateState::where('climate_type','cooling')->update(['state' => 1]);
        }
        else{
            ClimateState::where('climate_type','cooling')->update(['state' => 0]);
        }

        return $process->getOutput();
    }

    public static function toggleHeating($state){
        $process = new Process(['python3', '/var/www/html/tasks/Climate/heating.py', $state]);
        $process->run();

		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

        if($state == "on"){
            ClimateState::where('climate_type','heating')->update(['state' => 1]);
        }
        else{
            ClimateState::where('climate_type','heating')->update(['state' => 0]);
        }

        return $process->getOutput();
    }

    public static function toggleAutoClimate($state){
        ClimateState::where('climate_type','auto')->update(['state' => $state]);
        if($state == 0){
            self::stopAllClimateProcess();
        }
    }

    public static function stopAllClimateProcess(){
        self::toggleHeating("off");
        self::toggleCooling("off");
    }

}
