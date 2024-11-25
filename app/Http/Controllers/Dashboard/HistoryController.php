<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HistoryController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Histories Management',
                    'data' => History::get(),
                ];

                return view('dashboard.histories.index')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Histories Management',
                    'collection' => Collection::get(),
                ];

                return view('dashboard.histories.create')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $history = new History($request->all());

                if($request->file('img_1')) {
                    $filenameWithExt = $request->file("img_1")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_1")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_1")->storeAs('public/history', $filenameSimpan);
                    $history->img_1 = $filenameSimpan;
                }

                if($request->file('img_2')) {
                    $filenameWithExt = $request->file("img_2")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_2")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_2")->storeAs('public/history', $filenameSimpan);
                    $history->img_2 = $filenameSimpan;
                }

                if($request->file('img_3')) {
                    $filenameWithExt = $request->file("img_3")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_3")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_3")->storeAs('public/history', $filenameSimpan);
                    $history->img_3 = $filenameSimpan;
                }

                if($request->file('img_4')) {
                    $filenameWithExt = $request->file("img_4")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_4")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_4")->storeAs('public/history', $filenameSimpan);
                    $history->img_4 = $filenameSimpan;
                }

                $history->save();

                if($request->get('id_collection')) {
                    foreach($request->get('id_collection') as $idCollection) {
                        $collection = Collection::findOrFail($idCollection);
                        $collection->id_history = $history->id_history;
                        $collection->save();
                    }
                }

                Session::flash('success', 'History stored');
                return redirect('/dashboard/histories');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function edit($idHistory)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Histories Management',
                    'data' => History::findOrFail($idHistory),
                    'collection' => Collection::get(),
                ];

                return view('dashboard.histories.edit')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function update(Request $request, $idHistory)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $history = History::findOrFail($idHistory);
                $history->fill($request->all());

                if($request->file('img_1')) {
                    $filenameWithExt = $request->file("img_1")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_1")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_1")->storeAs('public/history', $filenameSimpan);
                    $history->img_1 = $filenameSimpan;
                }

                if($request->file('img_2')) {
                    $filenameWithExt = $request->file("img_2")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_2")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_2")->storeAs('public/history', $filenameSimpan);
                    $history->img_2 = $filenameSimpan;
                }

                if($request->file('img_3')) {
                    $filenameWithExt = $request->file("img_3")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_3")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_3")->storeAs('public/history', $filenameSimpan);
                    $history->img_3 = $filenameSimpan;
                }

                if($request->file('img_4')) {
                    $filenameWithExt = $request->file("img_4")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_4")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_4")->storeAs('public/history', $filenameSimpan);
                    $history->img_4 = $filenameSimpan;
                }

                $history->save();

                if($request->get('id_collection')) {
                    foreach($request->get('id_collection') as $idCollection) {
                        $collection = Collection::findOrFail($idCollection);
                        $collection->id_history = $history->id_history;
                        $collection->save();
                    }
                }

                Session::flash('success', 'History updated');
                return redirect('/dashboard/histories');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function delete($idHistory)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $history = History::findOrFail($idHistory);
                $history->delete();

                Session::flash('success', 'History deleted');
                return redirect('/dashboard/histories');
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
