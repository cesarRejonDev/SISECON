<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DutyIncident extends Model
{
    use HasFactory;

    protected $fillable = [
        'duty_id',
        'incident_id',
    ];
}
