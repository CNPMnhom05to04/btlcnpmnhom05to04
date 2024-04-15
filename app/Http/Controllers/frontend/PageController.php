<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Helpers\SeoHelper;
use App\Models\Ship\ShipModel;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ImageModel;
use App\Models\CommentModel;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
use App\Models\PostModel;
use App\Models\SlideModel;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;

class PageController extends Controller
{
    //
    public function __construct(){
        $priceMax = ProductModel::max('product_price_sell');
        $priceMin = ProductModel::min('product_price_sell');
        $dataCategory = CategoryModel::all();
        $dataBrand = BrandModel::all();
        view()->share([
            'dataCategory' => $dataCategory,
            'dataBrand' => $dataBrand,
            'priceMax' => $priceMax,
            'priceMin' => $priceMin,
            'priceMinFilter' => $priceMin+2000000,
        ]);
    }

    public function index(){
        $sanHD = ProductModel::from('products as p')
            ->join('categorys as c','c.category_id', '=', 'p.category_id')
            ->join('brands as b','b.brand_id', '=', 'p.brand_id')
            ->where('c.category_id',2)
            ->where('b.brand_keyword', '=', 'Hà Đông')
            ->orderBy('p.product_id', 'DESC')->limit(6)->get();

        $sanTX = ProductModel::from('products as p')
            ->join('categorys as c','c.category_id', '=', 'p.category_id')
            ->join('brands as b','b.brand_id', '=', 'p.brand_id')
            ->where('c.category_id',2)
            ->where('b.brand_keyword', '=', 'Thanh Xuân')
            ->orderBy('p.product_id', 'DESC')->limit(6)->get();

        $sanDD = ProductModel::from('products as p')
            ->join('categorys as c','c.category_id', '=', 'p.category_id')
            ->join('brands as b','b.brand_id', '=', 'p.brand_id')
            ->where('c.category_id',2)
            ->where('b.brand_keyword', '=', 'Đống Đa')
            ->orderBy('p.product_id', 'DESC')->limit(6)->get();

        $locations = BrandModel::select('brand_id','brand_name')->get();
        $dataComment = CommentModel::where('comment_status', 3)->limit(4)->get();
        $dataSilde = SlideModel::where('active', 1)->where('type', 1)->orderBy('id', 'DESC')->limit(4)->get();
        $dataBanner = SlideModel::where('active', 1)->where('type', 2)->orderBy('id', 'DESC')->first();
        return view('frontend.pages.home',[
            'sanHD' => $sanHD,
            'sanTX' => $sanTX,
            'sanDD' => $sanDD,
            'dataComment' => $dataComment,
            'dataSilde' => $dataSilde,
            'dataBanner' => $dataBanner,
            'locations' => $locations,
       ]);
    }

    public function shop(){
        $dataProductSales = ProductModel::orderBy('product_sale', 'DESC')->limit(4)->get();

        if($this->checkFilter()){
            $price_start = $_GET['price_start'];
            $price_end = $_GET['price_end'];
            $data = ProductModel::whereBetween('product_price_sell', [$price_start, $price_end])->orderBy('product_id', 'DESC')->paginate(9);
        }
        else if($this->checkSort()){
            $sortBy = $_GET['sort_by'];
            $data = $this->sortByShop($sortBy);
        }
        else if($this->checkSearch()){
            $keyword = $_GET['search_keyword'];
            $data = ProductModel::where('product_name', 'LIKE', '%'.$keyword.'%')->paginate(9);
        }
        else{
            $data = ProductModel::orderBy('product_id', 'DESC')->paginate(9);
        }
        return view('frontend.pages.shop',[
            'data' => $data,
            'dataProductSales' => $dataProductSales,
        ]);
    }

