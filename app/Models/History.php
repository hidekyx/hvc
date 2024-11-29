<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "history";
    protected $primaryKey = 'id_history';

    protected $fillable = [
        'name',
        'category',
        'description',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
    ];
}
