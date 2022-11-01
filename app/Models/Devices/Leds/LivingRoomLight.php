<?php

namespace App\Models\Devices\Leds;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use DB;
use App\Models\Devices\Leds\LedState;

class LivingRoomLight extends Model
{
    public static function toggleLivingRoomLight($state){
        $process = new Process(['python', '/var/www/html/tasks/Leds/livingRoomLed.py', $state]);
        $process->run();

		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

        if($state == "on"){
            LedState::where('light','LivingRoomLight')->update(['state' => 1]);
        }
        else{
            LedState::where('light','LivingRoomLight')->update(['state' => 0]);
        }

        return $process->getOutput();
    }

}
