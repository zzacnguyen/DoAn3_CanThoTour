<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class nguoidungModel extends Eloquent implements Authenticatable
{
	use AuthenticableTrait;

    protected $table = 'dlct_nguoidung';
    protected $fillable=[
    	'id','nd_tendangnhap','password','nd_facebook_id','nd_email_id','nd_avatar','nd_quocgia','nd_ngonngu',
    ];
}
