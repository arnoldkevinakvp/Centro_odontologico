<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odontogram extends Model
{
    protected $table = 'odontograms';
    protected $fillable = [        
        'FechaRegistro',
    ];
    protected $casts = [
        'FechaRegistro' => 'date',
    ];
}
