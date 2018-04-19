@include('VietNamTour.header-footer.header')



<link rel="stylesheet" href="resource/css/hotel.css">
<link rel="stylesheet" href="resource/css/hotel-detail.css">
<link rel="stylesheet" href="resource/css/lightbox.min.css">
<link rel="stylesheet" href="resource/css/detail-tab.css">

	<section class="content-detail">
		<div class="container">
			<div class="row">
				<div class="col-md-7" style="padding-right: 0;">
					<div class="hotel-detail-left">
						<div class="accordian">
							<ul>
								<li>
									<a>
										<img src="thumbnails/{{$sv['image_details_1']}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="thumbnails/{{$sv['image_details_2']}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="thumbnails/{{$sv['image_banner']}}"/>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-5" style="padding-left: 0;">
					<div class="hotel-detail-right">
						<div class="title" style="text-align: left; margin-bottom: 5px;">
							<p>
								<a>{{$sv['city_name']}} <i class="fas fa-angle-double-right"></i></a> 
								<a>{{$sv['district_name']}} <i class="fas fa-angle-double-right"></i></a> 
								<a>{{$sv['ward_name']}}</a>
							</p>
							<h4 style="font-size: 20px;" id="sv_name">{{$sv['sv_name']}}</h4> {{-- ten dich vu --}}
							<div class="star">
								@for($i = 0;$i < $sv['sv_rating']; $i++)
									<i class="fas fa-star"></i>
								@endfor
								<span style="color: black" id="loaihinhdichvu">
									@if($sv['sv_types'] == "1")
										- Ăn uống
									@elseif($sv['sv_types'] == "2")
										- Khách sạn
									@elseif($sv['sv_types'] == "3")
										- Phương tiện
									@elseif($sv['sv_types'] == "4")
										- Tham quan
									@else
										- Vui chơi
									@endif
								</span> {{-- loai hinh dich vu --}}
							</div>
						</div>
						<div class="hotel-body">
							<p style="margin: 0;" id="mota-dichvu">{{$sv['sv_description']}}</p>
							<div class="row">
								<div class="col-md-3">
									<a id="">
										<i class="far fa-bookmark"></i>
										{{$sv['sv_point']}}
									</a>
								</div>
								<div class="col-md-3 text-center">
									<a title="Lượt xem">
										<i class="fas fa-eye"></i>
										{{$sv['sv_view']}}
									</a>
								</div>
								<div class="col-md-3 text-center">
									<a id="like01">
										<i id="color-like" class="fas fa-heart"></i>
										{{$sv['sv_like']}}
									</a>
								</div>
								<div class="col-md-3 text-center">
									<a id="">
										<i class="fas fa-share"></i>
									</a>
								</div>
							</div>
							<div class="service">
								<ul>
									<li>
										<div class="icon-f"><i class="fas fa-paper-plane"></i></div>
										   Lê Lợi, Lô E1, Cồn Cái Khế, P. Cái Khế, Q.Ninh Kiều, Quận Ninh Kiều
									</li>
									<li>
										<div class="icon-f">
											<i class="fas fa-phone"></i>
										</div>
										<span id="phonenumber">{{$sv['sv_phone_number']}}</span> {{-- sodienthoai --}}
									</li>

									<li>
										<div class="icon-f">
											<i class="far fa-clock"></i>
										</div>
										<span id="giomocua">{{$sv['sv_close']}}</span> {{-- gio mo cua --}}
										<i class="fas fa-arrow-right"></i> 
										<span id="giodongcua">{{$sv['sv_open']}}</span> {{-- gio mo cua --}}
									</li>

									<li>
										<div class="icon-f">
											<i class="fas fa-tag"></i>
										</div>
										<span id="giathapnhat">{{$sv['sv_lowest_price']}}</span> {{-- gia thap nhat --}}
										<i class="fas fa-arrow-right"></i> 
										<span id="giacaonhat">{{$sv['sv_highest_price']}}</span>  {{-- gia cao nhat --}}
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="" style="background-color: white; margin-top: 15px;">
						<div class="tabbable-panel">
							<div class="tabbable-line">
								<ul class="nav nav-tabs">
									<li class="active tab-lam" style="width: 25%;">
										<a href="#tab_default_1" data-toggle="tab" style="text-align: center;">
										Hình ảnh </a>
									</li>
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_2" data-toggle="tab" style="text-align: center;">
										Giới thiệu </a>
									</li>
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_3" data-toggle="tab" style="text-align: center;">
										Đánh giá </a>
									</li>
									<li class="tab-lam" style="width: 25%;">
										<a href="#tab_default_4" data-toggle="tab" style="text-align: center;">
										Bản đồ </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_default_1">
										<section class="demo" style="background-color: transparent;">
											<div class="gallery">
												<a style="background-color: transparent;" href="http://i.imgur.com/80WaVuY.jpg" title="" data-fluidbox class="col-12"><img src="http://i.imgur.com/80WaVuY.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/9OQWB.jpg" title="" data-fluidbox class="col-6"><img src="http://i.imgur.com/9OQWB.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/UvGHJjo.jpg" title="" data-fluidbox class="col-6"><img src="http://i.imgur.com/UvGHJjo.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/esWWGbF.jpg" title="" data-fluidbox class="col-4"><img src="http://i.imgur.com/esWWGbF.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/ZCogT10.jpg" title="" data-fluidbox class="col-4"><img src="http://i.imgur.com/ZCogT10.jpg" alt="" title="" /></a>
												<a href="http://i.imgur.com/24hrPQn.jpg" title="" data-fluidbox class="col-4"><img src="http://i.imgur.com/24hrPQn.jpg" alt="" title="" /></a>
											</div>
										</section>
									</div>

									<div class="tab-pane" id="tab_default_2">
										<p style="text-align: justify; padding: 10px;" >
											{{$sv['sv_description']}}
										</p>
									</div>

									<div class="tab-pane" id="tab_default_3">
										<p>
											Tab 2.
										</p>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit.
										</p>

									</div>

									<div class="tab-pane" id="tab_default_4">
										<p>
											Tab 3.
										</p>
										<p>
											Consectetur deleniti quisquam natus eius commodi.
										</p>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4" style="padding-left: 0;">
					<div class="right-content">
						<div class="title-right-content">
							<h5 class="text-center">Địa điểm lân cận</h5>
						</div>
						<div class="body-right-content" style="height: 600px;overflow-y: scroll;">
							@foreach($sv_lancan as $s)
								<div class="item-cafe">
									<ul>
										<li>
											<a href="http://chinhlytailieu/doan3_canthotour/public/detail/id={{$s['sv_id']}}&type={{$s['sv_type']}}">
												<img src="thumbnails/{{$s['image_banner']}}" alt="loi" style="height: 100%;width: 110px;">
												<div class="text-item-cafe text-left">
													<h6 style="margin-bottom: 0;display: inline-block;text-overflow: ellipsis;">	<b style="font-weight: 600;">{{$s['sv_name']}}</b>
													</h6>
													<p class="text-left" style="font-size: 13px;">
														@if($s['sv_type'] == 1)
															Ăn uống
														@elseif($s['sv_type'] == 2)
															Khách sạn
														@elseif($s['sv_type'] == 3)
															Phương tiện
														@elseif($s['sv_type'] == 4)
															Tham quan
														@elseif($s['sv_type'] == 5)
															Vui chơi
														@endif
													</p>
												</div>
											</a>
										</li>
									</ul>
								</div>
							@endforeach	
						</div>
					</div>	
					
				</div>
			</div>
		</div>

	</section>

	<script src="resource/js/lightbox.min.js"></script>
	<script src="resource/js/detail-hotel.js"></script>
	<script src="resource/js/menu-style.js"></script>

	{{-- <script src="resource/js/menu-style.js"></script> --}}
	<script src="resource/lightbox/jquery.fluidbox.min.js"></script>

	<script>
		$(function () {			
			$('.demo a[data-fluidbox]').fluidbox();
		});
	</script>

	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded",function () {
		    var aTab = document.getElementsByClassName('tab-lam');
		    
		    for (var i = 0; i < aTab.length; i++) {
		        aTab[i].onclick = function(){
		        	// console.log(aTab[i]);
		            for (var i = 0; i < aTab.length; i++) {
		                aTab[i].classList.remove('active');
		            }

		            this.classList.add('active');
		            // for (var i = 0; i < boDy.length; i++) {
		            //     boDy[i].classList.remove('active-content');
		            // }
		            // var hienthi = this.getAttribute("data-hienthi2");
		            // // console.log(hienthi);
		            // document.getElementById(hienthi).classList.add('active-content');
		        }
		    }
		    
		},false);
	</script>

@include('VietNamTour.header-footer.footer')