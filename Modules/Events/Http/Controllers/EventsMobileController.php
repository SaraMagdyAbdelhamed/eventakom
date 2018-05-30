<?php

namespace Modules\Events\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\EventMobile;
use App\EventCategory;

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
        $data['mobiles'] = EventMobile::where(function ($q) use ($request) {
            $q->where('is_backend','=',0);
            $q->where('event_status_id', 2);
         

            // if (isset($request->countries)) {
            //     $q->whereIn('country_id', $request->countries);
            // }
            // if (isset($request->cities)) {
            //     $q->whereIn('city_id', $request->cities);
            // }
            // if (isset($request->age)) {
            //     $range = Age_Ranges::find($request->age);
            //     $to = date('Y') - $range->from;
            //     $from = date('Y') - $range->to;
            //     $to_date = date("$to-12-31 23:59:59");
            //     $from_date = date("$from-01-01 00:00:00");
            //     $q->whereBetween('birthdate', array($from_date, $to_date))->get();
            // }

            // if (isset($request->gender)) {
            //     $q->whereIn('gender_id', $request->gender);
            // }

        })->get();

        $data['categories'] = EventCategory::all();
        $data['current_events'] = EventMobile::CurrentEvents()->get();
        $data['pending_events'] = EventMobile::PendingEvents()->get();
        return view('events::eventsMobile.list', $data);
  
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
     * @return Response
     */
    public function destroy()
    {
    }
}
