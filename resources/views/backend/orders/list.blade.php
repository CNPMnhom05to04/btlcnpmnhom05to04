@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        @include('backend.note')
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Đơn Đặt Sân</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Mã Hóa Đơn</th>
                        <th>Khách Hàng</th>
                        <th>SĐT</th>
                        <th>Sân</th>
                        <th>Ngày Đặt</th>
                        <th>Thời gian</th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>#{{$item->order_id}}</td>
                        <td>{{$item->user->user_name ?? 'Khách hàng'}}</td>
                        <td>{{($item->phone)  ?? $item->user->user_phone}}</td>
                        <td>{{($item->product_name)}}</td>
                        <td>{{date('d/m/Y',strtotime($item->created_at))}}</td>
                        <td>{{date('H:i:s',strtotime($item->start_time))}} - {{date('H:i:s',strtotime($item->end_time))}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <form>
                                        @csrf
                                        <input type="hidden" class="id_delete" value="{{$item->order_id}}">
                                        <a class="dropdown-item button-delete" href="#">Xóa</a>
                                    </form>
                                </div>
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
                    url: 'admin/orders/'+ order_id,
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