<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersModel extends Model
{
    protected $table = 'vnt_users';
    protected $fillable=[
    	'id','username','password','user_facebook_id','user_email_id','user_avatar','user_country','user_status', 'user_language'
    ];
}
