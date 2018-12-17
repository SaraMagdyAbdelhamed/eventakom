<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChangeLanguage extends Controller
{
    public function changeLang(Request $request)
    {
        $url = $request->url;
        $locale = $request->locale;

        $user = Auth::user();

        if ($user != null) {
            $user->lang_id = $locale == 'ar' ? 1 : 2;
            $user->save();
            \App::setLocale(\Helper::getUserLocale());

      
        } else {

            if ( $locale == 'ar' ) 
               // $lang_var = 'en';
                $lang_var = 'ar';
            
            if( $locale == 'en' )
                //$lang_var = 'ar';
                $lang_var = 'en';
           
            Session::put('lang_var', $lang_var);
        }

            // dd(Session::get('lang_var'));
            return \Redirect::to($url);
    }
}
