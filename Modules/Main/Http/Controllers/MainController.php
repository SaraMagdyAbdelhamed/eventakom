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
use App\SystemSetting;


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

    // view about us
    public function about() {
        return view('main::about_us')
                ->with('about_us_english', Fixed::find(1)->body)
                ->with('about_us_arabic', Helper::localization('fixed_pages', 'body', '1', '2'));
    }

    // view terms n conditions
    public function terms() {
        return view('main::terms')
                ->with('about_us_english', Fixed::find(2)->body)
                ->with('about_us_arabic', Helper::localization('fixed_pages', 'body', '2', '2'));
    }


    public function privacy() {
        return view('main::privacy')
                ->with('about_us_english', Fixed::find(3)->body)
                ->with('about_us_arabic', Helper::localization('fixed_pages', 'body', '3', '2'));
    }

    public function contact() {
        $query = SystemSetting::where('name', 'contact_us')->first();
        $email = $query ? $query->value : '';

        return view('main::contact')
                ->with('email', $email);
    }

    /**
     *  Updates fixed pages [about us, terms & conditions, privacy and policy and contact us]
     *  @param  $id        idicates the following fields to be updated     `fixed_pages`.id for English version && `entity_localizations`.item_id for Arabic version.
     *  @param  Request $request    incoming data from POST request.
     *  
     *  Usage:
     *  in edit form do the following:  <form action="{{ route('submit_form_route', ['page_number' => 1]) }}"...        for editing about us page for example.  
     *  
     *  1   => edit about us.
     *  2   => edit terms.
     *  3   => edit privacy.
     */
    public function update_fixed( $id, Request $request ) {
        $this->validate($request, [
            'arabicContent'  => 'required',
            'englishContent' => 'required'
        ],[
            'arabicContent.required'    => 'تعديل المحتوي العربي فارغ ، برجاء تعديله والمحاولة مرة اخري',
            'englishContent.required'   => 'English content is empty, please edit it and try again!'
        ]);

        // update arabic 
       try {
            Helper::edit_entity_localization('fixed_pages', 'body', $id , '2', $request->arabicContent);
       } catch(\Exception $ex) {
            Session::flash('warning', 'لا يمكن تعديل المحتوي باللغة العربية');
            return redirect()->back();
       }

        // update english
        try {
            $fixed = Fixed::find($id);
            $fixed->body = $request->englishContent;
            $fixed->updated_by = Auth::id();
            $fixed->save();

        } catch(\Exception $ex) {
            Session::flash('warning', 'Can not edit English version!');
            return redirect()->back();
        }

        Session::flash('success', 'Success تم الاضافة بنجاح');
        return redirect()->back();
    }

    public function update_contact( Request $request ) {

        // Validate incoming requests
        $this->validate($request, [
            'email' =>  'required|email'
        ], [
            'email.required'    => 'Email is required, please try again من فضلك ادخل البريد الالكتروني ثم حاول ثانية',
            'email.email'       => 'Your input is not a valid email format البريد الالكتروني الذي ادخلته صيغته غير صحيحة'
        ]);

        // Insert into DB
        try {
            $email = SystemSetting::where('name', 'contact_us')->first();
            $email->value = $request->email;
            $email->save();
        } catch(\Exception $ex) {
            dd($ex);
            Session::flash('warning', 'Email was not inserted, please try again later البريد الالكتروني لم يحفظ برجاء المحاولة مجددا');
            return redirect()->back();
        }

        Session::flash('success', 'Email updated successfully تم تحديث البريد الالكتروني بنجاح');
        return redirect()->back();
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
