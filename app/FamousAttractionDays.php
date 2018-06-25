<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamousAttractionDays extends Model
{
    protected $id = 'id';
    protected $table = 'days';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function attractions() {
        return $this->belongsToMany('App\FamousAttraction', 'famous_attraction_days', 'famous_attraction_id', 'day_id');
    }
}
