
@extends('layouts.app')
@section('content')

@if(Auth::user())
    <script>
        window.location = "/home";
    </script> 
@else
    @if($isHomeInited == 0)
        @include('init.init')
    @else
        @include('auth.login')
    @endif
@endif

@endsection
 