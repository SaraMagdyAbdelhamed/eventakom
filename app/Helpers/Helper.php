<?php 
/**
 *  Author: Ahmed Yacoub
 *  Email: ahmed.yacoub@outlook.com
 *  Start date: May 1, 2018
 */

namespace App\Helpers;

use Session;
use Auth;
use App\Users;
use App\Entity;
use App\EntityLocalization;

use Illuminate\Database\Eloquent\Model;

class Helper {

    // helps binding locale prefix [en, ar] to view url
    // example: /en/about   
    // @param   $routeName      url 2nd segment []
    public static function route($routeName) {
        $prefix = \App::isLocale('en') ? 'en' : 'ar';
        return url( $prefix.'/'.$routeName );
    }

    // convert lang_id [1, 2] to ['en', 'ar']
    public static function getUserLocale() {
        $lang_id = Auth::user()->lang_id;
        $locale = ($lang_id == 1) ? 'en' : 'ar';
        Session::put('locale', $locale);
        return $locale;
    }

    // get user's last login time in UTC
    public static function getUserLastLogin() {
        return Users::where('id', Auth::user()->id)->first()->last_login;
    }

    // get user's current timezone from DB
    public static function getUserTimezone() {
        return Users::where('id', Auth::user()->id)->first()->timezone;
    }

    // convert UTC to user's local timezone
    // @param   $timestamp      UTC timestamp
    // @param   $format         timestamp format    ex: d/m/y   or  H:m:i 
    public static function getUserLocalTimezone($timestamp=NULL, $format='h:m A - M d Y') {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$timestamp , 'GMT')->setTimeZone(Helper::getUserTimezone())->format($format);
    }

    /**
     *  Return translated entity
     *  @param  $table_name     field in `entities` table.      ex: 'fixed_pages'
     *  @param  $field_name     field in `entity_localizations` table.      ex: 'body'
     *  @param  $item_id        field in `entity_localizations` table.      ex: 1
     *  @param  $lang_id        field in `entity_localizations` table.      ex: 2
     * 
     *  Example:    Helper::localization('fixed_pages', 'name', '1', '2')
     *  expected result     'عن الشركة'
    */
    public static function localization($table_name, $field_name, $item_id, $lang_id, $default=null) {
        $localization = Entity::where('table_name', $table_name)->with(['localizations' => function($q) use ($field_name, $item_id, $lang_id){ 
            $q->where('field', $field_name)->where('item_id', $item_id)->where('lang_id', $lang_id); }
        ])->first();
        

        $result = isset($localization->localizations[0]) ? $localization->localizations[0]->value : $default;
        return $result;
    }

    /**
     *  Edit a record in entity localizations table.
     *  @param  $table_name     field in `entities` table.      ex: 'fixed_pages'
     *  @param  $field_name     field in `entity_localizations` table.      ex: 'body'
     *  @param  $item_id        field in `entity_localizations` table.      ex: 1
     *  @param  $lang_id        field in `entity_localizations` table.      ex: 2
     *  @param  $new_value      field in `entity_localizations` table.      ex: 'محتوي جديد'
     * 
     *  Example:    Helper::localization('fixed_pages', 'name', '1', '2', 'محتوي جديد')
     *  expected result     save 'محتوي جديد' in this record as a new value.
    */
    public static function edit_entity_localization($table_name, $field_name, $item_id, $lang_id, $new_value) {
        $localization = Entity::where('table_name', $table_name)->with(['localizations' => function($q) use ($table_name, $field_name, $item_id, $lang_id){ 
            $q->where('field', $field_name)->where('item_id', $item_id)->where('lang_id', $lang_id); }
        ])->first()->localizations[0];

        $localization->value = $new_value;
        $localization->save();
    }

    /**
     *  Add new localization into `entity_localization` table
     *  @param  $entity_id  
     *  @param  $field
     *  @param  $item_id
     *  @param  $value
     *  @param  $lang_id
     *  All parameters are the same in `entity_localization` with same order
     */
    public static function add_localization($entity_id, $field, $item_id, $value, $lang_id) {
        $localization = new EntityLocalization;
        $localization->entity_id = $entity_id;
        $localization->field = $field;
        $localization->value = $value;
        $localization->item_id = $item_id;
        $localization->lang_id = $lang_id;
        $localization->save();
    }
}