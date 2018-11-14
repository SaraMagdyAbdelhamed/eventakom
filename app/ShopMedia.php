<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopMedia extends Model
{
    protected $id = 'id';
    protected $table = 'shop_media';
    protected $fillable = ['shop_id', 'link', 'type'];
    public $timestamps = false;

    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id');
    }

    public function getYoutubeLinks()
    {
        $link_arr = ['', ''];
        $links = $this->where('type', 2)->get();

        if (count($links) > 0) {

            if (isset($links[0])) {
                $link_arr[0] = $links[0]->link;
            }

            if (isset($links[1])) {
                $link_arr[1] = $links[1]->link;
            }

        }

        return $link_arr;
    }

}
