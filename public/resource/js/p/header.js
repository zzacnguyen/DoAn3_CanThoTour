var id_tinh = null;

$(document).ready(function () {
	// load select city
		$.ajax({
			url: 'count_city_service_all',
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			response.forEach(function (data) {
				lam += '<li class="selectItem" data-id="' + data.id_city + '" data-name="' + data.name_city +'">';
				lam += '<a class="selectItem-name">';
				lam += '<label>'+ data.name_city +'</label>';
				lam += '<span class="float-right">'+ data.num_service + '</span>';
				lam += '</a>';
				lam += '</li>';
				$('#content-tinhtp-id').html(lam);
			})
			gantentinh();
		})
		search();
})

function gantentinh() {
	var select_Item = document.getElementsByClassName('selectItem');
	
	for (var i = 0; i < select_Item.length; i++) {
		select_Item[i].onclick = function () {
			var id = this.getAttribute('data-id');
			document.getElementById('a-tinhTP').innerHTML = this.getAttribute('data-name') + ' <i class="fas fa-angle-down float-right" style="margin-top:5px;"></i>';
			document.getElementById('a-tinhTP').setAttribute("data-id",id);
			id_tinh = $('#a-tinhTp').attr('data-idtinh');
		}
	}
}

function search() {
	$('#text-search-top').keyup(function () {
		var id_tinh = document.getElementById('a-tinhTP').getAttribute('data-id'); // id tinh thanh pho
		var type = $('#a-danhmuc').attr('data-type'); // type dich vu
		var path = null;
		var keyword = $('#text-search-top').val();
		// $('#thanSearch').html('');
		if (id_tinh == "all" && type == "all") 
		{
			path = 'searchServices_All/keyword=' + keyword;
		}
		else if(id_tinh == "all" && type != "all")
		{

		}
		else
		{

		}
		console.log(path);
		$.ajax({
			url: path,
			type: 'GET',
			dataType: 'json'
		}).done(function (response) {
			
			if (response.eat != null) 
			{
				$('#tieudeSearchEat').html('Ăn uống');
				var eat = new String(); // khoi tao bien luu phan hien thi len view
				response.eat.forEach(function (data) {
					var url_detail = 'detail/id='+ data.sv_id +'&type=' + 1;
					eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
				})
				$('#search_eat').html(eat);
			}
			if (response.hotel != null) 
			{
				$('#tieudeSearchEat').html('Khách sạn');
				var eat = new String(); // khoi tao bien luu phan hien thi len view
				response.eat.forEach(function (data) {
					var url_detail = 'detail/id='+ data.sv_id +'&type=' + 1;
					eat += this.search_type(url_detail,data.image_details_1,data.sv_name,data.sv_description);
				})
				$('#search_eat').html(eat);
			}

		}).fail(function (response) {
			console.log("Loi cmnr");
			console.log(response);
		})
	})
		
}

function search_type(url, image,name,description) {
	var eat = new String();
	eat += 	'<div class="content-search">';
	eat +=	'<a href="' + url + '">';
	eat +=	'<div class="left-content-search">';
	eat +=	'<img src="thumbnails/'+ image +' " alt="">';
	eat +=	'</div>';
	eat +=	'<div class="right-content-search">';
	eat +=	'<p>'+ name +'</p>';
	eat +=	'<p style="font-size: 13px; color: #d2cece; font-weight: 400; max-height: 20px;max-width:321px;text-overflow: ellipsis;">'+ description +'</p>';
	eat +=	'</div>';
	eat +=	'</a>';		
	eat +=	'</div>';
	return eat;
}

