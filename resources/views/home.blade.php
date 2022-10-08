@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="logoWrapper">
            <div class="logo"><img src="{{asset('images/logo.png')}}" alt="logo"></div>
        </div>

        <hr>

        <div class="container text-center">    
            <div class="row">
                <div class="col-sm-3 d-flex flex-column">
                    <div class="menuPoint d-flex flex-column">
                        <a class="menuLink" href="/devices">
                            <img src="{{asset('images/home.png')}}" alt="CSB Cloud" class="menuWrapper">
                        </a>   
                        <div class="mt-auto border-top">{{ $homeName }} eszközei</div> 
                    </div>
                </div>

                <div class="col-sm-3 d-flex flex-column">
                    <div class="menuPoint d-flex flex-column">
                        <a class="menuLink" href="/cloud">
                            <img src="{{asset('images/cloud.png')}}" alt="CSB Cloud" class="menuWrapper">
                        </a> 
                        <div class="mt-auto border-top">{{ $homeName }} Cloud</div>                    
                    </div>   
                </div>

                <div class="col-sm-3 d-flex flex-column">
                    <div class="menuPoint d-flex flex-column">
                        <a class="menuLink" href="/devices">
                            <img src="{{asset('images/settings.png')}}" alt="CSB Cloud" class="menuWrapper">
                        </a>   
                        <div class="mt-auto border-top">{{ $homeName }} Beállításai</div> 
                    </div>
                </div>

                <div class="col-sm-3 d-flex flex-column">
                    <div class="menuPoint d-flex flex-column">
                        <a class="menuLink" href="/devices">
                            <img src="{{asset('images/statistics.png')}}" alt="CSB Cloud" class="menuWrapper">
                        </a>   
                        <div class="mt-auto border-top">{{ $homeName }} Statisztikák</div> 
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>
@endsection
