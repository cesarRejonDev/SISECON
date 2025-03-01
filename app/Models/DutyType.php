<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DutyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym',
        'word_template_url',
    ];
}
