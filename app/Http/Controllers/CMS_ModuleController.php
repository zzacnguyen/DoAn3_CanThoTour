<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CMS_ModuleController extends Controller
{
    public function getDashboard(){
    	if (view()->exists('view.CMS.master')){return view('CMS.components.error');}
    	else	{
    		
			return view('CMS.master');
		}

	}
}
