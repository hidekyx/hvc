<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Content;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $view = [
            'page' => 'Home',
            'content' => Content::pluck('value', 'key')->toArray(),
            'collection' => Collection::orderByDesc('id_collection')->limit(6)->get(),
        ];

        return view('landing-page.home.index')->with($view);
    }
}
