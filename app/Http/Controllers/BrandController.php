<?php

namespace App\Http\Controllers;

use App\Color;
use App\Http\Requests\StoreBrand;
use App\Product;
use App\Size;
use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomer;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['supplier']);
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        return view('login.list-brand',compact('user'));
    }

    public function createBrand(Request $request)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $request->user()->authorizeRoles(['supplier']);
        $sizes = Size::all();
        return view('login.create-brand',compact('user','sizes'));
    }

    public function storeBrand(StoreBrand $request)
    {
        $data = $request->all();
        $brand = Brand::create($data);

        DB::table('t_brands')
            ->where('id',$brand->id)
            ->update(['gpd_id' => $brand->id + 1000]);

        return redirect()->route('brand-list');
    }

    public function editBrand(Request $request,$id)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $edit_brand = Brand::find($id);
        $sizes = Size::all();

        if($edit_brand == null){
            return redirect()->route('brand-list');
        }
        if($user->id != $edit_brand->user_id){
            return redirect()->route('brand-list');
        }
        $request->user()->authorizeRoles(['supplier']);
        return view('login.edit-brand',compact('user','edit_brand','sizes'));
    }

    public function deleteBrand(Request $request)
    {
        $brand = Brand::find($request->id);
        $colors = Color::where('brand_id',$brand->id)->get();
        $products = Product::where('brand_id',$brand->id)->get();
        foreach ($colors as $color){
            $brand->colorBrand()->detach($color);
            $color->delete();
        }
        foreach ($products as $product){
            $product->delete();
            if($product['image']){
                unlink('uploads/products/'.$product['image']);
            }
        }
        $brand->delete();
        return response()->json(['data'=>'deleted']);
    }

    public function updateBrand(Request $request)
    {
        $brand = Brand::find($request->get('id'));
        $data = $request->all();
        $brand->fill($data);
        $brand->save();
        return redirect()->route('brand-list');
    }
}
