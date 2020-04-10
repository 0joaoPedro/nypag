<?php

namespace App\Http\Controllers\Purchase;
use App\Http\Controllers\Controller;

class CreditCardPurchase extends Controller
{
    public function __construct(Service $verify)
    {
        $this->verify = $verify;

        $this->middleware('auth');
        //        $this->middleware('signed')->only('verify');
        //        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    public $ctrl = array(
        "name"    => "Pgto Online",
        "route"   => "pgtoonline.purchase",
        "title"   => "Pgto Online",
        "errors" => ["error_all" => "Você não tem permissão!"]
    );

    public function index()
    {
        $ctrl = $this->ctrl;
        return view($ctrl['route'] . '.index', compact('ctrl'));
    }
    public function token()
    {
        $data["MerchantOrderId"] = "Paulo Henrique";
        $data["Customer"]["Name"] = 'Comprador Teste';
        $data["Payment"]["Type"] = 'CreditCard';
        $data["Payment"]["Amount"] = '15700';
        $data["Payment"]["Provider"] = 'Cielo';
        $data["Payment"]["ReturnUrl"] = 'https://www.google.com.br';
        $data["Payment"]["Installments"] = '1';
        $data["Payment"]["Authenticate"] = 'true';
        $data["Payment"]["CreditCard"]["CardNumber"] = '1234123412341231';
        $data["Payment"]["CreditCard"]["Holder"] = 'Teste Holder';
        $data["Payment"]["CreditCard"]["ExpirationDate"] = '12/2019';
        $data["Payment"]["CreditCard"]["SecurityCode"] = '123';
        $data["Payment"]["CreditCard"]["SaveCard"] = true;
        $data["Payment"]["CreditCard"]["Brand"] = 'Visa';
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
        $res = $client->request('POST', 'https://apisandbox.cieloecommerce.cielo.com.br/1/sales', [
            "body" => $param
        ]);
        self::store($res->getBody());
        return $res->getBody();
    }
    public function store($res){
        // $res
    }
}
