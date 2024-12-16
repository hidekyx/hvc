<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Content;
use App\Models\History;
use App\Models\QuizQuestion;
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

            $view = [
                'page' => 'Quiz',
                'history' => $history,
                'content' => Content::pluck('value', 'key')->toArray(),
                'question' => QuizQuestion::where('id_history', $idHistory)->get(),
            ];

            return view('landing-page.history.quiz')->with($view);
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function quizSubmit(Request $request)
    {
        if (Auth::check()) {
            dd($request->all());

            // return view('landing-page.history.quiz')->with($view);
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }
}
