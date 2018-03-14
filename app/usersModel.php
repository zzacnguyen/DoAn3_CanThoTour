<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\User as AuthenticableTrait;

class usersModel extends Authenticatable
{
	use Notifiable;
    protected $table = 'vnt_users';
    protected $fillable=[
    	'id','username','password','user_facebook_id','user_email_id','user_avatar','user_country','user_status', 'user_language'
    ];
}
