<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    protected $primaryKey = 'id_cart';
    
    protected $fillable = [
        'id_user',
        'id_collection',
        'quantity',
        'size',
        'color',
        'status',
    ];

    // RELATION
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'id_collection', 'id_collection');
    }

    // SCOPE   
    public function scopeWaiting($query)
    {
        $query->where('status', 'Waiting');
    }

    public function scopeProcessed($query)
    {
        $query->where('status', 'Processed');
    }

    public function scopeFinished($query)
    {
        $query->where('status', 'Finished');
    }

    // ACCESSORS
    public static function getTotalCart($idUser)
    {
        $totalCart = self::where('id_user', $idUser)->where('status', 'Waiting')->count();

        if($totalCart) {
            return $totalCart;
        }
        else { 
            return null;
        }
    }
}
