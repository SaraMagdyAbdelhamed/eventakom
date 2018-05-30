<?php

namespace Modules\Events\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\EventMobile;
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

        return view('events::eventsMobile.list')
                    // ->with('events', EventMobile::MobileApproved()->get());
                      ->with(compact('current_events', 'pending_events'));
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
