<?php

namespace App\Http\Controllers;
use usersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class pageController extends Controller
{
    public function getindex()
    {
    	return view('VietNamTour.index');
    }

    public function getlogin()
    {
    	return view('VietNamTour.login');
    }

    public function getregister()
    {
        $lam = 'adadsd';
        $k = 'dadsada';
        return view('VietNamTour.register')->with(['data',$lam]);
	   	// return view('VietNamTour.register',);
    }
}
