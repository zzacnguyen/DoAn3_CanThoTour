<!-- <form action="http://localhost/doan3/public/loaihinhsukien/2" method="post">
	<input type="hidden" name="_method" value="PUT">
	<input type="text" name="txttenloaihinh">
	<input type="submit" >
</form> -->

<!-- vui choi -->
<form action="http://localhost:6789/doan3_canthotour/public/login" method="post" enctype="multipart/form-data">
	<!-- <input type="hidden" name="_method" value="PUT"> -->
	<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
	<input type="text" name="taikhoan"> <br>
	<input type="text" name="password">	<br>
	<input type="submit" >
</form>

<!-- delete -->
<!-- <form action="http://localhost:6789/doan3/public/vuichoi/5" method="post">
	<input type="hidden" name="_method" value="delete">
	<input type="submit" >
</form> -->