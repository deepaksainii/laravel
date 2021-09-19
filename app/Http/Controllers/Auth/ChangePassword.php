<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ChangePassword extends Controller
{
    public  function __construct(){
        $this->middleware('auth');
    }

    function index(){
        return view('auth.passwords.change');
    }

    function changePassword(Request  $request){
        $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldPassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect(route('login'))->with('message','Password is saved successfully');
        }else{
            return redirect()->back()->with('message','Current password is wrong');
        }
    }
}
