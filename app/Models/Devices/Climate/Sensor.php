<?php

namespace App\Models\Devices\Climate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Devices\Climate\SensorData;

class Sensor extends Model
{
    public static function getTemperature(){
        $temperature = SensorData::where("sensor","temperature")->orderBy('id', 'desc')->first();
        if(isset($temperature->result)) return $temperature->result;
        return 0;
    }

    public static function getHumidity(){
        $humidity = SensorData::where("sensor","humidity")->orderBy('id', 'desc')->first();
        if(isset($humidity->result)) return $humidity->result;
        return 0;
    }

    public static function storeTemperature(){
        $process = new Process(['python3', '/var/www/html/tasks/Climate/getSensorData.py','temp']);
        $process->run();

		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}
        $temperature = $process->getOutput();

        $sensorData = new SensorData();
        $sensorData->sensor = "temperature";
        $sensorData->result = $temperature;
        $sensorData->result_date = date("Y-m-d H:i:s");
        $sensorData->save();
    }

    public static function storeHumidity(){
        $process = new Process(['python3', '/var/www/html/tasks/Climate/getSensorData.py','humi']);
        $process->run();

		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

        $humidity = $process->getOutput();

        $sensorData = new SensorData();
        $sensorData->sensor = "humidity";
        $sensorData->result = $humidity;
        $sensorData->result_date = date("Y-m-d H:i:s");
        $sensorData->save();
    }
}
