@extends('frontend.layout')

@section('content')
    <!-- cart-main-area start -->
    <div class="checkout-wrap ptb--100"
         style=" background-image: url('https://media.loveitopcdn.com/1229/tra-non-tom-thai-nguyen-loc-tan-cuong-6-1.jpg');
         background-size: cover;
          background-position: center;
          position: relative;
          width: 100%">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="checkout__inner">
                        <div class="accordion-list">
                            <div class="accordion">
                                <div class="accordion__title ">
                                    Thông Tin Đặt Hàng
                                </div>

                                <div class="accordion__body">
                                    <div class="bilinfo">
                                        <div class="row">
                                            <form>
                                                @csrf
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <select name="city_id" id="city_id">
                                                            <option>Tỉnh/Thành Phố</option>
                                                            @foreach ($dataCity as $item)
                                                                <option value="{{$item->city_id}}"
                                                                @if ($item->city_id == $dataUser->user_city)
                                                                    {{'selected'}}
                                                                    @endif
                                                                >{{$item->city_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('city_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <br>
                                            </form>
                                            <form>
                                                @csrf
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <select name="district_id" id="district_id">
                                                            <option>Quận Huyện</option>
                                                            @if ($dataUser->user_district != null)
                                                                <option value="{{$dataUser->user_district}}"
                                                                        selected>{{$dataUser->District->district_name}}</option>
                                                            @endif
                                                        </select>
                                                        @error('district_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </form>

                                            <form id="paymentForm" action="/payment" method="POST">
                                                @csrf
                                                <input type="hidden" name="city_id"
                                                       value="{{$dataUser->user_city}}">
                                                <input type="hidden" name="district_id"
                                                       value="{{$dataUser->user_district}}">
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input type="text" name="order_name"
                                                               value="{{$dataUser->user_name}}"
                                                               placeholder="Họ Tên">
                                                        @error('order_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="email" name="order_email"
                                                               value="{{$dataUser->user_email}}"
                                                               placeholder="Email">
                                                        @error('order_email')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" name="order_phone"
                                                               value="{{$dataUser->user_phone}}"
                                                               placeholder="Số điện thoại">
                                                        @error('order_phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input mt-0">
                                                        <div class="single-input">
                                                            <input type="text" name="order_addres"
                                                                   value="{{$dataUser->user_addres}}"
                                                                   placeholder="Địa chỉ chi tiết">
                                                            @error('order_addres')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input type="text" name="order_note"
                                                               placeholder="Lời nhắn">
                                                    </div>
                                                </div>

                                                <div class="row text-center">
                                                    <div class="col-md-9" style="margin-top: 5px">
                                                        <div class="col-3 col-sm-3 text-center">
                                                            <label for="paymentCash" class="payment-option"
                                                                   onclick="selectPaymentOption(event)">
                                                                <div class="image-container">
                                                                    <img
                                                                        src="https://nascoexpress.com/getattachment/b8a25cce-6779-4eda-9409-f7912ee05660/dich-vu-cod-tai-nasco-express-(1).jpg.html"
                                                                        alt="Cash Payment" class="img-fluid">
                                                                </div>
                                                                Thanh toán khi nhận hàng
                                                            </label>
                                                            <input class="type_payment" type="radio" id="paymentCash"
                                                                   name="order_pay_type" value="1"
                                                                   style="display: none;">
                                                        </div>

                                                        <div class="col-3 col-sm-3">
                                                            <label for="paymentVNPAY" class="payment-option"
                                                                   onclick="selectPaymentOption(event)">
                                                                <div class="image-container">
                                                                    <img
                                                                        src="https://play-lh.googleusercontent.com/o-_z132f10zwrco4NXk4sFqmGylqXBjfcwR8-wK0lO1Wk4gzRXi4IZJdhwVlEAtpyQ=w240-h480-rw"
                                                                        alt="VNPay" class="img-fluid">
                                                                </div>
                                                                Thanh toán qua VNPay
                                                            </label>
                                                            <input class="type_payment" type="radio" id="paymentVNPAY"
                                                                   name="order_pay_type" value="2"
                                                                   style="display: none;">
                                                        </div>

                                                        <div class="col-3 col-sm-3">
                                                            <label for="paymentMomo" class="payment-option"
                                                                   onclick="selectPaymentOption(event)">
                                                                <div class="image-container">
                                                                    <img
                                                                        src="https://play-lh.googleusercontent.com/dQbjuW6Jrwzavx7UCwvGzA_sleZe3-Km1KISpMLGVf1Be5N6hN6-tdKxE5RDQvOiGRg=w240-h480-rw"
                                                                        alt="MoMo" class="img-fluid">
                                                                </div>
                                                                Thanh toán qua MoMo
                                                            </label>
                                                            <input class="type_payment" type="radio" id="paymentMomo"
                                                                   name="order_pay_type" value="3"
                                                                   style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-details">
                        <h5 class="order-details__title">Hóa Đơn Mua Hàng</h5>
                        <div class="order-details__item">
                            @foreach ($cart as $item)
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="{{$item['cart_image']}}" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="/shop/product/{{$item['cart_id']}}-{{Str::slug($item['cart_product'], '-')}}.html">{{$item['cart_product']}}
                                            x{{$item['cart_quantity']}}</a>
                                        <span class="price">{{number_format($item['cart_price_sale'])}} - {{ \App\Helpers\CommonHelper::get_data_weight($item['cart_weight'])}} kg</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="order-details__count">
                            <div class="order-details__count__single">
                                <h5>Giá sản phẩm</h5>
                                <span class="price" id="cart_total">{{number_format($cart_total)}}</span>
                            </div>
                        </div>
                        <div class="order-details__count">
                            <div class="order-details__count__single mb--55">
                                <div id="orderDetailsDiv" class="order-details__count__single" style="display: none;">
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <h5 class="nowrap">Vận chuyển</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="box">
                                                <select class="selectpicker" data-size="4">
                                                    <option value="" disabled selected hidden class="text-muted"
                                                            style="color: gray; opacity: 0.5;">Lựa chọn
                                                    </option>
                                                    <option value="none">Nhanh</option>
                                                    <option value="xteam">Hoả tốc</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="order-details__count__single">
                                <h5>Mã giảm giá</h5>
                                <span class="price" id="coupon_cart">{{$coupon_cart}}</span>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Phí Vận Chuyển</h5>
                                <span class="price" id="shipping"></span>
                            </div>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Tổng Đơn Hàng</h5>
                            <span class="price" id="cart_totals">{{number_format($cart_totals)}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb--10">
                            <ul id="payment_btn" class="payment__btn">
                                <li class="active">
                                    <button type="submit" class="form-control">Thanh toán</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart" style="width: 100%;">
                                    <a href="/cart">Quay lại giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- cart-main-area end -->
@endsection

@section('script')

    <script>
        $('.type_payment').on('change', function () {
            var formData = {
                city_id: $('#city_id').val(),
                district_id: $('#district_id').val(),
                order_name: $('input[name="order_name"]').val(),
                order_email: $('input[name="order_email"]').val(),
                order_phone: $('input[name="order_phone"]').val(),
                order_addres: $('input[name="order_addres"]').val(),
                order_note: $('input[name="order_note"]').val(),
                order_city: $('#city_id option:selected').text(),
                order_district: $('#district_id option:selected').text(),
            };
            $.post('{{ route('ghtk.getInformatioOrder') }}', {
                _token: '{{ @csrf_token() }}',
                formData: formData
            }, function (data) {
            });
        });
    </script>

    <script>
        function selectPaymentOption(event) {
            const paymentOptions = document.querySelectorAll('.payment-option');
            paymentOptions.forEach(option => {
                option.classList.remove('selected');
            });

            const selectedOption = event.target.closest('.payment-option');
            selectedOption.classList.add('selected');

            const radioButton = selectedOption.querySelector('input[type="radio"]');
            if (radioButton) {
                radioButton.checked = true;
            }

            const orderDetails = document.getElementById('orderDetailsDiv');
            const selectElement = orderDetails.querySelector('select');
            selectElement.selectedIndex = 0;
        }
    </script>

    <script>
        getShip()

        function getShip() {
            var formData = {
                city_id: $('#city_id').val(),
                district_id: $('#district_id').val(),
                order_phone: $('input[name="order_phone"]').val(),
                order_addres: $('input[name="order_addres"]').val(),
                option_trans: $('input[name="order_addres"]').val(),
            };
            var _token = $('input[name=_token]').val();
            $.ajax({
                url: 'get_ship_checkout',
                method: 'POST',
                data: {
                    _token: _token,
                    formData: formData,
                },
                success: function (data) {
                    // $('#shipping').text(data[0].toLocaleString('ja-JP') + '' + ' VNĐ')
                    // $('#cart_totals').text(data[1].toLocaleString('ja-JP') + '' + ' VNĐ')
                }
            })
        }

        $('#city_id').change(function () {
            var _token = $('input[name=_token]').val()
            var city_id = $('#city_id').val()
            var html = '<option value="select">Quận Huyện</option>';
            $.ajax({
                url: 'get_district_checkout',
                method: 'POST',
                data: {
                    _token: _token,
                    city_id: city_id,
                },
                success: function (data) {
                    data.forEach(item => {
                        html += `<option value="${item.district_id}">${item.district_name}</option>`
                    });
                    $('#district_id').html(html)
                    $('input[name=city_id]').val(city_id)

                    $('#district_id').change(function () {
                        var _token = $('input[name=_token]').val()
                        var city_id = $('#city_id').val()
                        var district_id = $('#district_id').val()
                        // alert(district_id)
                        $.ajax({
                            url: 'get_ship_checkout',
                            method: 'POST',
                            data: {
                                _token: _token,
                                city_id: city_id,
                                district_id: district_id,
                            },
                            success: function (data) {
                                $('input[name=district_id]').val(district_id)
                            }
                        })
                    })
                }
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $("#payment_btn").on("click", function (event) {
                event.preventDefault();
                $("#paymentForm").submit();
            });
        });
    </script>

    <script>
        $('select.selectpicker').change(function () {
            var paymentType = $('input[name="order_pay_type"]:checked').val();
            var selectedShippingOption = $(this).val();

            sendShippingFeeRequest(paymentType, selectedShippingOption);
        });

        function sendShippingFeeRequest(paymentType, selectedShippingOption) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('ghtk.getShippingPrice') }}',
                type: 'POST',
                data: {
                    _token: _token,
                    payment_type: paymentType,
                    selected_shipping_option: selectedShippingOption
                },
                success: function (data) {
                    $('#shipping').text(data[2].toLocaleString('ja-JP') + '' + ' đ')
                    $('#cart_totals').text(data[1].toLocaleString('ja-JP') + '' + ' đ')
                },
                error: function (xhr, status, error) {
                    // Xử lý lỗi ở đây
                    console.error(error);
                }
            });
        }
    </script>
    <script>
        document.querySelectorAll('.type_payment').forEach(input => {
            input.addEventListener('change', function (event) {
                const selectedOption = event.target.closest('.payment-option');
                const orderDetailsDiv = document.getElementById("orderDetailsDiv");

                if (event.target.id === "paymentCash" || event.target.id === "paymentVNPAY" || event.target.id === "paymentMomo"
                    && event.target.checked) {
                    orderDetailsDiv.style.display = "block";
                } else {
                    orderDetailsDiv.style.display = "none";
                }
            });
        });
    </script>
@endsection
