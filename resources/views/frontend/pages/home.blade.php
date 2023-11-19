@extends('frontend.layout')

@section('content')
    @include('frontend.note')
    <!-- Start Slider Area -->
    <div class="slider__container slider--one bg__cat--3">
        <div class="slide__container slider__activation__wrap owl-carousel">
            @foreach ($dataSilde as $slide)
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h1>{{$slide->slide_title}}</h1>
                                        <div class="fr__product__inner">
                                            <p>{{$slide->target}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide__thumb">
                                    <img src="{{$slide->image}}" style="width: 75%; height: 100%"
                                         alt="slider images VINANEON">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            @endforeach
        </div>
    </div>
    <!-- Start Slider Area -->
    <!-- Start Product new Area -->
    <section class="htc__category__area ptb--40">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">
                            <a>SẢN PHẨM MỚI</a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="htc__product__container">
                <div class="row">
                    <div class="product__list clearfix mt--30 mb--20">
                        @foreach ($dataProductNews as $item)
                            <!-- Start Single Category -->
                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-6 product" style="height: 390px">
                                @include('frontend.libs.product')
                            </div>
                            <!-- End Single Category -->
                        @endforeach
                    </div>
                </div>
                <div class="vmore mt--40"><a href="/shop">Xem thêm sản phẩm</a></div>
            </div>
        </div>
    </section>
    <!-- End Product new Area -->
    <!-- Start Banner Area -->
    @if ($dataBanner != null)
        <section class="ftr__product__area ptb--40">
            <div class="container-fluid">
                <center>
                    <a href="{{$dataBanner->target}}"><img style="max-width: 100%" src="{{$dataBanner->image}}"
                                                           alt="{{$dataBanner->title}}"></a>
                </center>
            </div>
        </section>
    @endif
    <!-- End Banner Area -->
    <!-- Start Product sale Area -->
    <section class="ftr__product__area ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="d-none d-md-block">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">
                                <a>TOP KHUYẾN MÃI</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product__list clearfix mt--30">
                    @foreach ($dataProductSales as $item)
                        <!-- Start Single Category -->
                        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-6 product" style="height: 390px">
                            @include('frontend.libs.product')
                        </div>
                        <!-- End Single Category -->
                    @endforeach
                </div>
            </div>
            <div class="vmore mt--40"><a href="/shop">Xem thêm sản phẩm</a></div>
        </div>
    </section>
    <!-- End Product sale Area -->
    <!-- Start Comment Area -->
    <section class="home-testimonial">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center testimonial-pos">
                    <div class="col-12 text-center">
                        <div class="section__title--2">
                            <h2 class="title__line">
                                <a>Bình luận về sản phẩm</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <section class="home-testimonial-bottom">
                    <div class="container testimonial-inner">
                        <div class="row d-flex justify-content-center product-review-slider" data-items="3">
                            @foreach($dataComment as $item)
                                <div class="col-md-4 col-sm-6 col-12 style-3">
                                    <div class="tour-item">
                                        <div class="tour-desc bg-white" style="height: 300px; overflow-y: auto;">
                                            <div class="link-name text-center">{{ $item->user->user_name }}</div>
                                            <div class="row justify-content-center pt-2 pb-2">
                                                <div class="col-md-6 col-sm-8 col-12">
                                                    <img class="tm-people img-fluid" src="{{ $item->product->product_image }}" alt="">
                                                </div>
                                            </div>
                                            <div class="tour-text color-grey-3">
                                                &ldquo;{{ $item->comment_customer }}&ldquo;
                                            </div>
                                            <br>
                                            <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                                @for($i = 1; $i <=5; $i++)
                                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}"
                                                           @if($i == $item->comment_rating) checked @endif />
                                                    <label for="star{{ $i }}" title="{{ $i }} star"
                                                           style="color: @if($i <= $item->comment_rating) yellow @else gray @endif;"></label>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
        </div>
    </section>
    <!-- End Comment Area -->
    <!-- Start Top Rated Area -->
    @if ($dataProductSell != null)
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">
                                <a>sản phẩm bán chạyI</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        @foreach ($dataProductSell as $item)
                            <!-- Start Single Category -->
                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-6 product" style="height: 390px">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <span class="sale-span">-{{$item->product->product_sale}}%</span>
                                        <a href="/shop/product/{{$item->product->product_id}}">
                                            <img style="max-width: 260px; height: 260px"
                                                 src="{{$item->product->product_image}}"
                                                 alt="{{$item->product->product_name}}">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <form>
                                            @csrf
                                            @php
                                                $product_price_sale = $item->product->product_price_sell - ($item->product->product_price_sell/100 * $item->product->product_sale);
                                            @endphp
                                            <input type="hidden" class="cart_product_{{$item->product->product_id}}"
                                                   value="{{$item->product->product_name}}">
                                            <input type="hidden" class="cart_price_{{$item->product->product_id}}"
                                                   value="{{$item->product->product_price_sell}}">
                                            <input type="hidden" class="cart_price_sale_{{$item->product->product_id}}"
                                                   value="{{$product_price_sale}}">
                                            <input type="hidden" class="cart_amount_{{$item->product->product_id}}"
                                                   value="{{$item->product->product_amount}}">
                                            <input type="hidden" class="cart_quantity_{{$item->product->product_id}}"
                                                   value="1">
                                            <input type="hidden" class="cart_brand_{{$item->product->product_id}}"
                                                   value="{{$item->product->brand_name}}">
                                            <input type="hidden" class="cart_image_{{$item->product->product_id}}"
                                                   value="{{$item->product->product_image}}">
                                            <ul class="product__action">
                                                <li>
                                                    <button class="add_to_cart" data-id="{{$item->product->product_id}}"
                                                            type="button"><i class="icon-handbag icons"></i></button>
                                                </li>
                                            </ul>
                                        </form>
                                        <form>
                                            @csrf
                                            <li>
                                                <button class="handle_wishlist"
                                                        data-product_id="{{$item->product->product_id}}" type="button">
                                                    <i class="icon-heart icons"></i></button>
                                            </li>
                                        </form>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4>
                                            <a href="/shop/product/{{$item->product->product_id}}-{{Str::slug($item->product->product_name, '-')}}.html"></a>
                                        </h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize">{{number_format($item->product->product_price_sell)}}
                                                đ
                                            </li>
                                            <li>{{number_format($product_price_sale)}} đ</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                        @endforeach

                    </div>
                </div>
                <div class="vmore mt--40"><a href="/shop">Xem thêm sản phẩm</a></div>
            </div>
        </section>
    @endif
    <!-- End Top Rated Area -->
    <!-- Start Blog Area -->
    <section class="ftr__product__area .ptb--40">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">
                            <a>Blog Tâm trà</a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product__list clearfix mt--30">
                    @foreach ($dataPost as $item)
                        <!-- Start Single Category -->
                        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-6 product" style="height: 390px">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <span class="sale-span">New</span>
                                    <a href="/blog/{{$item->id}}-{{Str::slug($item->post_title, '-')}}.html">
                                        <img style="max-width: 260px; height: 260px" src="{{$item->post_image}}"
                                             alt="{{$item->post_title}}">
                                    </a>
                                </div>
                                <div class="fr__product__inner" style="margin-top: -15px">
                                    <ul class="fr__pro__prize">
                                        <li><a style="font-size: 10px"
                                               href="/shop/blog/{{$item->id}}-{{Str::slug($item->post_title, '-')}}.html">Ngày
                                                đăng:
                                                @php
                                                    $old_date = strtotime($item->created_at);
                                                    $new_date = date('d/m/Y', $old_date);
                                                    echo $new_date
                                                @endphp
                                            </a></li>
                                    </ul>
                                    <h4><a href="/blog/{{$item->id}}-{{Str::slug($item->post_title, '-')}}.html"><i
                                                style="
                                        max-width: 250px;
                                        height: 40px;
                                        line-height: 20px;
                                        word-break: break-all;
                                        display: -webkit-box;
                                        -webkit-box-orient: vertical;
                                        -moz-box-orient: vertical;
                                        -ms-box-orient: vertical;
                                        box-orient: vertical;
                                        -webkit-line-clamp: 2;
                                        -moz-line-clamp: 2;
                                        -ms-line-clamp: 2;
                                        line-clamp: 2;
                                        overflow: hidden;
                                        ">{{$item->post_title}}</i></a></h4>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                    @endforeach
                </div>
            </div>
            <div class="vmore mt--40"><a href="/blog">Xem thêm bài viết</a></div>
        </div>
    </section>
    <!-- End Blog Area -->
    <section class="order-process custom-order-process">
        <div class="container">
            <h2>Quy trình đặt hàng tại Tâm Trà</h2>
            <div class="process-steps">
                <div class="step">
                    <div class="step-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <p>Bước 1: Đặt hàng</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <p>Bước 2: Xác nhận</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <p>Bước 3: Vận chuyển</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <p>Bước 4: Giao hàng</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <p>Bước 5: Hoàn thành</p>
                </div>
            </div>
        </div>
    </section>
    <section class="order-with-us">
        <div class="info-container">
            <div class="info-column">
                <div class="icon-box order-icon-box">
                    <div class="icon">&#x1F6D2;</div>
                    <h3 class="order-heading">Đặt Hàng 24/7</h3>
                    <p class="order-contact">0943206425</p>
                </div>
            </div>

            <div class="info-column delivery-column">
                <div class="icon">&#x1F69A;</div>
                <h3 class="delivery-heading">Giao Hàng Tận Nơi
                    <br>TRÀ SẠCH - TRÀ CHÍNH GỐC - TRÀ MỚI
                </h3>
            </div>

            <div class="info-column">
                <div class="icon-box email-icon-box">
                    <div class="icon">&#x1F4E7;</div>
                    <h3 class="email-heading">Email</h3>
                    <p class="email-contact">tamtra@gmail.com</p>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $('.add_to_cart').click(function () {
            var id = $(this).data('id');
            var _token = $('input[name=_token]').val();
            var cart_product = $('.cart_product_' + id).val();
            var cart_price = $('.cart_price_' + id).val();
            var cart_price_sale = $('.cart_price_sale_' + id).val();
            var cart_amount = $('.cart_amount_' + id).val();
            var cart_quantity = $('.cart_quantity_' + id).val();
            var cart_image = $('.cart_image_' + id).val();
            var cart_brand = $('.cart_brand_' + id).val();

            $.ajax({
                url: 'add_to_cart',
                method: 'POST',
                data: {
                    _token: _token,
                    cart_id: id,
                    cart_product: cart_product,
                    cart_price: cart_price,
                    cart_price_sale: cart_price_sale,
                    cart_amount: cart_amount,
                    cart_quantity: cart_quantity,
                    cart_image: cart_image,
                    cart_brand: cart_brand,

                },
                success: function (data) {
                    //
                    Swal.fire(data)
                    //
                }
            })

        })

        $('.handle_wishlist').click(function () {
            var product_id = $(this).data('product_id');
            var _token = $('input[name=_token]').val();

            $.ajax({
                url: 'handle-wishlist',
                method: 'POST',
                data: {
                    _token: _token,
                    product_id: product_id,
                },
                success: function (data) {
                    Swal.fire(data)
                }
            })
        })
    </script>

    <script>
        const productReviewSlider = document.querySelector('.product-review-slider');
        $(productReviewSlider).slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
