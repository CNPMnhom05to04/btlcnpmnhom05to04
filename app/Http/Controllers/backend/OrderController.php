<?php

namespace App\Http\Controllers\backend;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Helpers\OrderStatus;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\GhtkController;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
use App\Models\UserModel;
use App\Models\OrderstatusModel;
use App\Models\ProductModel;
use App\Models\Ship\CityModel;
use Session;

class OrderController extends Controller
{
    private $cart;

    public function __construct()
    {
        $active = "active";
        view()->share('activeOrder', $active);
        $this->middleware(function ($request, $next) {
            $this->cart = Session::get('cart');
            return $next($request);
        });
    }

    //Danh sách hóa đơn
    public function index()
    {
        $data = OrderModel::orderBy('order_id', 'DESC')->paginate(10);

        return view('backend.orders.list', ['data' => $data]);
    }

    //Xem hóa đơn chi tiết
    public function show($id)
    {
        $dataOrder = OrderModel::find($id);
        $dataOrderdetail = OrderdetailModel::where('order_id', $id)->get();
        return view('backend.orders.show', [
            'dataOrder' => $dataOrder,
            'dataOrderdetail' => $dataOrderdetail,
        ]);
    }

    //Cập nhật trạng thái
    public function update(Request $request, $id)
    {
        $data = OrderModel::find($id);

        $data->order_status = $request->order_status;
        $form_order = $this->formShippingOrder($id);
        $ghtkController = new GhtkController();
        if($request->order_status == 2) {
            $status = $ghtkController->syncOrder($form_order);
            if (!$status['success']){
                return redirect("admin/orders")->with('msgError', 'Thay đổi trạng thái không thành công' . $status['message']);
            }
            $data->save();
        }
        return redirect("admin/orders")->with('msgSuccess', 'Thay đổi trạng thái đơn hàng thành công');
    }

    //Xóa hóa đơn
    public function destroy($id)
    {
        $data = OrderModel::find($id);
        $dataOrderdetail = OrderdetailModel::where('order_id', $id)->get();
        foreach ($dataOrderdetail as $item) {
            $item->delete();
        }
        if ($data->delete()) {
            return response()->json(['msgSuccess' => 'Xóa hóa đơn thành công']);
        } else {
            return response()->json(['msgError' => 'Xóa sản đơn thất bại']);
        }
    }

    public function formShippingOrder($param)
    {
        try {
            $products = [];
            $carts = OrderdetailModel::select(
                'order_detail_id', 'order_id', 'product_id', 'weight_product', 'order_detail_quantity')
                ->where('order_id', $param)->get();
            if ($carts && count($carts) > 0) {
                foreach ($carts as $key => $cartItem) {
                    $product = [
                        "name" => $cartItem->product->product_name,
                        "weight" => number_format(CommonHelper::get_data_weight($cartItem->weight_product), 1),
                        "quantity" => $cartItem->order_detail_quantity,
                        "product_code" => "2023tamtra" .$cartItem->product_id
                    ];

                    $products[] = $product;
                }
            }
            $ghtkController = new GhtkController();
            $information_client = new \stdClass();
            $information_client->order = OrderModel::select(
                'order_id', 'order_shipping', 'order_pay_type', 'order_profit', 'order_total')
                ->where('order_id', $param)->first();
            $information_client->order_detail = $carts;
            $address_seller = $ghtkController->getAddressPickUp();
            $fullAddress = $information_client->order->order_shipping;
            $addressParts = explode(' - ', $fullAddress);

            $address = explode(',', $addressParts[3]);

            $payload = [
                "order" => [
                    "id" => "2023tamtra" . $information_client->order->order_id,
                    "pick_name" => "Tâm Trà",
                    "pick_address_id" => $address_seller['data'][0]['pick_address_id'],
                    "pick_address" => $address_seller['data'][0]['address'],
                    "pick_province" => "TP. Hồ Chí Minh",
                    "pick_district" => "Quận Tân Bình",
                    "pick_ward" => "Phường 1",
                    "pick_tel" => "0911222333",
                    "tel" => "0911222123",

                    "name" => "GHTK - HCM - Noi Thanh",
                    "address" => str_replace("Địa chỉ:", "", $addressParts[3]),
                    "province" => $addressParts[5],
                    "district" => $addressParts[4],
                    "ward" => $address[2],
                    "street" => $address[1],
                    "hamlet" => "Khác",

                    "is_freeship" => "1",
                    "pick_money" => $information_client->order->order_total,
                    "value" => $information_client->order->order_total,
                    "pick_option" => "cod",
                    "tags" => [7]
                ],
                "products" => $products
            ];
            return $payload;
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e
            ];
        }
    }
}
