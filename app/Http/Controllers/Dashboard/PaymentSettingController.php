<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentSettingController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Payment Setting',
                    'data' => Payment::get(),
                ];

                return view('dashboard.payment-setting.index')->with($view);
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
                    'page' => 'Payment Setting',
                ];

                return view('dashboard.payment-setting.create')->with($view);
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
                $paymentSetting = new Payment();
                $paymentSetting->name = $request->get('name');

                if($request->payment_type == "payment_qris") {
                    $filenameWithExt = $request->file("account_qris")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("account_qris")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("account_qris")->storeAs('public/qris', $filenameSimpan);
                    $paymentSetting->account_qris = $filenameSimpan;
                    $paymentSetting->save();
                }

                else {
                    $paymentSetting->account_holder = $request->get('account_holder');
                    $paymentSetting->account_number = $request->get('account_number');
                    $paymentSetting->save();
                }

                Session::flash('success', 'Payment setting stored');
                return redirect('/dashboard/payment-setting');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function edit($idPayment)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Payment Setting',
                    'data' => Payment::findOrFail($idPayment),
                ];

                return view('dashboard.payment-setting.edit')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function update(Request $request, $idPayment)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $paymentSetting = Payment::findOrFail($idPayment);
                $paymentSetting->name = $request->get('name');
                
                if($request->payment_type == "payment_qris") {
                    $filenameWithExt = $request->file("account_qris")->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file("account_qris")->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $path = $request->file("account_qris")->storeAs('public/qris', $filenameSimpan);
                    $paymentSetting->account_qris = $filenameSimpan;
                    $paymentSetting->account_holder = null;
                    $paymentSetting->account_number = null;
                    $paymentSetting->save();
                }

                else {
                    $paymentSetting->account_holder = $request->get('account_holder');
                    $paymentSetting->account_number = $request->get('account_number');
                    $paymentSetting->account_qris = null;
                    $paymentSetting->save();
                }

                Session::flash('success', 'Payment setting updated');
                return redirect('/dashboard/payment-setting');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function delete($idPayment)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $paymentSetting = Payment::findOrFail($idPayment);
                $paymentSetting->delete();

                Session::flash('success', 'Payment setting deleted');
                return redirect('/dashboard/payment-setting');
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
