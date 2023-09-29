@extends('backend.layout')
@section('content')
    <div class="container-fluid" id="result">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title " style="font-weight: bold">Danh Sách Loại Sản Phẩm</h4>
                    </div>
                    @include('backend.note')
                    <div class="card-body">
                        <div class="table-responsive table-hover">
                            <table class="table">
                                <thead class="text-primary">
                                <th style="width: 40px; font-weight: bold; font-size: 16px; color: #FFFFFF"></th>
                                <th style="width: 150px; font-weight: bold; font-size: 16px;" class="text-center">Tên
                                    Loại
                                </th>
                                <th style="width: 100px;font-weight: bold; font-size: 16px;"
                                    class="text-center product-count">Số sản phẩm
                                </th>
                                <th style="width: 350px;font-weight: bold; font-size: 16px;" class="text-center">Thông
                                    tin
                                </th>
                                <th style="width: 200px;font-weight: bold; font-size: 16px;" class="text-center align-items-center">Tác
                                    vụ
                                </th>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox" id="{{$item->category_id}}"
                                                   value="{{ $item->category_id }}" name="checkbox[]"
                                                {{ count($item->product) > 0 ? 'disabled' : '' }}>
                                        </td>

                                        <td class="text-center"><strong>{{$item->category_name}}</strong></td>

                                        <td class="text-center product-count"><strong>{{count($item->product)}}</strong> </td>

                                        <td style="width: 350px;" class="text-center">
                                            <strong>Từ khóa:</strong> {{$item->category_keyword}} <br>
                                            <strong>Mô tả:</strong> {{$item->category_description}}
                                        </td>

                                        <td class="text-center ">
                                            <a class="button-common-edit edit "
                                               href="admin/categorys/{{$item->category_id}}/edit">
                                                <i class="fa-solid fa-marker mr-1"></i> Sửa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                <div class="card-body">
                                    <div class="table-responsive table-hover">
                                        <div class="d-flex justify-content-between">
                                            <div class="col-md-4">
                                                <form>
                                                    @csrf
                                                    <div class="form-group" style="width: 200px;">
                                                        <select name="cate_filter" id="cate_filter"
                                                                class="custom-select">
                                                            <option value="" disabled selected hidden class="text-muted"
                                                                    style="color: gray; opacity: 0.5;">---Chọn bộ lọc---
                                                            </option>
                                                            <option value="category_keyword">Tên loại (A -> Z)</option>
                                                            <option value="product">Số sản phẩm (Max -> Min)</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="align-items-center">
                                                <div class="d-md-flex flex-column flex-md-row justify-content-md-end">
                                                    <a class="button-common-export export mb-2 mt-2 mr-2" href="{{ route('category.export') }}">
                                                        <i class="fa-solid fa-file-export mr-1"></i> Export
                                                    </a>

                                                    <a href="admin/categorys/create"
                                                       class="button-common-add add  mb-2 mt-2 mr-2">
                                                        <i class="fa-solid fa-plus fa-lg mr-1"></i>Thêm loại sản phẩm
                                                    </a>

                                                    <div class="d-md-flex flex-column flex-md-row justify-content-md-end">
                                                        <a class="button-common delete mb-2 mt-2 mr-2" onclick="deleteSelected()">
                                                            <i class="fa-regular fa-trash-can mr-1"></i>
                                                            <span>Xoá</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </tbody>
                            </table>
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
    </div>
@endsection

@section('script')
    <script>
        function deleteSelected() {
            var selectedIDs = [];
            $("input[name='checkbox[]']:checked").each(function () {
                selectedIDs.push($(this).val());
            });

            if (selectedIDs.length === 0) {
                return;
            }

            var token = $('input[name=_token]').val();

            swal({
                title: "Bạn có chắc sẽ xóa không gian decor này?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "admin/categorys/delete_more",
                        type: "DELETE",
                        data: {
                            'ids': selectedIDs,
                            '_token': token,
                        },
                        success: function (response) {
                            swal(response.msgSuccess, {
                                icon: "success",
                            }).then((willDelete) => location.reload());
                        }
                    });
                }
            });
        }

    </script>

    <script>
        $(document).ready(function () {
            var _token = $('input[name=_token]').val()
            var $cateFilter = $('#cate_filter');
            var previousValue = $cateFilter.val();

            $cateFilter.on('change', function () {
                var selectedValue = $(this).val();
                if (selectedValue !== '---Chọn---') {
                    $.ajax({
                        url: "admin/filter",
                        type: "POST",
                        data: {
                            'selectedValue': selectedValue,
                            _token: _token,
                        },
                        success: function (response) {
                            $('#result').html(response);
                        }
                    });
                }
            });
        });

    </script>

@endsection
