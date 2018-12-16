<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use App\EventBackend;
use App\EventMedia;
use App\Helpers\Helper;
use App\EventSubscription;
use Session;

class EventsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {
            date_default_timezone_set('asia/Riyadh');
            $datetimenow = Carbon::now();
            $event=EventBackend::find($id);
            if($event==null){
               $event_not_found=true; 
               return view ('home::404',array('event_not_found'=>$event_not_found));
            }
// compare datetime to check if an event has expired
            if($event->end_datetime <= $datetimenow){
        
                return view('home::404');
            }
            //get event first image
            $event_media =EventMedia::where('event_id',$id)->where('type', 1)->pluck('link')->first();
            //dd($event_media);
            return view('home::index',array('event'=>$event,'event_media'=>$event_media));
    }

    //event arabic view 
    public function indexAr($id){

        date_default_timezone_set('asia/Riyadh');
        $datetimenow = Carbon::now();
        $event=EventBackend::find($id);
        if($event==null){
            $event_not_found=true; 
            return view ('home::404',array('event_not_found'=>$event_not_found));
         }
   // compare datetime to check if an event has expired
        if($event->end_datetime <= $datetimenow){
                                                                                
            return view('home::404');
        }
        //get event arabic values 
        $event_name=Helper::localization('events','name',$id,2); 
        $event_description=Helper::localization('events','description',$id,2);
        //get event first image
        $event_media =EventMedia::where('event_id',$id)->where('type',1)->pluck('link')->first();
       
      return view('home::index_ar',array('event'=>$event,'event_description'=>$event_description,'event_name'=>$event_name,'event_media'=>$event_media));
    }
    
    
    //Subscribe to an event
    public function subscribe($id,Request $request){
        
        if(isset($request)){
        
            //Check if an email has been used before for the same event
           $event_subscription_email_check=EventSubscription::where('event_id',$id)->where('email',$request->email)->exists();

           if($event_subscription_email_check){            
            //return
            Session::flash('email_exists', 'This email has already been used for this event');
            // return redirect()->route(
            //     'event_view', ['id' => $id]
            // );
            return redirect()->back();
           }else{
            //save subscription data
            date_default_timezone_set('asia/Riyadh');
           $subscribe = new EventSubscription();
           $subscribe->name=$request->name;
           $subscribe->email=$request->email;
           $subscribe->mobile=$request->mobile;
           $subscribe->event_id=$id;
           $subscribe->created_at=Carbon::now();
            
           if($subscribe->save()){
            Session::flash('subscribe_success', 'you have successfuly subscribed');
            return redirect()->back();
           }else{
            Session::flash('subscribe_error', 'error !, please try again');  
             return redirect()->back();
           }
       
        } 

          
          
       }

    }
       //show event subscribers
    public function getSubscribers($id){
        //$id_hash = md5($id);
         
        date_default_timezone_set('asia/Riyadh');
        $datetimenow = Carbon::now();
        $event=EventBackend::find($id);

        if($event->end_datetime <= $datetimenow){
             
            return view('home::404');
        }
        $event_media =EventMedia::where('event_id',$id)->pluck('link')->first();
        
        //query event subscribers and send to the event view
        $event_subscribers=EventSubscription::where('event_id',$id)->get();
      
         return view('home::index',array('event'=>$event,'event_media'=>$event_media,'subscribers'=>$event_subscribers));

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('home::create');
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
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('home::edit');
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
     * @return Response
     */
    public function destroy()
    {
    }
}
