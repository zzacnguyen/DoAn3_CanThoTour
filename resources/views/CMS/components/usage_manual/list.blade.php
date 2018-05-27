@extends('CMS.components.index')
@section('content')

<div class="list-group">
    <a href="#" class="list-group-item active" data-toggle="modal"   data-target="#removeUser">
        <i class="glyph-icon icon-dashboard"></i>
        HƯỚNG DẪN SỬ DỤNG API
    </a>


    <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                   <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">
                                Custom navigation
                            </h3>
                            <div class="example-box-wrapper">
                                <div id="form-wizard-2">
                                    <ul class="list-group list-group-separator row list-group-icons">
                                        <li class="col-md-3 active">
                                            <a href="#custom-step-1" data-toggle="tab" class="list-group-item">
                                                <i class="glyph-icon icon-dashboard"></i>
                                                Home
                                            </a>
                                        </li>
                                        <li class="col-md-3">
                                            <a href="#custom-step-2" data-toggle="tab" class="list-group-item">
                                                <i class="glyph-icon font-red icon-bullhorn"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li class="col-md-3">
                                            <a href="#custom-step-3" data-toggle="tab" class="list-group-item">
                                                <i class="glyph-icon font-primary icon-camera"></i>
                                                Messages
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="custom-step-1">
                                            <div class="content-box">
                                                <h3 class="content-box-header bg-default">
                                                    First
                                                </h3>
                                                <div class="content-box-wrapper">
                                                    Lorem ipsum dolor sic amet dixit tu.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="custom-step-2">
                                            <div class="content-box">
                                                <h3 class="content-box-header bg-black">
                                                    Second
                                                </h3>
                                                <div class="content-box-wrapper">
                                                    Lorem ipsum dolor sic amet dixit tu.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="custom-step-3">
                                            <div class="content-box">
                                                <h3 class="content-box-header bg-green">
                                                    Third
                                                </h3>
                                                <div class="content-box-wrapper">
                                                    Lorem ipsum dolor sic amet dixit tu.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="custom-step-4">
                                            <div class="content-box">
                                                <h3 class="content-box-header bg-blue">
                                                    Forth
                                                </h3>
                                                <div class="content-box-wrapper">
                                                    Lorem ipsum dolor sic amet dixit tu.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pager">
                                            <div class="pull-right">
                                                <button class="btn btn-default button-next">
                                                    <i class="glyph-icon icon-arrow-right"></i>
                                                </button>
                                                <button class="btn btn-default button-last">
                                                    <i class="glyph-icon icon-chevron-right"></i>
                                                </button>
                                            </div>
                                            <div class="pull-left">
                                                <button class="btn btn-default button-first">
                                                    <i class="glyph-icon icon-chevron-left"></i>
                                                </button>
                                                <button class="btn btn-default button-previous">
                                                    <i class="glyph-icon icon-arrow-left"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                    <a class="btn btn-danger" href="" id="remove-button" type="submit">Đồng ý</a>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
    <a href="#" class="list-group-item" data-toggle="modal"   data-target="#apiDichVu">
        <i class="glyph-icon font-red icon-bullhorn"></i>
        API DỊCH VỤ - ĐỊA ĐIỂM
        <i class="glyph-icon font-green"></i>
    </a>
    <div aria-labelledby="myModalLabel" class="modal fade" id="apiDichVu" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                   <div class="panel">
                        <div class="panel-body">
                            <h3 class="title-hero">
                                CÁC PHƯƠNG THỨC VÀ ĐƯỜNG DẪN
                            </h3>
                            <div class="example-box-wrapper">
                                <div id="form-wizard-2">
                                    <ul class="list-group list-group-separator row list-group-icons">
                                        <li class="col-md-3 active">
                                            <a href="#custom-service-1" data-toggle="tab" class="list-group-item">
                                                <i class="glyph-icon icon-dashboard"></i>
                                                DANH SÁCH DỊCH VỤ
                                            </a>
                                        </li>
                                        <li class="col-md-3">
                                            <a href="#custom-service-2" data-toggle="tab" class="list-group-item">
                                                <i class="glyph-icon font-red icon-upload"></i>
                                                POST - ĐỊA ĐIỂM
                                            </a>
                                        </li>
                                        <li class="col-md-3">
                                            <a href="#custom-service-3" data-toggle="tab" class="list-group-item">
                                                <i class="glyph-icon font-primary icon-upload"></i>
                                                POST - DỊCH VỤ
                                            </a>
                                        </li>
                                        <li class="col-md-3">
                                            <a href="#custom-service-4" data-toggle="tab" class="list-group-item">
                                                <i class="glyph-icon font-yellow icon-camera"></i>
                                                POST - HÌNH ẢNH
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="custom-service-1">
                                            <div class="content-box">
                                                <h3 class="content-box-header bg-default">
                                                    URL: /services
                                                </h3>
                                                <div class="content-box-wrapper">
                                                    <p>Dữ liệu mẫu</p>
                                                    <div>
                                                    	<a href="http://vntourapi/services">XEM TẠI ĐÂY</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="custom-service-2">
                                            <div class="content-box">
                                                <h3 class="content-box-header bg-black">
                                                    URL: /add-places   METHOD: POST
                                                </h3>
                                                <div class="content-box-wrapper">
                                                   <p>DANH SÁCH REQUEST</p>
                                                   <ul>
                                                   		<li>(string) pl_name : tên địa điểm</li>
                                                   		<li>(string) pl_details : mô tả địa điểm</li>
                                                   		<li>(string) pl_address : địa chỉ địa điểm </li>
                                                   		<li>(string) pl_phone_number : số điện thoại</li>
                                                   		<li>(string) pl_latitude : vĩ độ</li>
                                                   		<li>(string) pl_longitude : kinh độ</li>
                                                   		<li>(integer) id_ward : id xã/phường</li>
                                                   		<li>(integer) user_id : id người dùng</li>
                                                   </ul>
                                                </div>
                                                <div class="content-box-wrapper">
                                                   <p>Kết quả trả về</p>
                                                   <ul>
                                                   		<li>PASSED : "id_place:".$id_place</li>
                                                   		<li>FAILED: "status:500"</li>
                                                   </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="custom-service-3">
                                            <div class="content-box row">
                                                <h3 class="content-box-header bg-green">
                                                    URL: /add-services/{id}
                                                </h3>
                                                <div class="content-box-wrapper">
                                                   <p>Tham số URL</p>
                                                   <ul>
                                                   		<li>id : id địa điểm</li>
                                                   </ul>
                                                </div>
                                                <div class="content-box-wrapper">
                                                   <p>DANH SÁCH REQUEST</p>
                                                   <ul>
                                                   		<li>(string) sv_description : mô tả dịch vụ</li>
                                                   		<li>(string) sv_open : giờ mở cửa</li>
                                                   		<li>(string) sv_close : giờ đóng cửa</li>
                                                   		<li>(string) sv_highest_price : giá cao nhất </li>
                                                   		<li>(string) sv_lowest_price : giá thấp nhất </li>
                                                   		<li>(string) sv_phone_number : số điện thoại</li>
                                                   		<li>(string) sv_website : website dịch vụ</li>
                                                   		<li>(string) sv_content : nội dung bài viết</li>
                                                   		<li>(integer) user_id : id người dùng</li>
                                                   		<li>(string) eat_name : Tên dịch vụ ăn uống - tùy chọn</li>
                                                   		<li>(string) hotel_name : Tên dịch vụ khách sạn - nơi ở - tùy chọn</li>
                                                   		<li>(string) hotel_number_star : Số sao khách sạn - tùy chọn</li>
                                                   		<li>(string) transport_name : Tên dịch vụ di chuyển - vận chuyển - tùy chọn</li>
                                                   		<li>(string) sightseeing_name : Tên dịch vụ tham quan - mua sắm - tùy chọn</li>
                                                   		<li>(string) entertainments_name : Tên dịch vụ vui chơi - giải trí - tùy chọn</li>
                                                   </ul>
                                                </div>
                                                <div class="content-box-wrapper">
                                                   <p>Kết quả trả về</p>
                                                   <ul>
                                                   		<li>PASSED : "id_service:".$id_service</li>
                                                   		<li>FAILED: "status:500"</li>
                                                   </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="custom-service-4">
                                            <div class="content-box row">
                                                <h3 class="content-box-header bg-green">
                                                    URL: /upload-image/{id}
                                                </h3>
                                                <div class="content-box-wrapper">
                                                   <p>Tham số URL</p>
                                                   <ul>
                                                   		<li>id : id dịch vụ</li>
                                                   </ul>
                                                </div>
                                                <div class="content-box-wrapper">
                                                   <p>DANH SÁCH REQUEST</p>
                                                   <ul>
                                                   		<li>(file) banner : Hình ảnh dùng cho banner</li>
                                                   		<li>(file) details1 : Hình ảnh dùng cho chi tiết 1</li>
                                                   		<li>(file) details2 : Hình ảnh dùng cho chi tiết 2</li>
                                                   </ul>
                                                </div>
                                                <small><i>Lưu ý: Các hình ảnh sau khi lưu lại sẽ được xử lý và đổi tên, thay đổi kích thước ảnh phù hợp với di động và tối ưu hóa dung lượng bộ nhớ cũng như đường truyền</i></small>
                                                <div class="content-box-wrapper">
                                                   <p>Mô tả chung</p>
                                                    <ul>
                                                   	<li class="sfHover">
												        <a href="javascript:void(0)" title="" class="sf-with-ul">
												            <span>Banner</span>
												        </a>
												        <div class="sidebar-submenu" style="display: block;">

												            <ul>
												                <li><a href="javascript:void(0)" title="banner : Kích thước mặc định 768,720"><span>banner : Kích thước mặc định 768,720</span></a></li>
												                <li><a href="javascript:void(0)" title="Compose message"><span>thumbnails : Kích thước mặc định 600,400 </span></a></li>
												                <li><a href="javascript:void(0)" title="Single message"><span>icons : Kích thước mặc định 50,50 </span></a></li>
												            </ul>

												        </div><!-- .sidebar-submenu -->
												    </li>
                                                   	<li class="sfHover">
												        <a href="javascript:void(0)" title="" class="sf-with-ul">
												            <span>Details 1</span>
												        </a>
												        <div class="sidebar-submenu" style="display: block;">

												            <ul>
												                <li><a href="javascript:void(0)" title="Details : Kích thước mặc định 1280,720"><span>Details 1: Kích thước mặc định 1280,720</span></a></li>
												                <li><a href="javascript:void(0)" title="Compose message"><span>thumbnails : Kích thước mặc định 600,400 </span></a></li>
												                <li><a href="javascript:void(0)" title="Single message"><span>icons : Kích thước mặc định 50,50 </span></a></li>
												            </ul>

												        </div><!-- .sidebar-submenu -->
												    </li>
												    <li class="sfHover">
												        <a href="javascript:void(0)" title="" class="sf-with-ul">
												            <span>Details 2</span>
												        </a>
												        <div class="sidebar-submenu" style="display: block;">

												            <ul>
												                <li><a href="javascript:void(0)" title="Details : Kích thước mặc định 1280,720"><span>Details 2 : Kích thước mặc định 1280,720</span></a></li>
												                <li><a href="javascript:void(0)" title="Compose message"><span>thumbnails : Kích thước mặc định 600,400 </span></a></li>
												                <li><a href="javascript:void(0)" title="Single message"><span>icons : Kích thước mặc định 50,50 </span></a></li>
												            </ul>

												        </div><!-- .sidebar-submenu -->
												    </li>
                                                   </ul>
                                                </div>
                                                <div class="content-box-wrapper">
                                                   <p>Kết quả trả về</p>
                                                   <ul>
                                                   		<li>PASSED : "id_service:".$id_service</li>
                                                   		<li>FAILED: "status:500"</li>
                                                   </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pager">
                                            <div class="pull-right">
                                                <button class="btn btn-default button-next">
                                                    <i class="glyph-icon icon-arrow-right"></i>
                                                </button>
                                                <button class="btn btn-default button-last">
                                                    <i class="glyph-icon icon-chevron-right"></i>
                                                </button>
                                            </div>
                                            <div class="pull-left">
                                                <button class="btn btn-default button-first">
                                                    <i class="glyph-icon icon-chevron-left"></i>
                                                </button>
                                                <button class="btn btn-default button-previous">
                                                    <i class="glyph-icon icon-arrow-left"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button">XEM XONG</button>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
    <a href="#" class="list-group-item">
        <i class="glyph-icon font-primary icon-camera"></i>
        Messages
        <i class="glyph-icon icon-chevron-right"></i>
    </a>
    <a href="#" class="list-group-item">
        <i class="glyph-icon font-azure icon-gears"></i>
        Settings
        <i class="glyph-icon icon-chevron-right"></i>
    </a>
    <a href="#" class="list-group-item disabled">
        <i class="glyph-icon font-blue-alt icon-globe"></i>
        Disabled link
        <i class="glyph-icon icon-chevron-right"></i>
    </a>
    </div>

@endsection 