    public function category($id){
        $dataProductSales = ProductModel::orderBy('product_sale', 'DESC')->limit(4)->get();
        $data_category = CategoryModel::find($id);
        $this->data_seo = new SeoHelper($data_category->category_name, $data_category->category_keyword, $data_category->category_description, 'http://127.0.0.1:8000/shop/');
        if($this->checkFilter()){
            // echo $id;
            $price_start = $_GET['price_start'];
            $price_end = $_GET['price_end'];
            $data = ProductModel::where('category_id', $id)->whereBetween('product_price_sell', [$price_start, $price_end])->orderBy('product_id', 'DESC')->paginate(9);
        }
        else if($this->checkSort()){
            $sortBy = $_GET['sort_by'];
            $data = $this->sortByCategory($sortBy, $id);
        }
        else{
            $data = ProductModel::where('category_id', $id)->orderBy('product_id', 'DESC')->paginate(9);
        }
        return view('frontend.pages.shop',[
            'data' => $data,
            'dataProductSales' => $dataProductSales,
            'data_seo' => $this->data_seo,
        ]);
    }

    public function brand($id){
        $data = BrandModel::where('brand_id', $id)
            ->get();
        return view('frontend.location.list',[
            'data' => $data
        ]);
    }

    public function product($id){
        $pos = strpos($id, "-");
        $id = substr($id, 0, $pos);

        $data = ProductModel::from('products as p')
             ->where('p.product_id' ,$id)
            ->join('categorys as c','c.category_id', '=', 'p.category_id')
            ->join('brands as b','b.brand_id', '=', 'p.brand_id')
            ->select('p.*','c.*','b.*')
            ->first();
        $dataProductImages = ImageModel::where('product_id', $id)->get();
        return view('frontend.pages.product',[
            'data' => $data,
            'dataProductImages' => $dataProductImages,
        ]);
    }

    public function contact(){
        $categories = CategoryModel::orderBy('category_id', 'DESC')->get();
        $locations = BrandModel::orderBy('brand_id', 'DESC')->get();
        $stadiumNames = ProductModel::all();
        $times = ShipModel::all();
        return view('frontend.pages.contact', compact('categories','locations', 'stadiumNames', 'times'));
    }

    public function checkFilter(){
        if(isset($_GET['price_start']) && isset($_GET['price_end'])){
            return true;
        }
    }

    public function checkSort(){
        if(isset($_GET['sort_by'])){
            return true;
        }
    }

    public function checkSearch(){
        if(isset($_GET['search_keyword'])){
            return true;
        }
    }

    public function sortByShop($sortBy){
        if($sortBy == 'tang_dan'){
            return $data = ProductModel::orderBy('product_price_sell', 'ASC')->paginate(9);
        }
        else if($sortBy == 'giam_dan'){
            return $data = ProductModel::orderBy('product_price_sell', 'DESC')->paginate(9);
        }
        else if($sortBy == 'kitu_az'){
            return $data = ProductModel::orderBy('product_name', 'ASC')->paginate(9);
        }
        else {
            return $data = ProductModel::orderBy('product_name', 'DESC')->paginate(9);
        }
    }

    public function sortByCategory($sortBy, $id){
        if($sortBy == 'tang_dan'){
            return $data = ProductModel::where('category_id', $id)->orderBy('product_price_sell', 'ASC')->paginate(9);
        }
        else if($sortBy == 'giam_dan'){
            return $data = ProductModel::where('category_id', $id)->orderBy('product_price_sell', 'DESC')->paginate(9);
        }
        else if($sortBy == 'kitu_az'){
            return $data = ProductModel::where('category_id', $id)->orderBy('product_name', 'ASC')->paginate(9);
        }
        else {
            return $data = ProductModel::where('category_id', $id)->orderBy('product_name', 'DESC')->paginate(9);
        }
    }

    public function sortByBrand($sortBy, $id){
        if($sortBy == 'tang_dan'){
            return $data = ProductModel::where('brand_id', $id)->orderBy('product_price_sell', 'ASC')->paginate(9);
        }
        else if($sortBy == 'giam_dan'){
            return $data = ProductModel::where('brand_id', $id)->orderBy('product_price_sell', 'DESC')->paginate(9);
        }
        else if($sortBy == 'kitu_az'){
            return $data = ProductModel::where('brand_id', $id)->orderBy('product_name', 'ASC')->paginate(9);
        }
        else {
            return $data = ProductModel::where('brand_id', $id)->orderBy('product_name', 'DESC')->paginate(9);
        }
    }
}
