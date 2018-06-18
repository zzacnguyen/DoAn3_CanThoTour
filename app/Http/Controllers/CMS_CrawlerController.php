<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use Symfony\Component\DomCrawler\Crawler;
use App\Http\Requests;
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

	    $mota = array();
		$mota =  $crawler->filter('.hotel_desc')->each(function ($node) {
	      return  $node->text();
	    });

		$domain = 'https://www.booking.com';
		
		$duongdan1 = trim($domain).trim($duondgan[0]);
		$new = str_replace('#hotelTmpl', '', $duongdan1);

	    return view('CMS.components.com_crawler.list_crawler_step_1',['ten_khach_san'=>$ten_khach_san, 'toado'=>$toado, 'mota'=>$mota, 'so_luong'=>$so_luong_tin, 'duong_dan'=>$new] );
	}


	public function Post1(Request $request)
	{
		
		$duong_dan = $request->input('link_bai_viet');
		$crawler2 = Goutte::request('GET', trim($duong_dan));

		$ten_khach_san2 = array();
	    $ten_khach_san2 =  $crawler2->filter('h2.hp__hotel-name')->each(function ($node) {
	      return  $node->text();
	    });

	    $diachi = array();
	    $diachi =  $crawler2->filter('span.hp_address_subtitle')->each(function ($node) {
	      return  $node->text();
	    });

	    $noidung = array();
	    $noidung =  $crawler2->filter('div.loc_ltr_for_rtl')->each(function ($node) {
	      return  $node->html();
	    });


	    $hinhanh_ = array();
		$hinhanh_ =  $crawler2->filter('img')->each(function ($node) {
	      return  $node->attr('src');
	    });

	    print_r($hinhanh_);

		return "TÍNH";
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

		echo  $hotel_image[0];
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
