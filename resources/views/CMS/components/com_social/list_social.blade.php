@extends('CMS.components.index')
@section('content')



    <div id="page-title">
        <h2>Danh sách mạng xã hội <div style="float: right;">
                <a href="{{ route('_GETVIEW_ADD_SOCIAL') }}" class="btn btn-primary">Thêm mới</a>
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
                        <th>Tên mạng xã hội</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên mạng xã hội</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td class="p_top_35">{{ $item->id }}</td>
                            <td class="p_top_35"><a href="{{ route('_GET_EDIT_POINT', $item->id ) }}">{{ $item->social_name }}</a></td>
                            <td class="p_top_35">{{ $item->description }}</td>
                            <td><?php if($item->enabled==0)
                                echo "Không hiển thị";
                                else{
                                    echo "Hiển thị";
                                }
                            ?>
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