<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Color;
use App\Http\Requests\StoreProduct;
use App\Product;
use App\Season;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomer;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['supplier']);
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $products = Product::where('user_id',$user->id)->with('brand')->get();
        return view('login.product-list',compact('user','products'));
    }

    public function createProduct(Request $request)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $request->user()->authorizeRoles(['supplier']);
        $seasons = Season::all();
        return view('login.create-product',compact('user','seasons'));
    }

    public function storeProduct(StoreProduct $request)
    {
        $data = $request->all();
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $inputImgName = time().'.'.$file->getClientOriginalName();
            $file->move('uploads/products/', $inputImgName);
            $data['image'] = $inputImgName;
            unset($data['file']);
        }

        $color = Color::find($data['color_id']);
        $data['color_nr'] = $color->number;
        $data['color'] = $color->name;
        unset($data['color_id']);

        $product = Product::create($data);

        DB::table('t_products')
            ->where('id',$product->id)
            ->update(['gpd_id' => $product->id + 1000]);
        return redirect()->route('product-list');
    }

    public function editProduct(Request $request,$id)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $edit_product = Product::find($id);
        if($edit_product == null){
            return redirect()->route('product-list');
        }
        if($user->id != $edit_product->user_id){
            return redirect()->route('product-list');
        }
        $brand_id = $user->brands->where('id',$edit_product->brand_id)->first();
        $colors = Color::where('brand_id',$brand_id->id)->get();
        $request->user()->authorizeRoles(['supplier']);
        return view('login.edit-product',compact('user','edit_product','colors'));
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::find($request->id);
        $user = Auth::user();
        if($product->image != null){
            unlink('uploads/products/'.$product->image);
        }
        $product->delete();
        return response()->json(['data'=>'deleted']);
    }

    public function updateProduct(StoreProduct $request)
    {
        $product = Product::find($request->get('id'));
        $data = $request->all();
        unset($data['id']);

        if(Input::hasFile('file')){
            $file = Input::file('file');
            if($file != $product['image'] && $file != null){
                $inputImgName = time().'.'.$file->getClientOriginalName();
                $file->move('uploads/products/', $inputImgName);
                $data['image'] = $inputImgName;
                if($product['image']){
                    unlink('uploads/products/'.$product['image']);
                }
                unset($data['file']);
            }else{
                unset($data['file']);
            }
        }else{
            unset($data['file']);
        }

        $color = Color::find($data['color_id']);
        $data['color_nr'] = $color->number;
        $data['color'] = $color->name;
        unset($data['color_id']);

        $product->fill($data);
        $product->save();

        return redirect()->route('product-list');
    }

    public function colorListShow(Request $request)
    {
        $brand_id = $request->id;
        $colors = Color::where('brand_id',$brand_id)->get();
        $sizes = Brand::find($brand_id);
        $sizesId = $sizes->size_id;
        $allSizes=[];
        foreach ($sizesId as $sId){
            $allSizes[] = Size::find($sId);
        }
        return response()->json(['data'=> $colors,'sizes' => view('size-select', compact('allSizes'))->render()]);
    }
}
