

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>
    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title> Đăng nhập</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->
@include('CMS.script.header-script')


    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
    </script>



</head>
<body>
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style type="text/css">

    html,body {
        height: 100%;
    }

</style>
<div class="center-vertical bg-black">
    <div class="center-content row">
        <form action="{{route('login-admin')}}" id="login-validation" class="center-margin col-xs-11 col-sm-5" method="POST">
            <h3 class="text-center pad25B font-gray font-size-23">ĐĂNG NHẬP <span class="opacity-80">v1.0</span></h3>
            <div id="login-form" class="content-box">
                <div class="content-box-wrapper pad20A">

                    <div class="form-group">
                        <label for="">Tài khoản:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon addon-inside bg-white font-primary">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                            @if(Session::has('userold'))
                                <input type="text" class="form-control" value="{{Session::get('userold')}}" placeholder="Tài khoản" name="username">
                            @else
                                <input type="text" class="form-control" placeholder="Tài khoản" name="username">
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon addon-inside bg-white font-primary">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            <input type="password" class="form-control" id="" placeholder="Mật khẩu" name="password">
                        </div>
                        @if(Session::has('erro'))
                            <small style="color: red;">{{Session::get('erro')}}</small>
                        @endif
                    </div>
                </div>
                <div class="button-pane">
                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                </div>
            </div>
        </form>

    </div>
</div>


@include('CMS.script.footer-script')
</body>
</html>