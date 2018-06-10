<?php

/**
 *  Author:  Ahmed Yacoub
 *  Email:   ahmed.yacoub@outlook.com
 *  Date: May 1, 2018
 */

namespace Modules\Events\Http\Controllers;

use Helper;
use Session;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\EventBackend;
use App\Genders;
use App\Age_Ranges;
use App\EventCategory;
use App\Currency;
use App\EventHashtags;
use App\BigEvent;
class EventsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
        // Validate incoming request inputs with the following validation rules.
        $this->validate($request, [
            'english_event_name'    => 'required|min:2|max:100',
            'english_description'   => 'required|min:2|max:250',
            'lat'                   => 'required|min:2|max:50',
            'lng'                   => 'required',
            'english_venu'          => 'required',
            'english_hashtags'      => 'required',
            'gender'                => 'required',
            'age_range'             => 'required',
            'start_date'            => 'required',
            'start_time'            => 'required',
            'end_date'              => 'required',
            'end_time'              => 'required',
            'categories'            => 'required',

            'arabic_event_name'     => 'required|min:2|max:100',
            'arabic_description'    => 'required|min:2|max:250',
            'arabic_venu'           => 'required|',
            'arabic_hashtags'       => 'required|',

            'is_paid'               => 'required',
            'price'                 => 'numeric',
            'currency'              => 'numeric',
            'number_of_tickets'     => 'numeric',

            'website'               => 'required',
            'email'                 => 'required',
            'code_number'           => 'required',
            'mobile_number'         => 'required',

            'youtube_ar_1'          => 'required|',
            'youtube_en_1'          => 'required|',
            'youtube_ar_2'          => 'required|',
            'youtube_en_2'          => 'required|',
            // 'arabic_images'         => 'required|',
            // 'english_images'        => 'required',
        ]);

        // Check if there is any images or files and move them to public/events
        // Arabic Event Images
        if ( $request->hasfile('arabic_images') ) {
            foreach ( $request->file('arabic_images') as $image ) {
                $name = $image->getClientOriginalName();
                $image->move( public_path().'/events/arabic', $name );
                $data_arabic[] = '/public/arabic/'.$name;
            }
        }

        // English Event Images
        if ( $request->hasfile('english_images') ) {
            foreach ($request->file('english_images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move( public_path().'/events/english', $name );
                $data_english[] = '/public/english/'.$name;
            }
        }

        // Explode english hashtags
        $hashtags = explode(',', $request->english_hashtags);

        // Insert Event in events table
        try {
            $event = new EventBackend;

            $event->name        = $request->english_event_name;
            $event->description = $request->english_description;
            $event->longtuide   = $request->lng;
            $event->latitude    = $request->lat;
            $event->venue       = $request->english_venu;

            $event->age_range_id= $request->age_range;
            $event->gender_id   = $request->gender;

            // concatinate start_date + start_time to make them start_datetime
            $event->start_datetime = date('Y-m-d', strtotime($request->start_date)) .' '. date('h:i:s', strtotime($request->start_time));

            // concatinate end_date + end_time to make them end_datetime
            $event->end_datetime = date('Y-m-d', strtotime($request->end_date)) .' '. date('h:i:s', strtotime($request->end_time));

            $event->suggest_big_event = $request->is_big_event ? : 0;   // check if value is missing then replace it with zero
            $event->is_active   = $request->is_active ? : 0;            // check if value is missing then replace it with zero

            $event->is_paid     = $request->is_paid;

            $event->website     = $request->website;
            $event->email       = $request->email;
            $event->code        = $request->code_number;
            $event->mobile      = $request->mobile_number;
            $event->created_by  = Auth::id();
            // TODO: youtube links & images

            $event->save();

            /**  INSERT English Hashtags **/
            // search if the hashtag is already exists, if exists get its ID, if not exists insert the hashtag into `hash_tags` table and get its id.
            for($i=0; $i<count($hashtags); $i++) {
                // insert hashtag into `hash_tag` table only if it isn't exists.
                if( EventHashtags::where('name', '=', $hashtags[$i])->first() == NULL ) {
                    $hash = new EventHashtags;
                    $hash->name = $hashtags[$i];
                    $hash->save();
                }

                $id = EventHashtags::where('name', '=', $hashtags[$i])->first()->id;    // get hashtage id from `hash_tag` table

                // attach event's hashtags with
                $event->hashtags()->attach($id);
            }

            /**  INSERT Categories **/
            for($i=0; $i<count($request->categories); $i++) {
                $event->categories()->attach( $request->categories[$i] );
            }

            /**  Youtube links  **/
            $event->media()->createMany([
                [ 'link' => $request->youtube_en_1, 'type'=> 2],
                [ 'link' => $request->youtube_en_2, 'type'=> 2],
                [ 'link' => $request->youtube_ar_1, 'type'=> 2],
                [ 'link' => $request->youtube_ar_2, 'type'=> 2],
            ]);

        } catch( \Exception $ex ) {
            dd($ex);
            Session::flash('warning', 'Error 1');
            return redirect()->back();
        }

        // Insert Arabic localizations
        try {
            Helper::add_localization(4, 'name',         $event->id, $request->arabic_event_name,    2);             // arabic_event_name
            Helper::add_localization(4, 'description',  $event->id, $request->arabic_description,   2);             // arabic_description
            Helper::add_localization(4, 'venue',         $event->id, $request->arabic_venu,          2);             // arabic_venu

            // Explode hashtags into an array
            $arabic_hashtags = explode(',', $request->arabic_hashtags);
            for($i=0; $i<count($arabic_hashtags); $i++) {
                // Add arabic hashtags in entity_localization table
                Helper::add_localization(4, 'hashtag', $event->id, $arabic_hashtags[$i], 2);                        // arabic_hashtags
            }
        } catch(\Exception $ex) {
            dd($ex);
            Session::flash('warning', 'Error 2');
            return redirect()->back();
        }

        // flash success message & redirect to list backend events
        Session::flash('success', 'Event Added Successfully! تم إضافة الحدث بنجاح');
        return redirect('/events/backend');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $data['event'] = EventBackend::find($id);

        return view('events::backend_event_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('events::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
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

        // delete english images or files

        // delete arabic images or files

        $event->media()->delete();          // delete english & arabic youtube links
        $event->hashtags()->detach();       // delete hashtags
        $event->categories()->detach();     // delete categories
        $event->delete();                   // delete events

        Session::flash('success', 'Event deleted successfully! تم مسح الحدث بنجاح');
        return response()->json(['success', 'event deleted!']);
    }


    /**
     * Delete multi records using AJAX
     * @param $request  an object of the incoming request.
     * @return Response
     */
    public function destroySelected(Request $request) {

        foreach($request->ids as $id) {
            // find that record
            $event = EventBackend::find($id);

            // delete english images or files

            // delete arabic images or files

            $event->media()->delete();          // delete english & arabic youtube links
            $event->hashtags()->detach();       // delete hashtags
            $event->categories()->detach();     // delete categories
            $event->delete();                   // delete events
        }

        Session::flash('success', 'Event deleted successfully! تم مسح الحدث بنجاح');
        return response()->json(['success', 'event deleted!']);
    }

    public function filter(Request $request)
    {
        // dd($request->all());
       $events = new EventBackend;
        $flag = 0;

        // category
        if( isset($request->categories) && !empty($request->categories) ) {
            $flag = 1;
            $cats = $request->categories;
            $events = $events->whereHas('categories', function($q) use($cats){
                $q->whereIn('event_categories.interest_id', $cats);
            });
        }

        // active
        if( $request->active == 1 && !isset($request->inactive) ) {
            $flag = 1;
            $events = $events->where('is_active', 1);
        } else
        if( $request->active == NULL && $request->inactive == 1) {
            $flag = 1;
            $events = $events->where('is_active', 0);
        }

        // start datetime
        if( isset($request->start_from) && !empty($request->start_from) ) {
            $flag = 1;
            $Datetime = date('Y-m-d', strtotime($request->start_from));
            $events = $events->where('start_datetime','>=', $Datetime);
        }

        if( isset($request->start_to) && !empty($request->start_to) ) {
            $flag = 1;
            $Datetime = date('Y-m-d', strtotime($request->start_to));
            $events = $events->where('start_datetime','<=', $Datetime);
        }



        // end datetime
        if( isset($request->end_from) && !empty($request->end_from) ) {
            $flag = 1;
            $Datetime = date('Y-m-d', strtotime($request->end_from));
            $events = $events->where('end_datetime','>=', $Datetime);
        }

        if( isset($request->end_to) && !empty($request->end_to) ) {
            $flag = 1;
            $Datetime = date('Y-m-d', strtotime($request->end_to));
            $events = $events->where('end_datetime','<=', $Datetime);
        }

        if( $flag == 0 ) {
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
             ->with('events', EventBackend::all());
            // ->with('categories', EventCategory::all());
    }

    public function bigevents_post(Request $request)
    {
        $ids = $request['big_events'];
        // $big_events =   explode( ',', $ids );
        // $bigevent_delete = BigEvent::all();
        // $bigevent_delete->delete();
        foreach($ids as $order=>$id)
        {
          $bigevent = new BigEvent;
          $bigevent->event_id = $id;
          $bigevent->sort_order = $order;
          $bigevent->save();
        }
        return response()->json($ids);
            // ->with('categories', EventCategory::all());
    }


}
