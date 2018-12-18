<?php

/**
 *  Author:  Ahmed Yacoub
 *  Email:   ahmed.yacoub@outlook.com
 *  Date: May 1, 2018
 */

namespace Modules\Events\Http\Controllers;

use App\Age_Ranges;
use App\BigEvent;
use App\Currency;
use App\EventBackend;
use App\EventCategory;
use App\EventHashtags;
use App\EventMedia;
use App\EventTicket;
use App\Genders;
use App\Users;
use App\Library\Services\NotificationsService;
use Carbon\Carbon;
use Helper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Library\Services\TwilioSmsService;
class EventsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $NotifcationService;

    public function __construct()
    {
        //blockio init
        $this->NotifcationService = new NotificationsService();

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('events::backend')
            ->with('events', EventBackend::where('is_backend', 1)->get())
            ->with('categories', EventCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['genders'] = Genders::all();
        $data['age_range'] = Age_Ranges::all();
        $data['categories'] = EventCategory::all();
        $data['currencies'] = Currency::all();

        return view('events::create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        /*
         * Start & End dates, we will replace "/" with "-" to not make a conflict with American standard format
         * Ex:
         * 01/11/2018   => accepted 11th of January 2018
         * 13/01/2018   => rejected becuase first left-hand token is supposed to be the month not the day as follows mm/dd/YYY
         */
        $start_date = str_replace('/', '-', $request->start_date);
        $end_date = str_replace('/', '-', $request->end_date);
        // dd([$start_date, $end_date]);
        // dd([Carbon::parse($start_date . ' ' . $request->start_time), Carbon::parse($end_date . ' ' . $request->end_time)]);

        // Get all Arabic & English Images as concatinated base64 string.
        $images_en = explode('-', $request->images_en);
        $images_ar = explode('-', $request->images_ar);
        // dd([$images_en, $images_ar]);

        // Insert Event in events table
        try {
            $event = new EventBackend;

            $event->name = $request->english_event_name;
            $event->description = $request->english_description;
            $event->longtuide = $request->lng;
            $event->latitude = $request->lat;
            $event->address = $request->address;
            $event->venue = $request->english_venu;

            $event->age_range_id = $request->age_range;
            $event->gender_id = $request->gender;

            // concatinate start_date + start_time to make them start_datetime
            $event->start_datetime = Carbon::parse($start_date . ' ' . $request->start_time);

            // concatinate end_date + end_time to make them end_datetime
            $event->end_datetime = Carbon::parse($end_date . ' ' . $request->end_time);

            $event->suggest_big_event = $request->is_big_event ?: 0; // check if value is missing then replace it with zero
            $event->is_active = $request->is_active ?: 0; // check if value is missing then replace it with zero

            $event->is_paid = $request->is_paid;

            $event->website = $request->website ?: '';
            $event->email = $request->email ?: '';
            $event->code = $request->code_number;
            $event->mobile = $request->mobile_number;
            $event->created_by = Auth::id();
            
             
            $event->save();
            // updating event with subscription link after getting it's id
            $subscription_link = route('event_view',$event->id);
            $event->subscription_link=$subscription_link;
         // dd($event->save());
               if( $event->save()){
        //   dd($event);
             $user=Users::where('id',$event->created_by)->first();
             $subscribers_link = route('event_subscribers',$event->id);
        $twilio_config = [
                    'app_id' => 'AC2305889581179ad67b9d34540be8ecc1',
                    'token' => '2021c86af33bd8f3b69394a5059c34f0',
                    'from' => '+13238701693'
                ];
        
            $twilio = new TwilioSmsService($twilio_config);
             if($event->telecode != null && $event->mobile != null){    
             $twilio->send('+'.$event->tele_code.substr($event->mobile,1), ''.$event->name.' subscribers link '.$subscribers_link);
             }
            
            if($user->tel_code != null  && $user->mobile != null ){            
             $twilio->send('+'.$user->tel_code.substr($user->mobile,1),''.$event->name.' subscribers link '.$subscription_link);
            }

            }

            /**  INSERT English Hashtags **/
            // Explode english hashtags
            $hashtags = explode(',', $request->english_hashtags);

            // search if the hashtag is already exists, if exists get its ID, if not exists insert the hashtag into `hash_tags` table and get its id.
            for ($i = 0; $i < count($hashtags); $i++) {
                // insert hashtag into `hash_tag` table only if it isn't exists.
                if (EventHashtags::where('name', '=', $hashtags[$i])->first() == null) {
                    $hash = new EventHashtags;
                    $hash->name = $hashtags[$i];
                    $hash->save();
                }

                $id = EventHashtags::where('name', '=', $hashtags[$i])->first()->id; // get hashtage id from `hash_tag` table

                // attach event's hashtags with
                $event->hashtags()->attach($id);
            }

            /**  INSERT Categories **/
            for ($i = 0; $i < count($request->categories); $i++) {
                $event->categories()->attach($request->categories[$i]);
            }

            /**  Youtube links  **/
            $event->media()->createMany([
                ['link' => ($request->youtube_en_1 ?: ''), 'type' => 2],
                ['link' => ($request->youtube_en_2 ?: ''), 'type' => 2],
                ['link' => ($request->youtube_ar_1 ?: ''), 'type' => 2],
                ['link' => ($request->youtube_ar_2 ?: ''), 'type' => 2],
            ]);

            // Images
            if (count($images_ar) > 0 || count($images_en) > 0) {

                $mainImage = 'default_images/events.jpg';

                // update English images.
                if (count($images_en) > 0) {

                    // add new images
                    foreach ($images_en as $image) {

                        // check if image exist
                        if (strpos($image, 'events/english') !== false) {
                            // search for its name
                            preg_match('/events\/english\/(.*)/', $image, $match);

                            if (count($match) > 0) {
                                $name = $match[0];

                                $media = new EventMedia;

                                $media->event_id = $event->id;
                                $media->link = $name;
                                $media->type = 1;
                                $media->save();
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
                                $imageName = 'events/english/' . time() . rand(111, 999) . '.' . $ext;
                                \File::put(public_path() . '/' . $imageName, base64_decode($image));

                                $media = new EventMedia;

                                $media->event_id = $event->id;
                                $media->link = $imageName;
                                $media->type = 1;
                                $media->save();

                            }
                        }
                    }

                }

                // update Arabic images.
                if (count($images_ar) > 0) {

                    // add new images
                    foreach ($images_ar as $image) {

                        // check if image exist
                        if (strpos($image, 'events/arabic') !== false) {
                            // search for its name
                            preg_match('/events\/arabic\/(.*)/', $image, $match);

                            if (count($match) > 0) {
                                $name = $match[0];

                                $media = new EventMedia;

                                $media->event_id = $event->id;
                                $media->link = $name;
                                $media->type = 1;
                                $media->save();
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
                                $imageName = 'events/arabic/' . time() . rand(111, 999) . '.' . $ext;
                                \File::put(public_path() . '/' . $imageName, base64_decode($image));

                                $media = new EventMedia;

                                $media->event_id = $event->id;
                                $media->link = $imageName;
                                $media->type = 1;
                                $media->save();
                            }
                        }
                    }
                }

                // update main shop image
                if (count($images_en) <= 1 && count($images_ar) <= 1) {
                    $default = new EventMedia;
                    $default->event_id = $event->id;
                    $default->link = 'default_images/events.png';
                    $default->type = 1;
                    $default->save();
                }
            }

            /** Ticket price **/
            if ($request->is_paid == 1) {
                try {
                    $ticket = new EventTicket;
                    $ticket->event_id = $event->id;
                    $ticket->name = 'default';
                    $ticket->price = $request->price;
                    $ticket->available_tickets = $request->number_of_tickets;
                    $ticket->current_available_tickets = $request->number_of_tickets;
                    $ticket->currency_id = $request->currency;
                    $ticket->save();
                } catch (\Exception $ex) {
                    if (\Lang::getLocale() == 'en') {
                        Session::flash('warning', 'price error!');
                    } else {
                        Session::flash('warning', 'هناك خطأ ما في السعر');
                    }

                    return redirect()->back();
                }
            }

        } catch (\Exception $ex) {
            if (\Lang::getLocale() == 'en') {
                Session::flash('warning', 'Error 1');
            } else {
                Session::flash('warning', 'خطأ رقم 1');
            }

            return redirect()->back();
        }

        // Insert Arabic localizations
        try {
            Helper::add_localization(4, 'name', $event->id, ($request->arabic_event_name ?: 'بدون اسم'), 2); // arabic_event_name
            Helper::add_localization(4, 'description', $event->id, ($request->arabic_description ?: 'بدون وصف'), 2); // arabic_description
            Helper::add_localization(4, 'venue', $event->id, ($request->arabic_venu ?: 'بدون عنوان'), 2); // arabic_venu

            // Explode hashtags into an array
            if (isset($request->arabic_hashtags) && !empty($request->arabic_hashtags)) {
                $arabic_hashtags = explode(',', $request->arabic_hashtags);
                for ($i = 0; $i < count($arabic_hashtags); $i++) {
                    // Add arabic hashtags in entity_localization table
                    Helper::add_localization(17, 'hash_tags', $event->id, $arabic_hashtags[$i], 2); // arabic_hashtags
                }
            }

        } catch (\Exception $ex) {
            if (\Lang::getLocale() == 'en') {
                Session::flash('warning', 'Error 2');
            } else {
                Session::flash('warning', 'خطأ رقم 2');
            }
            return redirect()->back();
        }

        //Push Notifcations to users about this event
        $this->NotifcationService->EventInterestsPush($event);

        // flash success message & redirect to list backend events
        if (\Lang::getLocale() == 'en') {
            Session::flash('success', 'Event Added Successfully!');
        } else {
            Session::flash('success', 'م إضافة الحدث بنجاح');
        }
        return redirect('/events/backend');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $data['event'] = EventBackend::find($id);

        // redirect back if not found!
        if ($data['event'] == null) {

            if (\Lang::getLocale() == 'en') {
                Session::flash('success', 'Not found!');
            } else {
                Session::flash('success', ' غير موجود');
            }
            return redirect('/events/backend');
        }

        if ($data['event']->is_backend != 1) {
            if (\Lang::getLocale() == 'en') {
                Session::flash('success', 'Not found!');
            } else {
                Session::flash('success', ' غير موجود');
            }
            return redirect('/events/backend');
        }

        return view('events::backend_event_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['event'] = EventBackend::find($id);

        // redirect back if not found!
        if ($data['event'] == null) {
            if (\Lang::getLocale() == 'en') {
                Session::flash('success', 'Not found!');
            } else {
                Session::flash('success', ' غير موجود');
            }
            return redirect('/events/backend');
        }

        $data['genders'] = Genders::all();
        $data['age_range'] = Age_Ranges::all();
        $data['categories'] = EventCategory::all();
        $data['currencies'] = Currency::all();
        $data['ticket'] = EventTicket::where('event_id', $id)->first();

        $data['youtube_links'] = isset($data['event']->media) ? $data['event']->media()->where('type', 2)->get() : '';
        $data['images_ar'] = isset($data['event']->media) ? $data['event']->media()->where('type', 1)->where('link', 'like', '%arabic%')->get() : '';
        $data['images_en'] = isset($data['event']->media) ? $data['event']->media()->where('type', 1)->where('link', 'like', '%english%')->get() : '';
        $data['default_image'] = 'events/default/events.png';

        return view('events::backend_event_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        // dd($request->all());

        /*
         * Start & End dates, we will replace "/" with "-" to not make a conflict with American standard format
         * Ex:
         * 01/11/2018   => accepted 11th of January 2018
         * 13/01/2018   => rejected becuase first left-hand token is supposed to be the month not the day as follows mm/dd/YYY
         */
        $start_date = str_replace('/', '-', $request->start_date);
        $end_date = str_replace('/', '-', $request->end_date);
        // dd([$start_date, $end_date]);
        // dd([Carbon::parse($start_date . ' ' . $request->start_time), Carbon::parse($end_date . ' ' . $request->end_time)]);

        // Get all Arabic & English Images as concatinated base64 string.
        $images_en = explode('-', $request->images_en);
        $images_ar = explode('-', $request->images_ar);
        // dd([$images_en, $images_ar]);

        // Insert Event in events table
        try {
            $event = EventBackend::find($request->id);

            $event->name = $request->english_event_name;
            $event->description = $request->english_description;
            $event->longtuide = $request->lng;
            $event->latitude = $request->lat;
            $event->address = $request->address;
            $event->venue = $request->english_venu;

            $event->age_range_id = $request->age_range;
            $event->gender_id = $request->gender;

            // concatinate start_date + start_time to make them start_datetime
            $event->start_datetime = Carbon::parse($start_date . ' ' . $request->start_time);

            // concatinate end_date + end_time to make them end_datetime
            $event->end_datetime = Carbon::parse($end_date . ' ' . $request->end_time);

            $event->suggest_big_event = $request->is_big_event ?: 0; // check if value is missing then replace it with zero
            $event->is_active = $request->is_active ?: 0; // check if value is missing then replace it with zero

            $event->is_paid = $request->is_paid;

            $event->website = $request->website ?: '';
            $event->email = $request->email ?: '';
            $event->code = $request->code_number;
            $event->mobile = $request->mobile_number;
            $event->updated_by = Auth::id();

            $event->save();

            /**  INSERT English Hashtags **/
            // remove old hashtags
            $event->hashtags()->detach();

            // Explode english hashtags
            $hashtags = explode(',', $request->english_hashtags);

            // search if the hashtag is already exists, if exists get its ID, if not exists insert the hashtag into `hash_tags` table and get its id.
            for ($i = 0; $i < count($hashtags); $i++) {
                // insert hashtag into `hash_tag` table only if it isn't exists.
                if (EventHashtags::where('name', '=', $hashtags[$i])->first() == null) {
                    $hash = new EventHashtags;
                    $hash->name = $hashtags[$i];
                    $hash->save();
                }

                $id = EventHashtags::where('name', '=', $hashtags[$i])->first()->id; // get hashtage id from `hash_tag` table

                // attach event's hashtags with
                $event->hashtags()->attach($id);
            }

            /**  INSERT Categories **/
            // remove old categories
            $event->categories()->detach();

            // add new categories
            for ($i = 0; $i < count($request->categories); $i++) {
                $event->categories()->attach($request->categories[$i]);
            }

            /**  Youtube links  **/
            $event->media()->where('type', 2)->delete();
            $event->media()->createMany([
                ['link' => ($request->youtube_en_1 ?: ''), 'type' => 2],
                ['link' => ($request->youtube_en_2 ?: ''), 'type' => 2],
                ['link' => ($request->youtube_ar_1 ?: ''), 'type' => 2],
                ['link' => ($request->youtube_ar_2 ?: ''), 'type' => 2],
            ]);

            // Images
            $event->media()->where('type', 1)->delete();
            if (count($images_ar) > 0 || count($images_en) > 0) {

                $mainImage = 'default_images/events.jpg';

                // update English images.
                if (count($images_en) > 0) {

                    // add new images
                    foreach ($images_en as $image) {

                        // check if image exist
                        if (strpos($image, 'events/english') !== false) {
                            // search for its name
                            preg_match('/events\/english\/(.*)/', $image, $match);

                            if (count($match) > 0) {
                                $name = $match[0];

                                $media = new EventMedia;

                                $media->event_id = $event->id;
                                $media->link = $name;
                                $media->type = 1;
                                $media->save();
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
                                $imageName = 'events/english/' . time() . rand(111, 999) . '.' . $ext;
                                \File::put(public_path() . '/' . $imageName, base64_decode($image));

                                $media = new EventMedia;

                                $media->event_id = $event->id;
                                $media->link = $imageName;
                                $media->type = 1;
                                $media->save();

                            }
                        }
                    }

                }

                // update Arabic images.
                if (count($images_ar) > 0) {

                    // add new images
                    foreach ($images_ar as $image) {

                        // check if image exist
                        if (strpos($image, 'events/arabic') !== false) {
                            // search for its name
                            preg_match('/events\/arabic\/(.*)/', $image, $match);

                            if (count($match) > 0) {
                                $name = $match[0];

                                $media = new EventMedia;

                                $media->event_id = $event->id;
                                $media->link = $name;
                                $media->type = 1;
                                $media->save();
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
                                $imageName = 'events/arabic/' . time() . rand(111, 999) . '.' . $ext;
                                \File::put(public_path() . '/' . $imageName, base64_decode($image));

                                $media = new EventMedia;

                                $media->event_id = $event->id;
                                $media->link = $imageName;
                                $media->type = 1;
                                $media->save();
                            }
                        }
                    }
                }

                // update main shop image
                if (count($images_en) <= 1 && count($images_ar) <= 1) {
                    $default = new EventMedia;
                    $default->event_id = $event->id;
                    $default->link = 'default_images/events.png';
                    $default->type = 1;
                    $default->save();
                }
            }

            /** Ticket price **/
            if ($request->is_paid == 1) {

                if (EventTicket::where('event_id', $event->id)->first() != null) {
                    $ticket = EventTicket::where('event_id', $event->id)->first();
                } else {
                    $ticket = new EventTicket;
                }

                $ticket->event_id = $request->id;
                $ticket->name = $request->english_event_name;
                $ticket->price = $request->price;
                $ticket->available_tickets = $request->number_of_tickets;
                $ticket->current_available_tickets = $request->number_of_tickets;
                $ticket->currency_id = $request->currency;
                $ticket->save();
            }

        } catch (\Exception $ex) {
            if (\Lang::getLocale() == 'en') {
                Session::flash('error', 'Unkown error while storing event!');
            } else {
                Session::flash('error', 'حدث خطأ ما عند تسجيل الحدث');
            }
            return redirect()->back();
        }

        // Insert Arabic localizations
        try {
            Helper::edit_entity_localization('events', 'name', $event->id, 2, $request->arabic_event_name); // arabic_event_name
            Helper::edit_entity_localization('events', 'description', $event->id, 2, $request->arabic_description); // arabic_description
            Helper::edit_entity_localization('events', 'venue', $event->id, 2, $request->arabic_venu); // arabic_venu

            // remove old hashtags localizations
            Helper::remove_localization(17, 'hash_tags', $event->id, 2);

            // Explode hashtags into an array
            $arabic_hashtags = explode(',', $request->arabic_hashtags);
            for ($i = 0; $i < count($arabic_hashtags); $i++) {
                // Add arabic hashtags in entity_localization table
                Helper::add_localization(17, 'hash_tags', $event->id, $arabic_hashtags[$i], 2); // arabic_hashtags
            }
        } catch (\Exception $ex) {
            if (\Lang::getLocale() == 'en') {
                Session::flash('success', 'Error 4');
            } else {
                Session::flash('success', 'خطأ رقم 4');
            }
            return redirect()->back();
        }

        // flash success message & redirect to list backend events
        if (\Lang::getLocale() == 'en') {
            Session::flash('success', 'Event Added Successfully!');
        } else {
            Session::flash('success', 'تم إضافة الحدث بنجاح');
        }

        return redirect('/events/backend');
    }

    /**
     * Remove the specified resource from storage.
     * @param $request  an object of the incoming request.
     * @return Response
     */
    public function destroy(Request $request)
    {
        // find that record
        $event = EventBackend::find($request->id);

        if (count($event->media) > 0) {
            $event->media()->delete(); // delete english & arabic youtube links
        }

        if (count($event->hashtags) > 0) {
            $event->hashtags()->detach(); // delete hashtags
        }

        if (count($event->categories) > 0) {
            $event->categories()->detach(); // delete categories
        }

        $event->delete(); // delete events

        if (\Lang::getLocale() == 'en') {
            Session::flash('success', 'Event deleted successfully!');
        } else {
            Session::flash('success', ' تم مسح الحدث بنجاح');
        }
        return response()->json(['success', 'event deleted!']);
    }

    /**
     * Delete multi records using AJAX
     * @param $request  an object of the incoming request.
     * @return Response
     */
    public function destroySelected(Request $request)
    {
        foreach ($request->ids as $id) {
            // find that record
            $event = EventBackend::find($id);

            // delete english images or files

            // delete arabic images or files

            if (count($event->media) > 0) {
                $event->media()->delete(); // delete english & arabic youtube links
            }

            if (count($event->hashtags) > 0) {
                $event->hashtags()->detach(); // delete hashtags
            }

            if (count($event->categories) > 0) {
                $event->categories()->detach(); // delete categories
            }

            $event->delete(); // delete events
        }

        if (\Lang::getLocale() == 'en') {
            Session::flash('success', 'Event deleted successfully!');
        } else {
            Session::flash('success', ' تم مسح الحدث بنجاح');
        }

        return response()->json(['success', 'event deleted!']);
    }

    public function filter(Request $request)
    {
        // dd($request->all());
        $events = new EventBackend;
        $flag = 0;

        // category
        if (isset($request->categories) && !empty($request->categories)) {
            $flag = 1;
            $cats = $request->categories;
            $events = $events->whereHas('categories', function ($q) use ($cats) {
                $q->whereIn('event_categories.interest_id', $cats);
            });
        }

        // active
        if ($request->active == 1 && !isset($request->inactive)) {
            $flag = 1;
            $events = $events->where('is_active', 1);
        } else
        if ($request->active == null && $request->inactive == 1) {
            $flag = 1;
            $events = $events->where('is_active', 0);
        }

        // start datetime
        if (isset($request->start_from) && !empty($request->start_from)) {
            $flag = 1;
            $Datetime = date('Y-m-d', strtotime($request->start_from));
            $events = $events->where('start_datetime', '>=', $Datetime);
        }

        if (isset($request->start_to) && !empty($request->start_to)) {
            $flag = 1;
            $Datetime = date('Y-m-d', strtotime($request->start_to));
            $events = $events->where('start_datetime', '<=', $Datetime);
        }

        // end datetime
        if (isset($request->end_from) && !empty($request->end_from)) {
            $flag = 1;
            $Datetime = date('Y-m-d', strtotime($request->end_from));
            $events = $events->where('end_datetime', '>=', $Datetime);
        }

        if (isset($request->end_to) && !empty($request->end_to)) {
            $flag = 1;
            $Datetime = date('Y-m-d', strtotime($request->end_to));
            $events = $events->where('end_datetime', '<=', $Datetime);
        }

        if ($flag == 0) {
            $events = $events->all();
        } else {
            $events = $events->get();
        }

        $data['categories'] = EventCategory::all();
        return view('events::backend', $data)->with('events', $events);
    }

    //Big Events
    public function big_events()
    {
        return view('events::big_events')
            ->with('events', EventBackend::all())->with('big_events', BigEvent::orderBy('sort_order', 'asc')->get());

    }

    public function bigevents_post(Request $request)
    {
        $ids = $request['big_events'];
        $ids_array = array();

        foreach ($ids as $order => $id) {
            $bigevent = BigEvent::where('event_id', $id)->first();
            if ($bigevent) {
                $bigevent->sort_order = $order + 1;
                $bigevent->save();
            } else {
                $bigevent = new BigEvent;
                $bigevent->event_id = $id;
                $bigevent->sort_order = $order + 1;
                $bigevent->save();
            }
            array_push($ids_array, $id);

        }
        //delete old events which are not found in new selected ones
        BigEvent::whereNotIn('event_id', $ids_array)->delete();
        //return response()->json(lang('keywords.orderSaved'));
        return response()->json(trans('keywords.orderSaved'));
    }

    public function bigevents_select($value, Request $request)
    {
        if ($value == 2) {
            $events = EventBackend::where('is_active', '=', 1)->where('suggest_big_event', '=', 1)->get();
        } else {
            $events = EventBackend::where('is_active', '=', 1)->get();

        }
        $options = array();
        foreach ($events as $k => $v) {
            $options[$k] = '<option value="' . $v->id . '" onclick="saveSort()">' . $v->nameMultilang . '</option>';
        }
        //dd(response()->json($options));
        return response()->json($options);
        // ->with('categories', EventCategory::all());
    }

    public function bigevents_remove(Request $request)
    {

        BigEvent::truncate();
        return response()->json(trans('keywords.orderRemoved'));
    }

    public function bigevents_post_old(Request $request)
    {
        $ids = $request['big_events'];
        BigEvent::truncate();
        foreach ($ids as $order => $id) {
            $bigevent = new BigEvent;
            $bigevent->event_id = $id;
            $bigevent->sort_order = $order + 1;
            $bigevent->save();
        }
        return response()->json($ids);
    }

}
