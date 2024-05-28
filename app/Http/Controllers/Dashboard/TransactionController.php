<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Transactions Management',
                    'data' => Transaction::get(),
                ];

                return view('dashboard.transactions.index')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function deliver($idTransaction)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $transaction = Transaction::findOrFail($idTransaction);

                $receipt = rand(100000,999999);
                $transaction->status = "Delivering";
                $transaction->delivering_at = date('Y-m-d H:i:s');
                $transaction->receipt = $receipt;
                $transaction->save();

                Session::flash('success', 'Items of transaction delivered');
                return redirect('/dashboard/transactions');
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
