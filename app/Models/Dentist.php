<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
    protected $table = 'dentists';
    protected $fillable = [        
        'number',
        'name',
        'address',
        'email',
        'telephone',
        'nacimiento',
        'description',
        'sexo',
    ];
    protected $casts = [
        'nacimiento' => 'date',
    ];
}
