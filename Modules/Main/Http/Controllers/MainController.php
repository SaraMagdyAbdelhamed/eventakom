<?php

namespace Modules\Main\Http\Controllers;

use Helper;
use Session;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Fixed;
use App\Entity;
use App\EntityLocalization;


class MainController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {  
    }

    public function change_language($lang) {
        \App::isLocale('ar') ? str_replace('ar', 'en', Request::url()) : str_replace('en', 'ar', Request::url());
    }

    public function about() {
        return view('main::about_us')
                ->with('about_us_english', Fixed::find(1)->body)
                ->with('about_us_arabic', Helper::localization('fixed_pages', 'body', '1', '2'));
    }

    public function about_edit( Request $request ) {
        $this->validate($request, [
            // 'arabicContent'  => 'min:',
            'englishContent' => 'required'
        ]);

        // update arabic 
       try {
            Helper::edit_entity_localization('fixed_pages', 'body', '1', '2', $request->arabicContent);
       } catch(\Exception $ex) {
            dd($ex);
            Session::flash('warning', 'لا يمكن تعديل المحتوي باللغة العربية');
       }

        // update english
        try {
            $fixed = Fixed::find(1);
            $fixed->body = $request->englishContent;
            $fixed->updated_by = Auth::id();
            $fixed->save();

        } catch(\Exception $ex) {
            dd($ex);
            Session::flash('warning', 'Can not edit English version!');
        }

        return redirect()->back();
    }

    public function terms() {
        return view('main::terms');
    }

    public function privacy() {
        return view('main::privacy');
    }

    public function contact() {
        return view('main::contact');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('main::create');
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
        return view('main::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('main::edit');
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
