<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use DB;
class LedController extends Controller
{
    public function blinkLed(Request $request){

		$data = DB::select(DB::raw("SELECT * FROM teszt"));
        $process = new Process(['python', '/var/www/html/tasks/blink.py']);
        $process->run();
		// executes after the command finishes
		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

		echo $process->getOutput();
	
    }
}
