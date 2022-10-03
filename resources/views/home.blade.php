@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div 
                    style="padding: 20px; color: white; font-weight: bold; background-color: gray; border 1px solid black;width: 100px; cursor: pointer;text-align: center;" 
                    class="tester">
                    {{ $homeName }}
                    </div> 

                    <div> {{ $homeName }} Cloud</div>
                    <div> {{ $homeName }} beállításai</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
