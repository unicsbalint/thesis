<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices\Leds\MoodLight;
use App\Models\Devices\Leds\LedState;

class DeviceController extends Controller
{
    public function index()
    {
        $data = [];
        $data["moodLightState"] = LedState::select('state')->where('light','MoodLight')->get()[0];

        return view('device')->withData($data);
    }

    public function switchMoodLight(Request $request){
        return MoodLight::switchMoodLight($request->color);
    }
}
