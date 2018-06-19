<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\ShopBranch;
use App\ShopDay;

class ShopController extends Controller
{
    public function index()
    {
        $data['shops']=Shop::with('shop_branch')->with('shop_day')->get();
        foreach ($data['shops'] as $key => $value) {
            $value['photo']=url('/').'\/'.$value['photo'];
        }
        // dd($data['shops']);
    	
    	return view('shops.index',$data);
    }
     public function add()
    {
        
        return view('shops.add');
    }

    public function edit()
    {
    	
    	return view('shops.edit');
    }

    public function destroy($id)
    {
        Shop::destroy($id);
        ShopBranch::where('shop_id',$id);
        ShopDay::where('shop_id',$id);
        return redirect()->route('shops');
    }
}
