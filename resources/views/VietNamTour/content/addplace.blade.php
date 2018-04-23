@include('VietNamTour.header-footer.header')

<link rel="stylesheet" href="resource/css/select2.min.css">
<link rel="stylesheet" href="resource/css/addplace.css">


<section class="addplace">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 content" style="margin-top: 80px;">
				<h4>Thêm địa điểm mới</h4>
				<h5 style="color: red;">Thông tin cơ bản</h5>
				<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
				<form action="">
					<div class="input-text col-md-12">
						<label>Tên địa điểm</label>
						<input type="text">
					</div>
					<div class="input-text col-md-12">
						<label>Số điện thoại</label>
						<input type="text">
					</div>
					<div class="input-text col-md-12">
						<label class="col-md-3" style="padding: 0">Tỉnh thành</label>
						<select class="js-example-basic-single col-md-4" name="city">
							@foreach($city as $c)
							  <option value="{{$c->id}}">{{$c->province_city_name}}</option>
							@endforeach
						</select>

						<select class="js-example-basic-single col-md-5" name="districtt" id="district">
						  <option value="AL">Alabama</option>
						  <option value="WY">Wyoming</option>
						</select>
					</div>
					
					<div class="col-md-12">
						<label class="col-md-3" style="padding: 0">Khu vực</label>
						<select class="js-example-basic-single col-md-8" name="" id="ward" style="padding: 0">
						  
						</select>
					</div>

					<div class="input-text col-md-12">
						<label>Địa chỉ</label>
						<input type="text">
					</div>
					<div class="input-text col-md-12">
						<label>Mô tả địa điểm</label>
						<textarea></textarea>
					</div>
					<div class="input-text col-md-12">
						<label>Vị trí</label>
						<button>Cập nhật vị trí</button>
					</div>
					<button class="btn btn-success col-md-12" id="btnaddplace">Thêm địa điểm mới</button>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>


<script src="resource/js/select2.full.js"></script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
</script>


<script type="text/javascript">
	$(document).ready(function () {
		load_district();
		load_ward()
	})


	//load quan theo tinh thanh pho
	function load_district() {
		$('select[name=city]').change(function () {
			var path = 'loadDistrict/' + $(this).val();
			console.log(path);
			$.ajax({
				url: path,
				type: 'GET'
			})
			.done(function (response) {
				var lam = new String(); // khoi tao bien luu pha hien thi len view
				response.forEach(function (data) {
					lam += '<option value="' + data.id + '">' + data.district_name +'</option>';
				})
				$('#district').html(lam);
			})
		})
	}

	// load ward
	function load_ward() {
		$('select[name=districtt]').change(function () {
			var path = 'loadWard/' + $(this).val();
			$.ajax({
				url: path,
				type: 'GET'
			})
			.done(function (response) {
				var lam = new String(); // khoi tao bien luu pha hien thi len view
				response.forEach(function (data) {
					lam += '<option value="' + data.id + '">' + data.ward_name +'</option>';
				})
				$('#ward').html(lam);
			})
		})
	}
</script>



@include('VietNamTour.header-footer.footer')