<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transaction";
    protected $primaryKey = 'id_transaction';
    
    protected $fillable = [
        'id_user',
        'id_courier',
        'id_payment',
        'status',
        'address',
        'receipt',
        'proof',
        'packaging_at',
        'delivering_at',
        'finished_at',
    ];

    // RELATION
    public function detail()
    {
        return $this->hasMany(TransactionDetail::class, 'id_transaction');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'id_courier', 'id_courier');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment', 'id_payment');
    }

    // SCOPE
    public function scopeFinished($query)
    {
        $query->where('status', 'Finished');
    }
}
