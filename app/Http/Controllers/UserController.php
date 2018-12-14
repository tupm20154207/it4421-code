<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function info()
  {
    return view('auth.info');
  }

  public function info_update(Request $request)
  {
    $user = Auth::user();
    $request->validate([
        'name' => 'required|max:255',
        'username' => 'required|unique:users,username,' . $user->id,
        'email' => 'required|unique:users,email,'.$user->id,
        'phone' => 'required|unique:users,phone,'.$user->id,
    ]);
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->fullname = $request->input('name');
    $user->save();

    return redirect()->back();
  }

  public function password()
  {
    return view('auth.password');
  }

  public function password_update(Request $request)
  {
    $user = Auth::user();
    $request->validate([
        'old_password' => [
            'required',
            function ($attribute, $value, $fail) use($user){
              if(!Hash::check($value, $user->password)){
                $fail('Sai mật khẩu.');
              }
            }
        ],
        'new_password' => 'required|confirmed|min:6',
    ]);
    $user->password = Hash::make($request->input('new_password'));
    $user->save();
//    if(Hash::check($user->password, $request->input('old_password'))){
//
//    }
//    else{
//      Validator::make([], [])->getMessageBag()->add('old_password', 'Sai mật khẩu');
//    }

    return redirect()->back();
  }
}
