<?php

namespace App\Models\Devices\Climate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorToDisplay extends Model
{
    public $timestamps = false;
    public $table = 'sensor_to_display';
    protected $fillable = ['selected_sensor'];
}
