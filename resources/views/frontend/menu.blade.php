<header id="htc__header" class="htc__header__area header--one">
    <div class="top-container d-md-none">
        <div class="container text-right" style="font-family: sans-serif;">
            <div class="row row-cols-1 row-cols-md-2 g-2 g-md-3">
                <!-- First Column -->
                <div class="col">
                    <div style="float: left; padding: 12px;">
                        <div class="col-auto">
                            <a href="/blog/15-chung-nhan-attp.html" target="_blank" class="pr-md-3 border-right" style="border-right: 1px solid #000; padding-right: 10px;">Chứng nhận ATTP</a>
                            <a href="/blog/14-hinh-thuc-thanh-toan.html" target="_blank" class="pr-md-3 border-right" style="border-right: 1px solid #000; padding-right: 10px;">Hình thức thanh toán</a>
                            <a href="#" target="_blank" class="d-none d-md-inline">Hướng dẫn mua hàng</a>
                        </div>
                    </div>
                </div>
                <!-- Second Column -->
                <div class="col">
                    <div>
                        <ul style="margin-top:9px; margin-bottom: 5px; display: inline-flex;">
                            <li>
                                <a href="{{ Auth::check() ? '/chat' : '#' }}"
                                   class="btn-primary btn-feedback sos-chat text-button-call{{ Auth::check() ? '' : ' disabled-link' }}"
                                   style="text-decoration: none;"
                                   @if (!Auth::check()) onclick="showLoginAlert(); return false;" @endif
                                   target="_blank">
                                    <img src="https://giaohangtietkiem.vn/wp-content/themes/giaohangtk/images/headers/icon_sos.png" style="height: 20px">&nbsp;&nbsp;
                                    Cần hỗ trợ? <b>CHAT NGAY!</b>
                                </a>
                            </li>
                            <li>
                                <a href="tel:0943206425" class="btn-primary btn-feedback sos-chat text-button-call" style="text-decoration: none; font-weight: bold;" target="_blank">
                                    <img src="https://giaohangtietkiem.vn/wp-content/uploads/2022/05/imgpsh_fullsize_anim-2.png" style="height: 18px">&nbsp;
                                    <b class="hidden-hotline">Hotline</b> <b>0943206425</b>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header" style="background-color: #2b8d06; width: 100%; height: 100px">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                        <div class="logo">
                            <a class="main_logo" href="https://devlife.io.vn/"><img src="{{$dataLogo->image}}" title="Trà Tân Cương Thái Nguyên Chính Gốc 100%" alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="https://devlife.io.vn/">Trang Chủ</a></li>
                                <li class="drop"><a href="https://devlife.io.vn/shop">Cửa Hàng</a>
                                    <ul class="dropdown mega_dropdown">
                                        <!-- Start Single Mega MEnu -->
                                        <li><a class="mega__title" href="/shop">Khối Lượng</a>
                                            <ul class="mega__item">
                                                @foreach ($dataBrand as $item)
                                                    <li>
                                                        <a href="/shop/brand/{{$item->brand_id}}-{{Str::slug($item->brand_name, '-')}}.html">{{$item->brand_name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                        <!-- Start Single Mega MEnu -->
                                        <li><a class="mega__title" href="/shop">Loại Sản Phẩm</a>
                                            <ul class="mega__item">
                                                @foreach ($dataCategory as $item)
                                                    <li>
                                                        <a href="/shop/category/{{$item->category_id}}-{{Str::slug($item->category_name, '-')}}.html">{{$item->category_name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                    </ul>
                                </li>
                                <li class="drop"><a href="/blog">Bài Viết</a></li>
                                <li><a href="/contact">Liên Hệ</a></li>
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li class="drop"><a href="https://devlife.io.vn/">Trang Chủ</a></li>
                                    <li class="drop"><a href="https://devlife.io.vn/shop">Của Hàng</a>
                                    </li>
                                    <li class="drop"><a href="/blog">Bài Viết</a></li>
                                    <li><a href="/contact">Liên Hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            <div class="header__search search search__open">
                                <a href=""><i class="icon-magnifier icons" style="color: #ffffff"></i></a>
                            </div>
                            <div class="header__account">
                                <a href="/customer"><i class="icon-user icons" style="color: #ffffff"></i></a>
                            </div>
                            <div class="htc__shopping__cart">
                                {{-- <button class="cart__menu" type="button"><i class="icon-handbag icons"></button> --}}
                                <a class="cart__menu" href="javascript:;"><i class="icon-handbag icons" style="color: #ffffff"></i></a>
                                {{-- <a href="#"> --}}

                                {{-- <span class="htc__qua">{{$countCart}}</span> --}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>

<script>
    function showLoginAlert() {
        Swal.fire({
            icon: 'warning',
            title: 'Thông báo',
            text: 'Bạn cần đăng nhập để sử dụng chức năng này.',
            showCancelButton: false,
            confirmButtonText: 'Đóng',
        });
    }
</script>
