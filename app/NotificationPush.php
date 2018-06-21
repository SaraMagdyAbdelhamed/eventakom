<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationPush extends Model
{
<<<<<<< HEAD
    //
      protected $primaryKey = 'id';
  	  protected $table = 'notifications_push';
  	  protected $fillable = [
        'notification_id','device_token','mobile_os','lang_id','user_id'
    ];
    public $timestamps = false;

    /* Relations */

    public function message()
    {
    	return $this->belongsTo("App\Notification","notification_id");
    }
=======
    protected $primaryKey = 'id';
    protected $table = 'notifications_push';
    public $timestamps = false;
    protected $fillable = ['notification_id', 'device_token', 'mobile_os', 'lang_id','user_id'];

    public function notification()
    {
        return $this->belongsTo('App\Notification','notification_id');
    }

>>>>>>> e1fa381179ed8969769c565ed65ef1f5c25beb4e
}
