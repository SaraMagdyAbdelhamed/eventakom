<?php

namespace Modules\Events\Http\Controllers;

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
class EventsMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
     public function index()
    {
        $current_events = EventMobile::CurrentEvents()->get();
        $pending_events = EventMobile::PendingEvents()->get();
        $categories = EventCategory::all();
        return view('events::eventsMobile.list')
                    // ->with('events', EventMobile::MobileApproved()->get());
                      ->with(compact('current_events', 'pending_events','categories'));
     }

      public function event_filter(Request $request)
    {
        if (isset($request->categories)) {
        $data['current_events'] = EventMobile::join('event_categories as c','events.id','=','c.event_id')->where(function ($q) use ($request) {
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
                $q->whereIn('c.interest_id', $request->categories);
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

        $data['categories'] = EventCategory::all();
        //$data['current_events'] = EventMobile::CurrentEvents()->get();
        $data['pending_events'] = EventMobile::PendingEvents()->get();
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
        
        return view('events::eventsMobile.edit',$data);
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
    public function update(Request $request)
    {
    }

    /**
     * Accept the specified Event.
     * @param  Id $id
     * @return Response
     */
    public function accept($id)
    {
      $accepted = EventMobile::find($id);
      $accepted->update(['event_status_id' =>2]);
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
