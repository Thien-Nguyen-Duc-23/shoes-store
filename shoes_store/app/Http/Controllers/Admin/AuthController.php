<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login()
    {
        return view('admin.auth.login');
    }
    
    public function loginAdmin(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('admin')->user()->role_id == config('constants.admin') &&
                Auth::guard('admin')->user()->status == config('constants.active')) {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                Auth::guard('admin')->logout();
                return redirect()->back()->with(['flag' => 'danger', 'message' => 'You do not have this access!!!']);
            }
        }
        
        return redirect()->back()->with('error', 'Invalid Username or Password!')->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('auth.login');
    }
}
