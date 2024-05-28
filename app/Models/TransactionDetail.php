<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = "transaction_detail";
    protected $primaryKey = 'id_transaction_detail';
    
    protected $fillable = [
        'id_transaction',
        'id_user',
        'id_collection',
        'quantity',
        'size',
        'color',
    ];

    // RELATION
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction', 'id_transaction');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'id_collection', 'id_collection');
    }

    // SCOPE   
}
