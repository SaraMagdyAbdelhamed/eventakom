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
}
