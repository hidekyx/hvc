<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CollectionController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Collections Management',
                    'data' => Collection::get(),
                ];

                return view('dashboard.collections.index')->with($view);
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
                    'page' => 'Collections Management',
                ];

                return view('dashboard.collections.create')->with($view);
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
                $collection = new Collection($request->all());
                $collection->size = implode(', ', $request->get('size'));
                $collection->color = implode(', ', array_column(json_decode($request->get('color'), true), 'value'));

                if($request->file('img_1')) {
                    $filenameWithExt = $request->file("img_1")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_1")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_1")->storeAs('public/collection', $filenameSimpan);
                    $collection->img_1 = $filenameSimpan;
                }

                if($request->file('img_2')) {
                    $filenameWithExt = $request->file("img_2")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_2")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_2")->storeAs('public/collection', $filenameSimpan);
                    $collection->img_2 = $filenameSimpan;
                }

                if($request->file('img_3')) {
                    $filenameWithExt = $request->file("img_3")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_3")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_3")->storeAs('public/collection', $filenameSimpan);
                    $collection->img_3 = $filenameSimpan;
                }

                if($request->file('img_4')) {
                    $filenameWithExt = $request->file("img_4")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_4")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_4")->storeAs('public/collection', $filenameSimpan);
                    $collection->img_4 = $filenameSimpan;
                }

                $collection->save();

                Session::flash('success', 'Collection stored');
                return redirect('/dashboard/collections');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function edit($idCollection)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Collections Management',
                    'data' => Collection::findOrFail($idCollection),
                ];

                return view('dashboard.collections.edit')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function update(Request $request, $idCollection)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $collection = Collection::findOrFail($idCollection);
                $collection->fill($request->all());
                $collection->size = implode(', ', $request->get('size'));
                $collection->color = implode(', ', array_column(json_decode($request->get('color'), true), 'value'));

                if($request->file('img_1')) {
                    $filenameWithExt = $request->file("img_1")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_1")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_1")->storeAs('public/collection', $filenameSimpan);
                    $collection->img_1 = $filenameSimpan;
                }

                if($request->file('img_2')) {
                    $filenameWithExt = $request->file("img_2")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_2")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_2")->storeAs('public/collection', $filenameSimpan);
                    $collection->img_2 = $filenameSimpan;
                }

                if($request->file('img_3')) {
                    $filenameWithExt = $request->file("img_3")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_3")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_3")->storeAs('public/collection', $filenameSimpan);
                    $collection->img_3 = $filenameSimpan;
                }

                if($request->file('img_4')) {
                    $filenameWithExt = $request->file("img_4")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("img_4")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("img_4")->storeAs('public/collection', $filenameSimpan);
                    $collection->img_4 = $filenameSimpan;
                }

                $collection->save();

                Session::flash('success', 'Collection updated');
                return redirect('/dashboard/collections');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function delete($idCollection)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $collection = Collection::findOrFail($idCollection);
                $collection->delete();

                Session::flash('success', 'Collection deleted');
                return redirect('/dashboard/collections');
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
