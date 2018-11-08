<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['supplier','customer','super_admin']);
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        if($user->roles()->first()->name == 'super_admin'){
            return view('login.admin',compact('user'));
        }
        return view('home',compact('user'));
  }

}
