<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class HomeAction extends Model
{
    public $timestamps = false;
    public $table = 'home_actions';


    public static function logActionStart($device){
        $homeAction = new HomeAction();
        $homeAction->device = $device;
        $homeAction->interval1 = date("Y-m-d H:i:s");
        $homeAction->save();
    }

    public static function logActionEnd($device){
        $homeAction = HomeAction::select('*')->where('device',$device)->whereNull('interval2')->first();
        $homeAction->interval2 = date("Y-m-d H:i:s");
        $homeAction->save();
    }

    public static function logMultipleActionEnd($device){
        HomeAction::where('device',$device)->whereNull('interval2')->update(['interval2' => date("Y-m-d H:i:s")]);
    }
}
