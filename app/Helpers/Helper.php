<?php
/**
 *  Author: Ahmed Yacoub
 *  Email: ahmed.yacoub@outlook.com
 *  Start date: May 1, 2018
 */

namespace App\Helpers;

use App\Entity;
use App\EntityLocalization;
use App\Notification;
use App\Users;
use Auth;
use Session;

class Helper
{

    // helps binding locale prefix [en, ar] to view url
    // example: /en/about
    // @param   $routeName      url 2nd segment []
    public static function route($routeName)
    {
        $prefix = \App::isLocale('en') ? 'en' : 'ar';
        return url($prefix . '/' . $routeName);
    }

    // convert lang_id [1, 2] to ['en', 'ar']
    public static function getUserLocale()
    {
        $lang_id = Auth::user()->lang_id;
        $locale = ($lang_id == 1) ? 'en' : 'ar';
        Session::put('locale', $locale);
        return $locale;
    }

    // get user's last login time in UTC
    public static function getUserLastLogin()
    {
        return Users::where('id', Auth::user()->id)->first()->last_login;
    }

    // get user's current timezone from DB
    public static function getUserTimezone()
    {
        return Users::where('id', Auth::user()->id)->first()->timezone;
    }

    // convert UTC to user's local timezone
    // @param   $timestamp      UTC timestamp
    // @param   $format         timestamp format    ex: d/m/y   or  H:m:i
    public static function getUserLocalTimezone($timestamp = null, $format = 'h:m A - M d Y')
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'GMT')->setTimeZone(Helper::getUserTimezone())->format($format);
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
    public static function localization($table_name, $field_name, $item_id, $lang_id = 2, $default = null)
    {
        $localization = Entity::where('table_name', 'like', '%' . $table_name . '%')->with(['localizations' => function ($q) use ($field_name, $item_id, $lang_id) {
            $q->where('field', $field_name)->where('item_id', $item_id)->where('lang_id', $lang_id);
        }])->first();

        $result = isset($localization->localizations[0]) ? $localization->localizations[0]->value : $default;
        return $result;
    }

    /**
     *  Returns a collection of all related links
     *  @param String $item_id shops.id
     *  @param Int    $lang_id lang id (1=>English, 2=>Arabic)
     */
    public static function getLinks($item_id, $lang_id)
    {
        $localization = EntityLocalization::where('field', 'link')
            ->where('item_id', $item_id)
            ->where('lang_id', $lang_id)
            ->where('value', 'NOT LIKE', '%youtube%')
            ->get();
        return $localization;
    }

    /**
     *  Returns a collection of youtube links
     *  @param String $item_id shops.id
     *  @param Int    $lang_id lang id (1=>English, 2=>Arabic)
     */
    public static function getYoutubeLinks($item_id, $lang_id)
    {
        $links_arr = ['', ''];

        $localization = EntityLocalization::where('field', 'link')
            ->where('item_id', $item_id)
            ->where('lang_id', $lang_id)
            ->where('value', 'LIKE', '%youtube%')
            ->get();

        if (count($localization) > 0) {

            if (isset($localization[0])) {
                $links_arr[0] = $localization[0]->value;
            }

            if (isset($localization[1])) {
                $links_arr[1] = $localization[1]->value;
            }

        }
        return $links_arr;
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
    public static function get_hashtags($item_id, $lang_id)
    {
        $localization = EntityLocalization::where('field', 'hash_tags')->where('item_id', $item_id)->where('lang_id', $lang_id)->get();
        return $localization;
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
    public static function edit_entity_localization($table_name, $field_name, $item_id, $lang_id, $new_value)
    {
        $entity_id = Entity::where('table_name', $table_name)->first()->id; // get entity_id
        $localization = EntityLocalization::where('entity_id', $entity_id)
            ->where('field', $field_name)
            ->where('item_id', $item_id)
            ->where('lang_id', $lang_id)->first();

        if ($localization != null) {
            $localization->value = $new_value;
            $localization->save();
        } else {
            Helper::add_localization($entity_id, $field_name, $item_id, $new_value, $lang_id);
        }
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
    public static function add_localization($entity_id, $field, $item_id, $value, $lang_id)
    {
        $localization = new EntityLocalization;
        $localization->entity_id = $entity_id;
        $localization->field = $field;
        $localization->value = $value;
        $localization->item_id = $item_id;
        $localization->lang_id = $lang_id;
        $localization->save();
    }

    public static function remove_localization($entity_id, $field, $item_id, $lang_id)
    {
        EntityLocalization::where('entity_id', '=', $entity_id)
            ->where('field', '=', $field)
            ->where('item_id', '=', $item_id)
            ->where('lang_id', '=', $lang_id)
            ->delete();
    }

    public static function remove_youtube_links($entity_id, $field, $item_id, $lang_id)
    {
        EntityLocalization::where('entity_id', '=', $entity_id)
            ->where('field', '=', $field)
            ->where('item_id', '=', $item_id)
            ->where('lang_id', '=', $lang_id)
            ->where('value', 'LIKE', '%youtube%')
            ->delete();
    }

    public static function multi_localization($entity_id, $field, $item_id, $lang_id)
    {
        EntityLocalization::where('entity_id', '=', $entity_id)
            ->where('field', '=', $field)
            ->where('item_id', '=', $item_id)
            ->where('lang_id', '=', $lang_id)
            ->get();
    }

    public static function CleanText($text)
    {
        $arr = [
            'أ' => 'ا',
            'إ' => 'ا',
            'آ' => 'ا',
            "ة" => 'ه',
            "ّ" => '',
            "َّ" => '',
            "ُّ" => '',
            "ٌّ" => '',
            "ًّ" => '',
            "ِّ" => '',
            "ٍّ" => '',
            "ْ" => '',
            "َ" => '',
            "ً" => '',
            "ُ" => '',
            "ِ" => '',
            "ٍ" => '',
            "ٰ" => '',
            "ٌ" => '',
            "ۖ" => '',
            "ۗ" => '',
            "ـ" => '',
        ];
        foreach ($arr as $key => $val) {
            $cleaned_text = str_replace($key, $val, $text);
            $text = $cleaned_text;
        }
        return $text;

    }

    public static function CleanStriptagText($text)
    {
        $text = html_entity_decode($text);
        $text = strip_tags($text);
        $text = str_replace('&nbsp;', '', $text);
        $text = trim(preg_replace('/\s+/', ' ', $text));
        $text = Helper::CleanText($text);
        return $text;
    }

    public static function ageRange_count($rangeFrom, $rangeTo)
    {
        $counter = 0;
        $users = Users::where('birthdate', '!=', null)->get();
        foreach ($users as $user) {
            if ($rangeFrom <= $user->age && $user->age < $rangeTo) {
                $counter++;
            }
        }
        return $counter;
    }

    public static function ageRange_users($rangeFrom, $rangeTo)
    {
        $ids = [];
        $users = Users::where('birthdate', '!=', null)->get();
        foreach ($users as $user) {
            if ($rangeFrom <= $user->age && $user->age < $rangeTo) {

                $ids[] = $user->id;
            }
        }
        return $ids;
    }

    public static function hasRule($rule_array)
    {
        $user = Auth::user();
        foreach ($rule_array as $key => $rule_name) {
            $user_rule = $user->rules()->get();

            foreach ($user_rule as $v) {
                if ($v->name == $rule_name) {
                    return true;
                }
            }

        }
        return false;
    }

    public static function is_day($obj, $day_id)
    {
        return $result = count($obj->days()->where('day_id', $day_id)->get()) > 0 ? true : false;
    }

    public static function get_day_start_end($obj, $day_id)
    {
        $day = $obj->days()->where('day_id', $day_id)->first();

        if ($day != null) {
            return ['start' => $day->pivot->from, 'end' => $day->pivot->to];
        }
        return '';
    }

    public static function hisEvent($event_id)
    {
        $event = \App\EventMobile::find($event_id);
        if ($event->created_by == Auth::id()) {
            return true;
        }
        return false;
    }

    public static function ListNotifications()
    {
        $notifications = Notification::whereNull('user_id')->where('notification_type_id', 8)->orderBy('created_at', 'DESC')->get();
        return $notifications;
    }
}
