@extends('frontend.layout')

@section('content')
    <!-- Start Product Grid -->
    <section class="htc__product__grid bg__white ptb--100">

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div class="single-grid-view tab-pane fade in active clearfix" id="show-filter">
                                    @foreach ($data as $item)
                                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6" style="height: 390px">
                                            @include('frontend.libs.product')
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="htc__pagenation">
                                {{$data->render()}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="htc__product__leftsidebar">
                        <div class="htc__category">
                            <h4 class="title__line--4">Loại Sân</h4>
                            <ul class="ht__cat__list">
                                @foreach ($dataCategory as $item)
                                <li><a href="/shop/category/{{$item->category_id}}">{{$item->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="htc__category">
                            <h4 class="title__line--4">Khu vực - địa chỉ</h4>
                            <ul class="ht__cat__list">
                                @foreach ($dataBrand as $item)
                                <li><a href="/shop/brand/{{$item->brand_id}}">{{$item->brand_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
