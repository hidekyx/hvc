<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizSession extends Model
{
    protected $table = "quiz_session";
    protected $primaryKey = 'id_quiz_session';

    protected $fillable = [
        'id_user',
        'id_history',
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
