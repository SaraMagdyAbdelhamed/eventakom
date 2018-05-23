<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChangeLanguage extends Controller
{
    public function changeLang(Request $request) {
        $url = $request->url;
        $segment = $request->segment;
        $newSegment = $segment == 'ar' ? 'en' : 'ar';

        $newURL  = $segment == 'ar' ? preg_replace("/ar\b/", 'en', $url) : preg_replace("/en\b/", 'ar', $url);

        if( in_array($segment, ['en', 'ar']) ) {

            $user = Auth::user();
            $user->lang_id = ($segment == 'ar') ? 1 : 2;
            $user->save();

            return \Redirect::to($newURL);
        } else {
            \App::setLocale('en');
        }
    }
}
