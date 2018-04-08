<?php

namespace App\Http\Controllers;
use usersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\servicesModel;
use App\Http\Controllers\SearchController;
use App\touristPlacesModel;
use App\provincecityModel;

class pageController extends Controller
{
    public function getindex()
    {   
        $placecount       = $this::count_place_display();

        $services_eat     = $this::getservicestake(1,8);
        $services_hotel   = $this::getservicestake(2,6);
        $services_tran    = $this::getservicestake(3,8);
        $services_see     = $this::getservicestake(4,8);
        $services_enter   = $this::getservicestake(5,8);
        // dd($services_hotel);
    	return view('VietNamTour.index',compact('placecount','services_hotel','services_eat','services_enter','services_see','services_tran'));
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

    public function getdetail($idservices,$type)
    {
        $detailServices = $this::getServiceType($idservices,$type);

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

    public function getServiceType($sv_id,$sv_types)
    {
        switch ($sv_types) {
            case 2:
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','sv_description','sv_phone_number','sv_open','sv_close','vnt_services.sv_types','hotel_name','hotel_number_star','vnt_images.id as id_image','vnt_images.image_details_1','sv_highest_price','sv_lowest_price')
                                    ->where('sv_status',"Active")
                                    ->where('sv_types',$sv_types)->take($take)->get();
                                    $name = 'hotel_name';
                return $result;
                break;  
            case 1:
                $result = DB::table('vnt_services')
                                    ->join('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->join('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','sv_description','sv_phone_number','sv_open','sv_close','vnt_services.sv_types','eat_name','vnt_images.id as id_image','vnt_images.image_details_1','sv_highest_price','sv_lowest_price')
                                    ->where('sv_status',"Active")
                                    ->where('sv_types',$sv_types)->first();
                                    $name = 'eat_name';
                return $result;
                break;  
            case 3:
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_transport','vnt_services.id','=','vnt_transport.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','sv_types','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','vnt_transport.transport_name','vnt_images.id as id_image','vnt_images.image_details_1')
                                    ->where('sv_status',"Active")
                                    ->where('sv_types',$sv_types)->first();
                return $result;
                break;
            case 4:
                $result = DB::table('vnt_services')
                                    ->join('vnt_sightseeing','vnt_services.id','=','vnt_sightseeing.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
                                    ->select('vnt_services.id','sv_types','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','sightseeing_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('vnt_services.id',$sv_id)
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
                                    ->select('vnt_services.id','sv_types','sv_description','sv_open','sv_close','sv_highest_price','sv_lowest_price','sv_phone_number','entertaiments_name','vnt_images.id as id_image','vnt_images.image_details_1', 'pl_latitude','pl_longitude')
                                    ->where('vnt_services.id',$sv_id)
                                    ->where('tourist_places_id',$tourist_places_id)
                                    ->where('entertaiments_status','Active')
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
        dd($p);
        switch ($sv_types) {
            case 2:
                $result = DB::table('vnt_services')
                                    ->where('tourist_places_id',$sv_types)->get();
                return $result;
                break;
        }
    }


    // get cho 
    public function getservicestake($sv_types,$take)
    {
        switch ($sv_types) {
            case 2:
                $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_services.sv_types','hotel_name','hotel_number_star','vnt_images.id as id_image','vnt_images.image_details_1','sv_highest_price','sv_lowest_price')
                                    ->where('sv_status',"Active")
                                    ->where('sv_types',$sv_types)->take($take)->get();
                                    $name = 'hotel_name';

                break;  
            case 1:


                $result = DB::table('vnt_services')
                                    ->join('vnt_eating', 'vnt_services.id', '=', 'vnt_eating.service_id')
                                    ->join('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_services.sv_types','eat_name','vnt_images.id as id_image','vnt_images.image_details_1','sv_highest_price','sv_lowest_price')
                                    ->where('sv_status',"Active")
                                    ->where('sv_types',$sv_types)->take($take)->get();
                                    $name = 'eat_name';
                break;  
            case 3:
                $result = DB::table('vnt_services')
                                    ->join('vnt_transport','vnt_services.id','=','vnt_transport.service_id')
                                    ->join('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','vnt_services.sv_types','vnt_transport.transport_name','vnt_images.id as id_image','vnt_images.image_details_1','sv_highest_price','sv_lowest_price')
                                    ->where('sv_status',"Active")
                                    ->where('sv_types',$sv_types)->take($take)->get();
                                    $name = 'transport_name';
                break;
            case 4:
                $result = DB::table('vnt_services')
                                    ->join('vnt_sightseeing','vnt_services.id','=','vnt_sightseeing.service_id')
                                    ->join('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','sightseeing_name','vnt_images.id as id_image','vnt_images.image_details_1','sv_highest_price','sv_lowest_price')
                                    ->where('sv_status','Active')
                                    ->where('sv_types',$sv_types)->take($take)->get();
                                    $name = 'sightseeing_name';

                break;
            case 5:
                $result = DB::table('vnt_services')
                                    ->join('vnt_entertainments','vnt_services.id','=','vnt_entertainments.service_id')
                                    ->join('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->where('sv_types',$sv_types)
                                    ->where('entertainments_status','Active')
                                    ->select('vnt_services.id','tourist_places_id','entertainments_name','image_details_1','sv_highest_price','sv_lowest_price')
                                    ->take($take)->get();
                                    $name = 'entertainments_name';

                break;
        }

        if (isset($result)) {

            foreach ($result as $value) {

                $id_city = $this::findservicetocity($value->id);
                
                $likes = DB::table('vnt_likes')->where('service_id', '=',$value->id)->count();

                $ratings = DB::table('vnt_visitor_ratings')->where('service_id')->first();
                if (!empty($ratings)) {
                    $ponit_rating = $ratings->vr_rating;
                }else{ $ponit_rating = 0; }

                $city = DB::table('vnt_province_city')->where('id',$id_city)->first();
                $name_city = $city->province_city_name;
                $mang[] = array(
                    'id_service'=>$value->id,
                    'name'=>$value->$name,
                    'image'=>$value->image_details_1,
                    'id_city'=>$id_city,
                    'name_city'=>$name_city,
                    'sv_highest_price'=>$value->sv_highest_price,
                    'sv_lowest_price'=>$value->sv_lowest_price,
                    'like'=>$likes,
                    'rating'=>$ponit_rating,
                    'sv_type'=>$sv_types);
            }
            if (isset($mang)) {return $mang;}else{ return null; }
        }
        else
            return null;
    }
    
    public function findservicetocity($idser)
    {
        $services = DB::table('vnt_services')
        ->join('vnt_tourist_places','vnt_services.tourist_places_id','=','vnt_tourist_places.id')
        ->select('vnt_services.id','sv_types','tourist_places_id')->where('vnt_services.id',$idser)->first();
        $sv_types          = $services->sv_types;
        $tourist_places_id = $services->tourist_places_id;

        $war = DB::table('vnt_tourist_places')->where('id',$tourist_places_id)->first();
        $id_ward = $war->id_ward;

        $district = DB::table('vnt_ward')->where('id',$id_ward)->first();
        $id_district = $district->district_id;

        $city = DB::table('vnt_district')->where('id',$id_district)->first();
        $id_city = $city->province_city_id;

        return $id_city;
    }

    // count place province city
    public function countplaceAllcity()
    {
        $p = DB::table('vnt_province_city')
            ->get();
        foreach ($p as $value) {

            $dis = DB::table('vnt_district')->where('province_city_id',$value->id)->get();
            $dem = 0;
            foreach ($dis as $district) {
                $ward = DB::table('vnt_ward')->where('district_id',$district->id)->get();
                foreach ($ward as $place) {
                    $place_ = DB::table('vnt_tourist_places')->where('id_ward',$place->id)->get();
                    $dem += count($place_);
                }
            }
            $placecount[] = array('id'=>$value->id,'city_name'=>$value->province_city_name,'amount_place'=>$dem);
        }
        return $placecount;
    }

    public function getlam($type)
    {
    
        $result = DB::table('vnt_services')
                                    ->leftJoin('vnt_hotels', 'vnt_services.id', '=', 'vnt_hotels.service_id')
                                    ->leftJoin('vnt_images','vnt_services.id','=','vnt_images.service_id')
                                    ->select('vnt_services.id','sv_types','hotel_name','hotel_number_star','vnt_images.id as id_image','vnt_images.image_details_1')
                                    ->where('hotel_status','Active')
                                    ->where('sv_types',$type)->take(8)->get();
                                    $name = 'hotel_name';
        return $result;
    }

    public function getcount_place_city()
    {
        $p = DB::table('vnt_province_city')
            ->get();
        foreach ($p as $value) {

            $dis = DB::table('vnt_district')->where('province_city_id',$value->id)->get();
            $dem = 0;
            foreach ($dis as $district) {
                $ward = DB::table('vnt_ward')->where('district_id',$district->id)->get();
                foreach ($ward as $place) {
                    $place_ = DB::table('vnt_tourist_places')->where('id_ward',$place->id)->get();
                    $dem += count($place_);
                }
            }
            // $placecount[] = array('id'=>$value->id,'city_name'=>$value->province_city_name,'amount_place'=>$dem);

            echo "<li class='selectItem' data-name=";
            echo "'".$value->province_city_name."'>";

            echo "<a href='https://www.google.com.vn' class='selectItem-name'>";
            echo "<label>".$value->province_city_name."</label>";
            echo "<span class='float-right'>".$dem."</span>";
            echo "</a>";

            echo "</li>";
        }
    }

    public function count_place_Allcity()
    {
        $result = DB::select('CALL count_city_place()');
        foreach ($result as $value) {
            echo "<li class='selectItem' data-name=";
            echo "'".$value->province_city_name."'>";

            echo "<a href='https://www.google.com.vn' class='selectItem-name'>";
            echo "<label>".$value->province_city_name."</label>";
            echo "<span class='float-right'>".$value->amount_palce."</span>";
            echo "</a>";

            echo "</li>";
        }
    }

    public function count_place_display()
    {
        $result = DB::select('CALL count_city_place()');
        return $result;
        // foreach ($result as $value) {
        //     echo "<div class='item'>";
        //         echo "<div class='grid-item'>";
        //             echo "<div class='grid-img-thumb'>";
        //                 echo "<div class='ribbon'>"."<span>".$value->amount_palce."</span>"."</div>";
        //                 echo "<a href='#'>";
        //                     echo "<img src='resourceVNT/images/img-BaiViet/1.jpg' style='height: 214px;'>";
        //                 echo "</a>";
        //             echo "</div>"; //end grid-img-thumb

        //             echo "<div class='grid-content'>";
        //                 echo "<div class='grid-price text-left'>";
        //                     echo "<span>".$value->amount_palce."</span>";
        //                     echo "<i class='far fa-hand-peace'></i>";
        //                 echo "</div>";

        //                 echo "<div class='grid-text'>";
        //                     echo "<div class='place-name'>".$value->province_city_name."</div>";
        //                     echo "<span class='pull-right'>";
        //                         for ($i=0; $i <5 ; $i++) { 
        //                             echo "<i class='fas fa-star'></i>";
        //                         }
        //                     echo "</span>";
        //                 echo "</div>"; //end grid-text

        //             echo "</div>";
        //         echo "</div>";
        //     echo "</div>";
        // }
    }
}
