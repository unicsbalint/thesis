<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices\Leds\MoodLight;
use App\Models\Devices\Leds\LedState;
use App\Models\Devices\Climate\Climate;
use App\Models\Devices\Climate\ClimateState;
use App\Models\Devices\Leds\LivingRoomLight;

class DeviceController extends Controller
{
    public function index()
    {
        $data = [];
        $data["moodLightState"] = LedState::select('state')->where('light','MoodLight')->first();
        $data["livingRoomLightState"] = LedState::select('state')->where('light','LivingRoomLight')->first();
        $data["heatingState"] = ClimateState::select('state')->where('climate_type', 'heating')->first();
        $data["coolingState"] = ClimateState::select('state')->where('climate_type', 'cooling')->first();
        $data["autoClimateTemperature"] = ClimateState::select('state')->where('climate_type', 'auto')->first();
        $data["autoClimateState"] = $data["autoClimateTemperature"]->state != 0 ? true : false; 

        return view('device')->withData($data);
    }

    public function switchMoodLight(Request $request){
        MoodLight::switchMoodLight($request->color);
    }

    public function toggleLivingRoomLight(Request $request){
        LivingRoomLight::toggleLivingRoomLight($request->state);
    }

    public function toggleCooling(Request $request){
        Climate::toggleCooling($request->state);
    }

    public function toggleHeating(Request $request){
        Climate::toggleHeating($request->state);
    }

    public function toggleAutoClimate(Request $request){
        Climate::toggleAutoClimate($request->state);
    }
}
