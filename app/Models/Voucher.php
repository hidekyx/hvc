<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = "voucher";
    protected $primaryKey = 'id_voucher';
    
    protected $fillable = [
        'id_history',
        'id_user',
        'kategori',
        'status',
    ];

    // RELATION
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function history()
    {
        return $this->belongsTo(History::class, 'id_history', 'id_history');
    }
}
