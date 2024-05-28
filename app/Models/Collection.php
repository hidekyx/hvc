<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = "collection";
    protected $primaryKey = 'id_collection';

    protected $fillable = [
        'name',
        'price',
        'stock',
        'category',
        'description',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
    ];

    // RELATION

    // SCOPE   

    // ACCESSORS
    public static function getHighlight($id_collection)
    {
        return self::where('id_collection', $id_collection)->first();
    }
}
