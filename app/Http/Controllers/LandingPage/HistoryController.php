<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Content;
use App\Models\History;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizSession;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HistoryController extends Controller
{
    public function grid($category): View
    {
        $view = [
            'page' => 'History',
            'category' => ucfirst($category),
            'content' => Content::pluck('value', 'key')->toArray(),
            'history' => History::where('category', ucfirst($category))->orderByDesc('id_history')->paginate(6),
        ];

        return view('landing-page.history.index')->with($view);
    }

    public function detail($category, $idHistory): View
    {
        $history = History::findOrFail($idHistory);
        $collection = Collection::where('id_history', $idHistory)->inRandomOrder()->limit(4)->get();

        $view = [
            'page' => 'History',
            'content' => Content::pluck('value', 'key')->toArray(),
            'collection' => $collection,
            'history' => $history,
            'question' => QuizQuestion::where('id_history', $idHistory)->get(),
        ];

        return view('landing-page.history.detail')->with($view);
    }

    public function quiz($idHistory)
    {
        if (Auth::check()) {
            $history = History::findOrFail($idHistory);

            $quizSessionCheck = QuizSession::where('id_user', Auth::id())->where('id_history', $idHistory)->where('status', 'Finished')->whereDate('created_at', Carbon::today())->first();

            if($quizSessionCheck) {
                Session::flash('error', 'Quiz ended, wait until tomorrow to try again');
                return redirect('/history/'.strtolower($history->category).'/detail/'.$idHistory);
            }

            $quizSession = new QuizSession();
            $quizSession->id_user = Auth::id();
            $quizSession->id_history = $idHistory;
            $quizSession->status = "Unfinished";
            $quizSession->save();

            $view = [
                'page' => 'Quiz',
                'history' => $history,
                'content' => Content::pluck('value', 'key')->toArray(),
                'question' => QuizQuestion::where('id_history', $idHistory)->get(),
                'session' => $quizSession,
            ];

            return view('landing-page.history.quiz')->with($view);
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function quizSubmit(Request $request, $idHistory, $idQuizSession)
    {
        if (Auth::check()) {
            $history = History::findOrFail($idHistory);
            $quizSessionCheck = QuizSession::where('id_user', Auth::id())->where('id_history', $idHistory)->where('status', 'Finished')->whereDate('created_at', Carbon::today())->first();

            if($quizSessionCheck) {
                Session::flash('error', 'Quiz ended, wait until tomorrow to try again');
                return redirect('/history/'.strtolower($history->category).'/detail/'.$idHistory);
            }

            $answer = $request->get('answer');
            if($answer) {
                $correctAnswer = 0;
                foreach ($answer as $index => $a) {
                    $totalQuestion = QuizQuestion::where('id_history', $idHistory)->count();
                    $checkAnswer = QuizAnswer::where('id_quiz_question', $index)->where('id_quiz_answer', $a)->pluck('is_correct')->first();
                    $correctAnswer += $checkAnswer;
                }
    
                $score = $correctAnswer * 100 / $totalQuestion;
                if($score == 100) {
                    $voucher = new Voucher();
    
                    $categoryArray = array('Diskon 5 Persen', 'Gratis Ongkir');
                    $voucher->category = ($categoryArray[array_rand($categoryArray)]);
                    $voucher->id_user = Auth::id();
                    $voucher->id_history = $idHistory;
                    $voucher->status = "Unused";
                    $voucher->save();
                }
            }

            $quizSession = QuizSession::findOrFail($idQuizSession);
            $quizSession->status = "Finished";
            $quizSession->save();

            return response()->json([
                'voucher' => $voucher ?? null,
                'score' => $score ?? 0
            ]);
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }
}
