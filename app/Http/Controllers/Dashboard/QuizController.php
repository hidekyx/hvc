<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function index($idHistory)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Quiz Management',
                    'history' => History::findOrFail($idHistory),
                    'quiz' => QuizQuestion::where('id_history', $idHistory)->get(),
                ];

                return view('dashboard.quizzes.index')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function create($idHistory)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Quiz Management',
                    'history' => History::findOrFail($idHistory),
                ];

                return view('dashboard.quizzes.create')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function store(Request $request, $idHistory)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $quizQuestion = QuizQuestion::create([
                    'id_history' => $idHistory,
                    'question' => $request->get('question')
                ]);
                $quizQuestion->save();

                QuizAnswer::create([
                    'id_quiz_question' => $quizQuestion->id_quiz_question,
                    'answer' => $request->get('answer')['correct'],
                    'is_correct' => true,
                ]);

                foreach ($request->get('answer')['wrong'] as $wrong) {
                    QuizAnswer::create([
                        'id_quiz_question' => $quizQuestion->id_quiz_question,
                        'answer' => $wrong,
                        'is_correct' => false,
                    ]);
                }

                Session::flash('success', 'Quiz stored');
                return redirect('/dashboard/histories/quiz/'.$idHistory);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function edit($idHistory, $idQuizQuestion)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {

                $question = QuizQuestion::findOrFail($idQuizQuestion);
                $view = [
                    'page' => 'Quizzes Management',
                    'history' => History::findOrFail($idHistory),
                    'question' => $question,
                    'correctAnswer' => $question->correctAnswer(),
                    'wrongAnswers' => $question->wrongAnswer(),
                ];

                return view('dashboard.quizzes.edit')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function update(Request $request, $idHistory, $idQuizQuestion)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $quizQuestion = QuizQuestion::findOrFail($idQuizQuestion);
                $quizQuestion->question = $request->get('question');
                $quizQuestion->save();

                $quizAnswer = QuizAnswer::where('id_quiz_question', $idQuizQuestion)->get();
                foreach ($quizAnswer as $a) {
                    $a->delete();
                }

                QuizAnswer::create([
                    'id_quiz_question' => $quizQuestion->id_quiz_question,
                    'answer' => $request->get('answer')['correct'],
                    'is_correct' => true,
                ]);

                foreach ($request->get('answer')['wrong'] as $wrong) {
                    QuizAnswer::create([
                        'id_quiz_question' => $quizQuestion->id_quiz_question,
                        'answer' => $wrong,
                        'is_correct' => false,
                    ]);
                }

                Session::flash('success', 'Quiz stored');
                return redirect('/dashboard/histories/quiz/'.$idHistory);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function delete($idHistory, $idQuizQuestion)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                History::findOrFail($idHistory);
                $quizAnswer = QuizAnswer::where('id_quiz_question', $idQuizQuestion)->get();
                foreach ($quizAnswer as $a) {
                    $a->delete();
                }

                $quizQuestion = QuizQuestion::findOrFail($idQuizQuestion);
                $quizQuestion->delete();

                Session::flash('success', 'Quiz deleted');
                return redirect('/dashboard/histories/quiz/'.$idHistory);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }
}
