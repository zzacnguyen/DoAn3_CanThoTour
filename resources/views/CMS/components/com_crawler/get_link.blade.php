@extends('CMS.components.index')
@section('content')

@if(!empty($errors->first()))
    <div class=" error row col-lg-12" >
        <div class="alert alert-danger">
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
@endif

<script >
 $(document).ready(function () {          
        setTimeout(function() {
            $('.error').slideUp("slow");
        }, 10000);
});
</script>


<div id="page-title">
    <h2>Chọn đường dẫn</h2>
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
    <div class="row"  style="padding-top: 25px;">
        <div class="col-md-9 col-md-offset-2" style="border: 1px solid #ddd;">
            <div class="book-tour-container bg-success" style="background-color: white;">
                <div class="frm-heading">
                THU THẬP DỮ LIỆU
                <span></span>
                </div>
            </div>
            <div class="content-box  post-box">
            <form id="frm_add_task" class="bg-success" name="frm_add_task" action="" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <div class="col-md-12 form-group" style="padding-top: 20px" >
                        <div class="col-md-12">
                            <label for="name" >Đường dẫn cần thu thập dữ liệu: </label>
                            <textarea name="duong_dan" required="required" rows="10" cols="50" style="border:1px solid #ddd !important;">
                                    https://www.booking.com/hotel/vn/hanoi-focus-hanoi.vi.html?aid=357026;label=gog235jc-country-vi-vn-vn-unspec-vn-com-L%3Avi-O%3AwindowsS10-B%3Achrome-N%3AXX-S%3Abo-U%3Ac-H%3As;sid=16f1d795a5478ce5f2427ab3714545ab;checkin=2018-07-21&checkout=2018-07-22&dist=0&group_adults=1&group_children=0&no_rooms=1&sb_price_type=total&type=total&
                            </textarea>
                        </div>
                        <div class="clearfix" ></div>
                        {{-- <div class="col-md-4" style="padding-top: 20px">
                            <div class="col-md-12">
                            <label for="name" >Số lượng tin cần lấy</label>
                             <input type="number" required="required" id="so_luong" max="10" min="1" title="tối đa 10 dữ liệu" value="1" class="form-control" name="so_luong">
                            </div>
                        </div> --}}
                        <div class="col-md-8" style="padding-top: 20px">
                            <div class="btn-toolbar" role="toolbar" style="text-align: center;" >
                                <label for="name" ></label>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success " style="float: right; margin-bottom: 0px; margin-top: 23px; " type="submit" name="action" value="save_and_add_type_event">Bắt đầu lấy dữ liệu</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        
    </div>
</div>



@endsection