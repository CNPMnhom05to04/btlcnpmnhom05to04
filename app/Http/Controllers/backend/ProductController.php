<?php

namespace App\Http\Controllers\backend;

use App\Models\BrandModel;
use App\Models\ImageModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Products\ProductRequest;
use App\Http\Requests\Admin\Products\ProductUpdateRequest;

class ProductController extends Controller
{
    use ImageUploadTrait;

    private $model;

    /**
     * @return string
     */
    public function model(): string
    {
        return ProductModel::class;
    }

    public function __construct()
    {
        $active = "active";
        view()->share('activeProduct', $active);
    }

    public function index(Request $request)
    {
        $search = strtolower(trim($request->input('search', null)));
        $data = ProductModel::when($search, function ($query) use ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%');
        })
            ->orderBy('product_id', 'DESC');
        if ($request->has('export')) {
            $data = $data->get();
        } else {
            $data = $data->paginate(6);
        }
        return view('backend.products.list', ['search' => $search, 'data' => $data]);
    }

    public function create()
    {
        $dataCategory = CategoryModel::all();
        $dataBrand = BrandModel::all();

        return view('backend.products.add', ['dataCategory' => $dataCategory, 'dataBrand' => $dataBrand]);
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = ProductModel::create([
                'product_image' => $this->handleUploadImage($request, 'product_image', 'images_product'),
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'product_price_buy' => $request->product_price_buy,
                'product_price_sell' => $request->product_price_sell,
                'product_amount' => $request->product_amount,
                'product_sale' => $request->product_sale,
                'product_attribute' => $request->product_attribute,
                'product_detail' => $request->product_detail,
                'product_keyword' => $request->product_keyword,
                'product_description' => $request->product_description,
            ]);

            $id_product_insert = $data->product_id;

            $dataPath = $this->handleUploadImageProduct($request, 'product_list_image', 'images_product');
            if ($dataPath != null) {
                foreach ($dataPath as $key => $path) {
                    ImageModel::create([
                        'image_name' => $path,
                        'product_id' => $id_product_insert,
                    ]);
                }
            }
            DB::commit();
            return redirect('admin/products/create')->with('msgSuccess', 'Thêm sản phẩm thành công');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/products/create')->with('msgError', 'Lỗi khi thêm sản phẩm: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $data = ProductModel::find($id);
        $dataImage = ImageModel::where('product_id', $id)->get();

        return view('backend.products.show', ['data' => $data, 'images' => $dataImage]);
    }

    public function edit($id)
    {
        $dataCategory = CategoryModel::all();
        $dataBrand = BrandModel::all();
        $data = ProductModel::find($id);
        $dataImage = ImageModel::where('product_id', $id)->get();

        return view('backend.products.update', ['data' => $data, 'dataCategory' => $dataCategory, 'dataBrand' => $dataBrand, 'dataImage' => $dataImage]);

    }

    public function update(ProductUpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = ProductModel::find($id);

            $dataPathImage = $this->handleUploadImage($request, 'product_image', 'images_product');

            if ($dataPathImage != null) {
                $image_path = public_path() . '/' . $data->product_image;

                if (file_exists(public_path('/' . $data->product_image))) unlink($image_path);

                $data->product_image = $dataPathImage;
            }

            $data->product_name = $request->product_name;
            $data->category_id = $request->category_id;
            $data->brand_id = $request->brand_id;
            $data->product_price_buy = $request->product_price_buy;
            $data->product_price_sell = $request->product_price_sell;
            $data->product_amount = $request->product_amount;
            $data->product_sale = $request->product_sale;
            $data->product_attribute = $request->product_attribute;
            $data->product_detail = $request->product_detail;
            $data->product_keyword = $request->product_keyword;
            $data->product_description = $request->product_description;

            $data->save();

            $dataPath = $this->handleUploadImageProduct($request, 'product_list_image', 'images_product');
            if ($dataPath != null) {
                $dataImgs = ImageModel::where('product_id', $id)->get();

                foreach ($dataImgs as $image) {
                    $image_path = public_path() . '/' . $image->image_name;
                    if (file_exists(public_path('/' . $image->image_name))) unlink($image_path);
                    $image->delete();
                }
                foreach ($dataPath as $key => $path) {
                    $dataImages = new ImageModel();

                    $dataImages->image_name = $path;
                    $dataImages->product_id = $id;
                    $dataImages->save();
                }
            }
            DB::commit();
            return redirect()->route('product.index')->with('msgSuccess', 'Sửa sản phẩm thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('msgSuccess', 'Sửa sản phẩm thất bại');
        }
    }

    public function delete_more(Request $request): JsonResponse
    {
        $ids = (array)$request->input('ids');
        $error = false;
        $message_error = '';

        DB::beginTransaction();
        foreach ($ids as $id) {
            if (!DB::table('products')
                    ->where('product_id', $id)
                ->first()) {
                if (!$error) {
                    $message_error = "$id";
                    $error = true;
                    continue;
                }
                $message_error .= ", $id";
            }
            $data = ProductModel::find($id);
            if (file_exists(public_path('/' . $data->product_image))) unlink(public_path() . '/' . $data->product_image);
            $dataImages = ImageModel::where('product_id', $id)->get();

        }
        if ($error && $message_error) {
            DB::rollBack();
            return response()->json(['msgError' => 'Xóa sản phẩm thất bại']);

        }
        if ($ids) {
            DB::table('products')
                ->whereIn('product_id', $ids)
                ->delete();
        }
        foreach ($dataImages as $image) {
            $dataImage = ImageModel::find($image->image_id);
            if (file_exists(public_path('/' . $dataImage->image_name))) unlink(public_path() . '/' . $dataImage->image_name);
            $dataImage->delete();
        }
        DB::commit();
        return response()->json(['msgSuccess' => 'Xóa sản phẩm thành công']);
    }

    public function destroy($id)
    {
        $data = ProductModel::find($id);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa sản phẩm thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa sản phẩm thất bại']);
        }
    }
}
