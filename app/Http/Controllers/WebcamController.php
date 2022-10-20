<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class WebcamController extends Controller
{
    public function startWebcamServer(){
        $process = new Process(['python3', '/var/www/html/tasks/Webcam/webcamServer.py','&']);
        $process->run();
		// executes after the command finishes
		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}
    }

    public function stopWebcamServer(){
        $process = new Process(['python', '/var/www/html/tasks/Webcam/stopWebcamServer.py']);
        $process->run();
		// executes after the command finishes
		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}
    }

    public function takePicture(){
        $process = new Process(['python', '/var/www/html/tasks/Webcam/takePicture.py']);
        $process->run();
		// executes after the command finishes
		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}
    }
}
