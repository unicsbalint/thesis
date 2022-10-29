<?php

namespace App\Models\Devices\Leds;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedState extends Model
{
    public $timestamps = false;
    public $table = 'led_states';
    protected $fillable = ['state'];
}
