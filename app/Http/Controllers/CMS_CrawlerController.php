<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use Symfony\Component\DomCrawler\Crawler;
use App\Http\Requests;
use App\touristPlacesModel;
use DB;
use App\hotelsModel;
use App\servicesModel;
class CMS_CrawlerController extends Controller
{

	public function getViewLink()
	{
		return view('CMS.components.com_crawler.get_link');
	}

	public function CrawlerStep1(Request $request)
	{
		$so_luong_tin = $request->input('so_luong');
		$URL = $request->input('duong_dan');
		$crawler = Goutte::request('GET', $URL);
		$ten_khach_san = array();
	    $ten_khach_san =  $crawler->filter('h2.hp__hotel-name')->each(function ($node) {
	      return  $node->text();
	    });
		$so_sao_text =  $crawler->filter('i.bk-icon-wrapper')->each(function ($node) {
	      	return  $node->attr('title');
	    });

		
		preg_match_all('!\d+!', $so_sao_text[0], $matches);
		$so_sao_tmp = $matches[0];
		$so_sao = (string)$so_sao_tmp[0];

	    $toado = array();
	    $toado =  $crawler->filter('a.city_centre_map_link_show_map')->each(function ($node) {
	      return  $node->attr('data-bbox');
	    });

		$toa_do_tmp = (string)$toado[0];	    
	    
	    $toa_do = explode(',', $toa_do_tmp);
	    $kinhdo = $toa_do[0];
	    $vido = $toa_do[1];
	    $toado = [$kinhdo, $vido];
	   	$mota =  $crawler->filter('div.hp_desc_main_content ')->each(function ($node) {
	      return  $node->text();
	    });
	    
	   	$diachi = array();
	    $diachi =  $crawler->filter('span.hp_address_subtitle')->each(function ($node) {
	      return  $node->text();
	    });

	    $mo_ta = (string)$mota[0];
	    
	    $gia  ="Đang cập nhật";

	    $website = "Đang cập nhật";


	    $hinhanh_ = array();
		$hinhanh_ =  $crawler->filter('img')->each(function ($node) {
	      return  $node->attr('src');
	    });
    

		// $domain = 'https://www.booking.com';
		
		// $duongdan1 = trim($domain).trim($duondgan[0]);
		// $new = str_replace('#hotelTmpl', '', $duongdan1);

	    return view('CMS.components.com_crawler.list_crawler_step_1',['ten_khach_san'=>$ten_khach_san, 'kinhdo'=>$kinhdo,'vido'=>$vido, 'mota'=>$mota, 'so_luong'=>$so_luong_tin, 'diachi'=>$diachi, 'sosao'=>$so_sao]);
	// }
	}

	public function Post1(Request $request)
	{ 
		$ten_khach_san =  $request->input('ten_dia_diem');
		$mo_ta = $request->input('mo_ta');
		$toado = $request->input('toa_do');
		$sosao = $request->input('sosao');
		$toa_do_extract = explode(',', $toado);
		$diachi =  $request->input('diachi');
        $place                  = new touristPlacesModel;
        $place->pl_name         = $ten_khach_san;
        $place->pl_details      = $mo_ta;
        $place->pl_address      = $diachi[0];
        $place->pl_phone_number = "Đang cập nhật";
        $place->pl_latitude     = $toa_do_extract[1];
        $place->pl_longitude    = $toa_do_extract[0];
        $place->id_ward    = "1";
        $place->pl_status       = 1;
        $place->user_id   = "1";
        $place->pl_content   = $mo_ta;
        $max_id = DB::table('vnt_tourist_places')
        ->select('id')
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->get();

        if($place->save()){
        	$tmp_id = 0;
	        foreach ($max_id as $value) {
	            $tmp_id = (($value->id)+1)*1;
	        } 
            $id_place = $tmp_id;
            
        } else {
            return json_encode("status:500");
        }


		$vnt_services                 = new servicesModel;
        $vnt_services->sv_description   = $mo_ta;
        $vnt_services->sv_open    = "Đang cập nhật";
        $vnt_services->sv_close  = "Đang cập nhật";
        $vnt_services->sv_highest_price  =  "Đang cập nhật";
        $vnt_services->sv_lowest_price =  "Đang cập nhật";
        $vnt_services->sv_phone_number   = "Đang cập nhật";
        $vnt_services->sv_content   =$mo_ta;
        $vnt_services->sv_status   = 0;
        $vnt_services->sv_types   =2;
        $vnt_services->tourist_places_id   = $id_place;
        $vnt_services->sv_counter_view=0;
        $vnt_services->sv_counter_point=0;
        $vnt_services->user_id=1;
        $vnt_services->sv_website   = "Đang cập nhật";
        $vnt_services->save();
        $lastServices = DB::table('vnt_services')->orderBy('id', 'desc')->first();
        $convert = (array)$lastServices;
        $id_service =  $convert['id'];
        $id_type =  $convert['sv_types'];
        
        $vnt_hotels = new hotelsModel;
	    $vnt_hotels->hotel_name =  $ten_khach_san;
	    $vnt_hotels->hotel_number_star =  $sosao;
	    $vnt_hotels->hotel_status =  1;
	    $vnt_hotels->service_id =  $id_service;
	    if($vnt_hotels->save()){

	    	if($request->input('action') == "Lưu lại và thoát")
	        	return redirect('/lvtn-list-services-unactive')->with('message', "Hoàn tất, Đã lưu địa điểm, dịch vụ!");
		    else{
		    	return redirect('/get-view-crawler')->with('message', "Hoàn tất, Đã lưu địa điểm, dịch vụ!");
		    }
	    }	
	    else
	    {
	        return json_encode("status:500");
	    }
        
       


	}


