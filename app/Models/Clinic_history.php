<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic_history extends Model
{
    protected $table = 'clinic_histories';
    protected $with = 'patient';
    protected $fillable = [
        'FechaApertura',
        'Description',
        'patient_id',
        'odontogram_id',
    ];
    protected $casts = [
        'FechaApertura' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
