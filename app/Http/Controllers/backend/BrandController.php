<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brands\BrandRequest;
use Illuminate\Http\Request;
use App\Models\BrandModel;

class BrandController extends Controller
{

    public function __construct(){
        $active = "active";
        view()->share('activeBrand', $active);
    }

    public function index()
    {
        $data = BrandModel::orderBy('brand_id', 'DESC')->paginate(5);

        return view('backend.brands.list', ['data' => $data]);
    }

    public function create()
    {
        return view('backend.brands.add');
    }

    public function store(BrandRequest $request)
    {
        $data = new BrandModel();

        $data->brand_name = $request->brand_name;
        $data->brand_keyword = $request->brand_keyword;
        $data->brand_description = $request->brand_description;

        if($data->save()){
            return redirect('admin/brands/create')->with('msgSuccess', 'Thêm khu vực - địa chỉ Thành Công');
        }
        else{
            return redirect('admin/brands/create')->with('msgSuccess', 'Thêm khu vực - địa chỉ Thất Bại');
        }
    }

    public function edit($id)
    {
        //
        $data = BrandModel::find($id);

        return view('backend.brands.update', ['data' => $data]);
    }

    public function update(BrandRequest $request, $id)
    {
        $data = BrandModel::find($id);

        $data->brand_name = $request->brand_name;
        $data->brand_keyword = $request->brand_keyword;
        $data->brand_description = $request->brand_description;

        if($data->save()){
            return redirect()->back()->with('msgSuccess', 'Cập Nhật Khu Vực - Địa Điểm Thành Công');
        }
        else{
            return redirect()->back()->with('msgSuccess', 'Cập Nhật Khu Vực - Địa Điểm Thất Bại');
        }
    }

    public function destroy($id)
    {
        $data = BrandModel::find($id);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa không gian decor thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa không gian decor thất bại']);
        }
    }
}
