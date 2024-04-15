<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Helpers\OrderStatus;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
use App\Models\UserModel;
use App\Models\OrderstatusModel;
use App\Models\ProductModel;
use App\Models\Ship\CityModel;

class OrderController extends Controller
{
    public function __construct(){
        $active = "active";
        view()->share('activeOrder', $active);
    }

    //Danh sách hóa đơn
    public function index(){
        $data = OrderModel::from('orders as o')
        ->leftjoin('brands as b', 'b.brand_id', '=', 'o.brand_id')
        ->leftjoin('categorys as c', 'c.category_id', '=', 'o.category_id')
        ->leftjoin('times as t', 't.time_id', '=', 'o.time_id')
        ->leftjoin('products as p', 'p.product_id', '=', 'o.product_id')
        ->orderBy('o.created_at', 'DESC')
        ->paginate(10);

        return view('backend.orders.list', ['data' => $data]);
    }

    //Xóa hóa đơn
    public function destroy($id){
        $data = OrderModel::find($id);
        $dataOrderdetail = OrderdetailModel::where('order_id', $id)->get();
        foreach($dataOrderdetail as $item){
            $item->delete();
        }
        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa hóa đơn thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa sản đơn thất bại']);
        }
    }
}
