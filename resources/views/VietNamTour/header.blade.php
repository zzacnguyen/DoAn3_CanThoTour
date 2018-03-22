<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VietNamTravel</title>

	<script type="text/javascript" src="resourceVNT/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="resourceVNT/js/bootstrap.js"></script>
	<script src="resourceVNT/js/fontawesome-all.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9B_e_WdKwqzNgABxkeVt2iT0XVmaK_wQ&callback=canvasMap"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" />
    
	<script>
		function myMap() {
		var mapProp= {
		    center:new google.maps.LatLng(10.0566098,105.7717238),
		    zoom:5,
		};
		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		google.maps.event.addListener(canvasMap, 'click', function(event) {
		alert(event.latLng.lat() + ", " + event.latLng.lng());
		});

		}
	</script>
    <script type="text/javascript">
        

        function GetLocation(address, mapId) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var location = {};
                    location.lattitude = results[0].geometry.location.lat();
                    location.longitude = results[0].geometry.location.lng();
                    location.address = results[0].formatted_address;
                    var mapOptions = { center: new google.maps.LatLng(location.lattitude, location.longitude), zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP };
                    var infoWindow = new google.maps.InfoWindow();
                    var latlngbounds = new google.maps.LatLngBounds();
                    var map = new google.maps.Map(mapId, mapOptions);
                    var myLatLng = new google.maps.LatLng(location.lattitude, location.longitude);
                    var marker = new google.maps.Marker({ position: myLatLng, map: map });
                  
				    google.maps.event.addListener(canvasMap, 'click', function( event ){
					  alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() ); 
					});
                }
            });
        };
 		
        function InitializeMap(maPId) {
            var mapOptions = { center: new google.maps.LatLng(10.0566098, 105.7717238), zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP }
            var map = new google.maps.Map(maPId, mapOptions);
        }

 
        $(function () {
            $("#btnmap").click(function () {
                InitializeMap($("#canvasMap")[0]);
                $("#dialog").dialog({
                    modal: true,
                    title: "Location",
                    width: 600,
                    hright: 400,
                    buttons: {
                        Close: function () {
                            $(this).dialog('close');
                            $("#lblOfficeAddress").val('');
                        },
                        Open: function () {
                            GetLocation($("#lblOfficeAddress").val(), $("#canvasMap")[0]);
                        }
                    }
                });
                return false;
            });
        });


        $(function () {
           	google.maps.event.addListener(canvasMap, 'click', function( event ){
					  alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() ); 
					});
        });
    </script>
   
	<link rel="stylesheet" href="resourceVNT/css/bootstrap.css">
	<link rel="stylesheet" href="resourceVNT/css/owl.carousel.min.css">
	<link rel="stylesheet" href="resourceVNT/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="resourceVNT/css/place.css">
	<link rel="stylesheet" href="resourceVNT/css/style.index.css">
	<link rel="stylesheet" href="resourceVNT/css/menu-style.css">
	{{-- <link rel="stylesheet" href="resourceVNT/css/addplace.css"> --}}
	{{-- <link rel="stylesheet" href="resourceVNT/css/addservices.css"> --}}
