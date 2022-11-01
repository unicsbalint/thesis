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
use App\Models\Statistics\HomeAction;


class MoodLight extends Model
{
    public static function switchMoodLight($color){
        $process = new Process(['python', '/var/www/html/tasks/Leds/moodLight.py',$color]);
        $process->run();

		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

        if($color != "turnoff"){
            LedState::where('light','MoodLight')->update(['state' => 1]);
            HomeAction::logActionStart("MoodLight");
        }
        else{
            LedState::where('light','MoodLight')->update(['state' => 0]);
            HomeAction::logMultipleActionEnd("MoodLight");
        }

        return $process->getOutput();
    }

}
