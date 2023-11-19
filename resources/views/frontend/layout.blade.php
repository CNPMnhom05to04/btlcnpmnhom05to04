<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tâm Trà - Tinh hoa trên từng búp trà - {{$data_seo->meta_title}}</title>
    <!---seo------->
    <meta name="description" content="{{$data_seo->meta_description}}">
    <meta name="keywords" content="{{$data_seo->meta_keyword}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{$data_seo->url_canonical}}">
    <meta content="" name="author"/>
    <!---seo fb------->
    <meta property="og:site_name" content="https://devlife.io.vn/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{$data_seo->url_canonical}}"/>
    <meta property="og:title" content="Tâm Trà - {{$data_seo->meta_title}}"/>
    <meta property="og:description" content="{{$data_seo->meta_description}}"/>
    <meta property="og:image" content="../storage/images_slide/3FlFdKtgWJ_logo.png"/>


    <link rel="shortcut icon" type="image/x-icon" href="../storage/images_slide/3FlFdKtgWJ_logo.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <base href="https://devlife.io.vn/">
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="../frontend_assets/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="../frontend_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../frontend_assets/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="../frontend_assets/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="../frontend_assets/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="../frontend_assets/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="../frontend_assets/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="../frontend_assets/css/custom.css">

    @yield('style')
    <!-- Modernizr JS -->
    <script src="../frontend_assets/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start Header Style -->
    @include('frontend.menu')
    <!-- End Header Area -->

    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    @include('frontend.offset')
    <!-- End Offset Wrapper -->

    @yield('content')

    <!-- Start Footer Area -->
    <footer id="htc__footer">
        <!-- Start Footer Widget -->
        <div class="footer__container bg__cat--1">
            <div class="container">
                <div class="row gx-5">
                    <div class="col">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer">
                                <div class="ft__details">
                                    <div class="row">
                                        <div class="col-sm-10 elementor-widget-image">
                                            <a class="main_logo_footer mb-1" href="https://devlife.io.vn/">
                                                <img style="max-width: 50%; margin-bottom: 5px" src="{{$dataLogoFooter->image}}" title="" alt="logo images"></a>
                                            <p style="text-align: justify; font-family: 'sans-serif', sans-serif; font-style: normal;font-weight: 400;" >
                                                Tâm Trà Thái Nguyên là một website chuyên kinh doanh các loại chè Tân Cương Thái Nguyên ngon, chính gốc 100%.
                                                Bên cạnh đó, tại đây bạn có thể tìm hiểu tất cả những thông tin về trà Tân Cương tại Blog của chúng tôi, hy vọng bạn sẽ tìm được sản phẩm ưng ý & những thông tin bổ ích, xin cảm ơn</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h6> Liên hệ </h6>
                                <ul class="ft__list">
                                    <li><a class="fa fa-location-arrow mr-1">Số 10, Trần Phú, Hà Đông, Hà Nội</a></li>
                                    <li><a class="fa fa-phone"> 0943206425</a></li>
                                    <li><a class="fa fa fa-envelope">  tamtra@gmail.com  </a></li>
                                    <li><a href="/blog/13-gioi-thieu-thuong-hieu.html" class="btn-footer">Thông tin</a></li>
                                    <li><a href="/contact" class="btn-footer"> Hợp tác</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h6>Loại sản phẩm</h6>
                                <ul class="ft__list">
                                    @foreach ($dataCategory->take(5) as $item)
                                        <li>
                                            <a href="/shop/category/{{$item->category_id}}-{{Str::slug($item->category_name, '-')}}.html">{{$item->category_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h6>Maps</h6>
                                <div class="map-contacts--2">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2926381717452!2d105.78486297494075!3d20.980903480656455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135accdd8a1ad71%3A0xa2f9b16036648187!2zSOG7jWMgdmnhu4duIEPDtG5nIG5naOG7hyBCxrB1IGNow61uaCB2aeG7hW4gdGjDtG5n!5e0!3m2!1svi!2s!4v1699585950181!5m2!1svi!2s" width="300" height="225" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
        <style>
            @keyframes pulse {
                from,
                to {
                    -webkit-transform: scale3d(1, 1, 1);
                    transform: scale3d(1, 1, 1);
                }
                50% {
                    -webkit-transform: scale3d(1.05, 1.05, 1.05);
                    transform: scale3d(1.05, 1.05, 1.05);
                }
            }

            @-webkit-keyframes zoomIn {
                from {
                    opacity: 0;
                    -webkit-transform: scale3d(0.3, 0.3, 0.3);
                    transform: scale3d(0.3, 0.3, 0.3);
                }
                50% {
                    opacity: 1;
                }
            }

            @keyframes zoomIn {
                from {
                    opacity: 0;
                    -webkit-transform: scale3d(0.3, 0.3, 0.3);
                    transform: scale3d(0.3, 0.3, 0.3);
                }
                50% {
                    opacity: 1;
                }
            }

            .cta-lptech {
                list-style: none;
                padding: 0;
                margin: 0;
                z-index: 999;
                position: fixed;
                bottom: 36px;
                left: 15px;
                width: 50px;
            }


            .main_logo_footer{
                width: 100px;
                height: 150px;
            }

            .cta-lptech li {
                width: 50px;
                float: left;
                margin-bottom: 10px;
            }

            .cta-lptech li a {
                height: 50px;
                line-height: 50px;
                background-color: #ff2a28;
                box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
            }

            .cta-lptech li a i {
                font-size: 27px;
                color: #fff;
                padding: 12px;
            }

            .cta-lptech li a,
            .cta-lptech li a img {
                width: 50px;
                border-radius: 100%;
            }

            .cta-lptech li,
            .cta-lptech li a {
                display: inline-block;
            }

            .cta-lptech li a.zalo {
                background-color: #0180c7;
            }

            .animated.infinite {
                -webkit-animation-iteration-count: infinite;
                animation-iteration-count: infinite;
            }

            .mypage-alo-ph-circle,
            .mypage-alo-phone:hover .mypage-alo-ph-circle {
                border-color: #ffd53b !important;
            }

            .mypage-alo-ph-circle-fill,
            .mypage-alo-ph-img-circle,
            .mypage-alo-phone:hover .mypage-alo-ph-circle-fill,
            .mypage-alo-phone:hover .mypage-alo-ph-img-circle {
                background-color: rgba(244, 68, 56, 0.5);
            }

            .mypage-alo-ph-circle-fill {
                width: 60px;
                height: 60px;
                top: 56px;
                left: -5px;
                position: absolute;
                -ms-transition: all 0.2s ease-in-out;
                border-radius: 100%;
                border: 2px solid transparent;
                -webkit-transition: all 0.5s;
                -moz-transition: all 0.5s;
                -o-transition: all 0.5s;
                transition: all 0.5s;
                opacity: 0.4 !important;
            }

            .animated {
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }

            .zoomIn {
                -webkit-animation-name: zoomIn;
                animation-name: zoomIn;
            }

            .mypage-alo-ph-circle {
                width: 80px;
                height: 80px;
                top: 45px;
                left: -16px;
                position: absolute;
                background-color: #774d4d00;
                border-radius: 100%;
                border: 2px solid rgba(30, 30, 30, 0.4);
                opacity: 0.1;
                opacity: 0.5;
            }
        </style>
        <ul class="cta-lptech">
            <li>
                <a href="https://www.facebook.com/profile.php?id=100004954485807" title="Nhắn ngay cho Tâm trà"
                   rel="noopener" class="zalo" aria-label="Nhắn ngay cho Tâm trà">
                    <img src="https://webkhoinghiep.net/wp-content/uploads/2022/06/widget_icon_messenger.svg"
                         alt="message"/>
                </a>

            </li>

            <li>
                <a aria-label="gọi điện thoại cho LPTech" href="{{ Auth::check() ? '/chat' : '/customer' }}"
                   title="{{Auth::check() ? 'Liên hệ với chúng tôi' : 'Vui lòng đăng nhập để liên hệ' }}" rel="noopener">
                    <img src="https://webkhoinghiep.net/wp-content/uploads/2020/12/call.png"
                         alt="gọi điện thoại cho chúng tôi"/>
                    <div class="animated infinite zoomIn mypage-alo-ph-circle"></div>
                    <div class="animated infinite pulse mypage-alo-ph-circle-fill"></div>
                </a>
            </li>
            <li>
                <a href="https://zalo.me/0943206425" title="Chat zalo cho Tâm trà" rel="noopener" class="zalo" aria-label="gọi zalo cho Tâm trà"><img src="https://webkhoinghiep.net/wp-content/uploads/2020/12/zalo.png" alt="zalo" /></a>
            </li>
        </ul>
        <script>
            var botmanWidget = {
                aboutText: 'Tâm trà xin chào quý khách',
                introMessage: "✋ Hi! Chào mừng bạn đến với chatbot tự động của Tâm trà ",
                customLauncherSelector: '.your-custom-launcher-element'
            };
        </script>
        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
        <!-- End Footer Widget -->
    </footer>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "110391036998379");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v18.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- End Footer Style -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="../frontend_assets/js/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="../frontend_assets/js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../frontend_assets/js/plugins.js"></script>
<script src="../frontend_assets/js/slick.min.js"></script>
<script src="../frontend_assets/js/owl.carousel.min.js"></script>
<!-- Waypoints.min.js. -->
<script src="../frontend_assets/js/waypoints.min.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="../frontend_assets/js/main.js"></script>
@include('sweetalert::alert')
@yield('script')
<script>
    $('#keyword').keyup(function () {
        var query = $(this).val();
        var _token = $('input[name=_token]').val();
        // alert(query)
        if (query != '') {
            $.ajax({
                url: 'get-data-search',
                method: 'POST',
                data: {
                    _token: _token,
                    query: query,
                },
                success: function (data) {
                    $('.ajax-search').fadeIn();
                    $('.ajax-search').html(data);

                    $('.choose').click(function () {

                        $('#keyword').val($(this).text())
                        $('.ajax-search').fadeOut();
                    })
                }
            })
        }
    })


    $('.cart__menu').click(function () {
        var output = '';
        $.ajax({
            type: "GET",
            url: 'get_data_cart',
            success: function (data) {
                var formatter = new Intl.NumberFormat('en-US', {
                    // style: 'currency',
                    currency: 'VND',
                });
                if (Array.isArray(data[0])) {
                    data[0].forEach(item => {
                        output += `<div class="shp__single__product tr-${item['cart_id']}">
                                <div class="shp__pro__thumb">
                                    <a href="#">
                                        <img src="${item['cart_image']}" alt="product images">
                                    </a>
                                </div>
                                <div class="shp__pro__details">
                                    <h2><a href="/shop/product/${item['cart_id']}">${item['cart_product']}</a></h2>
                                    <span class="quantity">QTY: ${item['cart_quantity']}</span>
                                    <span class="shp__price">${formatter.format(item['cart_price_sale']) + ' VNĐ'}</span>
                                </div>
                                <form>
                                @csrf
                        <div class="remove__btn">
                            <button type="button" class="button_del" data-id-delete-cart="${item['cart_id']}">
                                        <i class="zmdi zmdi-close"></i>
                                    </button>
                                </div>
                                </form>
                            </div>`
                    });
                } else {
                    output = data[0]
                }


                $('.total__price').text(data[1].toLocaleString('ja-JP') + '' + ' VNĐ');
                $('.shp__cart__wrap').html(output);

                //Handle delete product in cart offset
                $('.button_del').click(function () {
                    var id = $(this).data('id-delete-cart');
                    var _token = $('input[name=_token]').val();

                    $.ajax({
                        url: 'delete_cart_offset',
                        method: 'POST',
                        data: {
                            _token: _token,
                            cart_id: id,
                        },
                        success: function (dataDel) {
                            $('.tr-' + id).remove();
                            $('.total__price').text(dataDel[0].toLocaleString('ja-JP') + '' + ' VNĐ');
                        }
                    })
                })
            }
        });
    })
</script>
</body>

</html>
