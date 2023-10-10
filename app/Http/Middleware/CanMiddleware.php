<?php

namespace App\Http\Middleware;

use App\Models\ProductModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $route = Route::currentRouteName();

        if (auth()->check() ) {
            if (auth()->user()->role_id != 1){
                switch ($route) {
                    case 'product.edit':
                        return redirect()->back()->with('msgError', 'Bạn không có quyền chỉnh sửa sản phẩm.');
                        break;
                    case 'product.delete_more':
                        return redirect()->back()->with('msgError', 'Bạn không có quyền xoá nhiều sản phẩm.');
                        break;
                    default:
                        return redirect()->back()->with('msgError', 'Bạn không có quyền này.');
                }
            }
        }else{
            return redirect()->route('/customer/login')->with('msgError', 'Bạn cần đăng nhập để sử dụng dịch vụ này.');
        }
        return $next($request);
    }
}
