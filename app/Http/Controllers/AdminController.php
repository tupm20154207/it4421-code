<?php

namespace App\Http\Controllers;

use App\Lock;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
      $data = array(
          'functional_users' => User::doesntHave('lock')->get(),
          'locked_users' => User::has('lock')->get()
      );
      return view('admin.admin')->with($data);
    }

    public function user_delete(Request $request){
      User::destroy((int) $request->id);
    }

    public function user_lock(Request $request){
      $id = (int) $request->input('id');
      $message = $request->input('reason');
      $release_date = NULL;

      if($request->input('lock_period') === 'temporary'){
        $specified = Carbon::parse($request->input('release_date'));
        $minimum_required = Carbon::now('Asia/Ho_Chi_Minh')->addDays(1);
        $release_date = $specified > $minimum_required ? $specified : $minimum_required;
      }

      $lock = new Lock();
      $lock->message = $message;
      $lock->release_date = $release_date;
      User::find($id)->lock()->save($lock);

      return redirect()->route('admin.index');
    }

    public function user_unlock(Request $request){
      User::find((int) $request->id)->lock->delete();
    }

    public function user_updateRole(Request $request){
      $user = User::find((int) $request->id);
      $role = $request->role;
      $user->role = $role;
      $user->save();
    }
}
