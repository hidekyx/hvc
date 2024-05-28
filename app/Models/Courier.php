<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $table = "courier";
    protected $primaryKey = 'id_courier';
    
    protected $fillable = [
        'name',
        'price',
    ];

    // RELATION

    // SCOPE   
}
