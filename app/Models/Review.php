<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "review";
    protected $primaryKey = 'id_review';
    
    protected $fillable = [
        'id_user',
        'id_transaction_detail',
        'id_collection',
        'review',
        'rate',
        'img_1',
        'img_2',
        'img_3',
    ];

    // RELATION
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function detail()
    {
        return $this->belongsTo(TransactionDetail::class, 'id_transaction_detail', 'id_transaction_detail');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'id_collection', 'id_collection');
    }
}
