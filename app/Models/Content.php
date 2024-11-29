<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = "content";
    protected $primaryKey = 'id_content';
    public $timestamps = false;
    
    protected $fillable = [
        'key',
        'value',
    ];
}
