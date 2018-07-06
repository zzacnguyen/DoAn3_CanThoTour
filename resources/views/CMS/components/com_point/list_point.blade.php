@extends('CMS.components.index')
@section('content')

<div id="page-title">
    <h2>Danh sách điểm <div style="float: right;">
</div></h2>
    {{-- <p>Dưới đây là dữ liệu tất cả địa điểm hiện có.</p> --}}

</div>

<div class="clearfix"></div>
<div class="panel">
    <div class="panel-body">
    <h3 class="title-hero">
        DANH SÁCH ĐIỂM
    </h3>
        <div class="example-box-wrapper">
            <table id="datatable-reorder" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>Tên điểm</th>
                    <th>Mô tả</th>
                    <th>Số điểm</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Số điểm</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td> <a data-toggle="modal"   data-target="#removeUser{{ $item->id }}">{{ $item->point_title }} </a></td>
                        <td>{{ $item->point_description }}</td>
                        <td>{{ $item->point_rate }}</td>
                        <div aria-labelledby="myModalLabel" class="modal fade" id="removeUser{{ $item->id }}" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Điểm yêu thích</h4>
                                    </div>
                                    <form>
                                    <div class="modal-body">
                                            <div class="col-md-12">
                                                <label for="point_title" >Tiêu đề: </label>
                                                <input type="text" value="{{ $item->point_title }}"  id="point_title{{ $item->id }}" required  class="form-control" name="point_title" >
                                            </div>
                                            <input type="hidden" id="id_{{ $item->id }}" name="id_" value="{{ $item->id }}">
                                            <div class="col-md-12">
                                                <label for="point_description" >Mô tả: </label>
                                                <input type="text" value=" {{ $item->point_description }}"  id="point_description{{ $item->id }}" required  class="form-control" name="point_description" >
                                            </div>
                                            <div class="col-md-12 form-group" >
                                                <label for="point_rate" >Số điểm: </label>
                                                <input type="number" value="{{ $item->point_rate }}"  id="point_rate{{ $item->id }}" required style=""  class="form-control" name="point_rate" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
                                            <a class="btn btn-danger" id="remove-button{{ $item->id }}" type="submit">Đồng ý</a>
                                            {{-- <a href="javascript:void(0)" class="btn btn-danger">ĐỒNG Ý</a> --}}
                                        </div>
                                    </form>
                                </div><!-- end modal-content -->
                            </div><!-- end modal-dialog -->
                        </div><!-- end modal -->

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->render() !!}
        </div>
    </div>
</div>

<script type="text/javascript">
    $( "#remove-button2" ).click(function() {
        var title2 = $('#point_title2').val();
        var id2= $('#id_2').val();
        var description2 = $('#point_description2').val();
        var rate2 = $('#point_rate2').val();
        var path2 = 'ajax-edit-point/id='+id2+'&diem='+rate2+'&tieude='+title2+'&mota='+description2;
        console.log(path2);
        $.ajax({
          url: path2,
          type: 'GET'
        })
        
        .done(function(argument) {
            location.reload();
        })

        //   // var elementDelete = $("#myTable").parent();

      
    });

    $( "#remove-button3" ).click(function() {
        var title = $('#point_title3').val();
        var id = $('#id_3').val();
        var description = $('#point_description3').val();
        var rate = $('#point_rate3').val();
        var path = 'ajax-edit-point/id='+id+'&diem='+rate+'&tieude='+title+'&mota='+description;
        console.log(path);
        $.ajax({
          url: path,
          type: 'GET'
        })
        
        .done(function(argument) {
            location.reload();
        })
    });

    $( "#remove-button1" ).click(function() {
      var title = $('#point_title1').val();
        var id = $('#id_1').val();
        var description = $('#point_description1').val();
        var rate = $('#point_rate1').val();
        var path = 'ajax-edit-point/id='+id+'&diem='+rate+'&tieude='+title+'&mota='+description;
        console.log(path);
        $.ajax({
          url: path,
          type: 'GET'
        })
        
        .done(function(argument) {
            location.reload();
        })
    });
</script>


@endsection