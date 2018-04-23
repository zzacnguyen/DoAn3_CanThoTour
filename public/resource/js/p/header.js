function laytentinh() {
	var tentinh = $('.selectItem').attr("data-name");
	$('#a-tinhTP').html(tentinh);
}	

$(document).ready(function () {
	// load select city
	$("#a-tinhTP").click(function () {
		$.ajax({
			url: 'count_city_service_all',
			type: 'GET'
		})
		.done(function (response) {
			var lam = new String(); // khoi tao bien luu pha hien thi len view
			response.forEach(function (data) {
				lam += '<li class="selectItem lamdeptrai" onclick="laytentinh()" data-name="' + data.name_city +'">';
				lam += '<a class="selectItem-name">';
				lam += '<label>'+ data.name_city +'</label>';
				lam += '<span class="float-right">'+ data.num_service + '</span>';
				lam += '</a>';
				lam += '</li>';
				// console.log(lam);
				$('#content-tinhtp-id').html(lam);
			})
		})
	});

	var select_Item = document.getElementsByClassName('selectItem');
	// var select_Item = document.getElementById('lamdeptrai');
	console.log(select_Item);
	for (var i = 0; i < select_Item.length; i++) {
		select_Item[i].onclick = function () {
			console.log(this.getAttribute('data-name'));
			document.getElementById('a-tinhTP').innerHTML = this.getAttribute('data-name') + ' <i class="fas fa-angle-down float-right" style="margin-top:5px;"></i>';
			document.getElementsByClassName('select-content')[0].classList.remove('hienthi');
			document.getElementById('a-tinhTP').classList.remove('click-select');
		}
	}
})		

