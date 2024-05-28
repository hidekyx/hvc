<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageSettingController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Page Setting',
                    'data' => Content::get(),
                ];

                return view('dashboard.page-setting.index')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function edit($key)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Page Setting',
                    'data' => Content::where('key', $key)->firstOrFail(),
                    'collection' => Collection::orderByDesc('id_collection')->get(),
                ];

                return view('dashboard.page-setting.edit')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function update(Request $request, $key)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $pageSetting = Content::where('key', $key)->firstOrFail();
            
                if($key == "home_logo") {
                    $filenameWithExt = $request->file("value")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("value")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("value")->storeAs('public/content', $filenameSimpan);
                    $pageSetting->value = $filenameSimpan;
                    $pageSetting->save();
                }

                else {
                    $pageSetting->fill($request->all());
                    $pageSetting->save();
                }

                Session::flash('success', 'Page setting updated');
                return redirect('/dashboard/page-setting');
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
