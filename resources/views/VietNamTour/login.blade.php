<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="resourceVNT/css/bootstrap.css">
	<link rel="stylesheet" href="resourceVNT/css/login.css">
	<title>Login</title>
</head>
<body>
	<section class="content" style="background-image: url('../public/resourceVNT/images/background/4.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>	
				<div class="col-md-4 form-login tada">
					<div class="title">
						<h3 class="text-center">Login</h3>
					</div>
					<div class="body">
						<form action="http://localhost:8080/doan3_canthotour/public/loginW" method="post">
							<input type="hidden" name="csrf-token" content="{{ csrf_token() }}">
							<div class="login">
								@if(count($errors) > 0)
									@foreach ($errors->all() as $error)
						                <small>{{ $error }}</small>
						            @endforeach
								@endif
								<input type="text" placeholder="Username..." name="username">
								<input type="password" placeholder="Password..." name="password">
								<a href="" style="font-size: 14px;width: 100%;display: inline-block;"><i>Quên mật khẩu</i></a>
								<button class="btn btn-success float-right btnlogin" type="submit" name="btnlogin">Login</button>
							</div>
							<div class="login-social">
								<h5 class="text-center">Login social</h5>
								<div class="row">
									<div class="col-md-6">
										<a href="" class="btn btn-warning btnfacebook" style="background-color: #3b5999">Facebook</a>
									</div>
									<div class="col-md-6">
										<a href="" class="btn btn-warning btngoogle" style="background-color: #dd4b39">Google+</a>
									</div>
								</div>
							</div>
							<div class="register text-center">
								<h5 class="text-center">Đăng ký tài khoản mới tại đây</h5>
								<a href="{{ route() }}" class="btn btn-info btnregister">Register</a>
							</div>
						</form>
					</div>
				</div>	
				<div class="col-md-4"></div>	
			</div>
		</div>
	</section>

	<script type="text/javascript" src="resourceVNT/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="resourceVNT/js/bootstrap.js"></script>
	<script src="resourceVNT/js/fontawesome-all.min.js" type="text/javascript"></script>
</body>
</html>