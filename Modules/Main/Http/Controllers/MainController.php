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
use App\EventCategory;

class MainController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
     *  @return redirect back to its edit page
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

    /**
     * Updates contact email
     * @param   Request $request        incoming request data
     * @return redirect to contact page
     */
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

    public function event_category() {
        return view('main::event_category')
                ->with('events', EventCategory::all());
    }

    public function event_store( Request $request ) {

        // validate data
        $this->validate($request, [
            'arabicContent'  => 'required',
            'englishContent' => 'required'
        ],[
            'arabicContent.required'    => 'تعديل المحتوي العربي فارغ ، برجاء تعديله والمحاولة مرة اخري',
            'englishContent.required'   => 'English content is empty, please edit it and try again!'
        ]);

        // english version
        try {
            $event = new EventCategory;
            $event->name = $request->englishContent;
            $event->created_by = Auth::id();
            $event->save();
        } catch(\Exception $ex) {
            dd($ex);
            Session::flash('warning', 'Error occured during adding event!');
            return redirect()->back();
        }

        // arabic version
        try {
            Helper::add_localization(15, 'interests', $event->id, $request->arabicContent, 2);
        } catch(\Exception $ex) {
            Session::flash('warning', 'حدث خطا ما عند ادخال الحدث');
            return redirect()->back();
        }

        Session::flash('success', 'Event Added successfully تم إضافة الحدث بنجاح');
        return redirect()->back();
    }

    public function event_update( Request $request ) {

        // validate data
        $this->validate($request, [
            'id' => 'required',
            'arabicContent'  => 'required',
            'englishContent' => 'required'
        ],[
            'arabicContent.required'    => 'تعديل المحتوي العربي فارغ ، برجاء تعديله والمحاولة مرة اخري',
            'englishContent.required'   => 'English content is empty, please edit it and try again!'
        ]);

        // english version
        try {
            $event = EventCategory::find($request->id);
            $event->name = $request->englishContent;
            $event->created_by = Auth::id();
            $event->save();
        } catch(\Exception $ex) {
            dd($ex);
            Session::flash('warning', 'Error occured during adding event!');
            return redirect()->back();
        }

        // arabic version
        try {
            Helper::edit_entity_localization('interests', 'interests', $request->id, 2, $request->arabicContent);
        } catch(\Exception $ex) {
            Session::flash('warning', 'حدث خطا ما عند ادخال الحدث');
            return redirect()->back();
        }

        Session::flash('success', 'Event Added successfully تم إضافة الحدث بنجاح');
        return redirect()->back();
    }

    public function event_delete( Request $request ) {
        $id = $request->id;

        dd([$request->id, $request->arabicContent, $request->englishContent]);
        // delete from localization - Arabic version
        try {
            EntityLocalization::where('entity_id', 15)->where('item_id', $id)->delete();
        } catch(\Exception $ex) {
            return response()->json(['error', 'error deleting arabic']);
        }

        // delete from interests    - English version
        try {
            EventCategory::where('id', $id)->delete();
        } catch(\Exception $ex) {
            return response()->json(['error', 'error deleting english']);
        }

        // return success response
        return response()->json(['success', 'success']);
    }

    public function event_deleteSelected( Request $request ) {
        $ids = $request->ids;

        // delete from localization - Arabic version
        try {
            EntityLocalization::whereIn('item_id', $ids)->delete();
        } catch(\Exception $ex) {
            return response()->json(['error', 'error deleting arabic']);
        }

        // delete from interests    - English version
        try {
            EventCategory::whereIn('id', $ids)->where('entity_id', 15)->delete();
        } catch(\Exception $ex) {
            return response()->json(['error', 'error deleting english']);
        }

        // return success response
        return response()->json(['success', 'success']);
    }

}
