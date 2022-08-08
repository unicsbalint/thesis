<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LedController extends Controller
{
    public function blinkLed(Request $request){

        $process = new Process(['python', '/var/www/html/tasks/blink.py']);
        $process->run();
    }
}
