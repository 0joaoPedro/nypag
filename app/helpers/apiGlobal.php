<?php

namespace App\Helpers;

class apiGlobal
{
    protected $link = array(
        "api" => 'https://sis-t.redsys.es:25443/sis/services/SerClsWSEntrada',
        "query" => 'https://apiquerysandbox.cieloecommerce.cielo.com.br/',
    );
    
    public static function setToken()
    {
        $param = json_encode($data);
        $client = new \GuzzleHttp\Client(
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'MerchantId' => '4a46e00c-2319-43aa-b07d-b43108b9c74f',
                    'MerchantKey' => 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL'
                ]
            ]
    
        );
        $res = $client->request('post', 'https://apisandbox.cieloecommerce.cielo.com.br/1/card/', [
            "body" => $param
        ]);
        echo ($res->getBody());
    }

    public static function getCard()
    {
        $client = new \GuzzleHttp\Client(
            [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'MerchantId' => '4a46e00c-2319-43aa-b07d-b43108b9c74f',
                    'MerchantKey' => 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL'
                ]
            ]
    
        );
        $res = $client->request('get', 'https://apiquerysandbox.cieloecommerce.cielo.com.br/1/card/86e74909-9a96-41fc-9da9-fb46a6328513');
        echo $res->getBody();
    }
}
