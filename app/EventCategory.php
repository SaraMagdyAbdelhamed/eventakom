<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'interests';

    protected $fillable = ['name', 'created_by', 'updated_by'];
    public $timestamps = true;

    // relations
    public function user() {
        return $this->belongsTo('App\Users', 'created_by');
    }

    public function eventsbackend() {
        return $this->belongsToMany('App\EventBackend', 'event_categories', 'event_id', 'interest_id');
    }
}
