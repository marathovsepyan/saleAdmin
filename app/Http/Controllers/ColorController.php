<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\StoreColor;
use Illuminate\Http\Request;
use App\Color;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomer;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['supplier']);
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $colors = Color::where('user_id',$user->id)->with('brand')->get();
        return view('login.list-color',compact('user','colors'));
    }

    public function createColor(Request $request)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $request->user()->authorizeRoles(['supplier']);
        return view('login.create-color',compact('user'));
    }

    public function storeColor(StoreColor $request)
    {
        $data = $request->all();
        $issetThisColorBrand = Color::where(['number' => $data['number'],'brand_id' => $data['brand_id']])->first();
        if($issetThisColorBrand != null){
            Session::flash('message_color', true);
            return redirect()->back();
        }
        $color = Color::create($data);
        $color_brand = Brand::where('id', $data['brand_id'])->first();
        $color->colorBrand()->attach($color_brand);
        return redirect()->route('color-list');
    }

    public function editColor(Request $request,$id)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $edit_color = Color::find($id);
        if($edit_color == null){
            return redirect()->route('color-list');
        }
        if($user->id != $edit_color->user_id){
            return redirect()->route('color-list');
        }
        $request->user()->authorizeRoles(['supplier']);
        return view('login.edit-color',compact('user','edit_color'));
    }

    public function deleteColor(Request $request)
    {
        $color = Color::find($request->id);
        $color_brand = Brand::where('id', $color->brand_id)->first();
        $color->colorBrand()->detach($color_brand);
        $color->delete();
        return response()->json(['data'=>'deleted']);
    }

    public function updateColor(StoreColor $request)
    {
        $color = Color::find($request->get('id'));
        $data = $request->all();

        $issetThisColorBrand = Color::where(['number' => $data['number'],'brand_id' => $data['brand_id']])->first();

        if($issetThisColorBrand != null){
            Session::flash('message_color', true);
            return redirect()->back();
        }

        DB::table('t_color_brand')
            ->where(['color_id'=>$color->id,'brand_id'=>$color->brand_id])
            ->update(['brand_id' => $data['brand_id']]);

        $color->fill($data);
        $color->save();

        return redirect()->route('color-list');
    }
}
