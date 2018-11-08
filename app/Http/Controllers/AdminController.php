<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\StoreSize;
use App\Season;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['super_admin']);
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $sizes = Size::all();
        return view('login.list-size',compact('user','sizes'));
    }

    public function createSize(Request $request)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $request->user()->authorizeRoles(['super_admin']);
        return view('login.create-size',compact('user'));
    }

    public function storeSize(StoreSize $request)
    {
        $data = $request->all();
        $size = Size::create($data);
        return redirect()->route('size-list');
    }

    public function editSize(Request $request,$id)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $edit_size = Size::find($id);
        $request->user()->authorizeRoles(['super_admin']);
        return view('login.edit-size',compact('user','edit_size'));
    }

    public function updateSize(StoreSize $request)
    {
        $size = Size::find($request->get('id'));
        $data = $request->all();
        unset($data['id']);
        $size->fill($data);
        $size->save();
        return redirect()->route('size-list');
    }

    public function deleteSize(Request $request)
    {
        $size = Size::find($request->id);
        $sizeId = $size->id;
        $allBrands = Brand::all();
        foreach ($allBrands as $brands) {
            $brandSizeIds = $brands['size_id'];
            if(in_array($sizeId,$brandSizeIds)){

            }
        }
        $size->delete();
        return response()->json(['data'=>'deleted']);
    }

    public function showSeason()
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        $seasons = Season::all();
        return view('login.list-season',compact('user','seasons'));
    }

    public function seasonCreate()
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        return view('login.create-season',compact('user'));
    }

    public function seasonStore(Request $request)
    {
        $data = $request->all();
        if(isset($data['name']) && $data['name'] != ''){
            Season::create($data);
        }
        return redirect()->route('showSeason');
    }

    public function seasonDelete(Request $request)
    {
        Season::find($request->id)->delete();
        return response()->json(['data'=>'deleted']);
    }

    public function seasonEdit(Season $season)
    {
        $user = Auth::user();
        $user['role'] = $user->roles()->first()->name;
        return view('login.edit-season',compact('user','season'));
    }

    public function seasonUpdate(Request $request)
    {
        $season = Season::find($request->get('id'));
        if($request->get('name') && $request->get('name')){
            $season->name = $request->get('name');
            $season->save();
         }
        return redirect()->route('showSeason');
    }
}
