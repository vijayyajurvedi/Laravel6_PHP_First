<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    //

    public   function __construct()
    {
            $this->middleware('auth');
    }

    public function index()
    {
        # code...
        return view('auth.passwords.change');
    }


    public function changepassword(Request $request)
    {
        $passwordAttributes = [
            'oldpassword' => 'required',
            'password' => 'required|confirmed'

        ];

        $this->validate($request, $passwordAttributes);

        $hashedpassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedpassword)) {
            # code...
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('sucessMsg', 'Password Updated Sucessfully');
        } else {

            return redirect()->back()->with('errorMsg', 'Current Password is invalid');
        }
    }
}
