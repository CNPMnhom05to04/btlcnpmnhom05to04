<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\DB;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('.*(chào | xin chào| admin | Admin).*', function ($botman) {
                $this->askName($botman);
        });

        $botman->hears('.*(giá|sản phẩm).*', function (BotMan $botman) {
            $this->askProductName($botman);
        });


        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Xin chào bạn, bạn có thể cho mình biết tên của bạn?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Rất vui khi được phục vụ!' . $name);
        });
    }
    public function askProductName($botman)
    {
        $botman->reply('Bạn muốn biết giá sản phẩm nào. Hãy cho tôi biết tên của sản phẩm');

        $botman->ask('Nhập tên sản phẩm bạn muốn xem giá hoặc nhập "OK" để thoát:', function (Answer $answer) use ($botman) {

            $productName = strtolower($answer->getText());
            $products = DB::table('products')->select('product_name','product_price_buy', 'product_price_sell')->get();
            $matchingProducts = $products->filter(function($product) use ($productName) {
                return strpos(strtolower($product->product_name), strtolower($productName)) !== false;
            })->toArray();
            if ($matchingProducts) {
                foreach ($matchingProducts as $product) {
                    $botman->reply('Tên sản phẩm: ' . $product->product_name . ', Giá mua: ' . $product->product_price_buy . ', Giá bán: ' . $product->product_price_sell);
                }
                $botman->ask('Nhập tên sản phẩm bạn muốn xem giá hoặc nhập "OK" để thoát:', function (Answer $answer) use ($botman) {
                    $response = strtolower($answer->getText());
                    if ($response === 'ok') {
                        $botman->reply('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Chúc bạn một ngày tốt lành!');
                    } else {
                        $this->askProductName($botman);
                    }
                });
            } else {
                $botman->reply('Xin lỗi, sản phẩm không tồn tại trong danh sách của chúng tôi.');
                $this->askProductName($botman);
            }
        });
    }
}
