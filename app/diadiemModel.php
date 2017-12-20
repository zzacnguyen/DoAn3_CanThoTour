<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diadiemModel extends Model
{
    protected $table = 'dlct_diadiem';
    protected $fillable=[];
    function dichvu()
    {
    	return $this->has_Many('App\dichvuModel');
    }
}
