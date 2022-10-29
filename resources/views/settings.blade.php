@extends('layouts.app')
@section('content')
<div class="container-sm settingsContainer">
    <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active settingsTab" data-bs-toggle="tab" href="#userSettings">Felhasználói profil beállításai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link settingsTab" data-bs-toggle="tab" href="#homeSettings">Otthon beállításai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link settingsTab" data-bs-toggle="tab" href="#cloudSettings">Cloud beállításai</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content card-body">
                <div id="userSettings" class="tab-pane active">
                    <h6>Név megváltoztatása</h6>
                    <hr>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <div class="input-group mb-3 w-75">
                            <input type="text" class="form-control" id="newUsername" placeholder="{{ $data['userData']->name }}" value="{{ $data['userData']->name }}">
                            <button class="btn btn-outline-secondary" id="changeUsername" type="button" id="button-addon2">Név beállítása</button>
                        </div>
                    </div>
                    <h6 class="mt-2">Jelszóváltoztatás</h6>
                    <hr>

                        <div class="form-group row m-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Jelenlegi jelszó</label>

                            <div class="col-md-6">
                                <input id="oldPassword" type="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row m-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Új jelszó</label>

                            <div class="col-md-6">
                                <input id="newPassword" type="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row m-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Új jelszó megerősítése</label>
    
                            <div class="col-md-6">
                                <input id="newPasswordConfirm" type="password" class="form-control">
                            </div>
                        </div>

                        <button id="changePassword" class="btn btn-outline-secondary">
                            Jelszó frissítése
                        </button>
                </div>
                <div id="homeSettings" class="tab-pane">
                    <h5>Otthon nevének megváltoztatása</h5>
                        <hr>
                        <div class="d-flex align-items-center justify-content-center w-100">
                            <div class="input-group mb-3 w-75">
                                <input type="text" class="form-control" id="newHomeName" placeholder="{{ $data['userData']->homeName }}" value="{{ $data['userData']->homeName }}">
                                <button class="btn btn-outline-secondary" id="changeHomeName" type="button" id="button-addon2">Név beállítása</button>
                            </div>
                        </div>

                    <h5>Hőmérséklet és páratartalom információ <br> megjelenítése a menüben</h5>
                        <hr>
                        <div class="d-flex flex-column align-items-center">
                        <select class="form-control w-50" id="sensorSelect">
                            <option {{ $data["selectedSensor"] == "disabled" ? 'selected' : '' }} value="disabled">Kikapcsolva</option>
                            <option {{ $data["selectedSensor"] == "temperature" ? 'selected' : '' }} value="temperature">Csak hőmérséklet</option>
                            <option {{ $data["selectedSensor"] == "humidity" ? 'selected' : '' }} value="humidity">Csak páratartalom</option>
                            <option {{ $data["selectedSensor"] == "both" ? 'selected' : '' }} value="both">Mindkettő</option>
                        </select>
                        <button id="sensorSelectBtn" class="btn btn-outline-secondary mt-3">Beállítás</button>
                    </div>
                        
                </div>

                <div id="cloudSettings" class="tab-pane">
                    <div class="d-flex flex-column align-items-center">
                        <h5>A felhőtárhelyedről készült biztonsági mentés:</h5>
                        <select class="form-control w-50" id="backupSelect">
                            <option {{ $data["backupInterval"] == "disabled" ? 'selected' : '' }} value="disabled">Kikapcsolva</option>
                            <option {{ $data["backupInterval"] == "everyFiveMinutes" ? 'selected' : '' }} value="everyFiveMinutes">Minden 5 percben</option>
                            <option {{ $data["backupInterval"] == "hourly" ? 'selected' : '' }} value="hourly">Óránként</option>
                            <option {{ $data["backupInterval"] == "daily" ? 'selected' : '' }} value="daily">Naponta 10 órakkor</option>
                            <option {{ $data["backupInterval"] == "weekly" ? 'selected' : '' }} value="weekly">Hetente</option>
                            <option {{ $data["backupInterval"] == "monthly" ? 'selected' : '' }} value="monthly">Havonta</option>
                        </select>
                        <button id="backupBtn" class="btn btn-outline-secondary mt-3">Beállítás</button>
                    </div>
                    
                </div>

            </div>
    </div>
</div>
  
@endsection