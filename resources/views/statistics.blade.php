@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h6 class="display-6">Eszközhasználati szokások kimutatása</h6>
        <div class="row g-3">
            <div class="col-auto">
                <select class="form-control deviceSelect">
                    <option value="-" disabled selected>Eszköz vagy szenzor</option>
                    <option value="temperature">Hőmérséklet</option>
                    <option value="humidity">Páratartalom</option>
                    <option value="climate">Fűtés</option>
                    <option value="moodlight">Hangulatfény</option>
                    <option value="webcam">Webkamera</option>
                </select>
            </div>
            <div class="col-auto">
                <select class="form-control intervalSelect">
                    <option value="-" disabled selected>Kimutatás ideje</option>
                    <option value="last24hour">Előző 24 óra</option>
                    <option value="last7days">Előző 7 nap</option>
                    <option value="lastMonth">Előző 30 nap</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3 getStatistics">Statisztika mutatása</button>
            </div>
        </div>

        <div>
            <figure class="highcharts-figure">
                <div id="chartContainer"></div>
            </figure>
        </div>
    </div>
</div>
@endsection