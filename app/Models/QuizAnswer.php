<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    protected $table = "quiz_answer";
    protected $primaryKey = 'id_quiz_answer';

    protected $fillable = [
        'id_quiz_question',
        'answer',
        'is_correct',
    ];

    // RELATION
    public function question()
    {
        return $this->belongsTo(QuizQuestion::class, 'id_quiz_question', 'id_quiz_question');
    }
}
