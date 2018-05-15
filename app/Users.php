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
}
