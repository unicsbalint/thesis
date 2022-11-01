<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Devices\Climate\Sensor;
use App\Models\Devices\Climate\SensorToDisplay;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->data["sensorData"] = "";
        $sensorDisplay = SensorToDisplay::select('*')->first();
        $selectedSensor = $sensorDisplay->selected_sensor;

        if($selectedSensor == "temperature"){
            $this->data["sensorData"] = Sensor::getTemperature() . "🌡";
        }
        else if($selectedSensor == "humidity"){
                $this->data["sensorData"] = Sensor::getHumidity() . "%"."⛅";
            }
        else if($selectedSensor == "both"){
            $this->data["sensorData"] = Sensor::getTemperature()."🌡".Sensor::getHumidity()."%"."⛅";
        }
        
        view()->composer('layouts.app', function($view) {
            $view->withData($this->data);
        });
    }
}
