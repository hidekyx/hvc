<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $view = [
                'page' => 'Profile',
                'content' => Content::pluck('value', 'key')->toArray(),
            ];
    
            return view('landing-page.profile.index')->with($view);
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function profileUpdate(Request $request, $idUser)
    {
        if (Auth::check()) {
            if(Auth::id() != $idUser) {
                Session::flash('error', 'Can only change your profile data');
                return redirect('/profile');    
            }

            $user = User::findOrFail($idUser);
            $user->fill($request->all());

            if($request->file('avatar')) {
                $filenameWithExt = $request->file("avatar")->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file("avatar")->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $path = $request->file("avatar")->storeAs('public/avatar', $filenameSimpan);
                $user->avatar = $filenameSimpan;
            }

            $user->save();

            Session::flash('success', 'Profile data updated');
            return redirect('/profile');
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }
}
