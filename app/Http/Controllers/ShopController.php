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
    public function edit()
    {
    	
    	return view('shops.edit');
    }
}
