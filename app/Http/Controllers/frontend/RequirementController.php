<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\RequirementRequest;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\RequirementModel;
use App\Models\Ship\ShipModel;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequirementController extends Controller
{
    use ImageUploadTrait;

    public function __construct(){
        $dataCategory = CategoryModel::all();
        $dataBrand = BrandModel::all();
        view()->share([
            'dataCategory' => $dataCategory,
            'dataBrand' => $dataBrand,
        ]);
    }

    public function getStadium(Request $request)
    {
        $category_id = $request->query('category_id');
        $brand_id = $request->query('brand_id');

        $stadiums = ProductModel::where('category_id', $category_id)
            ->where('brand_id', $brand_id)
            ->get();
        $stadiumData = [];
        foreach ($stadiums as $stadium) {
            $stadiumData[] = [
                'stadium_id' => $stadium->id,
                'stadium_name' => $stadium->name,
            ];
        }
        return response()->json($stadiumData);
    }

    public function send(Request $request)
    {
        $categories = CategoryModel::all();
        $locations = BrandModel::all();
        $stadiumNames = ProductModel::all();
        $times = ShipModel::all();
        $data = [
            'product_id' => $request->product_id,
            'type_id' => $request->type_id,
            'location_id' => $request->location_id,
        ];
        return view('frontend.pages.contact', compact('categories','locations', 'data','stadiumNames', 'times'));
    }

    public function storeOrderStadium(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $data = new OrderModel();
            $data->image_bank = $this->handleUploadImage($request, 'product_image', 'image_bank');
            $data->user_id = Auth::id();
            $data->category_id = $request->category_id;
            $data->brand_id = $request->brand_id;
            $data->note = $request->note;
            $data->time_id = $request->time_id;
            $data->type_bank = $request->type_bank;
            $data->image_bank = $request->image_bank ?? 'default';
            $data->name = $request->name ?? $user->user_name;
            $data->phone = $request->phone ?? $user->user_phone;
            $data->product_id = $request->product_id;
            $data->created_at = date('Y-m-d H:i:s');

            if ($data->save()) return redirect('/customer/order')->with('msgSuccess', 'Đặt sân thành công, vui lòng quý khách đợi trong giây lát sẽ có nhân viên liên hệ xác nhận lại');

            return redirect()->back()->with('msgError', 'Đặt sân thất bại');
        }
        return redirect('/customer')->with('msgError', 'Bạn cần phải đăng nhập trước');
    }
}
