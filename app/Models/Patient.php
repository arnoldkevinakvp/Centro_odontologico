<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = [        
        'number',
        'name',
        'address',
        'email',
        'telephone',
        'nacimiento',
        'sexo',
        'fecha',
    ];
    protected $casts = [
        'nacimiento' => 'date',
        'fecha' => 'date',
    ];
    public function order_payments()
    {
        return $this->hasMany(Order_payment::class,  'patient_id');
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class,  'patient_id');
    }
    public function clinic_history()
    {
        return $this->hasMany(Clinic_history::class,  'patient_id');
    }
    public function document()
    {
        return $this->hasMany(Document::class,  'patient_id');
    }
    
}
