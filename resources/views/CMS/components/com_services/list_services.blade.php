@extends('CMS.components.index')
@section('content')


<div id="page-title">
    <h2>Danh sách dịch vụ</h2>
    <p>Dưới đây là dữ liệu tất cả dịch vụ hiện có.</p>
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
<div class="panel">
    <div class="panel-body">
    <h3 class="title-hero">
        DANH SÁCH DỊCH VỤ
    </h3>
        <div class="example-box-wrapper">
            <table id="datatable-reorder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Tên dịch vụ</th>
                    <th>Mở cửa</th>
                    <th>Số điện thoại</th>
                    <th>Giá</th>
                    <th>Loại dịch vụ</th>
                    <th>Trạng thái</th>
                    <th>Chỉnh sửa lần cuối</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Tên dịch vụ</th>
                    <th>Mở cửa</th>
                    <th>Số điện thoại</th>
                    <th>Giá</th>
                    <th>Loại dịch vụ</th>
                    <th>Trạng thái</th>
                    <th>Chỉnh sửa lần cuối</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td><a href="javascript:void(0);">
                            @if($item->hotel_name != null)
                                {{$item->hotel_name}} 
                            @elseif($item->eat_name != null)
                                - {{ $item->eat_name }}
                            @elseif($item->transport_name != null)
                                -{{ $item->transport_name }}
                            @elseif($item->sightseeing_name != null)
                                -{{ $item->sightseeing_name }}
                            @elseif($item->eat_name != null)
                                -{{ $item->eat_name }}
                            @elseif($item->entertainments_name != null)
                                -{{ $item->entertainments_name }}
                            @endif
                            </a>
                        </td>
                        <td>Từ {{ $item->sv_open }} đến {{ $item->sv_close }}</td>
                        <td> {{ $item->sv_phone_number }}</td>
                        <td>Từ {{ $item->sv_lowest_price }} đến {{ $item->sv_highest_price }}</td>
                        <td> <?php 
                            if($item->sv_types == 1)
                           {
                                echo '<small>Ăn uống</small>' ;
                           }
                           else if($item->sv_types == 2)
                           {
                                echo '<small>Khách sạn</small>' ;
                           }
                           else if ($item->sv_types == 3 )
                           {
                                echo '<small>Di chuyển</small>' ;    
                           }
                           else if ($item->sv_types == 4 )
                           {
                                echo '<small>Tham quan</small>' ;    
                           }
                           else
                           {
                                echo '<small>Vui chơi</small>' ;    
                           }
                           ?>

                           </td>
                        <td>
                        <?php  
                           if($item->sv_status == 1)
                           {
                                echo '<small class="label-success">Hiển thị</small>' ;
                           }
                           else if($item->sv_status == 0)
                           {
                                echo '<small class="label-warning">Chờ duyệt</small>' ;
                           }
                           else if ($item->sv_status == -1 )
                           {
                                echo '<small class="label-danger">Spam</small>' ;
                           }

                        ?> 
                        </td>
                        <td>{{ $item->updated_at }} </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->render() !!}
        </div>
    </div>
</div>




@endsection