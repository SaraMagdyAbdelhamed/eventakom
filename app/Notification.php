<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     protected $primaryKey = 'id';
    protected $table = 'notifications';
   public $timestamps = true;
    protected $fillable = ['msg','msg_ar','description','description_ar', 'entity_id', 'item_id', 'user_id', 'notification_type_id', 'is_read', 'is_sent','created_at','schedule'];

	protected $dates = ['schedule'];

	    public function type()
    {
        return $this->belongsTo('App\NotificationTypes','notification_type_id');
    }

    	public function items()
    {
        return $this->hasMany('App\NotificationItem','notification_id');
    }

        public function push()
    {
        return $this->hasMany('App\NotificationsPush','notification_id');
    }


        public function user()
    {
        return $this->belongsTo('App\Users','user_id');
    }

}
