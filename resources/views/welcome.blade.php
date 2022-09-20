
@extends('layouts.app')
@section('content')

@if(Auth::user())
    <div 
    style="padding: 20px; color: white; font-weight: bold; background-color: gray; border 1px solid black;width: 100px; cursor: pointer;text-align: center;" 
    class="tester">
        Blink the led
    </div>
@else
    @if($isHomeInited == 0)
        @include('init.init')
    @else
        login
    @endif
@endif

@endsection
 