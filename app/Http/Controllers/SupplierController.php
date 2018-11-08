<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $customers = $user->customer()->get();
        $user['role'] = $user->roles()->first()->name;
        $request->user()->authorizeRoles(['supplier']);
        return view('login.list-customer',compact('user','customers'));
    }

    public function createCustomer(Request $request)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $request->user()->authorizeRoles(['supplier']);
        return view('login.create-customer',compact('user'));
    }

    public function storeCustomer(StoreCustomer $request)
    {
        $role_customer  = Role::where('name', 'customer')->first();
        $data = $request->all();
          $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
          ]);
        $user->roles()->attach($role_customer);
        Auth::user()->customer()->attach($user);
        return redirect()->route('customer-list');
    }

    public function editCustomer(Request $request,$id)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $edit_user = User::find($id);
        $request->user()->authorizeRoles(['supplier']);
        return view('login.edit-customer',compact('user','edit_user'));
    }

    public function updateCustomer(UpdateCustomer $request)
    {
        $user = User::find($request->get('id'));
        $data = $request->all();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $unique_email = User::where('email',$data['email'])->where('id','!=',$data['id'])->first();
        if(!empty($unique_email)){
            Session::flash('message_email', true);
            return redirect()->back();
        }
        if (isset($data['password'] ) && $data['password'] != '')
        {
            $user->password = bcrypt(Request::input('password'));
        }
        $user->save();
        return redirect()->route('customer-list');
    }

    public function deleteCustomer(Request $request)
    {
        $role_customer  = Role::where('name', 'customer')->first();
        $user = User::find($request->id);
        $user->roles()->detach($role_customer);
        Auth::user()->customer()->detach($user);
        $user->delete();
        return response()->json(['data'=>'deleted']);
    }

    public function accountSettings(Request $request)
    {
        $user = Auth::user();
        $customers = $user->customer()->get();
        $user['role'] = $user->roles()->first()->name;
        $request->user()->authorizeRoles(['supplier']);
        return view('login.account-settings',compact('user','customers'));
    }

    public function accountSettingsEdit(UpdateCustomer $request)
    {
        $user = User::find($request->get('id'));
        $data = $request->all();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $unique_email = User::where('email',$data['email'])->where('id','!=',$data['id'])->first();
        if(!empty($unique_email)){
            Session::flash('message_email', true);
            return redirect()->back();
        }
        if (isset($data['password'] ) && $data['password'] != '')
        {
            $user->password = bcrypt(Request::input('password'));
        }


        if(Input::hasFile('file')){
            $file = Input::file('file');
            if($file != null){
                $inputImgName = time().'.'.$file->getClientOriginalName();
                $file->move('uploads/suppliers', $inputImgName);
                $data['image'] = $inputImgName;
                if($user->image){
                    unlink('uploads/suppliers/'.$user->image);
                }
                $user->image = $inputImgName;
                unset($data['file']);
            }else{
                unset($data['file']);
            }
        }else{
            unset($data['file']);
        }

        $user->save();

        return redirect('/');
    }
}
