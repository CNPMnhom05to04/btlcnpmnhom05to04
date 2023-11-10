<div class="container" style="max-width: 700px;margin: 0 auto; border: 1px solid #2b8d06;">
    <div class="header" style="background-color: #2b8d06; color: #fff; padding: 15px;">
        <h3 style="font-size: 20px; text-align: center">ĐẶT HÀNG THÀNH CÔNG TẠI - TÂM TRÀ</h3>
        <h4>Xin Chào {{$data['user_name'}}</h4>
        <p>Cảm ơn bạn đã đặt hàng ở TÂM TRÀ</p>
    </div>

    <div class="box-infor" style="margin: 0 20px;">
        <h3>Thông tin khách hàng</h3>
        <h4>{{$orderShipping}}
        </h4>
        <h3>Thông tin đơn hàng</h3>
        <p>Mã đơn hàng: #{{$order->order_id}}</p>
        <p>Ngày đặt: {{date('d/m/Y',strtotime($order->created_at))}}</p>
        <p>Mã mã khuyến mãi: @if ($coupon)
                                {{$coupon['coupon_value']}}
                            @else
                            0
                            @endif
        </p>
        <p>Phí vận chuyển: {{number_format($ship)}}</p>
    </div>
    <div class="box-content" style="margin: 0 20px;">
        <table style="border-collapse: collapse; border: 1px solid #2b8d06 ;width: 100%;">
            <tr style="border: 1px solid #2b8d06">
                <th style="border: 1px solid #2b8d06">Tên sản phẩm</th>
                <th style="border: 1px solid #2b8d06">Số lượng sản phẩm</th>
                <th style="border: 1px solid #2b8d06">Giá sản phẩm</th>
            </tr>
            @foreach ($orderdetail as $item)
            <tr style="border: 1px solid #2b8d06; text-align: center;">
                <td style="border: 1px solid #2b8d06">{{$item['cart_product']}}</td>
                <td style="border: 1px solid #2b8d06">{{$item['cart_quantity']}}</td>
                <td style="border: 1px solid #2b8d06">{{number_format($item['cart_price_sale'])}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>
    <b style="margin: 0 20px;">Tống {{number_format($order->order_total)}}</b>
    <br>
    <br>
    <div class="footer" style="font-size: 15px; text-align: center; background-color: #2b8d06; color: #fff; padding: 10px;">
        <p>Đây là tin nhắn tự động từ TÂM TRÀ - Vui lòng không trả lời tin nhắn này</p>
        <p>Mọi thắc mắc về đơn hàng hãy liên hệ đến TÂM TRÀ ở phần liên hệ</p>
        <p>TÂM TRÀ Xin Cảm Ơn Quý Khách Hàng</p>
    </div>
</div>
