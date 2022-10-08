@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="logoWrapper">
            <div class="logo"><img src="{{asset('images/logo.png')}}" alt="logo"></div>
        </div>

        <div class="container text-center">    
            <div class="row">
                <div class="col-sm-3">
                    <a class="menuLink" href="/devices">
                        <img src="{{asset('images/home.png')}}" alt="CSB Cloud" class="cloudLogoWrapper">
                        <div>{{ $homeName }} eszközei</div> 
                    </a>                   
                </div>

                <div class="col-sm-3">
                    <a class="menuLink" href="/cloud">
                        <img src="{{asset('images/cloud.png')}}" alt="CSB Cloud" class="cloudLogoWrapper">
                        <p>{{ $homeName }} Cloud</p> 
                    </a>                   
                </div>

                <div class="col-sm-3">
                    <a class="menuLink" href="/settings">
                        <img src="{{asset('images/cloud.png')}}" alt="CSB Cloud" class="cloudLogoWrapper">
                        <p>{{ $homeName }} Beállításai</p> 
                    </a>
                </div>

                <div class="col-sm-3">
                    <a class="menuLink" href="/statistics">
                        <img src="{{asset('images/cloud.png')}}" alt="CSB Cloud" class="cloudLogoWrapper">
                        <p>{{ $homeName }} Statisztikák</p> 
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
