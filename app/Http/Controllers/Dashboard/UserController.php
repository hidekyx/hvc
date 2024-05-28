<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;    
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Users Management',
                    'data' => User::get(),
                ];

                return view('dashboard.users.index')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function edit($idUser)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Users Management',
                    'data' => User::findOrFail($idUser),
                ];

                return view('dashboard.users.edit')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function update(Request $request, $idUser)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $user = User::findOrFail($idUser);
                $user->fill($request->all());
                $user->save();

                Session::flash('success', 'User updated');
                return redirect('/dashboard/users');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function password($idUser)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $view = [
                    'page' => 'Users Management',
                    'data' => User::findOrFail($idUser),
                ];

                return view('dashboard.users.password')->with($view);
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function passwordAction(Request $request, $idUser)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $rules = [
                    'password'              => 'confirmed',
                ];
        
                $messages = [
                    'password.confirmed'    => 'Password confirmation is wrong',
                ];
        
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    $errorMessages = implode('<br>', $validator->errors()->all());
                    Session::flash('error', $errorMessages);
                    return redirect()->back()->withInput();
                }

                $user = User::findOrFail($idUser);
                $user->password = bcrypt($request->get('password'));
                $user->save();

                Session::flash('success', 'User password updated');
                return redirect('/dashboard/users');
            } else {
                Session::flash('error', 'You are not authorized to access this page');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function delete($idUser)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                $user = User::findOrFail($idUser);
                $user->delete();

                Session::flash('success', 'User deleted');
                return redirect('/dashboard/users');
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
