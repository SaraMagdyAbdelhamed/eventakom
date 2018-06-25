<?php

namespace Modules\Famous\Http\Controllers;

use Helper;
use Session;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\FamousCategory;
use App\FamousAttraction;

class FamousController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['attractions'] = FamousAttraction::all();
        return view('famous::list', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['categories'] = FamousCategory::all();

        return view('famous::create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'place_name'  => 'required|max:100',
            'lat'         => 'required',
            'lng'         => 'required',
            'place_categories'  => 'required',
            'other_info'  => ($request->other_info ? 'max:140' : ''),
        ]);

        // Insert English values
        try {
            // Add new famous attraction
            $famous = new FamousAttraction;

            $famous->name       = $request->place_name;
            $famous->address    = $request->address;
            $famous->longtuide  = $request->lng;
            $famous->latitude   = $request->lat;
            $famous->phone      = $request->phone_number;
            $famous->info       = $request->other_info;
            $famous->is_active  = $request->is_active ? 1 : 0;
            $famous->save();

            // Attach new categories
            for ($i = 0; $i < count($request->place_categories); $i++) {
                $famous->categories()->attach($request->place_categories[$i]);
            }

            // Attach days
            $days  = array();
            $start = array();
            $end  = array();
            
            if($request->sat) {
                $days[]     = $request->sat;
                $start[]    = $request->sat_start;
                $end[]      = $request->sat_end;
            }
            if($request->sun) {
                $days[] = $request->sun;
                $start[]    = $request->sun_start;
                $end[]      = $request->sun_end;
            }
            if($request->mon) {
                $days[] = $request->mon;
                $start[]    = $request->mon_start;
                $end[]      = $request->mon_end;
            }
            if($request->tue) {
                $days[] = $request->tue;
                $start[]    = $request->tue_start;
                $end[]      = $request->tue_end;
            }
            if($request->wed) {
                $days[] = $request->wed;
                $start[]    = $request->wed_start;
                $end[]      = $request->wed_end;
            }
            if($request->thu) {
                $days[] = $request->thu;
                $start[]    = $request->thu_start;
                $end[]      = $request->thu_end;
            }
            if($request->fri) {
                $days[] = $request->fri;
                $start[]    = $request->fri_start;
                $end[]      = $request->fri_end;
            }
            
            if( count($days) > 0 ) {
                for ($i = 0; $i < count($days); $i++) {
                    $famous->days()->attach( [$days[$i] => [ 'from'=>$start[$i], 'to'=>$end[$i] ]] );
                }
            }

            // Attach media
            $famous->media()->createMany([
                ['link' => ($request->youtube_en ? : ''), 'type' => 2],
                ['link' => ($request->youtube_ar ? : ''), 'type' => 2],
            ]);

        } catch(\Exception $ex){
            dd($ex);
            Session::flash('warning', 'English error!');
            return redirect()->back();
        }

        // Insert Arabic values
        try {

        } catch(\Exception $ex){

        }

        // flash success & redirect ot list page
        Session::flash('success', 'Attraction added successfully! تم اضافة المزار بنجاح');
        return redirect('/attractions');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Request $request)
    {
        $famous = FamousAttraction::find($request->id);
        $categories = '';

        foreach($famous->categories as $cat) {
            $categories .= $cat->name;
        }
        $row = [
            'id'    => $famous->id,
            'name'  => $famous->name,
            'address' => $famous->address,
            'lng'   => $famous->longtuide,
            'lat'   => $famous->latitude,
            'phone' => $famous->phone,
            'info'  => $famous->info,
            'is_active' => $famous->is_active,
            'categories'=> $categories
        ];
        return response()->json($row);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('famous::edit');
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
    public function destroy(Request $request)
    {
        $famous = FamousAttraction::find($request->id);

        // detach categories
        $famous->categories()->detach();

        // detach days
        $famous->days()->detach();

        // detach media
        $famous->media()->delete();

        // delete famous attraction
        $famous->delete();

        Session::flash('success', 'Deleted successfully! تم الحذف بنجاح');
        return response()->json(['success' => 'deleted!']);
    }

    public function destroySelected(Request $request)
    {
        foreach($request->ids as $id) {
            $famous = FamousAttraction::find(id);

            // detach categories
            $famous->categories()->detach();

            // detach days
            $famous->days()->detach();

            // detach media
            $famous->media()->delete();

            // delete famous attraction
            $famous->delete();

            Session::flash('success', 'Deleted successfully! تم الحذف بنجاح');
            return response()->json(['success' => 'deleted!']);
        }
    }

}
