<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBackend extends Model
{
    protected $id = 'id';
    protected $table = 'events';
    protected $fillable = ['name', 'description', 'website', 'mobile', 'email', 'code', 'address', 'longtuide', 'latitude', 'venue', 'start_datime', 'end_datetime', 'suggest_big_event', 'gender_id', 'age_range_id', 'is_paid', 'use_ticketing_system', 'is_active', 'event_status_id', 'rejection_reason'];
    public $timestamp = true;

    // relations
    public function user() {
      return  $this->belongsTo('App\Users', 'created_by');
    }
}
