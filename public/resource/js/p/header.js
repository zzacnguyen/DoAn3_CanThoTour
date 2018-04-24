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
		$('#thanSearch').html('');
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
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			
		}).fail(function (response) {
			console.log("Loi cmnr");
			console.log(response);
		})
	})
		
}

