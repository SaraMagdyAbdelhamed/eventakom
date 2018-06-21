<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationTypes extends Model
{
     protected $primaryKey = 'id';
    protected $table = 'notification_types';
	public $timestamps = false;

	public function notifications()
    {
        return $this->hasMany('App\Notification','notification_type_id');
    }
}
