<?php

namespace App\Http\Controllers\backend;

use App\Enums\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brands\BrandRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use mysql_xdevapi\Exception;

class BrandController extends Controller
{

    public function __construct(){
        $active = "active";
        view()->share('activeBrand', $active);
    }

    public function index()
    {
        $data = BrandModel::orderBy('brand_id', 'DESC')->paginate(Constant::PER_PAGE);

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
            return redirect('admin/brands')->with('msgSuccess', 'Thêm chất lượng trà Thành Công');
        }
        else{
            return redirect('admin/brands/create')->with('msgSuccess', 'Thêm chất lượng trà Thất Bại');
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
            return redirect('admin/brands')->with('msgSuccess', 'Cập nhật chất lượng trà Thành Công');
        }
        else{
            return redirect()->back()->with('msgSuccess', 'Cập nhật chất lượng trà Thất Bại');
        }
    }

    public function delete($id)
    {
        $data = BrandModel::find($id);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa chất lượng trà thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa chất lượng trà thất bại']);
        }
    }
}
