<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class EventBackend extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'events';
    protected $fillable = [
        'name', 'description', 'website', 'mobile', 'email', 
        'code', 'address', 'longtuide', 'latitude', 'venue', 
        'start_datetime', 'end_datetime', 'suggest_big_event', 
        'gender_id', 'age_range_id', 'is_paid', 'use_ticketing_system', 
        'is_active', 'event_status_id', 'rejection_reason','show_in_mobile'
    ];
    protected $dates = ['start_datetime', 'end_datetime'];
    public $timestamp = true;

    // relations
    public function user() {
        return $this->belongsTo('App\Users', 'created_by');
    }

    // Many to Many relation between Events & Hashtags
    public function hashtags() {
        return $this->belongsToMany('App\EventHashtags', 'event_hash_tags', 'event_id', 'hash_tag_id');
    }

    // Many to Many relation between Events & Categories
    public function categories() {
        return $this->belongsToMany('App\EventCategory', 'event_categories', 'event_id', 'interest_id');
    }

    //Many to Many realtions with events and users in user_favourites
    public function users_favorites() {
        return $this->belongsToMany('App\Users', 'user_favorites', 'item_id', 'user_id')->withPivot('name','entity_id');
    }

    public  function CalenderUsers(){
        return $this->belongsToMany('App\Users', 'user_calendars','event_id','user_id')->withPivot('from_date','to_date');
    }

    public function media() {
        return $this->hasMany('App\EventMedia', 'event_id');
    }

    public  function scopeEventsStartAfterOneDay($query){
        return $query->whereDate("start_datetime",'=',Carbon::now()->addDays(1)->toDateString());
    }

    public function scopeIsActive($query){
        return $query->where('is_active',1);
    }

    public function scopeShowInMobile($query){
        return $query->where('show_in_mobile',1);
    }




}
