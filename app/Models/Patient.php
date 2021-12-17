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
    ];
    protected $casts = [
        'nacimiento' => 'date',
    ];
    public function order_payments()
    {
        return $this->hasMany(Order_payment::class,  'patient_id');
    }
}
