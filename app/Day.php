<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $id = 'id';
    protected $table = 'days';
    protected $fillable = '';
    public $timestamps = false;

    //  public function day()
    // {
    // 	return $this->hasMany('App\ShopDay','id');
    // }
    public function shops()
    {
        return $this->belongsToMany('App\Shop','shop_days','day_id','shop_id');
    }
}
