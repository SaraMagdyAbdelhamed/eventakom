<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interest;
class EventMobile extends Model
{
    protected $id = 'id';
    protected $table = 'events';
    protected $fillable = ['name', 'description', 'website', 'mobile', 'email', 'code', 'address', 'longtuide', 'latitude', 'venue', 'start_datetime', 'end_datetime', 'suggest_big_event', 'gender_id', 'age_range_id', 'is_paid', 'use_ticketing_system', 'is_active', 'event_status_id', 'rejection_reason'];
    public $timestamp = true;

    // relations
    public function user() {
     return   $this->belongsTo('App\Users', 'created_by');
    }

    //quiries

     public static function getEventsMobile(){
    	return static::query()->where('is_backend','=',0)
    		   ->select('events.*');

    }

     public static function CurrentEvents(){
    		return static::query()->where('is_backend','=',0)->where('event_status_id','=',2)
    		   ->select('events.*');
    }

        public static function PendingEvents(){
    		return static::query()->where('is_backend','=',0)->where('event_status_id','=',1)
    		   ->select('events.*');
    }

      public static function EventsRejected(){
    	return static::query()->join('event_statuses','events.event_status_id','=','event_statuses.id')
    		   ->select('events.*','event_statuses.name');

    }

      public static function getCategory($category_id){
            return Interest::find($category_id);
    }

    //localizations



}
