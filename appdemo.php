<!-- <form action="http://localhost/doan3/public/loaihinhsukien/2" method="post">
	<input type="hidden" name="_method" value="PUT">
	<input type="text" name="txttenloaihinh">
	<input type="submit" >
</form> -->

<!-- vui choi -->
<form action="http://chinhlytailieu/vntour_api/register-mobile" method="post" enctype="multipart/form-data">
	<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
	<input type="text" name="username"> <br>
	<input type="text" name="password">	<br>
	<label>Quốc gia:</label>
	<select name="country">
		<option value="viet nam">viet nam</option>
		<option value="My">My</option>
	</select>
	
	<br>

	<!-- <label>Ngôn ngữ:</label>
	<select name="language">
		<option value="viet nam">viet nam</option>
		<option value="My">My</option>
	</select>
	<br>
	<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
	<input type="text" name="place_name">
	<input type="text" name="place_address">
	<input type="text" name="place_phone">
	<input type="text" name="ward">
	<input type="text" name="vido">
	<input type="text" name="kinhdo">
	<br> -->
	<button type="submit">ddddd</button>
</form>




<!-- delete -->
<!-- <form action="get_quyen_user/13" method="post">
	<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
	<input type="text" name="quyen">
	<br>
	<button type="submit">ddddd</button>
</form> -->