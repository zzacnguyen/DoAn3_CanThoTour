<style type="text/css">
    .user-profile:hover{
        font-weight: 600;
    }
    .user-account-btn:hover{
        border: 1px solid #ddd;
    }
</style>


<div id="header-nav-left">
    <div class="user-account-btn dropdown">
        <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
            @if(Session::has('login') && Session::get('user_info') != null)
                @if(Session::get('user_info')['avatar'] == null)
                     <img width="28" src="{{ asset('public/resource/images/avatar2.jpg')}}" alt="Profile image">
                @else
                    <img width="28" src="public/thumbnails/{{Session::get('user_info')['avatar']}}" alt="Profile image">
                @endif
                   
                <span>{{Session::get('user_info')['username']}}</span>
                <i style="color: black" class="glyph-icon icon-angle-down"></i>
            @endif
        </a>
        <div class="dropdown-menu float-left">
            <div class="box-sm">
                <div class="login-box clearfix">
                    <div class="user-img">
                        <a href="#" title="" class="change-img">Chọn ảnh</a>
                        @if(Session::get('user_info')['avatar'] == null)
                             <img src="{{ asset('public/resource/images/avatar2.jpg')}}" alt="">
                        @else
                            <img src="public/thumbnails/{{Session::get('user_info')['avatar']}}" alt="">
                        @endif
                    </div>
                    <div class="user-info">
                        @if(Session::has('login') && Session::get('user_info') != null)
                            
                            <span>
                                {{Session::get('user_info')['username']}}
                                {{-- <i>Tính Phan / Developer website</i> --}}
                            </span>
                            <a href="#" title="Edit profile">Chỉnh sửa hồ sơ</a>
                            <a href="#" title="View notifications">Xem thông báo</a>
                        @endif
                            
                    </div>
                </div>
                <div class="divider"></div>
                <ul class="reset-ul mrg5B">
                    <li>
                        <a href="#">
                            <i class="glyph-icon float-right icon-caret-right"></i>
                            Mở danh sách công việc
                            
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyph-icon float-right icon-caret-right"></i>
                            Xem ảnh đại diện
                            
                        </a>
                    </li>
                </ul>
                <div class="pad5A button-pane button-pane-alt text-center">
                    <a href="{{ route('login_admin') }}" class="btn display-block font-normal btn-danger">
                        <i class="glyph-icon icon-power-off"></i>
                        Đăng xuất
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div><!-- #header-nav-left -->