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
        <div class="col-md-9 col-md-offset-2">
            <div class="book-tour-container bg-success">
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
                            <textarea name="duong_dan" required="required" rows="10" cols="50">
                                    https://www.booking.com/searchresults.vi.html?aid=357026&label=gog235jc-country-vi-vn-vn-unspec-vn-com-L%3Avi-O%3AwindowsS10-B%3Achrome-N%3AXX-S%3Abo-U%3Ac-H%3As&sid=9f108c37f8c1ef0d29b343849f78552c&sb=1&src=searchresults&src_elem=sb&error_url=https%3A%2F%2Fwww.booking.com%2Fsearchresults.vi.html%3Faid%3D357026%3Blabel%3Dgog235jc-country-vi-vn-vn-unspec-vn-com-L%253Avi-O%253AwindowsS10-B%253Achrome-N%253AXX-S%253Abo-U%253Ac-H%253As%3Bsid%3D9f108c37f8c1ef0d29b343849f78552c%3Bcheckin_month%3D7%3Bcheckin_monthday%3D11%3Bcheckin_year%3D2018%3Bcheckout_month%3D7%3Bcheckout_monthday%3D12%3Bcheckout_year%3D2018%3Bcity%3D-3712125%3Bclass_interval%3D1%3Bdest_id%3D-3712125%3Bdest_type%3Dcity%3Bdtdisc%3D0%3Bfrom_sf%3D1%3Bgroup_adults%3D1%3Bgroup_children%3D0%3Binac%3D0%3Bindex_postcard%3D0%3Blabel_click%3Dundef%3Bno_rooms%3D1%3Boffset%3D0%3Bpostcard%3D0%3Broom1%3DA%3Bsb_price_type%3Dtotal%3Bsrc%3Dsearchresults%3Bsrc_elem%3Dsb%3Bss%3D%25C4%2590a%25CC%2580%2520N%25C4%2583%25CC%2583ng%3Bss_all%3D0%3Bssb%3Dempty%3Bsshis%3D0%3Bssne%3D%25C4%2590a%25CC%2580%2520N%25C4%2583%25CC%2583ng%3Bssne_untouched%3D%25C4%2590a%25CC%2580%2520N%25C4%2583%25CC%2583ng%26%3B&ss=%C4%90a%CC%80+N%C4%83%CC%83ng&ssne=%C4%90a%CC%80+N%C4%83%CC%83ng&ssne_untouched=%C4%90a%CC%80+N%C4%83%CC%83ng&city=-3712125&checkin_monthday=21&checkin_month=7&checkin_year=2018&checkout_monthday=22&checkout_month=7&checkout_year=2018&group_adults=1&group_children=0&no_rooms=1&from_sf=1
                            </textarea>
                        </div>
                        <div class="clearfix" ></div>
                        <div class="col-md-4" style="padding-top: 20px">
                            <div class="col-md-12">
                            <label for="name" >Số lượng tin cần lấy</label>
                             <input type="number" required="required" id="so_luong" max="10" min="1" title="tối đa 10 dữ liệu" value="1" class="form-control" name="so_luong">
                            </div>
                        </div>
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