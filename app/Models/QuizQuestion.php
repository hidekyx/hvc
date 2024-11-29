<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $table = "quiz_question";
    protected $primaryKey = 'id_quiz_question';

    protected $fillable = [
        'id_history',
        'question',
        'is_correct',
        'is_enabled',
    ];

    // RELATION
    public function history()
    {
        return $this->belongsTo(History::class, 'id_history', 'id_history');
    }

    public function answer()
    {
        return $this->hasMany(QuizAnswer::class, 'id_quiz_question');
    }

    public function correctAnswer()
    {
        return $this->hasOne(QuizAnswer::class, 'id_quiz_question')->where('is_correct', true);
    }

    public function wrongAnswer()
    {
        return $this->hasMany(QuizAnswer::class, 'id_quiz_question')->where('is_correct', false);
    }
}
