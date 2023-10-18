<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_assets/assets/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="/vnpay_assets/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_assets/assets/jquery-1.11.3.min.js"></script>
</head>

<body>
<div class="container">
    @if($order_pay_type == 2)
        <div class="header clearfix d-flex justify-content-between align-items-center vh-100">
            <h3 class="text-muted">Thanh toán VNPay</h3>
        </div>
    @else
        <div class="header clearfix">
            <h3 class="text-muted">Thanh toán Momo</h3>
        </div>
    @endif
    @if($order_pay_type == 2 || $order_pay_type == 3)
        <form action="{{ $order_pay_type == 2 ? '/payment/online' : '/payment/momo' }}" id="create_form" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div
                        class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <address>
                                    <strong>Tâm Trà Thái Nguyên</strong>
                                    <br>
                                    2135 Sunset Blvd
                                    <br>
                                    Los Angeles, CA 90026
                                    <br>
                                    <abbr title="Phone">P:</abbr> (213) 484-6829
                                </address>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>
                                    <em>Date: 1st November, 2013</em>
                                </p>
                                <p>
                                    <em>Receipt #: 34522677W</em>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <h1 style="font-size: 26px; font-style: 600px">Hoá đơn mua hàng</h1>
                            </div>
                            </span>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Tổng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $cart as $item)
                                    <tr>
                                        <td class="col-md-9"><em>{{$item['cart_product']}}</em></h4></td>
                                        <td class="col-md-1"
                                            style="text-align: center">{{$item['cart_quantity']}}</td>
                                        <td class="col-md-1 text-center">{{number_format($item['cart_price_sale'])}}</td>
                                        <td class="col-md-1 text-center">{{number_format($cart_total)}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        <p>
                                            <strong>Phí vận chuyển</strong>
                                        </p>
                                    </td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td class="text-center">
                                        <p>
                                            <strong id="shipping">{{number_format(10000)}}</strong>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right ml-4"><h4><strong>Tổng tiền:</strong></h4></td>
                                    <td>  </td>
                                    <td>  </td>
                                    <td class="text-danger"><h4>
                                            <input class="form-control" id="amount"
                                                   name="amount" type="hidden" value="{{$order_total}}"/>
                                            <strong>{{number_format($order_total)}} VNĐ</strong></h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </td>
                        </div>
                        <div>
                            <label for="language">Ngôn ngữ</label>
                            <select name="language" id="language">
                                <option value="vn">Tiếng Việt</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
                <button type="submit" class="btn btn-primary pull-right" id="btnPopup">Xác nhận thanh toán</button>
                <button type="button" class="btn btn-default pull-right \" onclick="history.back()">Quay lại</button>
        </form>
    @endif
</div>
</body>
</html>
