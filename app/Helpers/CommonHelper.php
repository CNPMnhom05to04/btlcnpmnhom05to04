<?php

namespace App\Helpers;

use App\Enums\Constant;
use App\Models\BrandModel;
use App\Models\CategoryModel;

class CommonHelper
{
     public function get_data_filter($filter)
    {
        if ($filter === Constant::category_keyword) {
            return CategoryModel::orderBy($filter, 'ASC')->paginate(Constant::PER_PAGE);
        } else {
            return CategoryModel::withCount('product')
                ->orderBy('product_count', 'DESC')
                ->paginate(Constant::PER_PAGE);
        }
    }

    public static function get_data_weight($weight_id)
    {
        $weight = BrandModel::where('brand_id', $weight_id)->first();
        if ($weight) {
            return $weight->brand_name;
        } else {
            return 0;
        }
    }

}
