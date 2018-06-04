<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBackend extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'events';
    protected $fillable = [
        'name', 'description', 'website', 'mobile', 'email', 
        'code', 'address', 'longtuide', 'latitude', 'venue', 
        'start_datime', 'end_datetime', 'suggest_big_event', 
        'gender_id', 'age_range_id', 'is_paid', 'use_ticketing_system', 
        'is_active', 'event_status_id', 'rejection_reason'
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

    public function media() {
        return $this->hasMany('App\EventMedia', 'event_id');
    }


}
