<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $primaryKey = 'id';           // primary key
    protected $table = 'users';             // actual table name
    protected $dates = ['deleted_at'];      // use soft deletes
    public $timestamps = true;              // to formate timestamps as dates

    public function getId()
    {
        return $this->id;
    }

    public function gender()
    {
        return $this->belongsTo('App\Genders','gender_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Countries','country_id');
    }
    
    public function city()
    {
        return $this->belongsTo('App\Cities','city_id');
    }

    public function rules()
    {
        return $this->belongsToMany('App\Rules','user_rules','user_id','rule_id');
    }

    public function eventCategories() {
        return $this->hasMany('App\EventCategory', 'created_at');
    }
}
