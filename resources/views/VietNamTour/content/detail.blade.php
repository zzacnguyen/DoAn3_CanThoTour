@include('VietNamTour.header-footer.header')
<link rel="stylesheet" href="resource/css/hotel.css">
<link rel="stylesheet" href="resource/css/hotel-detail.css">
<link rel="stylesheet" href="resource/css/lightbox.min.css">

	<section class="content-detail">
		<div class="container">
			<div class="row">
				<div class="col-md-7" style="padding-right: 0;">
					<div class="hotel-detail-left">
						<div class="accordian">
							<ul>
								<li>
									<a>
										<img src="thumbnails/{{$detailServices->image_details_1}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="thumbnails/{{$detailServices->image_details_1}}"/>
									</a>
								</li>
								<li>
									<a>
										<img src="thumbnails/{{$detailServices->image_details_1}}"/>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-5" style="padding-left: 0;">
					<div class="hotel-detail-right">
						<div class="title" style="text-align: left; margin-bottom: 5px;">
							<p><a>Cần Thơ</a> >> <a>Quận Ninh Kiều</a></p>
							<h4 style="font-size: 20px;">
								@if($detailServices->sv_types == 2)
									{{$detailServices->sv_name}}
								@elseif($detailServices->sv_types == 1)
									{{$detailServices->eat_name}}
								@elseif($detailServices->sv_types == 3)
									{{$detailServices->transport_name}}
								@elseif($detailServices->sv_types == 4)
									{{$detailServices->sightseeing_name}}
								@else
									{{$detailServices->entertainments_name}}
								@endif
							</h4>
							<div class="star">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<span style="color: black">
									@if($detailServices->sv_types == 2)
										Khách sạn
									@elseif($detailServices->sv_types == 1)
										Ăn uống
									@elseif($detailServices->sv_types == 3)
										Phương tiện
									@elseif($detailServices->sv_types == 4)
										Tham quan
									@else
										Vui chơi
									@endif
								</span>
							</div>
						</div>
						<div class="hotel-body">
							<p style="margin: 0;">{{$detailServices->sv_description}}</p>
							<div class="row">
								<div class="col-md-4 text-center">
									<a href="">Đánh giá</a>
									<div class="danhgia">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									</div>
								</div>
								<div class="col-md-4 text-center"><a href="" title="Chia sẻ"><i class="fas fa-share-alt"></i> Chia sẻ</a></div>
								<div class="col-md-4 text-center"><a id="like01"><i id="color-like" class="fas fa-heart"></i></a></div>
							</div>
							<div class="service">
								<ul>
									<li>
										<div class="icon-f"><i class="fas fa-paper-plane"></i></div>
										   Lê Lợi, Lô E1, Cồn Cái Khế, P. Cái Khế, Q.Ninh Kiều, Quận Ninh Kiều
									</li>
									<li><div class="icon-f"><i class="fas fa-phone"></i></div>{{$detailServices->sv_phone_number}}</li>
									<li><div class="icon-f"><i class="far fa-clock"></i></div>{{$detailServices->sv_open}} <i class="fas fa-arrow-right"></i> {{$detailServices->sv_close}}</li>
									<li><div class="icon-f"><i class="fas fa-tag"></i></div>{{$detailServices->sv_lowest_price}} <i class="fas fa-arrow-right"></i> {{$detailServices->sv_highest_price}} </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="hotel-detail-info">
						<div class="btn-details">
							<div class="line-box"></div>
							<ul class="">
								<li>
									<a class="tablink active-detail" data-hienthi2="info1">
										<span><i class="icon-details fas fa-info"></i></span>
									</a>
								</li>
								<li>
									<a class="tablink" data-hienthi2="imageList1">
										<span><i class="far fa-images"></i></span>
									</a>
								</li>
								<li>
									<a class="tablink" data-hienthi2="comment1">
										<span><i class="fas fa-comments"></i></span>
									</a>
								</li>
								<li>
									<a class="tablink" data-hienthi2="map1">
										<span><i class="fas fa-map-marker-alt"></i></span>
									</a>
								</li>
							</ul>
							

						</div>

						<div class="">
							<div class="content-details">
								<div class="line-body"></div>
								<div class="cha-hotel">
									<div class="body-panel1 info-hotel active-content" id="info1">
										<div class="gioithieu">
											<h4 class="text-center" style="margin-top: 10px;">Giới thiệu</h4>
											<p style="font-size: 15px; margin: 0;padding: 10px 20px; text-align: justify;"> {{$detailServices->sv_description}}</p>
										</div>
										<div class="tiennghi">
											<h5 style="margin-left: 20px;">Tiện nghi</h5>
											<ul>
												<li><i class="fas fa-utensils"></i> <span class="tiennghi">Ăn sáng miễn phí</span></li>
												<li><i class="fas fa-wifi"></i> <span class="tiennghi">Internet miễn phí</span></li>
												<li><i class="fas fa-credit-card"></i> <span class="tiennghi">Trả thẻ</span></li>
												<li><i class="fas fa-bicycle"></i> <span class="tiennghi">Giữ xe miễn phí</span></li>
											</ul>
										</div>
										<div class="anhnoibat">
											<h5 style="margin-left: 20px;">Một số hình ảnh nổi bật</h5>
											<div class="list-images">
												<div class="row cha-item-image">
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="thumbnails/{{$detailServices->image_details_1}}" data-lightbox="roadtrip">
															<img src="images/hotel/hotel-background.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
															<img src="thumbnails/{{$detailServices->image_details_1}}" style="width: 100%; height: 100%; padding: 5px;"/>
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="thumbnails/{{$detailServices->image_banner}}" data-lightbox="roadtrip">
															<img src="images/hotel/hotel-background.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
															<img src="thumbnails/{{$detailServices->image_banner}}" style="width: 100%; height: 100%; padding: 5px;"/>
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="thumbnails/{{$detailServices->image_details_2}}" data-lightbox="roadtrip">
															<img src="images/hotel/hotel-background.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
															<img src="thumbnails/{{$detailServices->image_details_2}}" style="width: 100%; height: 100%; padding: 5px;"/>
														</a>
													</div>
												</div>
											</div>
										</div>
											
										
									</div>
									<div class="body-panel1 image-list-hotel" id="imageList1">
										<div class="anhnoibat">
											<h5 style="margin-left: 20px; margin-top: 10px;">Một số hình ảnh nổi bật</h5>
											<div class="list-images">
												<div class="row cha-item-image">
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/hotel-background.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/hotel-background.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/hotel-background.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/hotel-background.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-194-636218173803539738.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi-420-636218173812134172.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
													<div class="col-md-3 col-sm-4 col-6 item-image">
														<a href="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" data-lightbox="roadtrip">
															<img src="images/hotel/foody-khach-san-muong-thanh-le-loi.jpg" alt="" style="width: 100%; height: 100%; padding: 5px;">
														</a>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12" style="padding: 0px 25px;">
														<a class="btn btn-info" style="width: 100%; color: white; font-weight: 500; margin-top: 10px; margin-bottom: 30px;border-radius: 0;">Xem thêm hình ảnh</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="body-panel1 comment-hotel" id="comment1">
										comment
									</div>
									<div class="body-panel1 map-hotel" id="map1">
										map
									</div>
								</div>		
							</div>
						</div>

						
					</div>
				</div>
				<div class="col-md-4" style="padding-left: 0;">
					<div class="right-content">
						<div class="title-right-content">
							<h5 class="text-center">Nhà hàng/cafe lân cận</h5>
						</div>
						<div class="body-right-content">
							@foreach($dichvulancan as $s)
								<div class="item-cafe">
									<ul>
										<li>
											<a href="">
												<img src="thumbnails/{{$s->image_details_1}}" alt="">
												<div class="text-item-cafe">
													<h6>Nhà hàng</h6>
													<p>{{$s->entertainments_name}}</p>
												</div>
											</a>
										</li>
									</ul>
								</div>
							@endforeach	
						</div>
					</div>	
					<div class="right-content">
						<div class="title-right-content">
							<h5 class="text-center">Vui chơi lân cận</h5>
						</div>
						<div class="body-right-content">
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/3.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sảnadadd adada dadfafdgaddfadssadahdafgdfahdfasd</h6>
												<p>31 Lê lợi...csccscsdc</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/1.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sản</h6>
												<p>31 Lê lợi...cscsdcdcdcsdc</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/2.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sản</h6>
												<p>31 Lê lợi...fsf sf dsf sfs fs dfsd fs fsd fsd fdsf f sdf da dad ad adda ssad asd adaad ad adas  dad ad ada da da da da d da da da da da da da da da dsa d d</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/3.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sảnadadd adada dadfafdgaddfadssadahdafgdfahdfasd</h6>
												<p>31 Lê lợi...csccscsdc</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="item-cafe">
								<ul>
									<li>
										<a href="">
											<img src="images/hotel/1.jpg" alt="">
											<div class="text-item-cafe">
												<h6>Nhà Hàng Thủy Sản</h6>
												<p>31 Lê lợi...cscsdcdcdcsdc</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

	<script src="resource/js/lightbox.min.js"></script>
	<script src="resource/js/detail-hotel.js"></script>
	<script src="resource/js/menu-style.js"></script>
@include('VietNamTour.header-footer.footer')