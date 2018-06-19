<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopBranch extends Model
{
    protected $id = 'id';
    protected $table = 'shop_branches';
    protected $fillable = ['shop_id', 'branch','address','longtuide','latitude'];
    public $timestamps = false;


    public function shop()
    {
    	return $this->hasMany('App\Shop','shop_id');
    }
}