	public function Crawler()
	{
		$crawler = Goutte::request('GET', 'https://www.booking.com/searchresults.vi.html?aid=357026&label=gog235jc-country-vi-vn-vn-unspec-vn-com-L%3Avi-O%3AwindowsS10-B%3Achrome-N%3AXX-S%3Abo-U%3Ac-H%3As&sid=9f108c37f8c1ef0d29b343849f78552c&sb=1&src=searchresults&src_elem=sb&error_url=https%3A%2F%2Fwww.booking.com%2Fsearchresults.vi.html%3Faid%3D357026%3Blabel%3Dgog235jc-country-vi-vn-vn-unspec-vn-com-L%253Avi-O%253AwindowsS10-B%253Achrome-N%253AXX-S%253Abo-U%253Ac-H%253As%3Bsid%3D9f108c37f8c1ef0d29b343849f78552c%3Bcheckin_month%3D7%3Bcheckin_monthday%3D11%3Bcheckin_year%3D2018%3Bcheckout_month%3D7%3Bcheckout_monthday%3D12%3Bcheckout_year%3D2018%3Bcity%3D-3712125%3Bclass_interval%3D1%3Bdest_id%3D-3712125%3Bdest_type%3Dcity%3Bdtdisc%3D0%3Bfrom_sf%3D1%3Bgroup_adults%3D1%3Bgroup_children%3D0%3Binac%3D0%3Bindex_postcard%3D0%3Blabel_click%3Dundef%3Bno_rooms%3D1%3Boffset%3D0%3Bpostcard%3D0%3Broom1%3DA%3Bsb_price_type%3Dtotal%3Bsrc%3Dsearchresults%3Bsrc_elem%3Dsb%3Bss%3D%25C4%2590a%25CC%2580%2520N%25C4%2583%25CC%2583ng%3Bss_all%3D0%3Bssb%3Dempty%3Bsshis%3D0%3Bssne%3D%25C4%2590a%25CC%2580%2520N%25C4%2583%25CC%2583ng%3Bssne_untouched%3D%25C4%2590a%25CC%2580%2520N%25C4%2583%25CC%2583ng%26%3B&ss=%C4%90a%CC%80+N%C4%83%CC%83ng&ssne=%C4%90a%CC%80+N%C4%83%CC%83ng&ssne_untouched=%C4%90a%CC%80+N%C4%83%CC%83ng&city=-3712125&checkin_monthday=21&checkin_month=7&checkin_year=2018&checkout_monthday=22&checkout_month=7&checkout_year=2018&group_adults=1&group_children=0&no_rooms=1&from_sf=1');
		$ten_khach_san = array();
	    $ten_khach_san =  $crawler->filter('span.sr-hotel__name')->each(function ($node) {
	      return  $node->text();
	    });

	    $toado = array();
	    $toado =  $crawler->filter('.bicon-map-pin')->each(function ($node) {
	      return  $node->attr('data-coords');
	    });

	    $duondgan = array();
	    $duondgan =  $crawler->filter('.hotel_name_link')->each(function ($node) {
	      return  $node->attr('href');
	    });

	    $hotel_image = array();
		$hotel_image =  $crawler->filter('.hotel_image')->each(function ($node) {
	      return  $node->attr('src');
	    });	    

		// echo  $hotel_image[1];
		foreach ($hotel_image as $value) {

		}
	    $mota = array();
		$mota =  $crawler->filter('.hotel_desc')->each(function ($node) {
	      return  $node->text();
	    });

	 //    $gia = array();
		// $gia =  $crawler->filter('strong.bui-price__title')->each(function ($node) {
	 //      return  $node->text();
	 //    });


		// // return $duondgan;
		$domain = 'https://www.booking.com';
		
		$duongdan1 = trim($domain).trim($duondgan[0]);
		$new = str_replace('#hotelTmpl', '', $duongdan1);

		// $crawler2 = Goutte::request('GET', trim($new));

		// $ten_khach_san2 = array();
	 //    $ten_khach_san2 =  $crawler2->filter('h2.hp__hotel-name')->each(function ($node) {
	 //      return  $node->text();
	 //    });

	 //    $diachi = array();
	 //    $diachi =  $crawler2->filter('span.hp_address_subtitle')->each(function ($node) {
	 //      return  $node->text();
	 //    });

	 //    $noidung = array();
	 //    $noidung =  $crawler2->filter('div.loc_ltr_for_rtl')->each(function ($node) {
	 //      return  $node->html();
	 //    });

	 //    echo $noidung[0].'<br>';


	 //    $hinhanh_ = array();
		// $hinhanh_ =  $crawler2->filter('img')->each(function ($node) {
	 //      return  $node->attr('src');
	 //    });

	 //    print_r($hinhanh_);


	}	

	
}