</head>
<body>
	
	<!-- ========== icon =========== -->
	<div class="icon-bar">
		<ul>
			<li class="search">
				<a href="###">
					<div class="icon"><i class="fas fa-search"></i></div>
					<div class="slider">
						<p>Search</p>
					</div>
				</a>
			</li>
			<li class="facebook">
				<a href="#">
					<div class="icon"><i class="fab fa-facebook-f"></i></div>
					<div class="slider">
						<p>Facebook</p>
					</div>
				</a>
			</li>
			<li class="google">
				<a href="#">
					<div class="icon"><i class="fab fa-google-plus-g"></i></div>
					<div class="slider">
						<p>Google</p>
					</div>
				</a>
			</li>
		</ul>
	</div>
	<div class="icon-scroll-top" id="id-icon-scroll-top"><a><i class="fas fa-arrow-up"></i></a></div>
	<!-- ========== end icon =========== -->

	<!-- ================== header ============= -->
	<section class="header">
		<div class="img-carolsel">
			<ul>
				<li class="active-img">
					<div class="img-item">
						<div class="img-content" style="background-image: url('resourceVNT/images/background/3.jpg');"></div>
					</div>
				</li>
				<li>
					<div class="img-item">
						<div class="img-content" style="background-image: url('resourceVNT/images/background/2.jpg');"></div>
					</div>
				</li>
				<li >
					<div class="img-item">
						<div class="img-content" style="background-image: url('resourceVNT/images/background/1.jpg');"></div>
					</div>
				</li>
			</ul>
			<div class="noidung-text">
				
			</div>	
		</div> <!-- end img-carolsel -->
		<div class="container">
			<div class="layer-top" id="id-layer-top">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light menuTop" id="id-menu-Top">
						<a class="navbar-brand" href="#" style="color: #304FFE !important;"><!-- VietNamTour -->
							<img src="https://static.tacdn.com/img2/langs/vi/branding/rebrand/TA_logo_primary_v2.svg" alt="" style="height: 50px; width: 160px;">
						</a>
						<!-- <button class="btn btn-success navbar-toggler" id="btnsearch-xs"><i class="fas fa-search"></i></button> -->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color: white; background-color: white;">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item btn-select" >
									<a id="a-tinhTP" class="nav-link a-select" data-hienthi="tinhTP" href="#">Cần Thơ <i class="fas fa-angle-down"></i></a>

									<div class="select-content" id="tinhTP">
										<div class="caption-h5">
						  					<h5><i class="fas fa-globe"></i> Tỉnh thành phố</h5>
						  				</div>

						  				<ul>
						  					<li class="selectItem" data-name="Cần Thơ">
						  						<a href="https://www.google.com.vn" class="selectItem-name">
						  							<label>Cần Thơ</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem" data-name="HCM">
						  						<a href="https://www.google.com.vn" class="selectItem-name">
						  							<label>HCM</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem" data-name="Hà Nội">
						  						<a href="https://www.google.com.vn" class="selectItem-name">
						  							<label>Hà Nội</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  				</ul>
									</div>
								</li> <!-- end btn-select -->
								<li class="nav-item btn-select">
									<a id="a-danhmuc" class="nav-link a-select" data-hienthi="danhmuc" href="#">Tham quan <i class="fas fa-angle-down"></i></a>
									<div class="select-content" id="danhmuc">
										<div class="caption-h5">
						  					<h5><i class="fas fa-globe"></i> Danh mục</h5>
						  				</div>

						  				<ul>
						  					<li class="selectItem2" data-name="Cân Thơ">
						  						<a href="" class="selectItem-name2">
						  							<label>Tham quan</label>
						  							<span class="float-right">1234</span>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="HCM">
						  						<a href="" class="selectItem-name2">
						  							<label>Ăn uống</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Hà Nội">
						  						<a href="" class="selectItem-name2">
						  							<label>Khách sạn</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Hà Nội">
						  						<a href="" class="selectItem-name2">
						  							<label>Vui chơi</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  					<li class="selectItem2" data-name="Hà Nội">
						  						<a href="" class="selectItem-name2">
						  							<label>Phương tiện</label>
						  							<span class="float-right">12.000</span>
						  						</a>
						  					</li>
						  				</ul>
									</div>
								</li><!-- end btn-select -->
								<li class="nav-item hidden-xs" style="position: relative;">
									<form class="form-inline form-search">
										<label class="boloc"><i class="fas fa-search"></i></label>
										<input id="text-search-top" class="form-control input-search" type="search" placeholder="Search" aria-label="Search">
										<button class="btn btn-outline-success btn-search" type="submit">Tìm kiếm</button>
									</form>
									<div class="body-search">
										<div class="item-search">
											<div class="title-search">
												<h5>Từ khóa tìm kiếm nhiều nhất</h5>
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
										</div>

										<div class="item-search">
											<div class="title-search">
												<h5>Lịch sử tìm kiếm</h5>
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
										</div>
									</div>
								</li>
							</ul>
							<div class="form-inline my-2 my-lg-0" id="dangnhap-dangky">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item" style="position: relative;">
										<a href="{{ route('loginW') }}" class="nav-link btn-login" id="btn-dangnhap">Đăng nhập</a>
										<!-- hien thi khi dang nhap thanh cong -->
										<a class="nav-link btn-login hidden" style="padding: 0; border: none !important;" id="id-user-form">
											<img src="images/avatar1.jpg" alt="" style="height: 33px; width: 33px;">
											lamthemen <i class="fas fa-caret-down"></i>
										</a>
										<div class="user-form">
											<ul>
												<li><a href=""><i class="fas fa-info-circle"></i> Thông tin tài khoản</a></li>
												<li><a href=""><i class="fas fa-book"></i> Góp ý</a></li>
												<li><a href="{{ route('/') }}"><i class="fas fa-power-off"></i> Đăng xuất</a></li>
											</ul>
										</div> <!-- end hien thi khi dang nhap thanh cong -->
									</li>

									<li class="nav-item"><a href="{{  route('registerW') }}" class="nav-link btn-login" id="btn-dangky">Đăng ký</a></li>
								</ul>
							</div>
						</div>
					</nav>
					<div class="con" id="id-con">
						<div class="row">
							<div class="col-md-5 col-8">
								<div class="right-menu-lam">
									<ul class="float-left ul-right-menu-lam">
										<li class="active-menu"><a href=""><i class="fas fa-home"></i></a></li>
										<li class="hover-menu"><a href="">Địa điểm</a></li>
										<li class="hover-menu"><a href="">Bài viết</a></li>
										<li class="hover-menu"><a href="">Liên hệ</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-5 hidden-xs">
								<div class="ssearch" id="hidden-formSearch" style="position: relative; display: none; transition: 0.5s; margin-top: -2px;">
									<form action="" class="form-search-menu">
										<label class="boloc2"><i class="fas fa-search"></i></label>
										<input type="text" class="input-search2" id="text-search-top-2">
										<button class="btn-search2">Tìm kiếm</button>
									</form>
									<div class="body-search" style="top: 48px; left: 20px;">
										<div class="item-search">
											<div class="title-search">
												<h5>Từ khóa tìm kiếm nhiều nhất 2</h5>
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
										</div>

										<div class="item-search">
											<div class="title-search">
												<h5>Lịch sử tìm kiếm</h5>
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
											<div class="content-search">
												<a href="#">
													<div class="left-content-search">
														<img src="images/hotel/1.jpg" alt="">
													</div>
													<div class="right-content-search">
														<p>Mường Thanh Cần Thơ</p>
														<p style="font-size: 13px; color: #d2cece; font-weight: 400;">Lê Lợi, Cồn Cái Khế, P.Cái Khế, Q.Ninh Kiều, TP.Cần Thơ </p>
													</div>
												</a>		
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2 col-4">
								<ul class="float-right left-menu-lam">
									<li class="cha-notification">
										<a class="a-notification active-thongbao" data-id-hienthi="id-thongBao"><i class="fas fa-bell"></i></a>
										<div class="notification" id="id-thongBao">
											<div class="title-nofi">
												<h6 class="text-center" style="padding: 0; font-weight: 700;">Thông báo</h6>
											</div>
											<div class="content-nofi">
												<ul id="body-nofi">
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
												</ul>
											</div>
											<div class="xem text-center">
												<a href="" style="color: black !important; font-size: 13px; padding: 5px; font-weight: 700;">
													Xem tất cả
												</a>
											</div>
										</div>
									</li>
									<li class="cha-notification">
										<a class="a-notification" data-id-hienthi="id-tuychinh"><i class="fas fa-plus"></i></a>
										<div class="notification" id="id-tuychinh">
											<div class="title-nofi">
												<h6 class="text-center" style="padding: 0; font-weight: 700;">Thông báo</h6>
											</div>
											<div class="content-nofi">
												<ul id="body-nofi">
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
													<li>
														<a href="" class="a-content-nofi">
															<div class="anh-nofi">
																<img src="images/diadiem.jpg" alt="" class="img-icon-nofi">
															</div>
															<p class="text-nofi">
																Get code suggestions while writing code directly to your Java IDE.
															</p>	
														</a>
													</li>
												</ul>
											</div>
											<div class="xem text-center">
												<a href="" style="color: black !important; font-size: 13px; padding: 5px; font-weight: 700;">
													Xem tất cả
												</a>
											</div>
										</div>
									</li>
									<li><a href=""><img src="images/icons/vn.png" alt="" style="width: 20px; height: 20px;"></a></li>
								</ul>
							</div>
						</div>
							
					</div>
				</div>	
			</div> <!-- end layer-top -->
		</div>
	</section>
	<!-- ================== end header ============= -->

	@yield('content')

	<!-- ================== FOOTER ============= -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-12 col-12">
					<p style="text-align: justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
					<div class="address">
						<i class="fas fa-map-marker"></i>
						<span>1234 Vo Van Kiet CanTho</span>
					</div>
					<div class="address">
						<i class="fas fa-phone"></i>
						<span>0939 789 999</span>
					</div>
					<div class="address">
						<i class="fas fa-envelope"></i>
						<span>vietnamtravel@gmail.com</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 col-12">
					<div class="footer-text">
						<h3>Information</h3>
						<ul>
							<li><a href="#">Introduction</a></li>
							<li><a href="#">Help</a></li>
							<li><a href="#">Terms and Conditions</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Gop y</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 col-12">
					<div class="footer-text">
						<h3>Connect</h3>
						<ul>
							<li><a href="#">Facebook</a></li>
							<li><a href="#">Instagram</a></li>
							<li><a href="#">Google</a></li>
							<li><a href="#">Twitter</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 col-12">
					<div class="footer-text">
						<h3>Information</h3>
						<ul>
							<li><a href="#">Introduction</a></li>
							<li><a href="#">Help</a></li>
							<li><a href="#">Terms and Conditions</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- ================== END FOOTER ============= -->


	<!-- script -->
	<script type="text/javascript" src="resourceVNT/js/owl.carousel.js"></script>
	<script type="text/javascript">
		$('.owl-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:true,
		    responsive:{
		        0:{
		            items:3
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:5
		        }
		    }
		})
	</script>
	<script src="resourceVNT/js/menu-style.js"></script>
	<!-- end script -->