<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genders extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'genders';
    public $timestamps = false;

     public function users()
    {
        return $this->hasMany('App\Users','gender_id');
    }
}
