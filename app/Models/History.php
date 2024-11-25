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

    // RELATION

    // SCOPE   

    // ACCESSORS
    public static function getHighlight($id_collection)
    {
        $highlight = self::where('id_collection', $id_collection)->first();

        if($highlight) {
            return $highlight;
        }
        else { 
            $highlight = new Collection();
            return $highlight;
        }
    }
}
