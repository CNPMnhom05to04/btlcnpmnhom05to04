@extends('frontend.layout')

@section('content')
    <!-- Start Product Details Area -->
    <section class="htc__product__details bg__white ptb--100 image_product">
        <!-- Start Product Details Top -->
        <div class="background-detail">
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-0">
                                            <img style="width: 460px; height: 460px" src="{{$data->product_image}}" alt="full-image">
                                        </div>
                                        @foreach ($dataProductImages as $item)
                                            <div role="tabpanel" class="tab-pane fade" id="img-tab-{{$item->image_id}}">
                                                <img  style="width: 460px; height: 460px" src="{{$item->image_name}}" alt="full-image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                <!-- Start Small images -->
                                <ul class="product__small__images" role="tablist">
                                    <li role="presentation" class="pot-small-img active">
                                        <a href="#img-tab-0" role="tab" data-toggle="tab">
                                            <img style="width: 80px" src="{{$data->product_image}}" alt="small-image">
                                        </a>
                                    </li>
                                    @foreach ($dataProductImages as $item)
                                        <li role="presentation" class="pot-small-img">
                                            <a href="#img-tab-{{$item->image_id}}" role="tab" data-toggle="tab">
                                                <img style="width: 80px" src="{{$item->image_name}}" alt="small-image">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- End Small images -->
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2>{{$data->product_name}}</h2>
                                <div class="sin__desc align--left" style="margin: 0">
                                    <p><span class="toact-text">Loại sân thi đấu:</span></p>
                                    <ul class="pro__cat__list">
                                        <li class="toact-text"><a href="/shop/category/{{$data->category_id}}">{{$data->category->category_name}}</a></li>
                                    </ul>
                                </div>
                                <div class="sin__desc align--left" style="margin: 0">
                                    <p><span class="toact-text">Xem vị trí sân:</span></p>
                                    <ul class="pro__cat__list">
                                        <li><a href="/location/{{$data->brand_id}}">{{$data->brand->brand_name}}</a></li>
                                    </ul>
                                </div>
                                <p class="pro__info"></p>
                                <div class="ht__pro__desc">
                                    <div class="price-table" style="padding-left: 20px;color: #0d0d0d !important; width: 80%">
                                        <p style="color: #000000 !important;"><span style="color: #000000 !important;">{!!$data->product_attribute!!}</span></p>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6"> <button onclick="submitForm()"class="btn btn-sm animated-button">ĐẶT NGAY</button> </div> <br>
                                    <form id="contact-form" action="/contact/send" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$data->product_id}}" name="product_id">
                                        <input type="hidden" value="{{$data->category_id}}" name="type_id">
                                        <input type="hidden" value="{{$data->brand_id}}" name="location_id">
                                    </form>
                                    <div class="sin__desc product__share__link" style="margin-top: 50px;">
                                        <p><span>Share this:</span></p>
                                        <ul class="pro__share">
                                            <li class="share"><a href="#" target="_blank"><i class="icon-social-twitter icons"></i></a></li>

                                            <li class="share"><a href="#" target="_blank"><i class="icon-social-instagram icons"></i></a></li>

                                            <li class="share"><a href="https://www.facebook.com/Furny/?ref=bookmarks" target="_blank"><i class="icon-social-facebook icons"></i></a></li>

                                            <li class="share"><a href="#" target="_blank"><i class="icon-social-google icons"></i></a></li>

                                            <li class="share"><a href="#" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>

                                            <li class="share"><a href="#" target="_blank"><i class="icon-social-pinterest icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Details Top -->
    </section>
    <!-- End Product Details Area -->
    <!-- Start Product Description -->
    <section class="htc__produc__decription bg__white" style="background-color: #2f2e2e">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Start List And Grid View -->
                    <ul class="pro__details__tab" role="tablist">
                        <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Thông Tin</a></li>
                        <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">Bình Luận</a></li>
                    </ul>
                    <!-- End List And Grid View -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="ht__pro__details__content">
                        <!-- Start Single Content -->
                        <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                            <div class="pro__tab__content__inner">
                                {!!$data->product_detail!!}
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                            <div class="pro__tab__content__inner">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="ht__product__dtl">
                                            <h2 class="show-rating">Đánh giá: 5 ⭐️<span>
                                            </span></h2>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="ht__product__dtl">
                                            <h2>Danh sách bình luận:</h2>
                                        </div>
                                        <br>
                                        <div class="comment-list">
                                            <div class="comment-add"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function submitForm() {
            var form = document.getElementById("contact-form");
            form.submit();
        }
    </script>
@endsection
