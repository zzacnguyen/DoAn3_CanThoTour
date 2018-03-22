<?php

namespace App\Http\Controllers;
use usersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\servicesModel;
use App\Http\Controllers\SearchController;
use App\touristPlacesModel;
class pageController extends Controller
{
    public function getindex()
    {
        $services = DB::table('vnt_services')
        ->select('sv_types','tourist_places_id')->where('vnt_services.id',$idservices)->first();
        $sv_types          = $services->sv_types;
        $tourist_places_id = $services->tourist_places_id;
        $detailServices = $this::get5dichvu($sv_types,$tourist_places_id);
    	return view('VietNamTour.index',compact('detailServices'));
    }

    public function getlogin()
    {
    	return view('VietNamTour.login');
    }

    public function getregister()
    {
        return view('VietNamTour.register');
    }

    public function getregisterSuccess()
    {
        return view('VietNamTour.registerSuccess');
    }

    public function getuser()
    {
        return view('VietNamTour.user');
    }

    public function getdetail($idservices)
    {
        $services = DB::table('vnt_services')
        ->select('sv_types','tourist_places_id')->where('vnt_services.id',$idservices)->first();
        $sv_types          = $services->sv_types;
        $tourist_places_id = $services->tourist_places_id;
        $detailServices = $this::getServiceType($sv_types,$tourist_places_id);
        return view('VietNamTour.detail',compact('detailServices'));
    }

    public function getaddplace()
    {
        return view('VietNamTour.addplace');
    }

    public function getaddservice()
    {
        return view('VietNamTour.addservice');
    }

    // funtion

    public function getServiceType($sv_types,$tourist_places_id)
    {
        switch ($sv_types) {
            case 2:
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_types','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','vnt_hotels.hotel_name','hotel_number_star','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('hotel_status','Active')
                                    ->where('sv_types',$sv_types)->first();
                return $result;
                break;  
            case 1:
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_types','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','vnt_eating.eat_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('eat_status','Active')
                                    ->where('sv_types',$sv_types)->first();
                return $result;
                break;  
            case 3:
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_transport','vnt_services.id','=','vnt_transport.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_types','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','vnt_transport.transport_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('transport_status','Active')
                                    ->where('sv_types',$sv_types)->first();
                return $result;
                break;
            case 4:
                $result = DB::table('vnt_services')
                                    ->join('vnt_sightseeing','vnt_services.id','=','vnt_sightseeing.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_types','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','sightseeing_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('sightseeing_status','Active')
                                    ->where('sv_types',$sv_types)->first();
                return $result;
                break;
            case 5:
                $result = DB::table('vnt_services')
                                    ->join('vnt_entertainments','vnt_services.id','=','vnt_entertainments.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_types','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','entertainments_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('entertainments_status','Active')
                                    ->where('sv_types',$sv_types)->first();
                return $result;
                break;
        }
    }

    public function getServiceTypeVicinity()
    {
        $lam = SearchController::distance(1,2,3,4);
        return $lam;
    }

    public function getplaceCity($idcity)
    {
        // $place = DB::table('vnt_tourist_places')
        //             ->where('id',$idcity)->take(10)->get();

        $place = touristPlacesModel::all();
        return $place;
    }

    public function get5dichvu($sv_types,$tourist_places_id)
    {
        switch ($sv_types) {
            case 2:
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','vnt_hotels.hotel_name','hotel_number_star','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('hotel_status','Active')
                                    ->where('sv_types',$sv_types)->take(8)->get();
                return $result;
                break;  
            case 1:
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','vnt_eating.eat_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('eat_status','Active')
                                    ->where('sv_types',$sv_types)->take(8)->get();
                return $result;
                break;  
            case 3:
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_transport','vnt_services.id','=','vnt_transport.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','vnt_transport.transport_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('transport_status','Active')
                                    ->where('sv_types',$sv_types)->take(8)->get();
                return $result;
                break;
            case 4:
                $result = DB::table('vnt_services')
                                    ->join('vnt_sightseeing','vnt_services.id','=','vnt_sightseeing.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','sightseeing_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('sightseeing_status','Active')
                                    ->where('sv_types',$sv_types)->take(8)->get();
                return $result;
                break;
            case 5:
                $result = DB::table('vnt_services')
                                    ->join('vnt_entertainments','vnt_services.id','=','vnt_entertainments.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','entertainments_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('entertainments_status','Active')
                                    ->where('sv_types',$sv_types)->take(8)->get();
                return $result;
                break;
        }
    }
}
