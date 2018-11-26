<?php

namespace Modules\Shops\Http\Controllers;

use App\Helpers\Helper;
use App\Shop;
use App\ShopBranch;
use App\ShopBranchTime;
use App\ShopDay;
use App\ShopMedia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['shops'] = Shop::with('shop_branch')->with('shop_day')->with('shop_media')->get();
        foreach ($data['shops'] as $key => $value) {
            $value['photo'] = url('/') . '\/' . $value['photo'];
            foreach ($value['shop_media'] as $key1 => $value1) {
                if ($value1['type'] == 1) {
                    $value1['link'] = url('/') . '\/' . $value1['link'];
                }

            }
            // foreach ($value['shop_day'] as $key1 => $value1) {
            //    $day=Day::find($value1['day_id']);
            //    // dd($day);
            //    $value1['name']=$day->name;
            // }
        }

        // dd($data['shops']);

        return view('shops::shops.index', $data);
    }

    public function add()
    {

        return view('shops::shops.add');
    }

    public function edit($id)
    {
        $data['shop'] = Shop::find($id);
        // dd($data['shop']);
        return view('shops::shops.edit', $data);
    }

    public function destroy($id)
    {
        Shop::destroy($id);
        ShopBranch::where('shop_id', $id)->delete();
        ShopDay::where('shop_id', $id)->delete();
        ShopMedia::where('shop_id', $id)->delete();
        Helper::remove_localization(21, 'link', $id, 2);

        return redirect()->route('shops');
    }

    public function destroy_all()
    {
        $ids = $_POST['ids'];
        foreach ($ids as $id) {
            Shop::destroy($id);
            ShopBranch::where('shop_id', $id)->delete();
            ShopDay::where('shop_id', $id)->delete();
            ShopMedia::where('shop_id', $id)->delete();
            Helper::remove_localization(21, 'link', $id, 2);
        }
        return redirect()->route('shops');
    }

    public function add_shop(Request $request)
    { //dd($request->all());
        $images_en = explode('-', $request->images);
        $images_ar = explode('-', $request->images_ar);

        // is_active
        if (isset($request['is_active'])) {
            $is_active = 1;
        } else {
            $is_active = 0;
        }

        $shop = Shop::create([
            "name" => $request['place_name'],
            "phone" => $request['phone'],
            "website" => $request['website'],
            "info" => $request['info'],
            "address" => $request['place_address'],
            "longitude" => $request['shop_long'],
            "latitude" => $request['shop_lat'],
            "is_active" => $is_active,
        ]);

        // Images
        if (count($images_ar) > 0 || count($images_en) > 0) {

            $mainImage = '';

            // update English images.
            if (count($images_en) > 0) {

                // add new images
                foreach ($images_en as $image) {

                    // check if image exist
                    if (strpos($image, 'shops_images') !== false) {
                        // search for its name
                        preg_match('/shops_images\/(.*)/', $image, $match);

                        if (count($match) > 0) {
                            $name = $match[0];

                            ShopMedia::create([
                                'shop_id' => $shop->id,
                                'link' => $name,
                                'type' => 1,
                            ]);
                        }

                    }
                    // check if image is new
                    if (strpos($image, 'base64') !== false) {
                        // get image extension
                        preg_match('/image\/(.*)\;/', $image, $match);

                        if (count($match) > 0) {
                            $ext = $match[1];
                            $image = str_replace('data:image/' . $ext . ';base64,', '', $image);
                            $image = str_replace(' ', '+', $image);
                            $imageName = 'shops_images/' . time() . rand(111, 999) . '.' . $ext;
                            \File::put(public_path() . '/' . $imageName, base64_decode($image));

                            ShopMedia::create([
                                "shop_id" => $shop->id,
                                "link" => $imageName,
                                "type" => 1,
                            ]);

                        }
                    }
                }

            }

            // update Arabic images.
            if (count($images_ar) > 0) {

                // add new images
                foreach ($images_ar as $image) {

                    // check if image exist
                    if (strpos($image, 'shops_images') !== false) {
                        // search for its name
                        preg_match('/shops_images\/(.*)/', $image, $match);

                        if (count($match) > 0) {
                            $name = $match[0];

                            Helper::add_localization(21, 'link', $shop->id, $name, 2);
                        }

                    }
                    // check if image is new
                    if (strpos($image, 'base64') !== false) {
                        // get image extension
                        preg_match('/image\/(.*)\;/', $image, $match);

                        if (count($match) > 0) {
                            $ext = $match[1];
                            $image = str_replace('data:image/' . $ext . ';base64,', '', $image);
                            $image = str_replace(' ', '+', $image);
                            $imageName = 'shops_images/' . time() . rand(111, 999) . '.' . $ext;
                            \File::put(public_path() . '/' . $imageName, base64_decode($image));

                            Helper::add_localization(21, 'link', $shop->id, $imageName, 2);
                        }
                    }
                }
            }

            // update main shop image
            if (count($images_en) > 1) {
                // add first English image
                $mainImage = ShopMedia::where('shop_id', $shop->id)->first()->link;
            } else if (count($images_ar) > 1) {
                // add first Arabic image
                $mainImage = Helper::localization('shop_media', 'link', $shop->id, 2);
            }

            $shop->update([
                'photo' => $mainImage,
            ]);

        }

        // dd($request->all());
        if (isset($request['place_name_ar'])) {
            Helper::add_localization(10, 'name', $shop->id, $request['place_name_ar'], 2);
        } else {
            Helper::add_localization(10, 'name', $shop->id, $request['place_name'], 2);
        }

        if (isset($request['info_ar'])) {
            Helper::add_localization(10, 'info', $shop->id, $request['info_ar'], 2);
        } else {
            Helper::add_localization(10, 'info', $shop->id, $request['info'], 2);
        }

        if (isset($request->days) && count($request->days) > 0) {
            foreach ($request['days'] as $key => $value) {
                ShopDay::create([
                    'shop_id' => $shop->id,
                    'day_id' => $key,
                ]);
            }
        }

        // 1st English Youtube link
        if (isset($request['youtube_en_1'])) {
            $value = str_replace('watch?v=', 'embed/', $request['youtube_en_1']);
            if ($value == null || $value == '') {
                $value = '';
            }

            $shop_media = ShopMedia::create([
                "shop_id" => $shop->id,
                "link" => $value,
                "type" => 2,
            ]);
        }

        // 2nd English Youtube link
        if (isset($request['youtube_en_2'])) {
            $value = str_replace('watch?v=', 'embed/', $request['youtube_en_2']);
            if ($value == null || $value == '') {
                $value = '';
            }

            $shop_media = ShopMedia::create([
                "shop_id" => $shop->id,
                "link" => $value,
                "type" => 2,
            ]);
        }

        // 1st Arabic youtube link
        if (isset($request['youtube_ar_1'])) {
            $value = str_replace('watch?v=', 'embed/', $request['youtube_ar_1']);
            if ($value == null || $value == '') {
                $value = '';
            }

            Helper::add_localization(21, 'link', $shop->id, $value, 2);
        }

        // 2nd Arabic youtube link
        if (isset($request['youtube_ar_2'])) {
            $value = str_replace('watch?v=', 'embed/', $request['youtube_ar_2']);
            if ($value == null || $value == '') {
                $value = '';
            }

            Helper::add_localization(21, 'link', $shop->id, $value, 2);
        }

        if (isset($request['branch_name'])) {
            foreach ($request['branch_name'] as $key => $value) {
                $branch = ShopBranch::create([
                    "shop_id" => $shop->id,
                    "branch" => $value,
                    "address" => $request['branch_address'][$key],
                    "longtuide" => $request['branch_long'][$key],
                    "latitude" => $request['branch_lat'][$key],
                ]);

                // This line supposed to exist and work
                if ( isset($request->days) && count($request->days) > 0 ) {
                    foreach ($request['days'] as $key1 => $value1) {
                        ShopBranchTime::create([
                            'branch_id' => $branch->id,
                            'day_id' => $key1,
                            'from' => date("H:i:s a", strtotime($request['branch_start'][$key])),
                            'to' => date("H:i:s a", strtotime($request['branch_end'][$key])),
                        ]);
                    }
                }

                Helper::add_localization(20, 'branch', $branch->id, $request['branch_name_ar'][$key], 2);
            }
        }
        // dd($request->all());
        return redirect()->route('shops');
    }

    public function edit_shop(Request $request, $id)
    {
        $images_en = explode('-', $request->images);
        $images_ar = explode('-', $request->images_ar);

        if (isset($request['is_active'])) {
            $is_active = 1;
        } else {
            $is_active = 0;
        }
        $shop = Shop::find($id);
        $shop->update([
            "name" => $request['place_name'],
            "phone" => $request['phone'],
            "website" => $request['website'],
            "info" => $request['info'],
            "address" => $request['place_address'],
            "longitude" => $request['shop_long'],
            "latitude" => $request['shop_lat'],
            "is_active" => $is_active,
        ]);

        if (isset($request['place_name_ar'])) {
            Helper::edit_entity_localization('shops', 'name', $shop->id, 2, $request['place_name_ar']);
        } else {
            Helper::edit_entity_localization('shops', 'name', $shop->id, 2, $request['place_name']);
        }

        if (isset($request['info_ar'])) {
            Helper::edit_entity_localization('shops', 'info', $shop->id, 2, $request['info_ar']);
        } else {
            Helper::edit_entity_localization('shops', 'info', $shop->id, 2, $request['info']);
        }

        if (isset($request['days'])) {
            ShopDay::where('shop_id', $id)->delete();
            foreach ($request['days'] as $key => $value) {
                ShopDay::create([
                    'shop_id' => $shop->id,
                    'day_id' => $key,
                ]);
            }
        }

        // Images
        if (count($images_ar) > 0 || count($images_en) > 0) {

            // update English images.
            if (count($images_en) > 0) {
                // delete old ones
                $shop->shop_media()->delete();

                // add new images
                foreach ($images_en as $image) {

                    // check if image exist
                    if (strpos($image, 'shops_images') !== false) {
                        // search for its name
                        preg_match('/shops_images\/(.*)/', $image, $match);

                        if (count($match) > 0) {
                            $name = $match[0];

                            ShopMedia::create([
                                'shop_id' => $shop->id,
                                'link' => $name,
                                'type' => 1,
                            ]);
                        }

                    }
                    // check if image is new
                    if (strpos($image, 'base64') !== false) {
                        // get image extension
                        preg_match('/image\/(.*)\;/', $image, $match);

                        if (count($match) > 0) {
                            $ext = $match[1];
                            $image = str_replace('data:image/' . $ext . ';base64,', '', $image);
                            $image = str_replace(' ', '+', $image);
                            $imageName = 'shops_images/' . time() . rand(111, 999) . '.' . $ext;
                            \File::put(public_path() . '/' . $imageName, base64_decode($image));

                            ShopMedia::create([
                                "shop_id" => $shop->id,
                                "link" => $imageName,
                                "type" => 1,
                            ]);

                        }
                    }
                }

            }

            // update Arabic images.
            if (count($images_ar) > 0) {
                // delete old ones
                Helper::remove_localization(21, 'link', $shop->id, 2);

                // add new images
                foreach ($images_ar as $image) {

                    // check if image exist
                    if (strpos($image, 'shops_images') !== false) {
                        // search for its name
                        preg_match('/shops_images\/(.*)/', $image, $match);

                        if (count($match) > 0) {
                            $name = $match[0];

                            Helper::add_localization(21, 'link', $shop->id, $name, 2);
                        }

                    }
                    // check if image is new
                    if (strpos($image, 'base64') !== false) {
                        // get image extension
                        preg_match('/image\/(.*)\;/', $image, $match);

                        if (count($match) > 0) {
                            $ext = $match[1];
                            $image = str_replace('data:image/' . $ext . ';base64,', '', $image);
                            $image = str_replace(' ', '+', $image);
                            $imageName = 'shops_images/' . time() . rand(111, 999) . '.' . $ext;
                            \File::put(public_path() . '/' . $imageName, base64_decode($image));

                            Helper::add_localization(21, 'link', $shop->id, $imageName, 2);
                        }
                    }
                }
            }
        }

        // delete old English youtube links
        ShopMedia::where('shop_id', $id)->where('type', 2)->delete();

        // 1st English Youtube link
        if (isset($request['youtube_en_1'])) {
            $value = str_replace('watch?v=', 'embed/', $request['youtube_en_1']);
            if ($value == null || $value == '') {
                $value = '';
            }

            $shop_media = ShopMedia::create([
                "shop_id" => $shop->id,
                "link" => $value,
                "type" => 2,
            ]);
        }

        // 2nd English Youtube link
        if (isset($request['youtube_en_2'])) {
            $value = str_replace('watch?v=', 'embed/', $request['youtube_en_2']);
            if ($value == null || $value == '') {
                $value = '';
            }

            $shop_media = ShopMedia::create([
                "shop_id" => $shop->id,
                "link" => $value,
                "type" => 2,
            ]);
        }


        // delete old Arabic youtube links
        Helper::remove_youtube_links(21, 'link', $shop->id, 2);

        // 1st Arabic youtube link
        if (isset($request['youtube_ar_1'])) {
            $value = str_replace('watch?v=', 'embed/', $request['youtube_ar_1']);
            if ($value == null || $value == '') {
                $value = '';
            }

            Helper::add_localization(21, 'link', $shop->id, $value, 2);
        }

        // 2nd Arabic youtube link
        if (isset($request['youtube_ar_2'])) {
            $value = str_replace('watch?v=', 'embed/', $request['youtube_ar_2']);
            if ($value == null || $value == '') {
                $value = '';
            }

            Helper::add_localization(21, 'link', $shop->id, $value, 2);
        }


        ShopBranch::where('shop_id', $shop->id)->delete();
        if (isset($request['branch_name'])) {
            // dd($request['branch_name']);
            foreach ($request['branch_name'] as $key => $value) {
                $branch = ShopBranch::create([
                    "shop_id" => $shop->id,
                    "branch" => $value,
                    "address" => $request['branch_address'][$key],
                    "longtuide" => $request['branch_long'][$key],
                    "latitude" => $request['branch_lat'][$key],
                ]);

                if ( isset($request->days) && count($request->days) > 0 ) {
                    foreach ($request['days'] as $key1 => $value1) {
                        ShopBranchTime::create([
                            'branch_id' => $branch->id,
                            'day_id' => $key1,
                            'from' => date("H:i:s a", strtotime($request['branch_start'][$key])),
                            'to' => date("H:i:s a", strtotime($request['branch_end'][$key])),
                        ]);
                    }
                }

                // Helper::remove_localization(20, $field, $item_id, $lang_id);
                Helper::add_localization(20, 'branch', $branch->id, $request['branch_name_ar'][$key], 2);
            }
        }
        return redirect()->route('shops');
    }

    public function view(Shop $shop)
    {

        return view('shops::shops.view')
            ->with('shop', $shop);
    }
}
