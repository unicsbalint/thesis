<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class HeatingStatistics extends Model
{
    public static function last24Hour(){
        $data = DB::select(DB::raw("
            SELECT ROUND(SUM(TIMESTAMPDIFF(SECOND,interval1, interval2) / 60),2) val, 
            DATE_FORMAT(interval1,'%H:00') result_date FROM csbhome.home_actions
            WHERE device = 'heating'
            AND (interval1 - INTERVAL 24 HOUR < CURRENT_TIMESTAMP() OR interval2 - INTERVAL 24 HOUR < CURRENT_TIMESTAMP())
            GROUP BY DATE_FORMAT(interval1,'%Y-%m-%d %H:00')
        "));

        $result = [];
        foreach($data as $d){
            $temp = [];
            array_push($temp,$d->result_date);
            array_push($temp,floatval($d->val));
            array_push($result,$temp);
        }
        
        return $result;
    }

    public static function last7days(){
        $data = DB::select(DB::raw("
        SELECT ROUND(SUM(TIMESTAMPDIFF(SECOND,interval1, interval2) / 60),2) val, 
        DATE_FORMAT(interval1,'%Y-%m-%d') result_date FROM csbhome.home_actions
        WHERE device = 'heating'
        AND (interval1 - INTERVAL 7 DAY < CURRENT_TIMESTAMP() OR interval2 - INTERVAL 7 DAY < CURRENT_TIMESTAMP())
        GROUP BY DATE_FORMAT(interval1,'%Y-%m-%d')
        "));

        $result = [];
        foreach($data as $d){
            $temp = [];
            array_push($temp,$d->result_date);
            array_push($temp,floatval($d->val));
            array_push($result,$temp);
        }
        
        return $result;
    }

    public static function lastMonth(){
        $data = DB::select(DB::raw("
            SELECT ROUND(SUM(TIMESTAMPDIFF(SECOND,interval1, interval2) / 60),2) val, 
            DATE_FORMAT(interval1,'%Y-%m-%d') result_date FROM csbhome.home_actions
            WHERE device = 'heating'
            AND (interval1 - INTERVAL 1 MONTH < CURRENT_TIMESTAMP() OR interval2 - INTERVAL 1 MONTH < CURRENT_TIMESTAMP())
            GROUP BY DATE_FORMAT(interval1,'%Y-%m-%d')
        "));

        $result = [];
        foreach($data as $d){
            $temp = [];
            array_push($temp,$d->result_date);
            array_push($temp,floatval($d->val));
            array_push($result,$temp);
        }
        
        return $result;
    }

}
