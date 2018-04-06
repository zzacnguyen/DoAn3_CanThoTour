<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CMS_ModuleController extends Controller
{
    public function getDashboard()
    {
    	

    	
    	return view('CMS.module.index');
    }
}
