$(document).ready(function () {
	$('#a-tinhTP').click(function(e){
		e.preventDefault();
		$.get('http://chinhlytailieu/doan3_canthotour/public/city',function(response){
			$('#list-city').append(response);
		})
	})
})