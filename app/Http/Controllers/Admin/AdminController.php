<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showLoginForm()
    {
          return view('admin.login');
    }

    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::paginate(5);
        return view('admin.users',compact('users'));
    }

    public function blockUser(Request $request)
    {
        $userId = $request->user_id;
        $status = $request->user_status;

        if ($status == 'active') {
            User::where('id', $userId)->update(['status' => 'inactive']);
            $result = 0;

        } else {
            User::where('id', $userId)->update(['status' => 'active']);
            $result = 1;
        }

        return $result;

    }
}
