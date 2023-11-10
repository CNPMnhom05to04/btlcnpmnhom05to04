@extends('backend.layout')

@section('content')
    <div class="container-fluid">
        @include('backend.note')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Danh Sách Sản Phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-hover">
                            <table class="table">
                                <thead class=" text-primary">

                                <th style="width: 40px; font-weight: bold; font-size: 16px; color: #FFFFFF"><input
                                        type="checkbox" id="select_all"/>
                                </th>

                                <th style="width: 150px; font-weight: bold; font-size: 16px; color: #FFFFFF">Tên sản
                                    phẩm
                                </th>
                                <th style="width: 150px; font-weight: bold; font-size: 16px;" class="text-center">Loại
                                    sản phẩm
                                </th>
                                <th style="width: 100px;font-weight: bold; font-size: 16px;"
                                    class="text-center product-count">Loại khối lượng
                                </th>
                                <th style="width: 150px;font-weight: bold; font-size: 16px;" class="text-center">Ảnh
                                </th>
                                <th style="width: 100px;font-weight: bold; font-size: 16px;"
                                    class="text-center align-items-center">Trạng thái trong kho
                                </th>
                                <th style="width: 200px;font-weight: bold; font-size: 16px;"
                                    class="text-center align-items-center">Tác
                                    vụ
                                </th>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox" class="delete_id" id="{{$item->product_id}}"
                                                   value="{{ $item->product_id }}"
                                                   name="select[]">
                                        </td>
                                        <td class="text-center">{{$item->product_name}}</td>
                                        <td class="text-center">{{$item->category->category_name ?? ''}}</td>
                                        <td class="text-center">{{$item->brand->brand_name ?? ''}}</td>
                                        <td class="text-center"><img style="width: 120px" src="{{$item->product_image}}"
                                                                     alt=""></td>
                                        <td class="text-center">
                                            @if ($item->product_amount == 0)
                                                {{'Hết hàng'}}
                                            @else
                                                {{'Còn hàng'}}
                                            @endif
                                        </td>
                                        <td class="justify-content-between">
                                            <div class="d-flex flex-edit ml-2">
                                                <a class="button-common-detail detail "
                                                   href="admin/products/{{$item->product_id}}" style="width: 90px;">
                                                    <i class="fa-solid fa-circle-info mr-1"></i> Chi tiết
                                                </a>
                                                <a class="button-common-edit edit"
                                                   href="admin/products/{{$item->product_id}}/edit">
                                                    <i class="fa-solid fa-marker mr-1"></i> Sửa
                                                </a>
                                                <form>
                                                    @csrf
                                                    <a class=" button-common-delete delete button-delete-cate"
                                                       onclick="deleteSelected()">
                                                        <i class="fa-regular fa-trash-can mr-1"></i>
                                                        <span>Xoá </span>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between align-items-center">

                                        <div class="d-inline-block">
                                            <div id="search">
                                                <form action="{{ route('product.index') }}" method="GET">
                                                    <svg viewBox="0 0 420 60" xmlns="http://www.w3.org/2000/svg"
                                                         id="searchIcon">
                                                        <rect class="bar"/>
                                                        <g class="magnifier">
                                                            <circle class="glass"/>
                                                            <line class="handle" x1="32" y1="32" x2="44" y2="44"></line>
                                                        </g>
                                                        <g class="sparks">
                                                            <circle class="spark"/>
                                                            <circle class="spark"/>
                                                            <circle class="spark"/>
                                                        </g>
                                                        <g class="burst pattern-one">
                                                            <circle class="particle circle"/>
                                                            <path class="particle triangle"/>
                                                            <circle class="particle circle"/>
                                                            <path class="particle plus"/>
                                                            <rect class="particle rect"/>
                                                            <path class="particle triangle"/>
                                                        </g>
                                                        <g class="burst pattern-two">
                                                            <path class="particle plus"/>
                                                            <circle class="particle circle"/>
                                                            <path class="particle triangle"/>
                                                            <rect class="particle rect"/>
                                                            <circle class="particle circle"/>
                                                            <path class="particle plus"/>
                                                        </g>
                                                        <g class="burst pattern-three">
                                                            <circle class="particle circle"/>
                                                            <rect class="particle rect"/>
                                                            <path class="particle plus"/>
                                                            <path class="particle triangle"/>
                                                            <rect class="particle rect"/>
                                                            <path class="particle plus"/>
                                                        </g>
                                                    </svg>
                                                    <input type="search" name="search" id="searchInput"
                                                           placeholder="Type to Search...">
                                                </form>
                                            </div>
                                            <div id="results">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row">
                                            <div class="d-inline-block mb-2 mt-2 mr-2">
                                                <a class="button-common-export export"
                                                   href="{{ route('category.export') }}">
                                                    <i class="fa-solid fa-file-export mr-1"></i> Export
                                                </a>
                                            </div>

                                            <div class="d-inline-block mb-2 mt-2 mr-2">
                                                <a href="admin/products/create" class="button-common-add add">
                                                    <i class="fa-solid fa-plus fa-lg mr-1"></i>Thêm loại sản phẩm
                                                </a>
                                            </div>
                                            <form>
                                                @csrf
                                                <div class="d-inline-block mb-2 mt-2 mr-2">
                                                    <a class="button-common delete disable-hover "
                                                       onclick="deleteSelected()">
                                                        <i class="fa-regular fa-trash-can mr-1"></i>
                                                        <span>Xoá nhiều</span>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 offset-md-1">
                        <ul class="pagination ">
                            {{ $data->links("pagination::bootstrap-4") }}
                        </ul>
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
            $("input[name='select[]']:checked").each(function () {
                selectedIDs.push($(this).val());
            });
            if (selectedIDs.length === 0) {
                return;
            }
            var token = $('input[name=_token]').val();console.log(selectedIDs);
            swal({
                title: "Bạn có chắc sẽ xóa khối lượng này?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "admin/products/delete_more",
                        type: "DELETE",
                        data: {
                            'ids': selectedIDs,
                            '_token': token,
                        },
                        success: function (response) {
                            swal(response.msgSuccess, {
                                icon: "success",
                            }).then(() => location.reload());
                        }
                    });
                }
            });
        }

        $(document).ready(function () {
            $("input[name='select[]']").change(function () {
                var anyCheckboxChecked = $("input[name='select[]']:checked").length > 0;
                $("#select_all").prop("checked", !anyCheckboxChecked);
                $(".button-common.delete").toggleClass("disable-hover", !anyCheckboxChecked);
            });

            $("#select_all").change(function () {
                var selectAllChecked = $(this).prop("checked");
                $("input[name='select[]']").prop("checked", selectAllChecked);
                $(".button-common.delete").toggleClass("disable-hover", !selectAllChecked);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#select_all").change(function () {
                var selectAllChecked = $(this).prop("checked");
                if (selectAllChecked) {
                    $(".button-common.delete").removeClass("disable-hover");
                } else {
                    $(".button-common.delete").addClass("disable-hover");
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.button-delete-cate').click(function (e) {
                e.preventDefault();
                var deleteId = $(this).closest('tr').find('.delete_id').val();
                var token = $('input[name=_token]').val();
                swal({
                    title: "Bạn có chắc sẽ xóa",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                method: 'DELETE',
                                url: 'admin/products/' + deleteId,
                                data: {
                                    _token: token,
                                    id: deleteId,
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
        })
    </script>

@endsection
