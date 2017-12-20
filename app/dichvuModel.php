<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dichvuModel extends Model
{
    protected $table = 'dlct_dichvu';
    protected $fillable=[];
    function diadiem()
    {
    	return $this->belongsTo('App\diadiemModel');
    }
}
