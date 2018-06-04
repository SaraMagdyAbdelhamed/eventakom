<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    protected $id = 'id';
    protected $table = 'event_tickets';
  
    public $timestamp = true;

    // relations
      public function event() {
        return $this->belongsTo('App\EventMobile', 'event_id');
    }

    //quiries

    

    //localizations



}
