<!-- <form action="http://localhost/doan3/public/loaihinhsukien/2" method="post">
	<input type="hidden" name="_method" value="PUT">
	<input type="text" name="txttenloaihinh">
	<input type="submit" >
</form> -->

<!-- vui choi -->
<form action="http://localhost:80/doan3/public/hinhanh" method="post" enctype="multipart/form-data">
	<!-- <input type="hidden" name="_method" value="PUT"> -->
	<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
	<input type="file" name="hinhanh1"> <br>
	<input type="file" name="hinhanh2">	<br>
	<input type="file" name="hinhanh3">	<br>
	<input type="file" name="thumbnail"><br>
	<input type="text" name="dd_iddiadiem">
	<input type="submit" >
</form>

<!-- delete -->
<!-- <form action="http://localhost:6789/doan3/public/vuichoi/5" method="post">
	<input type="hidden" name="_method" value="delete">
	<input type="submit" >
</form> -->