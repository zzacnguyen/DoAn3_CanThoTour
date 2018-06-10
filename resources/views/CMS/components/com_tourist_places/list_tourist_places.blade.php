@extends('CMS.components.index')
@section('content')

<div id="page-title">
    <h2>Danh sách địa điểm</h2>
    <p>Dưới đây là dữ liệu tất cả địa điểm hiện có.</p>
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
</div>
<div class="panel">
    <div class="panel-body">
    <h3 class="title-hero">
        DANH SÁCH ĐỊA ĐIỂM
    </h3>
        <div class="example-box-wrapper">
            <table id="datatable-reorder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    
                    <th style="width: 5%">ID</th>
                    <th style="width: 15%">Tên địa điểm</th>
                    <th style="width: 25%">Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Chỉnh sửa lần cuối</th>
                    <th>Hiển thị</th>
                    <th>Thao tác</th>

                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th >ID</th>
                    <th >Tên địa điểm</th>
                    <th >Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Chỉnh sửa lần cuối</th>
                    <th>Hiển thị</th>
                    <th>Thao tác</th>
                </tr>
                </tfoot>
                <tbody>
                                    

                    @foreach($data as $item)
                    <tr>
                        <td class="p_top_35">{{ $item->id }}</td>
                        <td class="p_top_35"><a href="{{ route('_PLACES_DETAILS', $item->id) }}">{{ $item->pl_name }}</a></td>
                        <td class="p_top_35">{{ $item->pl_address }}</td>
                        <td class="p_top_35">{{ $item->pl_phone_number }}</td>
                        <td class="p_top_35">{{ $item->updated_at }}</td>
                        <td class="p_top_35"><?php if($item->pl_status==0)
                            echo "<small class='bg-warning'>Chờ duyệt</small>";

                            else if($item->pl_status==-1)
                                echo "<small class='bg-danger'>Spam!</small>";
                            else{
                               echo "<small class='bg-success'>Hiển thị</small>";
                            }
                        ?>
                        </td>
                         <td><a href="{{ route('ACCTIVE_PLACES', $item->id) }}">
                            <i class="glyph-icon tooltip-button demo-icon icon-upload bg-success" title="Active"></i>
                        </a>
                        
                        <a data-toggle="modal" data-target="#removeUser{{ $item->id }}"> <i class="glyph-icon tooltip-button demo-icon icon-eye-slash bg-danger"></a></i>
                        <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id }}" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Bạn có chắc chắn?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:red">Sau khi nhấn đồng ý, Dữ liệu liên quan đến {{ $item->pl_name }} sẽ bị ẩn khỏi giao diện người dùng!</p>
                                        <small> Lưu ý: Dữ liệu sẽ không bị xoá! </small>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                                        <a class="btn btn-danger" href="{{ route('UNACCTIVE_PLACES', $item->id) }}" id="remove-button" type="submit">Đồng ý</a>
                                    </div>
                                </div><!-- end modal-content -->
                            </div><!-- end modal-dialog -->
                        </div><!-- end modal -->
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->render() !!}
        </div>
    </div>
</div>




@endsection