@extends('CMS.components.index')
@section('content')


<div id="page-title">
    <h2>Danh sách người dùng</h2>
    <p>Dưới đây là dữ liệu tất cả người dùng hiện có.</p>
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
<div class="panel">
    <div class="panel-body">
    <h3 class="title-hero">
        DANH SÁCH NGƯỜI DÙNG
    </h3>
            <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
            <a href="{{  route('ALL_LIST_ADMIN') }}" class="btn vertical-button remove-border btn-info" title="QUẢN TRỊ VIÊN" style="
    width: 220px;
">
                QUẢN TRỊ VIÊN
            </a>
            <a href="{{  route('ALL_LIST_MOD') }}" class="btn vertical-button remove-border btn-danger" title="" style="
    width: 220px;
">
                KIỂM DUYỆT VIÊN
            </a>
            <a href="{{  route('ALL_LIST_PARTNER') }}" class="btn vertical-button remove-border btn-purple" title="" style="
    width: 220px;
">
                CỘNG TÁC VIÊN
            </a>
            <a href="{{  route('ALL_LIST_ENTERPRISE') }}" class="btn vertical-button remove-border btn-azure" title="" style="
    width: 220px;
">
                DOANH NGHIỆP
            </a>
            <a href="{{  route('ALL_LIST_TOURGUIDE') }}" class="btn vertical-button remove-border btn-yellow" title="" style="
    width: 220px;
">
                HƯỚNG DẪN VIÊN DU LỊCH
            </a>
        </div>
    </div>
</div>




@endsection