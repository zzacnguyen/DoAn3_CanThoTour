@extends('CMS.components.index')
@section('content')
<div id="page-title">
    <h2>{{ $data_service[0]->pl_name }}</h2>
	<input type="hidden" id="lat" value="{{ $data_service[0]->pl_latitude }}">
	<input type="hidden" id="log" value="{{ $data_service[0]->pl_longitude }}">

	<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            THÔNG TIN DỊCH VỤ
        </h3>
		<div class="row">
			<div class="col-md-3">
			    <ul class="list-group">
			        <li class="mrg10B">
			            <a href="#faq-tab-1" data-toggle="tab" class="list-group-data_service[0] bg-white">
			                Tổng quan
			                <i class="glyph-icon icon-angle-right mrg0A"></i>
			            </a>
			        </li>
			        <li class="mrg10B">
			            <a href="#faq-tab-2" data-toggle="tab" class="list-group-data_service[0] bg-white">
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
			                                <div style="float: right;">
			                                	Loại hình dịch vụ: 
			                                	<?php 
					                            if($data_service[0]->sv_types == 1)
					                           {
					                                echo '<small>Ăn uống</small>' ;
					                           }
					                           else if($data_service[0]->sv_types == 2)
					                           {
					                                echo '<small>Khách sạn</small>' ;
					                           }
					                           else if ($data_service[0]->sv_types == 3 )
					                           {
					                                echo '<small>Di chuyển</small>' ;    
					                           }
					                           else if ($data_service[0]->sv_types == 4 )
					                           {
					                                echo '<small>Tham quan</small>' ;    
					                           }
					                           else
					                           {
					                                echo '<small>Vui chơi</small>' ;    
					                           }
					                           ?>
			                                </div>
			                                
			                            </a>
			                        </h4>
			                    </div>
			                    <div id="collapseOne" class="panel-collapse collapse in">
			                        <div class="panel-body pad0B">
			                        	<table class="table">
				                        <thead>
				                        <tr>
				                            <th>Tên dịch vụ</th>
				                            <th> 
				                            	@if($data_service[0]->hotel_name != null)
					                                {{$data_service[0]->hotel_name}} 
					                            @elseif($data_service[0]->eat_name != null)
					                                - {{ $data_service[0]->eat_name }}
					                            @elseif($data_service[0]->transport_name != null)
					                                -{{ $data_service[0]->transport_name }}
					                            @elseif($data_service[0]->sightseeing_name != null)
					                                -{{ $data_service[0]->sightseeing_name }}
					                            @elseif($data_service[0]->eat_name != null)
					                                -{{ $data_service[0]->eat_name }}
					                            @elseif($data_service[0]->entertainments_name != null)
					                                -{{ $data_service[0]->entertainments_name }}
					                            @endif
					                        </th>
				                            <input type="hidden" id="id_place" value="{{ $data_service[0]->service_id }}">
				                        </tr>
				                        </thead>
				                        <tbody> 
				                        <tr>
				                            <td>Địa chỉ</td>
				                            <th style="background-color: #fff">{{ $data_service[0]->pl_address }}</th>
				                        </tr>
				                        </tbody>
				                        <thead>
				                        <tr>
				                            <th>Số điện thoại</th>
				                            <th>{{ $data_service[0]->pl_phone_number }}</th>
				                        </tr>
				                        </thead>
				                        <tbody> 
				                        <tr>
				                            <td>Giá dịch vụ</td>
				                            <th style="background-color: #fff">{{ $data_service[0]->sv_lowest_price }} - {{ $data_service[0]->sv_highest_price }}</th>
				                        </tr>
				                        </tbody>
				                        <thead>
				                        <tr>
				                            <th>Mở cửa</th>
				                            <th>{{ $data_service[0]->sv_open }} - {{ $data_service[0]->sv_close }}</th>
				                        </tr>
				                        </thead>
				                        <tbody>
				                        <tr>
				                            <td>Toạ độ</td>
				                            <th style="background-color: #fff">{{ $data_service[0]->pl_longitude }}, {{ $data_service[0]->pl_latitude }}</th>
				                        </tr>
				                        </tbody>
				                        <thead>
				                        <tr>
				                            <th>Trạng thái</th>
											<?php 
												$status = $data_service[0]->sv_status;
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
				                            	<?php if($status == 0 || $status == 2) {?>
				                            	<a class="btn btn-success" 
				                            		href="{{ route('_AJAX_ACTIVE_SERVICES', $data_service[0]->service_id) }}">Duyệt dịch vụ</a> 
				                            	<?php } else if($status == 1){ ?>
				                            	<a class="btn btn-danger" href="{{ route('_AJAX_SPAM_SERVICES', $data_service[0]->service_id) }}">Đánh dấu dịch vụ</a>
				                            	<?php }else if($status == -1){ ?>
												<a class="btn btn-info" href="{{ route('_DETAIL_UNSPAM_SERVICES', $data_service[0]->service_id) }}">Tắt đánh dấu</a>
				                            	<?php }else {} ?>
				                            	<a class="btn btn-warning" href="{{ route('_DETAIL_UNACTIVE_SERVICES', $data_service[0]->service_id) }}">Ẩn dịch vụ</a>

				                            </th>
				                        </tr>
				                        </tbody>
				                    </table>
		                                <p class="mrg15B"><?= $data_service[0]->sv_description ?></p>

			                            <p class="mrg15B"><?= $data_service[0]->sv_content ?></p>
			                            <div class="clearfix" style="padding-top: 30px"></div>
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