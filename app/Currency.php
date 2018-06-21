<?php

namespace App;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $id = 'id';
    protected $table = 'currencies';
    protected $fillable = ['name', 'symbol', 'rate', 'def', 'subdivision_name', 'set_order'];
    public $timestamps = false;

//localization

   public static function arabic($field,$item_id){

      $result = Helper::localization('currencies', $field, $item_id, 2);
      return $result;
    }
}
