<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeInited extends Model
{
    public $timestamps = false;
    public $table = 'init_home';
    protected $fillable = ['inited'];
}
