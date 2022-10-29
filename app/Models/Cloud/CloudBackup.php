<?php

namespace App\Models\Cloud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloudBackup extends Model
{
    public $timestamps = false;
    public $table = 'backup_settings';
}
