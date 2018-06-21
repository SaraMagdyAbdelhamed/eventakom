<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\ShopBranch;
use App\ShopDay;
use App\ShopMedia;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Helpers\Helper;
use App\ShopBranchTime;
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

    public function add_shop(Request $request)
    {
        
        $shop=Shop::create([
            "name"=>$request['place_name'],
            "phone"=>$request['phone'],
            "website"=>$request['website'],
            "info"=>$request['info'],
            "address"=>$request['place_address']
        ]);
        if(isset($request['images']))
        {
            foreach ($request->images as $key => $file) {
            
            $destinationPath='shops_images';
            $fileNameToStore=$destinationPath.'/'.time().rand(111,999).'.'.$file->getClientOriginalExtension();
            // dd($fileNameToStore);
            Input::file('images')[$key]->move($destinationPath,$fileNameToStore);
            $shop->update(["photo"=>$fileNameToStore]);
            $shop_media=ShopMedia::create([
                    "shop_id"=>$shop->id,
                    "link"=>$fileNameToStore,
                    "type"=>1
                ]);
                 if($request['images_ar'][$key] != null)
               {
                $destinationPath='shops_images';
            $fileNameToStore=$destinationPath.'/'.time().rand(111,999).'.'.$file->getClientOriginalExtension();
            // dd($fileNameToStore);
            Input::file('images_ar')[$key]->move($destinationPath,$fileNameToStore);
                Helper::add_localization(21,'link',$shop_media->id,$fileNameToStore,2);
                }
                else
                {
                    Helper::add_localization(21,'link',$shop_media->id,$fileNameToStore,2);
                }
        }
        }
        // dd($request->all());
        if(isset($request['place_name_ar']))
        {
            Helper::add_localization(10,'name',$shop->id,$request['place_name_ar'],2);
        }
        else
        {
            Helper::add_localization(10,'name',$shop->id,$request['place_name'],2);
        }
         if(isset($request['info_ar']))
        {
            Helper::add_localization(10,'info',$shop->id,$request['info_ar'],2);
        }
        else
        {
            Helper::add_localization(10,'info',$shop->id,$request['info'],2);
        }
        if(isset($request['days']))
        {
            foreach ($request['days'] as $key => $value) {
                ShopDay::create([
                    'shop_id'=>$shop->id,
                    'day_id'=>$key
                ]);
            }
        }
        if(isset($request['video']))
        {
            foreach ($request['video'] as $key => $value) {
               if($value != null)
               {
                $shop_media=ShopMedia::create([
                    "shop_id"=>$shop->id,
                    "link"=>$value,
                    "type"=>2
                ]);
                 if($request['video_ar'][$key] != null)
               {
                Helper::add_localization(21,'link',$shop_media->id,$request['video_ar'][$key],2);
                }
                else
                {
                    Helper::add_localization(21,'link',$shop_media->id,$value,2);
                }
               }
              
            }
        }
        if(isset($request['branch_name']))
        {
            foreach ($request['branch_name'] as $key => $value) {
               $branch= ShopBranch::create([
                    "shop_id"=>$shop->id,
                    "branch"=>$value,
                    "address"=>$request['branch_address'][$key]
                ]);
               foreach ($request['days'] as $key1 => $value1) {
                ShopBranchTime::create([
                    'branch_id'=>$branch->id,
                    'day_id'=>$key1,
                    'from'=>date("H:i:s a", strtotime($request['branch_start'][$key])),
                    'to'=>date("H:i:s a", strtotime($request['branch_end'][$key]))
                ]);
            }


            Helper::add_localization(20,'branch',$branch->id,$request['branch_name_ar'][$key],2);
            }
        }
    // dd($request->all());
    return  redirect()->route('shops');
    }

    public function edit_shop(Request $request)
    {
        
    }
}
