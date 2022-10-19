@extends('layouts.app')
@section('content')
<div class="container-sm">
    <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#userSettings">Felhasználói profil beállításai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#homeSettings">Otthon beállításai</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content card-body">
                <div id="userSettings" class="tab-pane active">
                    <h6>Név megváltoztatása</h6>
                    <hr>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <div class="input-group mb-3 w-75">
                            <input type="text" class="form-control" placeholder="{{ $userData->name }}" value="{{ $userData->name }}">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Név beállítása</button>
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
                <div id="homeSettings" class="tab-pane">Otthon beállításai</div>
            </div>
    </div>
</div>
  
@endsection