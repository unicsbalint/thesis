<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TemperatureStatistics extends Model
{
    public $timestamps = false;
    public $table = 'sensor_date';

    public static function last24Hour(){
        $data = DB::select(DB::raw("
        SELECT DATE_FORMAT(result_date,'%Y-%m-%d %H:00') result_date, ROUND(AVG(result),2) temperature
        FROM csbhome.sensor_data
        WHERE sensor = 'temperature'
        GROUP BY DATE_FORMAT(result_date,'%Y-%m-%d %H:00')
        "));

        $result = [];
        foreach($data as $d){
            $temp = [];
            array_push($temp,explode(' ',$d->result_date)[1]);
            array_push($temp,$d->temperature);
            array_push($result,$temp);
        }
        
        return $result;
    }

}
