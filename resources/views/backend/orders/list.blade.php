@extends('backend.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('backend.note')
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Danh Sách Đơn Hàng</h4>
                        {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-hover">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Mã Hóa Đơn</th>
                                <th>Khách Hàng</th>
                                <th>Tổng Tiền</th>
                                <th>Ngày Mua</th>
                                <th>Trạng Thái</th>
                                <th> Tác Vụ</th>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>#{{$item->order_id}}</td>
                                        <td>{{$item->user->user_name ?? 'Khách hàng'}}</td>
                                        <td>{{number_format($item->order_total)}}</td>
                                        <td>{{date('d/m/Y',strtotime($item->created_at))}}</td>
                                        <td>{!! \App\Helpers\OrderStatusHelper::Status($item->order_status) !!}</td>
                                        <td class="justify-content-between">
                                            <div class="d-flex flex-edit ml-2">
                                                <a class="button-common-export-pdf export-pdf"
                                                   target="_blank" href="admin/generate-pdf/{{$item->order_id}}">
                                                    <i class="fa-solid fa-file-pdf mr-1"></i>Xuất PDF
                                                </a>
                                                <a class="button-common-detail detail "
                                                   href="admin/orders/{{$item->order_id}}" style="width: 90px;">
                                                    <i class="fa-solid fa-circle-info mr-1"></i> Chi tiết
                                                </a>
                                                <form>
                                                    @csrf
                                                    <input type="hidden" class="id_delete" value="{{$item->order_id}}">
                                                    <a class=" button-delete  button-common-delete delete button-delete-cate">
                                                        <i class="fa-regular fa-trash-can mr-1"></i>
                                                        <span>Xoá </span>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-md-4">
                        {{ $data->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.button-delete').click(function (e) {

            e.preventDefault();
            var order_id = $('.id_delete').val();
            var token = $('input[name=_token]').val();

            swal({
                title: "Bạn có chắc sẽ xóa hóa đơn này này",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'DELETE',
                            url: 'admin/orders/' + order_id,
                            data: {
                                '_token': token,
                                'id': order_id,
                            },
                            success: function (response) {
                                swal(response.msgSuccess, {
                                    icon: "success",
                                })
                                    .then((willDelete) => location.reload())
                            }
                        })
                    }
                });
        })
    </script>
@endsection
