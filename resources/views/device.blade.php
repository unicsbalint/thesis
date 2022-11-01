@extends('layouts.app')
@section('content')
@include('webcamModal')
<div class="container-sm" style="max-width: 720px;">
    <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active settingsTab" data-bs-toggle="tab" href="#leds">Világító berendezések 💡</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link settingsTab" data-bs-toggle="tab" href="#webcam">Biztonsági kamera 📷</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link settingsTab" data-bs-toggle="tab" href="#climate">Fűtés és klíma ❄</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content card-body">
                <!-- Ledek -->
                <div id="leds" class="tab-pane active">
                    <div class="form-check form-switch d-flex flex-column justify-content-center align-items-center">
                        <label class="form-check-label m-2">Nappali fény</label>
                        <input class="form-check-input m-2 livingRoomLightToggle switch" {{ $data['livingRoomLightState']->state == 1 ? 'checked' : '' }} type="checkbox">
                    </div>
                    <hr>
                    <div class="form-check form-switch d-flex flex-column justify-content-center align-items-center">
                        <label class="form-check-label m-2">Hálószobai hangulatfény</label>
                        <input class="form-check-input m-2 moodLightToggle switch" data-color="default" {{ $data['moodLightState']->state == 1 ? 'checked' : '' }} type="checkbox">
                        <div class="d-inline">
                            <button title="Az alapértelmezett fény" data-color="default" class="colorPicker bg-light"></button>
                            <button title="Piros hangulatfény" data-color="red" class="colorPicker bg-danger"></button>
                            <button title="Zöld hangulatfény" data-color="green" class="colorPicker bg-success"></button>
                            <button title="Kék hangulatfény" data-color="blue" class="colorPicker" style="background-color: blue;"></button>
                            <button title="Lila hangulatfény" data-color="purple" class="colorPicker" style="background-color: purple;"></button>
                        </div>

                    </div>
                </div>
                <!-- Webkamera -->
                <div id="webcam" class="tab-pane">
                    <button id="openStream" class="btn btn-success">Kamera megtekintése</button>
                    <hr>
                    <button class="btn btn-warning takePicture">Kép készítése 📸</button>
                </div>
                <!-- Fűtés és klíma -->
                <div id="climate" class="tab-pane">
                    <div class="form-check form-switch d-flex flex-column justify-content-center align-items-center automaticTemperatureSection">
                        <label class="form-check-label m-2">Hőmérsékelt automatikus beállítása</label>
                        <input class="form-check-input m-2 switch automaticTemperatureSwitch" {{ $data['autoClimateTemperature']->state == true ? 'checked' : '' }} type="checkbox">
                        <div class="d-inline">
                            <label>Kívánt hőmérséklet:</label>
                            <input type="text" value="{{ $data['autoClimateTemperature']->state }}" class="form-control w-25 d-inline mb-2 targetTemperature" min="15" max="35"> &#8451;
                        </div>
                        <button class="btn btn-success setAutomaticTemperature">Hőmérséklet beállítása</button>
                    </div>
                    <hr>
                    <div class="form-check form-switch d-flex flex-column justify-content-center align-items-center manualTemperatureSection">
                        <label class="form-check-label m-2">Klíma manuális bekapcsolása</label>
                        <input class="form-check-input m-2 switch manualClimate" {{ $data['coolingState']->state == 1 ? 'checked' : '' }} type="checkbox">
                        <label class="form-check-label m-2">Fűtés manuális bekapcsolása</label>
                        <input class="form-check-input m-2 switch manualHeater" {{ $data['heatingState']->state == 1 ? 'checked' : '' }} type="checkbox">
                    </div>
                </div>

            </div>
    </div>
</div>  
@endsection