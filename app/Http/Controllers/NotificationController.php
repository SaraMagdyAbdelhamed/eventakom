<?php

namespace App\Http\Controllers;

use Session;
use App\Age_Ranges;
use App\Helpers\Helper;
use App\Interest;
use App\Notification;
use App\NotificationPush;
use App\Users;
use App\UsersInterest;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $data['interests'] = interest::all();
        $data['ages'] = Age_Ranges::all();
        return view('notifications.index', $data);
	}
	
    public function add(Request $request)
    {
        // dd($request);
        if (!isset($request['gender']) && !isset($request['age']) && !isset($request['category'])) {

            $users = Users::all();
            foreach ($users as $key => $value) {
                $notification = Notification::create([
                    "msg" => $request['msg'],
                    "msg_ar" => $request['msg_ar'],
                    "notification_type_id" => 1,
                    "is_sent" => 0,
                    "is_read" => 0,
                    "user_id" => $value['id'],
                ]);
                NotificationPush::create([
                    "notification_id" => $notification->id,
                    "user_id" => $value['id'],
                    "device_token" => $value['device_token'],
                    "mobile_os" => $value['mobile_os'],
                    "lang_id" => $value['lang_id'],
                ]);
			}
			
        } else {
            $users = Users::where(function ($q) use ($request) {
                if (isset($request['gender'])) {
                    $q->where('gender_id', $request['gender']);
                }
                if (isset($request['age'])) {
                    $id = [];
                    foreach ($request['age'] as $key => $value) {
                        $age_range = Age_Ranges::where('id', $value)->first();
                        $ranges = Helper::ageRange_users($age_range->from, $age_range->to);
                        for ($i = 0; $i < count($ranges); $i++) {
                            $id[] = $ranges[$i];
                        }

                    }
                    $q->whereIn('id', $id);

                    // dd($ids);
                }
                if (isset($request['category'])) {
                    $ids = [];
                    foreach ($request['category'] as $key => $value) {
                        $users_categories = UsersInterest::where('interest_id', $value)->get();
                        foreach ($users_categories as $key1 => $value1) {
                            $ids[] = $value1['user_id'];
                        }

                    }
                    $q->whereIn('id', $ids);

                }

            })->get();

            // dd($users);
            // $notification = Notification::create([
            //     "msg"=>$request['msg'],
            //     "msg_ar"=>$request['msg_ar'],
            //     "notification_type_id"=>1,
            //     "is_sent"=>0,
            //     "is_read"=>0,
            //     "user_id"=>\Auth::user()->id
            // ]);
            // $users= Users::all();
            foreach ($users as $key => $value) {
                $notification = Notification::create([
                    "msg" => $request['msg'],
                    "msg_ar" => $request['msg_ar'],
                    "notification_type_id" => 1,
                    "is_sent" => 0,
                    "is_read" => 0,
                    "user_id" => $value['id'],
                ]);
                NotificationPush::create([
                    "notification_id" => $notification->id,
                    "user_id" => $value['id'],
                    "device_token" => $value['device_token'],
                    "mobile_os" => $value['mobile_os'],
                    "lang_id" => $value['lang_id'],
                ]);
            }
			// dd($users);
			

		}

		if (count($users) > 0) {
			Session::flash('success', 'Success!');
		} else {
			Session::flash('error', 'No Users Found with these options, no notifications will be added!');

		}
        return redirect()->back();
    }
}
