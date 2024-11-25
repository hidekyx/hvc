<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\History;
use Illuminate\View\View;

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
}
