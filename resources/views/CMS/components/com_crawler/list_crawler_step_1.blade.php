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
            @for ($i = 0; $i < $so_luong; $i++)
                {{-- expr --}}
            
            <form id="frm_add_task" class="bg-success" name="frm_add_task" action="/crawler-{{$i+1}}" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <input type="hidden" name="link_bai_viet" value="{{ $duong_dan }}">
                    <div class="col-md-12 form-group" style="padding-top: 20px" >
                        <div class="col-md-12">
                            <label for="name" >Tên địa điểm: </label>
                             <input type="text" id="ten_dia_diem" value="{{ $ten_khach_san[$i] }}" class="form-control" name="ten_dia_diem" >
                        </div>
                    </div>
                    <div class="col-md-12 form-group" style="padding-top: 20px" >
                        <div class="col-md-12">
                            <label for="name" >Toạ độ: </label>
                             <input type="text" id="toa_do" value="{{ $toado[$i] }}" class="form-control" name="toa_do" >
                        </div>
                    </div>
                    
                    <div class="col-md-12 form-group" style="padding-top: 20px" >
                        <div class="col-md-12">
                            <label for="name" >Mô tả ngắn: </label>
                            <textarea class="form-control" name="mo_ta"> {{ trim($mota[$i]) }} </textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                         <div class="btn-toolbar" role="toolbar" style="text-align: center;" >
                            <div class="btn-group" role="group">
                                <button class="btn btn-success " style="float: right; margin-bottom: 25px;     margin-left: 290px; " type="submit" name="action" value="save_and_add{{$i}}">Chọn địa điểm này</button> 
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
            @endfor
        </div>
        </div>
        
    </div>
</div>



@endsection