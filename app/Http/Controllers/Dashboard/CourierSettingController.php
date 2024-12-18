<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;    
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourierSettingController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Courier Setting',
                    'data' => Courier::orderByDesc('id_courier')->get(),
                ];

                return view('dashboard.courier-setting.index')->with($view);
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
                    'page' => 'Courier Setting',
                ];

                return view('dashboard.courier-setting.create')->with($view);
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
                $courierSetting = new Courier($request->all());
                $courierSetting->save();

                Session::flash('success', 'Courier setting stored');
                return redirect('/dashboard/courier-setting');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function edit($idCourier)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Courier Setting',
                    'data' => Courier::findOrFail($idCourier),
                ];

                return view('dashboard.courier-setting.edit')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function update(Request $request, $idCourier)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $courierSetting = Courier::findOrFail($idCourier);
                $courierSetting->fill($request->all());
                $courierSetting->save();

                Session::flash('success', 'Courier setting updated');
                return redirect('/dashboard/courier-setting');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function delete($idCourier)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $courierSetting = Courier::findOrFail($idCourier);
                $courierSetting->delete();

                Session::flash('success', 'Courier setting deleted');
                return redirect('/dashboard/courier-setting');
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
