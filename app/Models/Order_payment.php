<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_payment extends Model
{
    protected $table = 'order_payments';
    protected $with = 'patient';
    protected $fillable = [        
        'patient_id',
        'description',
        'monto',          
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
