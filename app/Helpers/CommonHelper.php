<?php

namespace App\Helpers;

use App\Enums\Constant;
use App\Models\CategoryModel;

class CommonHelper
{
     public  function get_data_filter($filter)
    {
        if ($filter === Constant::category_keyword) {
            return CategoryModel::orderBy($filter, 'ASC')->paginate(Constant::PER_PAGE);
        } else {
            return CategoryModel::withCount('product')
                ->orderBy('product_count', 'DESC')
                ->paginate(Constant::PER_PAGE);
        }
    }

}
