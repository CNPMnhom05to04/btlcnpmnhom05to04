<?php

namespace App\Http\Controllers;

use App\Http\Controllers\frontend\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

class GhtkController extends Controller
{


    public function __construct(){

    }

    public function estimateShipping(array $params)
    {
        try {
            $endpoint = env('GHTK_ESTIMATE_SHIPPING') . '?' . http_build_query($params);
            $headers = [
                'Token' => '2e7d5ca88719d7318c313e586a6f712e52745f0a'
            ];
            $response = Http::withHeaders($headers)->get($endpoint);
            $responseBody = $response->body();
            $result = json_decode($responseBody, true);
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;

    }

    public function syncOrder(array $params): array
    {
        try {
            $endpoint = env('GHTK_SYNC_ORDER');
            $headers = [
                'Content-Type' => 'application/json',
                'Token' => '2e7d5ca88719d7318c313e586a6f712e52745f0a',
            ];
            $response = Http::withHeaders($headers)->post($endpoint, $params);
            $responseBody = $response->body();
            $result = json_decode($responseBody, true);
        } catch (\Exception $e) {
            $result = [];
        }
        return $result;
    }

    public function cancelOrder(string $param): array
    {
        try {
            $endpoint = env('GHTK_CANCEL_ORDER') . '/' . $param;
            $headers = [
                'Token' => '2e7d5ca88719d7318c313e586a6f712e52745f0a'
            ];
            $response = Http::withHeaders($headers)->post($endpoint, []);
            $responseBody = $response->body();
            $result = json_decode($responseBody, true);
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }

    public function getOrderStatus(string $trackingLabel): array
    {
        try {
            $endpoint = env('GHTK_GET_ORDER_STATUS') . '/' . $trackingLabel;
            $headers = [
                'Token' => '2e7d5ca88719d7318c313e586a6f712e52745f0a'
            ];
            $response = Http::withHeaders($headers)->get($endpoint);
            $responseBody = $response->body();
            $result = json_decode($responseBody, true);
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }

    public function getAddressPickUp(): array
    {
        try {
            $endpoint = env('GHTK_GET_ADDRESS_PICKUP');
            $headers = [
                'Token' => '2e7d5ca88719d7318c313e586a6f712e52745f0a'
            ];
            $response = Http::withHeaders($headers)->get($endpoint);
            $responseBody = $response->body();
            $result = json_decode($responseBody, true);
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }

    public function checkApiXFAST()
    {
        $result = $this->getInformatioOrder();
        $data = $result['address_check_xfast'];
        try {
            $endpoint = env('GHTK_GET_CHECK_XFAST') . http_build_query($data);
            $headers = [
                'Token' => '2e7d5ca88719d7318c313e586a6f712e52745f0a'
            ];
            $response = Http::withHeaders($headers)->get($endpoint);
            $responseBody = $response->body();
            $result = json_decode($responseBody, true);
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;

    }
}
