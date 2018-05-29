<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $id = 'id';
    protected $table = 'currencies';
    protected $fillable = ['name', 'symbol', 'rate', 'def', 'subdivision_name', 'set_order'];
    public $timestamps = false;
}
