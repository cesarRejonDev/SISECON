<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'folio_number',
        'duty_date',
        'duty_type_id',
        'client_id',
        'created_by',
        'file_url',
        'status',
        'ulid',
    ];

    public function incidents()
    {
        return $this->belongsToMany(Incident::class, 'duty_incidents')
            ->withTimeStamps();
    }

    public function dutyType()
    {
        return $this->belongsTo(DutyType::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
