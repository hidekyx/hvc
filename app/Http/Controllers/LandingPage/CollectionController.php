<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Content;
use App\Models\Review;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CollectionController extends Controller
{
    public function national(): View
    {
        $view = [
            'page' => 'Our Collection',
            'category' => 'National',
            'content' => Content::pluck('value', 'key')->toArray(),
            'collection' => Collection::where('category', 'National')->orderByDesc('id_collection')->paginate(6),
            'review' => Review::orderByDesc('id_review')->limit(3)->get(),
            'bestSellers' => TransactionDetail::select('id_collection', DB::raw('COUNT(*) as total'))
                ->whereHas('transaction', function ($query) {
                    $query->where('status', "Finished");
                })->groupBy('id_collection')->orderByDesc('total')->take(6)->get(),
        ];

        return view('landing-page.collection.index')->with($view);
    }

    public function international(): View
    {
        $view = [
            'page' => 'Our Collection',
            'category' => 'International',
            'content' => Content::pluck('value', 'key')->toArray(),
            'collection' => Collection::where('category', 'International')->orderByDesc('id_collection')->paginate(6),
            'review' => Review::orderByDesc('id_review')->limit(3)->get(),
        ];

        return view('landing-page.collection.index')->with($view);
    }
}
