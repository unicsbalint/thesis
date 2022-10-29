<?php

namespace App\Models\Devices\Climate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    public $timestamps = false;
    public $table = 'sensor_data';
    protected $fillable = ['sensor','result_date'];
}
