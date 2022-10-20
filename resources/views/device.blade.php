@extends('layouts.app')
@section('content')
@include('webcamModal')
<div class="container-sm ">
    <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#webcam">Biztonsági kamera 📷</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link settingsTab" data-bs-toggle="tab" href="#something">...</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content card-body">
                <div id="webcam" class="tab-pane active">
                    <button id="openStream" class="btn btn-success">Kamera megtekintése</button>
                    <hr>
                    <button class="btn btn-secondary takePicture">Kép készítése</button>
                </div>
                <div id="something" class="tab-pane"></div>
            </div>
    </div>
</div>
  
@endsection