<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiProxyController extends Controller
{
    // Токен для Api
    private $apiToken = '5994c91001f57eea808aff11738d752a';
    private $baseUrl = 'https://postback-sms.com/api/';

    /**
     * Получить номер телефона
     */
    public function getNumber(Request $request)
    {
        $response = Http::get($this->baseUrl,  [
            'action' => 'getNumber',
            'country'=> 'se',
            'service'=> 'wa',
            'token' => $this->apiToken,
            'rent_time'=> 4   //optional - если нужна аренда номера на определенное время (в часах)
        ]);

        return response()->json($response->json());
    }

    /**
     * Получить SMS для номера телефона
     */
    public function getSms(Request $request)
    {
        $response = Http::get($this->baseUrl, [
            'action' => 'getSms',
            'token' => $this->apiToken,
            'activation'=> $request->activation,
        ]);
        return response()->json($response->json());
    }

    /**
     * Отменить номер
     */
    public function cancelNumber(Request $request)
    {

        $response = Http::get($this->baseUrl, [
            'action' => 'cancelNumber',
            'token' => $this->apiToken,
            'activation'=>$request->activation,
        ]);

        return response()->json($response->json());
    }

    /**
     * Получить статус активации
     */
    public function getStatus(Request $request)
    {
        $response = Http::get($this->baseUrl, [
            'action' => 'getStatus',
            'token' => $this->apiToken,
            'activation'=> $request->activation,
        ]);

        return response()->json($response->json());
    }
}
