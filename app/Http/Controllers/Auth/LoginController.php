<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Mail\AktivasiLogin;
use Illuminate\Support\Facades\Mail;
use DB;
use Hash;


class LoginController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLogin()
    {
        return view('template.front_login.login');
    }

    public function postLogin(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Attempt to log the user in
        // Passwordnya pake bcrypt
        if (Auth::check()) { }

        if (Auth::guard('penampung')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            return redirect()->intended('/penampung/donasi');
        } else if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 2])) {
            return redirect()->intended('/admin/dashboard-admin');
        } else {
            return redirect()->intended('/login')->with(['error'=>'Email atau Password Salah !']);
        }
    }

    public function logout()
    {
        if (Auth::guard('penampung')->check()) {
            Auth::guard('penampung')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        return redirect('/');
    }
}
