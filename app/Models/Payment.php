<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payment";
    protected $primaryKey = 'id_payment';
    
    protected $fillable = [
        'name',
        'account_holder',
        'account_number',
        'account_qris',
    ];

    // RELATION

    // SCOPE   
}
