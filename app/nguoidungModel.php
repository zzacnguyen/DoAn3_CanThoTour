<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\User as AuthenticableTrait;

class nguoidungModel extends Authenticatable
{
	use Notifiable;

    protected $table = 'dlct_nguoidung';
    protected $fillable=[
    	'id','nd_tendangnhap','password','nd_facebook_id','nd_email_id','nd_avatar','nd_quocgia','nd_ngonngu',
    ];
}
