<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSubscription extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'event_subscriptions';
    public $timestamps = false;


    // relations

    // many subscriptions belongs to 1 event
    // public function event() {
    //     return $this->belongsTo('App\EventBackend', 'id');
    // }
}