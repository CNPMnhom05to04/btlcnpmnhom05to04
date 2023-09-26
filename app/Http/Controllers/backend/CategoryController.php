<?php

namespace App\Http\Controllers\backend;

use App\Enums\Constant;
use App\Exports\CateExport;
use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categorys\CategoryRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{

    public function __construct()
    {
        $active = "active";
        view()->share('activeCategory', $active);
    }

    //Hiển thị danh sách category
    public function index()
    {
        $data = CategoryModel::orderBy('category_id', 'DESC')->paginate(Constant::PER_PAGE);

        return view('backend.categorys.list', ['data' => $data]);
    }


    //Hiển thị form thêm mới category
    public function create()
    {
        return view('backend.categorys.add');
    }

    public function store(CategoryRequest $request)
    {
        $data = new CategoryModel();

        $data->category_name = $request->category_name;
        $data->category_keyword = $request->category_keyword;
        $data->category_description = $request->category_description;

        if ($data->save()) {
            return redirect('admin/categorys/create')->with('msgSuccess', 'Thêm Loại Sản Phẩm Thành Công');
        } else {
            return redirect('admin/categorys/create')->with('msgError', 'Thêm Loại Sản Phẩm Thất Bại');
        }

    }

    //Hiển thị form sửa category
    public function edit($id)
    {
        $data = CategoryModel::find($id);

        return view('backend.categorys.update', ['data' => $data]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = CategoryModel::find($id);

        $data->category_name = $request->category_name;
        $data->category_keyword = $request->category_keyword;
        $data->category_description = $request->category_description;

        if ($data->save()) {
            return redirect()->route('category.index')->with('msgSuccess', 'Cập Nhật Loại Sản Phẩm Thành Công');
        } else {
            return redirect()->back()->with('msgSuccess', 'Cập Nhật Loại Sản Phẩm Thất Bại');
        }
    }

    public function delete_more(Request $request): JsonResponse
    {
        $ids = (array)$request->input('ids');
        $error = false;
        $message_error = '';

        foreach ($ids as $id) {
            if (!DB::table('categorys')
                ->where('category_id', $id)
                ->first()) {
                if (!$error) {
                    $message_error = "$id";
                    $error = true;
                    continue;
                }
                $message_error .= ", $id";
            }
        }
        if ($error && $message_error) {
            return response()->json(['msgError' => 'Xóa Loại sản phẩm thất bại']);

        }
        if ($ids) {
            DB::table('categorys')
                ->whereIn('category_id', $ids)
                ->delete();
        }
        return response()->json(['msgSuccess' => 'Xóa Loại sản phẩm thành công']);
    }

    // filter
    public function filter(Request $request){
        $filter = $request->input('selectedValue');
        $data = (new \App\Helpers\CommonHelper)->get_data_filter($filter);
        return view('backend.categorys.list', ['data' => $data]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new CateExport, 'cate.xlsx');
    }
}
