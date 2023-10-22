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

                                                <div class="col-md-12" style="margin-top: 5px">
                                                    <div class="col-md-3 text-center">
                                                        <label for="paymentCash" class="payment-option" onclick="selectPaymentOption(event)">
                                                            <div class="image-container">
                                                                <img src="https://nascoexpress.com/getattachment/b8a25cce-6779-4eda-9409-f7912ee05660/dich-vu-cod-tai-nasco-express-(1).jpg.html" alt="Cash Payment" class="img-fluid">
                                                            </div>
                                                            Thanh toán khi nhận hàng
                                                        </label>
                                                        <input type="radio" id="paymentCash" name="order_pay_type" value="1" style="display: none;">
                                                    </div>

                                                    <div class="col-md-3 text-center">
                                                        <label for="paymentVNPAY" class="payment-option"
                                                               onclick="selectPaymentOption(event)">
                                                            <div class="image-container">
                                                                <img src="https://play-lh.googleusercontent.com/o-_z132f10zwrco4NXk4sFqmGylqXBjfcwR8-wK0lO1Wk4gzRXi4IZJdhwVlEAtpyQ=w240-h480-rw" alt="Cash Payment" class="img-fluid">
                                                            </div>
                                                            Thanh toán qua VNPay
                                                        </label>
                                                        <input type="radio" id="paymentVNPAY"
                                                               name="order_pay_type" value="2"
                                                               style="display: none;">
                                                    </div>

                                                    <div class="col-md-3 text-center">
                                                        <label for="paymentMomo" class="payment-option"
                                                               onclick="selectPaymentOption(event)">
                                                            <div class="image-container">
                                                                <img src="https://play-lh.googleusercontent.com/dQbjuW6Jrwzavx7UCwvGzA_sleZe3-Km1KISpMLGVf1Be5N6hN6-tdKxE5RDQvOiGRg=w240-h480-rw" alt="Cash Payment" class="img-fluid">
                                                            </div>
                                                            Thanh toán qua MoMo
                                                        </label>
                                                        <input type="radio" id="paymentMomo"
                                                               name="order_pay_type" value="3"
                                                               style="display: none;">
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
                                        <span class="price">{{number_format($item['cart_price_sale'])}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="order-details__count">
                            <div class="order-details__count__single">
                                <h5>Giá sản phẩm</h5>
                                <span class="price" id="cart_total">{{number_format($cart_total)}}</span>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Mã giảm giá</h5>
                                <span class="price" id="coupon_cart">{{$coupon_cart}}</span>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Phí Vận Chuyển</h5>
                                <span class="price" id="shipping">0</span>
                            </div>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Tổng Đơn Hàng</h5>
                            <span class="price" id="cart_totals">{{number_format($cart_totals)}}</span>
                        </div>
                    </div>

                    <ul id="payment_btn" class="payment__btn">
                        <li class="active">
                            <button type="submit" class="form-control">Thanh toán
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
@endsection

@section('script')

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
        }
    </script>

    <script>
        getShip()

        function getShip() {
            var city_id = $('input[name=city_id]').val();
            var district_id = $('input[name=district_id]').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                url: 'get_ship_checkout',
                method: 'POST',
                data: {
                    _token: _token,
                    city_id: city_id,
                    district_id: district_id,
                },
                success: function (data) {
                    $('#shipping').text(data[0].toLocaleString('ja-JP') + '' + ' VNĐ')
                    $('#cart_totals').text(data[1].toLocaleString('ja-JP') + '' + ' VNĐ')
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

                                $('#shipping').text(data[0].toLocaleString('ja-JP') + '' + ' VNĐ')
                                $('#cart_totals').text(data[1].toLocaleString('ja-JP') + '' + ' VNĐ')
                                $('input[name=district_id]').val(district_id)

                            }
                        })
                    })
                }
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $("#payment_btn").on("click", function(event) {
                event.preventDefault();
                $("#paymentForm").submit();
            });
        });
    </script>
@endsection
