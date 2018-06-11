<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigEvent extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'big_events';
  public $timestamps = false;
}
