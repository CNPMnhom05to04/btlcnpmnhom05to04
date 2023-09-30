@extends('backend.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Phân loại chất lượng Trà</h4>
                    </div>

                    @include('backend.note')

                    <div class="card-body">
                        <div class="table-responsive table-hover">
                            <table class="table">
                                <thead class="text-primary text-center">
                                <th style="width: 150px; font-weight: bold; font-size: 16px;">Phân loại</th>
                                <th style="width: 100px;font-weight: bold; font-size: 16px;" class="text-center">Số
                                    lượng
                                </th>
                                <th style="width: 300px;font-weight: bold; font-size: 16px;">Thông tin</th>
                                <th style="width: 70px; font-weight: bold; font-size: 16px;">Tác vụ</th>
                                </thead>

                                <tbody class="text-center ">
                                @foreach ($data as $item)
                                    <tr>
                                        <input type="hidden" value="{{$item->brand_id}}" class="id_delete">
                                        <td>{{$item->brand_name}}</td>
                                        <td>{{count($item->product)}}</td>
                                        <td>Từ khóa: {{$item->brand_keyword}} <br>
                                            Mô tả: {{$item->brand_description}}
                                        </td>

                                        <td class="text-center align-items-center d-md-flex flex-column flex-md-row p-lg-3">
                                            <a class="button-common-edit edit mr-2" href="admin/brands/{{$item->brand_id}}/edit">
                                                <i class="fa-solid fa-marker mr-1"></i> Sửa
                                            </a>
                                            <form>
                                                @csrf
                                                <a class="button-delete{{ count($item->product) == 0 ? '' : ' disabled' }} button-common delete">
                                                    <i class="fa-regular fa-trash-can mr-1"></i>
                                                    <span>Xoá</span>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <div class="align-items-center">
                                    <div class="d-md-flex flex-column flex-md-row justify-content-md-end mb-1">
                                        <a href="{{ route('brand.create') }}"
                                           class="button-common-add add  mb-2 mt-2 mr-2">
                                            <i class="fa-solid fa-plus fa-lg mr-1"></i> Thêm loại chất lượng
                                        </a>
                                    </div>
                                </div>
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
            var brand_id = $(this).closest('tr').find('.id_delete').val();
            var token = $('input[name=_token]').val();

            swal({
                title: "Bạn có chắc sẽ xóa loại chất lượng trà này ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'DELETE',
                            url: 'admin/brands/' + brand_id,
                            data: {
                                '_token': token,
                                'id': brand_id,
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
