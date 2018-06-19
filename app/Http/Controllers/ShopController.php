<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\ShopBranch;
use App\ShopDay;
use App\ShopMedia;
class ShopController extends Controller
{
    public function index()
    {
        $data['shops']=Shop::with('shop_branch')->with('shop_day')->with('shop_media')->get();
        foreach ($data['shops'] as $key => $value) {
            $value['photo']=url('/').'\/'.$value['photo'];
            foreach ($value['shop_media'] as $key1 => $value1) {
                if($value1['type'] == 1)
               $value1['link']=url('/').'\/'.$value1['link'];
            }
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
        ShopBranch::where('shop_id',$id)->delete();
        ShopDay::where('shop_id',$id)->delete();
        ShopMedia::where('shop_id',$id)->delete();
        return redirect()->route('shops');
    }

    public function destroy_all()
    {
        $ids = $_POST['ids'];
        foreach($ids as $id)
        {
          Shop::destroy($id);
        ShopBranch::where('shop_id',$id)->delete();
        ShopDay::where('shop_id',$id)->delete();
        ShopMedia::where('shop_id',$id)->delete();
        } 
        return  redirect()->route('shops');
    }
}
