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
                        <div class="col-md-3 col-sm-4 col-xs-12 col-lg-5">
                            <div class="slide">
                                <div class="fancy">
                                    <div class="football-ball">
                                        <img src="/frontend_assets/images/bong.png" alt="Football" class="football-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-xs-12 col-md-7">
                            <div class="slide__thumb">
                                <img src="{{$slide->image}}" alt="slider images">
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
    <section class="htc__category__area ptb--100" style="background-color: #222831">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">Match Day</h2>
                    </div>
                </div>
            </div>
            <div class="htc__product__container">
                <div class="d-flex team-vs" style="display: flex">
                <div class="team-1 w-50" style ="background: #f6d743; width: 50%; padding: 20px 0 20px 0 ">
                <div class="table-score">4</div>  
                <div class="team-details w-100 text-center">
                            <img src="/frontend_assets/images/MU.png" alt="Image" class="img-fluid" style="width: 20%">
                            <h3 style="font-size: 20px !important; font-weight: 600 !important;">Manchester United F.C<span>(win)</span></h3>
                            <ul class="list-unstyled">
                                <li>Anja Landry (7)</li>
                                <li>Eadie Salinas (12)</li>
                                <li>Ashton Allen (10)</li>
                                <li>Baxter Metcalfe (5)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="team-2 w-50" style ="background: #ee1e46; width: 50% ; padding: 20px 0 20px 0 ">
                    <div class="table-score">4</div> 
                    <div class="team-details w-100 text-center">
                            <img src="/frontend_assets/images/MC.svg" alt="Image" class="img-fluid" style="width: 20%">
                            <h3 style="font-size: 20px !important; font-weight: 600 !important;">Manchester City F.C <span>(loss)</span></h3>
                            <ul class="list-unstyled">
                                <li>Macauly Green (3)</li>
                                <li>Arham Stark (8)</li>
                                <li>Stephan Murillo (9)</li>
                                <li>Ned Ritter (5)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    @if ($dataBanner != null)
    <section class="ftr__product__area ptb--50">
        <div class="container-fluid">
            <center>
                <a href="{{$dataBanner->target}}"><img style="max-width: 100%" src="{{$dataBanner->image}}" alt="{{$dataBanner->title}}"></a>
            </center>
        </div>
    </section>
    @endif
    @if(count($sanTX) >0)
    <section class="ftr__product__area ptb--100 san7 mt-4">
        <div class="container">
                <main class="container-title" style="border-radius: 20px; display: flex;
    justify-content: center;     margin: 0 250px 0 250px;     background: #646362;
    padding: 10px 0 10px 0;">
                    <p style=" font-size: 34px; font-weight: 900; color: #eeeeee ;text-shadow: 0 0 7px rgba(255,255,255,.3), 0 0 3px rgba(255,255,255,.3);   ;  display: flex;
    align-items: center;">Đặt sân 7 ngay 👇</p>
                    <section class="animation" style="padding-top: 21px">
                        <div class="first"><div>Nhanh Chóng</div></div>
                        <div class="second" style="padding-top: 10px;"><div>Tiện Lợi</div></div>
                        <div class="third" style="padding-top: 5px;"><div>Chính Xác</div></div>
                    </section>
                </main>
            <h2 style="display: flex; justify-content: center;     text-shadow: 0 0 7px rgba(255,255,255,.3), 0 0 3px rgba(255,255,255,.3);     color: #91ff11;
    background: #646362;
    margin: 0 350px 0 350px;
    border-radius: 20px;
    margin-top: 10px;
    font-size: 40px;">Thanh Xuân</h2>
            @foreach ($sanTX as $item)
                <div class="product__list clearfix">
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-6" style="height: 390px">
                        @include('frontend.libs.product')
                        </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    @endif

    @if(count($sanHD) >0)
    <section class="ftr__product__area ptb--100 san71 mt-4">
        <div class="container">
                <main class="container-title" style="border-radius: 20px; display: flex;
    justify-content: center;     margin: 0 250px 0 250px;     background: #646362;
    padding: 10px 0 10px 0;">
                    <p style=" font-size: 34px; font-weight: 900; color: #eeeeee ;text-shadow: 0 0 7px rgba(255,255,255,.3), 0 0 3px rgba(255,255,255,.3);   ;  display: flex;
    align-items: center;">Đặt sân 7 ngay 👇</p>
                    <section class="animation" style="padding-top: 21px">
                        <div class="first"><div>Nhanh Chóng</div></div>
                        <div class="second" style="padding-top: 10px;"><div>Tiện Lợi</div></div>
                        <div class="third" style="padding-top: 5px;"><div>Chính Xác</div></div>
                    </section>
                </main>
            <h2 style="display: flex; justify-content: center;     text-shadow: 0 0 7px rgba(255,255,255,.3), 0 0 3px rgba(255,255,255,.3);     color: #91ff11;
    background: #646362;
    margin: 0 350px 0 350px;
    border-radius: 20px;
    margin-top: 10px;
    font-size: 40px;">Hà Đông</h2>
            @foreach ($sanHD as $item)
                <div class="product__list clearfix">
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-6" style="height: 390px">
                        @include('frontend.libs.product')
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </section>
    @endif

    @if(count($sanDD) >0)
    <section class="ftr__product__area ptb--100 san72 mt-4">
        <div class="container">
                <main class="container-title" style="border-radius: 20px; display: flex;
    justify-content: center;     margin: 0 250px 0 250px;     background: #646362;
    padding: 10px 0 10px 0;">
                    <p style=" font-size: 34px; font-weight: 900; color: #eeeeee ;text-shadow: 0 0 7px rgba(255,255,255,.3), 0 0 3px rgba(255,255,255,.3);   ;  display: flex;
    align-items: center;">Đặt sân 7 ngay 👇</p>
                    <section class="animation" style="padding-top: 21px">
                        <div class="first"><div>Nhanh Chóng</div></div>
                        <div class="second" style="padding-top: 10px;"><div>Tiện Lợi</div></div>
                        <div class="third" style="padding-top: 5px;"><div>Chính Xác</div></div>
                    </section>
                </main>
            <h2 style="display: flex; justify-content: center;     text-shadow: 0 0 7px rgba(255,255,255,.3), 0 0 3px rgba(255,255,255,.3);     color: #91ff11;
    background: #646362;
    margin: 0 350px 0 350px;
    border-radius: 20px;
    margin-top: 10px;
    font-size: 40px;">Đống Đa</h2>
                @foreach ($sanDD as $item)
                <div class="product__list clearfix">
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-6" style="height: 390px">
                        @include('frontend.libs.product')
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </section>
    @endif
@endsection

@section('script')
@endsection
