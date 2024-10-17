<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym',
        'description',
        'avatar',
        'ulid',
        'tag_id',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
