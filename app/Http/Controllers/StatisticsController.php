<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistics\TemperatureStatistics;
use App\Models\Statistics\HumidityStatistics;
use App\Models\Statistics\LivingRoomLightStatistics;
use App\Models\Statistics\MoodLightStatistics;
use App\Models\Statistics\HeatingStatistics;
use App\Models\Statistics\CoolingStatistics;
use App\Models\Statistics\WebcamStatistics;

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
            case "livingRoomLight":
                return $this->getLivingRoomLightStatistics($interval);
                break;
            case "moodLight":
                return $this->getMoodLightStatistics($interval);
                break;
            case "heating":
                return $this->getHeatingStatistics($interval);
                break;
            case "cooling":
                return $this->getCoolingStatistics($interval);
                break;
            case "webcam":
                return $this->getWebcamStatistics($interval);
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
            case "heating":
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

    private function getLivingRoomLightStatistics($interval){
        switch($interval){
            case "last24hour":
                return LivingRoomLightStatistics::last24Hour();
                break;
            case "last7days":
                return LivingRoomLightStatistics::last7days();
                break;
            case "lastMonth":
                return LivingRoomLightStatistics::lastMonth();
                break;
            
            default: break;
        }
    }

    private function getMoodLightStatistics($interval){
        switch($interval){
            case "last24hour":
                return MoodLightStatistics::last24Hour();
                break;
            case "last7days":
                return MoodLightStatistics::last7days();
                break;
            case "lastMonth":
                return MoodLightStatistics::lastMonth();
                break;
            
            default: break;
        }
    }

    private function getHeatingStatistics($interval){
        switch($interval){
            case "last24hour":
                return HeatingStatistics::last24Hour();
                break;
            case "last7days":
                return HeatingStatistics::last7days();
                break;
            case "lastMonth":
                return HeatingStatistics::lastMonth();
                break;
            
            default: break;
        }
    }

    private function getCoolingStatistics($interval){
        switch($interval){
            case "last24hour":
                return CoolingStatistics::last24Hour();
                break;
            case "last7days":
                return CoolingStatistics::last7days();
                break;
            case "lastMonth":
                return CoolingStatistics::lastMonth();
                break;
            
            default: break;
        }
    }

    private function getWebcamStatistics($interval){
        switch($interval){
            case "last24hour":
                return WebcamStatistics::last24Hour();
                break;
            case "last7days":
                return WebcamStatistics::last7days();
                break;
            case "lastMonth":
                return WebcamStatistics::lastMonth();
                break;
            
            default: break;
        }
    }



    
}
