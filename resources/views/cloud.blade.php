
@extends('layouts.app')
@section('content')

<!-- <li class="dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <button class="uploadButton"></button>
    </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item">
            asd
        </a>
    </div>
</li> -->

<div class="container text-center">
        <button class="previousLocation btn btn-light" data-back="/">Vissza</button>
        <div class="cloudLocation">/</div> 
        <div class="cloud">
            <div class="directoryData row">
                No data to display 
            </div>
        </div>

        <button class="uploadButton"></button>
</div>
@endsection
 