@extends('CMS.components.index')
@section('content')
<div id="page-title">
    <h2>{{ $data_places[0]->pl_name }}</h2>
	<input type="hidden" id="lat" value="{{ $data_places[0]->pl_latitude }}">
	<input type="hidden" id="log" value="{{ $data_places[0]->pl_longitude }}">

	<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            Thông tin tổng quan địa điểm
        </h3>
		<div class="row">
			<div class="col-md-3">
			    <ul class="list-group">
			        <li class="mrg10B">
			            <a href="#faq-tab-1" data-toggle="tab" class="list-group-item bg-white">
			                Tổng quan
			                <i class="glyph-icon icon-angle-right mrg0A"></i>
			            </a>
			        </li>
			        <li class="mrg10B">
			            <a href="#faq-tab-2" data-toggle="tab" class="list-group-item bg-white">
			                Mở google maps
			                <i class="glyph-icon font-green icon-angle-right mrg0A"></i>
			            </a>
			        </li>
			    </ul>
			</div>
			<div class="col-md-9">
			    <div class="tab-content">
			        <div class="tab-pane fade active in pad0A" id="faq-tab-1">
			            <div class="panel-group" id="accordion5">
			                <div class="panel">
			                    <div class="panel-heading">
			                        <h4 class="panel-title">
			                            <a data-toggle="collapse" data-parent="#accordion5" href="#collapseOne">
			                                Thông tin chi tiết
			                            </a>
			                        </h4>
			                    </div>
			                    <div id="collapseOne" class="panel-collapse collapse in">
			                        <div class="panel-body pad0B">
			                        	<table class="table">
				                        <thead>
				                        <tr>
				                            <th>Tên địa điểm</th>
				                            <th>{{ $data_places[0]->pl_name }}</th>
				                            <input type="hidden" id="id_place" value="{{ $data_places[0]->id }}">
				                        </tr>
				                        </thead>
				                        <tbody>
				                        <tr>
				                            <td>Địa chỉ</td>
				                            <th style="background-color: #fff">{{ $data_places[0]->pl_address }}</th>
				                        </tr>
				                        </tbody>
				                        <thead>
				                        <tr>
				                            <th>Số điện thoại</th>
				                            <th>{{ $data_places[0]->pl_phone_number }}</th>
				                        </tr>
				                        </thead>
				                        <tbody>
				                        <tr>
				                            <td>Toạ độ</td>
				                            <th style="background-color: #fff">{{ $data_places[0]->pl_longitude }}, {{ $data_places[0]->pl_latitude }}</th>
				                        </tr>
				                        </tbody>
				                        <thead>
				                        <tr>
				                            <th>Trạng thái</th>
											<?php 
												$status = $data_places[0]->pl_status;
												$str = "";
												if($status == 0){
													$str = "Chờ duyệt";
												}
												else if($status == 1){
													$str = "Hiển thị";
												}
												else if($status == 2){
													$str = "Đang chờ giải quyết tranh chấp";
												}
												else if($status == -1){
													$str = "Bị đánh dấu spam";	
												}
												else{
													$str = "Chưa xác định";	
												}

											?>

				                            <th><?= $str; ?></th>

				                        </tr>
				                        </thead>
				                        <tbody>
				                        <tr>
				                            <td>Chức năng</td>
				                            <th style="background-color: #fff">
				                            	<a class="btn btn-success" 
				                            		href="{{ route('_AJAX_ACTIVE_PLACE', $data_places[0]->id) }}">Duyệt địa điểm</a>
				                            	<a class="btn btn-danger" href="{{ route('_AJAX_SPAM_PLACE', $data_places[0]->id) }}">Đánh dấu địa điểm</a>
				                            	<a class="btn btn-warning" href="{{ route('_AJAX_UNACTIVE_PLACE', $data_places[0]->id) }}">Ẩn địa điểm</a>
				                            </th>
				                        </tr>
				                        </tbody>
				                    </table>
		                                <p class="mrg15B"><?= $data_places[0]->pl_details ?></p>

			                            <p class="mrg15B"><?= $data_places[0]->pl_content ?></p>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="tab-pane fade pad0A" id="faq-tab-2">
			            <div class="panel-group" id="accordion1">
			                <div class="panel">
			                    <div class="panel-heading">
			                        <h4 class="panel-title">
			                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
			                                Vị trí
			                            </a>
			                        </h4>
			                    </div>
			                    <div id="collapseOne1" class="panel-collapse collapse in">
			                        <div class="panel-body pad0B">
			                            <div class="example-box-wrapper">
									        <div class="row">
									            <div class="content-box pad10A center-margin col-md-12">
									                <div id="map-marker" style="height: 250px;"></div>
									            </div>
									        </div>
									    </div>   
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			        
			    </div>
			</div>
		</div>

	</div>
	<script>

      function initMap() {
      	var getLat = document.getElementById('lat').value;
      	var getLlong = document.getElementById('log').value;
      	
        var myLatLng = {lat: parseFloat(getLat), lng: parseFloat(getLlong)};

        var map = new google.maps.Map(document.getElementById('map-marker'), {
          zoom: 10,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQnUfJIUr14br8WuniuuUMGkq0zDFoAc4&callback=initMap">
    </script>


</div>
@endsection