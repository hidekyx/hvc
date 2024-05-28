<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        } else {
            $view = [
                'page' => 'Auth',
            ];

            return view('landing-page.auth.login')->with($view);
        }
    }

    public function loginAction(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string',
        ];

        $messages = [
            'email.required'        => 'Email is needed',
            'email.email'           => 'Email is not valid',
            'password.required'     => 'Password is needed',
            'password.string'       => 'Password needs to be string',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errorMessages = implode('<br>', $validator->errors()->all());
            Session::flash('error', $errorMessages);
            return redirect()->back()->withInput();
        }

        $user = User::where('email', $request->input('email'))->first();
        if ($user && $user->active == "N") {
            Session::flash('error', 'Your account is blocked');
            return redirect('/login');
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        $remember = $request->remember ? true : false;

        Auth::attempt($data, $remember);

        if (Auth::check()) {
            User::where('id_user', Auth::user()->id_user)->update(['lastlog' => \Carbon\Carbon::now()]);
            if (Auth::user()->role == "Admin") {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        } else {
            Session::flash('error', 'Email or password is wrong');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        if (Auth::check()) {
            if (Auth::user()->role == "Admin") {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        } else {
            $view = [
                'page' => 'Auth',
            ];

            return view('landing-page.auth.register')->with($view);
        }
    }

    public function registerAction(Request $request)
    {
        $rules = [
            'email'                 => 'required|email|unique:user',
            'password'              => 'required|string',
            'name'                  => 'required|string',
            'no_telp'               => 'required|numeric',
        ];

        $messages = [
            'email.required'        => 'Email is needed',
            'email.email'           => 'Email is not valid',
            'email.unique'          => 'Email is taken',
            'password.required'     => 'Password is needed',
            'password.string'       => 'Password needs to be string',
            'name.required'         => 'Full name is needed',
            'name.string'           => 'Full name needs to be string',
            'no_telp.required'      => 'Phone number is needed',
            'no_telp.numeric'       => 'Phone number needs to be numeric',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errorMessages = implode('<br>', $validator->errors()->all());
            Session::flash('error', $errorMessages);
            return redirect()->back()->withInput();
        }

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'no_telp' => $request->get('no_telp'),
            'role' => "Customer",
            'active' => "Y",
        ]);

        if ($user->save()) {
            Session::flash('success', 'Please login again');
            return redirect('/login');
        }
    }
}
