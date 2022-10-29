<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistics\TemperatureStatistics;
use App\Models\Statistics\HumidityStatistics;

class StatisticsController extends Controller
{
    public function index()
    {
        return view('statistics');
    }

    public function getStatistics(Request $request){
        $target = $request->device;
        $interval = $request->interval;

        switch($target){
            case "temperature":
                return $this->getTemperatureStatistics($interval);
                break;
            case "humidity":
                return $this->getHumidityStatistics($interval);
                break;
            default: break;
        }
    }

    private function getTemperatureStatistics($interval){
        switch($interval){
            case "last24hour":
                return TemperatureStatistics::last24Hour();
                break;
            case "last7days":
                return TemperatureStatistics::last7days();
                break;
            case "lastMonth":
                return TemperatureStatistics::lastMonth();
                break;
            
            default: break;
        }
    }

    private function getHumidityStatistics($interval){
        switch($interval){
            case "last24hour":
                return HumidityStatistics::last24Hour();
                break;
            case "last7days":
                return HumidityStatistics::last7days();
                break;
            case "lastMonth":
                return HumidityStatistics::lastMonth();
                break;
            
            default: break;
        }
    }

    
}
