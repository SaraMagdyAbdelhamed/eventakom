<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventHashtags extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'hash_tags';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function event() {
        return $this->belongsToMany('App\EventBackend', 'event_hash_tags', 'event_id', 'hash_tag_id');
    }
}
