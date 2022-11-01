<?php

namespace App\Models\Devices\Climate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClimateState extends Model
{
    public $timestamps = false;
    public $table = 'climate_state';
    protected $fillable = ['state'];
}
