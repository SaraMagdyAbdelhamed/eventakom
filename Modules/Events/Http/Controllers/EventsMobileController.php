<?php

namespace Modules\Events\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\EventMobile;
use App\EventCategory;
use App\EventTicket;
use App\EventBookingTicket;
use App\EventPost;
use App\EntityLocalization;
use App\Genders;
use App\Age_Ranges;
use App\Currency;
use App\EventHashtags;
use App\Helpers\Helper;
use App\EventMedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class EventsMobileController extends Controller
{
     use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Response
     */
     public function index()
    {
        $current_events = EventMobile::CurrentEvents()->get();
        $pending_events = EventMobile::PendingEvents()->get();
        $rejected_events= EventMobile::EventsRejected()->get();
        $categories = EventCategory::all();
        return view('events::eventsMobile.list')
                    // ->with('events', EventMobile::MobileApproved()->get());
                      ->with(compact('current_events', 'pending_events','categories','rejected_events'));
     }

      public function event_filter(Request $request)
    {
        if (isset($request->categories)) {
        $data['current_events'] =   $events = EventMobile::whereHas('categories', function($q) use($request){
            $q->whereIn('event_categories.interest_id', $request->categories);
            $q->where('is_backend','=',0);
            $q->where('event_status_id', 2);

         if (isset($request->startdate_from ) && !isset($request->startdate_to)) {

                $from_date = date('Y-m-d', strtotime($request->startdate_from));
                $to_date = Carbon::now()->format('Y-m-d');
                $q->whereBetween('start_datetime', array($from_date, $to_date))->get();
            } elseif(isset($request->startdate_from ) && isset($request->startdate_to)){

                $from_date = date('Y-m-d', strtotime($request->startdate_from));
                $to_date = date('Y-m-d', strtotime($request->startdate_to));
                $q->whereBetween('start_datetime', array($from_date, $to_date))->get();

            }


             if (!isset($request->enddate_from ) && isset($request->endtdate_to)) {
                $from_date = Carbon::now()->format('Y-m-d');
                $to_date = date('Y-m-d', strtotime($request->endtdate_to));

                $q->whereBetween('end_datetime', array($from_date, $to_date))->get();
            } elseif(isset($request->enddate_from ) && isset($request->enddate_to)){

                $from_date = date('Y-m-d', strtotime($request->enddate_from));
                $to_date = date('Y-m-d', strtotime($request->enddate_to));
                $q->whereBetween('end_datetime', array($from_date, $to_date))->get();

            }
                $q->whereIn('event_categories.interest_id', $request->categories);
                $q->select('events.*');
                 if (isset($request->status)) {
                $q->whereIn('is_active', $request->status);
                 }
              })->get();

            } else{
            $data['current_events'] = EventMobile::where(function ($q) use ($request) {
            $q->where('is_backend','=',0);
            $q->where('event_status_id', 2);

            if (isset($request->status)) {
                $q->whereIn('is_active', $request->status);
            }

             if (isset($request->startdate_from ) && !isset($request->startdate_to)) {

                $from_date = date('Y-m-d', strtotime($request->startdate_from));
                $to_date = Carbon::now()->format('Y-m-d');
                $q->whereBetween('start_datetime', array($from_date, $to_date))->get();
            } elseif(isset($request->startdate_from ) && isset($request->startdate_to)){

                $from_date = date('Y-m-d', strtotime($request->startdate_from));
                $to_date = date('Y-m-d', strtotime($request->startdate_to));
                $q->whereBetween('start_datetime', array($from_date, $to_date))->get();

            }


             if (!isset($request->enddate_from ) && isset($request->endtdate_to)) {
                $from_date = Carbon::now()->format('Y-m-d');
                $to_date = date('Y-m-d', strtotime($request->endtdate_to));

                $q->whereBetween('end_datetime', array($from_date, $to_date))->get();
            } elseif(isset($request->enddate_from ) && isset($request->enddate_to)){

                $from_date = date('Y-m-d', strtotime($request->enddate_from));
                $to_date = date('Y-m-d', strtotime($request->enddate_to));
                $q->whereBetween('end_datetime', array($from_date, $to_date))->get();

            }

        })->get();
        }
      // dd($data['current_events']);
        $data['categories'] = EventCategory::all();
        //$data['current_events'] = EventMobile::CurrentEvents()->get();
        $data['pending_events'] = EventMobile::PendingEvents()->get();
        $data['rejected_events']= EventMobile::EventsRejected()->get();
        return view('events::eventsMobile.list', $data);

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function view($id)
    {
        //INFO
        $data['event'] = EventMobile::find($id);
        $data['categories'] =  EventMobile::join('event_categories as c','events.id','=','c.event_id')->where(function ($q) use ($id) {
            $q->where('is_backend','=',0);
            $q->where('event_status_id', 2);
            $q->where('event_id', $id);
            $q->select('interest_id');
                })->get();
       // dd($data['categories']);
        //POSTS
        $data['event_posts'] = EventPost::where('event_id','=',$id)->get();

        //TICKETS
        $data['tickets'] = EventTicket::where('event_id','=',$id)->get();
        $data['booked_tickets'] = EventBookingTicket::where('event_id','=',$id)->get();

        return view('events::eventsMobile.view',$data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        // mobile event
        $data['event']         = EventMobile::find($id);
        $data['genders']       = Genders::all();
        $data['age_range']     = Age_Ranges::all();
        $data['categories']    = EventCategory::all();
        $data['currencies']    = Currency::all();
        $data['bigEventCount'] = EventMobile::BigEvent($id);
        $data['event_tickets'] = EventTicket::where('event_id','=',$id)->first();
        $data['event_media']   = EventMedia::where('event_id','=',$id)->get();
        $event = EventMobile::find($id);
        $data['event_categories'] = $event->categories()->select('*')->where('event_id','=',$id)->get();
        $data['arabic_hashtags'] =   EntityLocalization::where('entity_id','=',4)
        ->where('field', '=', 'hashtag')
        ->where('item_id', '=', $id)
        ->where('lang_id', '=',2)
        ->get(); 
        //dd($data['arabic_hashtags']);
        return view('events::eventsMobile.edit',$data);
    }


 public function update(Request $request)
    { 
        //dd($request);
        // Validate incoming request inputs with the following validation rules.
        $this->validate($request, [
            'english_event_name'    => 'required|min:2|max:100',
            'english_description'   => 'required|min:2|max:250',
            // 'lat'                   => 'required|min:2|max:50',
            // 'lng'                   => 'required',
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


        if ( $request->hasfile('test') ) {
            //dd('test before loop');
            foreach ( $request->file('test') as $image ) {
                $name = $image->getClientOriginalName();
                // dd($name);
              try{  $image->move( public_path().'/events/arabic', $name );
                 }catch( \Exception $ex ) {
            dd($ex);
            Session::flash('warning', 'UPLOADD!!');
            return redirect()->back();
                }
                $data_arabic[] = '/public/arabic/'.$name;
            }
        }
        // Check if there is any images or files and move them to public/events
        // Arabic Event Images
        if ( $request->hasfile('arabic_images') ) {
              $imgs_count = count($_FILES['arabic_images']['name']); 
              if($imgs_count>5){ 
         Session::flash('error', 'لم يتم التحديث الحد الاأقصى للصور هو 5 صور');
        return redirect('/events/mobile');  
               }else{
            foreach ( $request->file('arabic_images') as $image ) {
                $name = $image->getClientOriginalName();
                $image->move( public_path().'/events/arabic', $name );
                $data_arabic[] = '/public/arabic/'.$name;
                    $media = new EventMedia;
                    $media->event_id = $request['event_id']; $media->link = '/public/arabic/'.$name;
                     $media->type = 1;
                    $media->save();
            }
        }
        }

        // English Event Images
        if ( $request->hasfile('english_images') ) {
             $imgs_count = count($_FILES['english_images']['name']); 
              if($imgs_count>5){ 
         Session::flash('error', 'لم يتم التحديث الحد الاأقصى للصور هو 5 صور');
        return redirect('/events/mobile');  
               }else{
            foreach ($request->file('english_images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move( public_path().'/events/english', $name );
                $data_english[] = '/public/english/'.$name;
                 $media = new EventMedia;
                    $media->event_id = $request['event_id']; $media->link = '/public/english/'.$name;
                     $media->type = 1;
                    $media->save();
            }
          }
        }

        // Explode english hashtags
        $hashtags = explode(',', $request->english_hashtags);

        // Insert Event in events table
        try {
            //$event = new EventBackend;
            $event = EventMobile::find($request['event_id']);
           // dd($request['event_id']);
            $event->name        = $request->english_event_name;
            $event->description = $request->english_description;
            if(isset($request->lng) && isset($request->lat) )
            {
            $event->longtuide   = $request->lng;
            $event->latitude    = $request->lat;
            }else{
            $event->longtuide   = $event->longtuide;
            $event->latitude    = $event->latitude;   
            }
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

            $event->Update();
            
            /**  INSERT English Hashtags **/
            // search if the hashtag is already exists, if exists get its ID, if not exists insert the hashtag into `hash_tags` table and get its id.
            $event->hashtags()->detach();
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

            /** update Categories **/
            //first remove old and records in pivot then insert the new categories
            $event->categories()->detach();
            for($i=0; $i<count($request->categories); $i++) {
                $event->categories()->attach( $request->categories[$i] );
            }

            /**  Youtube links  **/
           // $event->media()->update(['category_id' => $newCatId]);
            $event->media()->delete();
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
        //remove old one first then insert newer
          Helper::remove_localization(4, 'name',         $event->id,2);
          Helper::remove_localization(4, 'description',  $event->id,2);
          Helper::remove_localization(4, 'venue',         $event->id,2);
          Helper::remove_localization(4, 'hashtag',         $event->id,2);
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

        //tickets
        $tickets = EventTicket::where('event_id','=',$request['event_id'])->first();
        $tickets->price = $request->price;
        $tickets->currency_id = $request->currency;
        $tickets->available_tickets = $request->number_of_tickets;                           
        $tickets->save();

        // flash success message & redirect to list backend events
        Session::flash('success', 'Event updated Successfully! تم تحديث الحدث بنجاح');
        return redirect('/events/mobile');
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('events::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('events::show');
    }


    

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    // public function update(Request $request)
    // {
    // }

    /**
     * Accept the specified Event.
     * @param  Id $id
     * @return Response
     */
    public function accept($id)
    {
      $accepted = EventMobile::find($id);
      $accepted->update(['event_status_id' =>2 , 'is_active' =>1]);
      $accepted->save();
    }

    /**
     * Accept the Selected Events.
     *
     */

    public function accept_all()
    {
        $ids = $_POST['ids'];
        foreach ($ids as $id) {
          $accepted = EventMobile::find($id);
          $accepted->update(['event_status_id' =>2]);
          $accepted->save();
        }

    }
   
    public function reject(Request $request)
    {
      $id = $request['event_id'];
      $rejected = EventMobile::find($id);
      $rejected->update(['event_status_id' =>3,'rejection_reason'=>$request['reason']]);
      // arabic rejection reson "instead of these 5 lines later we can create function in EntityLocalization model takes these 4 parameters and return 1"
      $reason_ar = new EntityLocalization;
      $reason_ar->entity_id = 4;
      $reason_ar->field = 'rejection_reason';
      $reason_ar->item_id = $id;
      $reason_ar->value = $request['reason_ar'];
     if($rejected->save() && $reason_ar->save() ){
       $response = array(
            'status' => 'success',
            'msg' => 'Event rejected successfully',
        );
      //  return Response::json($response);
        return response()->json($response);  // <<<<<<<<< see this line
    }else{
       $response = array(
            'status' => 'error',
            'msg' => 'Something goes wrong!',
        );
       return response()->json($response); 
    }


    }

      public function pending($id)
    {
      $accepted = EventMobile::find($id);
      $accepted->update(['event_status_id' =>1 , 'is_active' =>1]);
      $accepted->save();
    }

     public function pending_all()
    {
        $ids = $_POST['ids'];
        foreach ($ids as $id) {
          $accepted = EventMobile::find($id);
          $accepted->update(['event_status_id' =>1]);
          $accepted->save();
        }

    }
    /**
     * Remove the specified resource from storage.
     * @return Response
     */
     public function destroy($id)
     {
         $event = EventMobile::find($id);
         $event->delete();
     }

     public function destroy_all()
     {
         $ids = $_POST['ids'];
         foreach ($ids as $id) {
             EventMobile::find($id)->delete();
         }
     }

      public function post_destroy($id)
     {
         $event = EventPost::find($id);
         $event->delete();
     }

     public function post_destroy_all()
     {
         $ids = $_POST['ids'];
         foreach ($ids as $id) {
             EventPost::find($id)->delete();
         }
     }
}
