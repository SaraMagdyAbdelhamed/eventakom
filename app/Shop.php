<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
   protected $id = 'id';
    protected $table = 'shops';
    protected $fillable = ['name', 'photo', 'phone', 'website', 'is_active', 'info'];
    public $timestamps = false;

    public function shop_branch()
    {
    	return $this->hasMany('App\ShopBranch','shop_id');
    }

     public function shop_day()
    {
    	return $this->hasMany('App\ShopDay','shop_id');
    }

     public function shop_media()
    {
        return $this->hasMany('App\ShopMedia','shop_id');
    }
}
