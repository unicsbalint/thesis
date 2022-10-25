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
                    <li class="nav-item">
                        <a class="nav-link settingsTab" data-bs-toggle="tab" href="#curtain">Redőny 🌗</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content card-body">
                <!-- Ledek -->
                <div id="leds" class="tab-pane active">
                    <div class="form-check form-switch d-flex flex-column justify-content-center align-items-center">
                        <label class="form-check-label m-2">Nappali fény</label>
                        <input class="form-check-input m-2" type="checkbox" style="height: 2em; width: 4em;">
                    </div>
                    <hr>
                    <div class="form-check form-switch d-flex flex-column justify-content-center align-items-center">
                        <label class="form-check-label m-2">Hálószobai hangulatfény</label>
                        <input class="form-check-input m-2 livingRoomLedToggle" type="checkbox" style="height: 2em; width: 4em;">
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
                    Klíma / fűtés beállítása itt történik meg.
                </div>
                <!-- Redőny -->
                <div id="curtain" class="tab-pane">
                    A redőny fel / le húzását teszi lehetővé
                </div>
            </div>
    </div>
</div>  
@endsection