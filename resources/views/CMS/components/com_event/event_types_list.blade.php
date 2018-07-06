@extends('CMS.components.index')
@section('content')

<div id="page-title">
    <h2>Danh sách loại hình sự kiện 
        <div style="float: right;">
        <a data-toggle="modal" class="btn btn-primary" data-target="#removeUser">Thêm mới </a>
    </div>
    </h2>
    <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm loại hình sự kiện</h4>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="title" >Tiêu đề: </label>
                            <input type="text" value="" id="title_" required  class="form-control" name="title" >
                        </div>
                        <div class="clearfix"></div>
                        <div class="modal-footer" style="margin-top: 15px;">
                            <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                            <a class="btn btn-danger" id="add-button" >Đồng ý</a>
                            {{-- <a href="javascript:void(0)" class="btn btn-danger">ĐỒNG Ý</a> --}}
                        </div>
                    </div>
                </form>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div>
<script type="text/javascript">
        $("#add-button" ).click(function() {

                var  title = $('#title_').val().trim();
                var path = 'lvtn-add-type-events-ajax/ten='+title;
                console.log(title);
                if(title == ""){
                    alert( "Vui lòng nhập tiêu đề!" );  
                    return false;
                }
                else
                {
                    $.ajax({
                      url: path,
                      type: 'GET'
                    })
                    
                    .done(function(argument) {
                        location.reload();
                    })
                }
        }); 

</script>
<div class="clearfix"></div>
<div class="panel">
    <div class="panel-body">
        <div class="example-box-wrapper">
            <table id="datatable-reorder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th style="width: 80%">Tên loại hình</th>
                    <th>Trạng thái</th>
                </tr> 
                </thead>

                <tfoot>
                <tr>
                    <th>ID</th>
                    <th style="width: 80%">Tên loại hình</th>
                    <th>Trạng thái</th>
                </tr>
                </tfoot>
                <tbody>                 
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('_GETVIEW_EDIT_EVENT_TYPES', $item->id ) }}">{{ $item->type_name }}</a></td>
                        {{-- <td>{{ $item->type_name }}</td> --}}
                        <td> 
                            @if($item->type_status == 1)
                                <p class="bg-info">Hiển thị</p>
                            @else
                                <p class="bg-danger">Đã tắt</p>
                            @endif
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