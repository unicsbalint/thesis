<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CoolingStatistics extends Model
{
    public static function last24Hour(){
        $data = DB::select(DB::raw("

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

    public static function last7days(){
        $data = DB::select(DB::raw("
           
        "));

        $result = [];
        foreach($data as $d){
            $temp = [];
            array_push($temp,$d->result_date);
            array_push($temp,$d->temperature);
            array_push($result,$temp);
        }
        
        return $result;
    }

    public static function lastMonth(){
        $data = DB::select(DB::raw("
       
        "));

        $result = [];
        foreach($data as $d){
            $temp = [];
            array_push($temp,$d->result_date);
            array_push($temp,$d->temperature);
            array_push($result,$temp);
        }
        
        return $result;
    }

}
