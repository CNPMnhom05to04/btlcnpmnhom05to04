@extends('frontend.layout')

@section('content')
<section class="htc__contact__area ptb--100 bg__white san74" id="canvas">
    <div class="container">
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        <div class = "container" style="background-color: #f3f3f3; padding-top: 30px; padding-bottom: 30px">
                            <form id="contact-form" action="/order-stadium" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Tên người đại diện</label>
                                                <input id="name" type="text" name="name" class="form-control" placeholder="Nhập tên người đại diện" required="required" data-error="Tên người đại diện bắt buộc.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Số điện thoại liên hệ sau khi đặt sân</label>
                                                <input id="phone" type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" required="required" data-error="Số điện thoại bắt buộc.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="category">Loại sân</label>
                                                <select id="category" name="category_id" class="form-control" required="required" data-error="Xin hãy chọn loại sân.">
                                                    <option value="" selected disabled>----Lựa chọn----</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->category_id }}" {{ isset($data['type_id']) && $category->category_id == $data['type_id'] ? 'selected' : '' }}>
                                                            {{ $category->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="brand">Tên sân</label>
                                                <select id="brand" name="product_id" class="form-control" required="required" data-error="Xin hãy chọn tên sân.">
                                                    <option value="" selected disabled>----Lựa chọn----</option>
                                                    @foreach ($stadiumNames as $stadiumName)
                                                        <option value="{{ $stadiumName->product_id }}" {{ isset($data['product_id']) && $stadiumName->product_id == $data['product_id'] ? 'selected' : '' }}>
                                                            {{ $stadiumName->product_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="brand">Vị trí sân</label>
                                                <select id="brand" name="brand_id" class="form-control" required="required" data-error="Xin hãy chọn vị trí sân.">
                                                    <option value="" selected disabled>----Lựa chọn----</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->brand_id }}" {{ isset($data['location_id']) && $location->brand_id == $data['location_id'] ? 'selected' : '' }}>
                                                        {{ $location->brand_name }}
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="brand">Khung thời gian</label>
                                                <select id="brand" name="time_id" class="form-control" required="required" data-error="Xin hãy chọn vị trí sân.">
                                                    <option value="" selected disabled>----Lựa chọn----</option>
                                                    @foreach ($times as $time)
                                                        <option value="{{ $time->time_id }}" {{ isset($data['time_id']) && $time->time_id == $data['time_id'] ? 'selected' : '' }}>
                                                        {{ date('H:i:s',strtotime($time->start_time)) }} - {{ date('H:i:s',strtotime($time->end_time)) }}
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_need">Lựa chọn phương thức thanh toán</label>
                                                <select id="form_need" name="type_bank" class="form-control" required="required" data-error="Please specify your need.">
                                                    <option value="" selected disabled>----Lựa chọn----</option>
                                                    <option value="0">Thanh toán trực tiếp khi tới sân</option>
                                                    <option value="1">Chuyển khoản đặt cọc + ảnh minh chứng</option>
                                                </select>
                                                <label for="form_need" style="color: #ff0000; font-size: 12px">Lưu ý: Chuyển khoản sẽ được ưu tiên đặt sân trước so với các hình thức khác</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="image_bank" style="display: none">
                                            <div class="">
                                                <label class="bmd-label-floating">Hình ảnh<span class="text-danger">*</span></label>
                                                <input type="file" id="product_image" name="product_image" onchange="chosseFile(this)" class="form-control" accept="image/*">
                                                @error('product_image')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <br>
                                                <img src="../libs/image_no.png" id="image" style="width:200px" alt="Ảnh sản phẩm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="note">Thông tin thêm</label>
                                                <textarea id="note" name="note" class="form-control" placeholder="Cần chú thích gì thêm" rows="4" required="required" data-error=""></textarea
                                                >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                            " value="Hoàn thành" >
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.8 -->
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let checkImage = $('#form_need');
            checkImage.change(function() {
                var selectedValue = $(this).val();
                if (selectedValue == '1') {
                    $('#image_bank').show();
                } else {
                    $('#image_bank').hide();
                }
            });
        });
    </script>
</section>
@endsection
@section('css')
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }

        h1 {
            margin-bottom: 40px;
        }

        label {
            color: #333;
        }

        .btn-send {
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            width: 80%;
            margin-left: 3px;
        }
        .help-block.with-errors {
            color: #ff5050;
            margin-top: 5px;

        }

        .card{
            margin-left: 10px;
            margin-right: 10px;
        }

    </style>
@endsection

@section('script')
    <script>
        function chosseFile(file){
            if(file && file.files[0]){
                var reader = new FileReader()
                reader.onload = function(e){
                    $("#image").attr('src', e.target.result)
                }
                reader.readAsDataURL(file.files[0])
            }
        }
    </script>
@endsection
