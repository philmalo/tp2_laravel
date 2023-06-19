<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('auth.index');
    }

    public function authentification(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $infos = $request->only('email', 'password');

        if(!Auth::validate($infos)){

            return redirect()->back()->withErrors(trans('auth.failed'));
        }

        if(Auth::attempt($infos)){

            return redirect()->intended(route('etudiants.index'));
        }

        else{

            return redirect()->back()->withErrors(trans('auth.failed'));
        }

        $usager = Auth::getProvider()->retrieveByCredentials($infos);

        Auth::login($usager);

        return redirect(route('etudiants.index'));
    }

    public function logout() {
        Auth::logout();

        return redirect(route('login'));
    }


}
