<?php

namespace App\Http\Controllers;

use App\Http\Models\Cartao;
use App\Http\Models\PaymentOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $payments = PaymentOrder::whereNull("deleted_at")->orderBy('sended_at', 'DESC')->limit('3')->get();
        foreach ($payments as $payment) {
            $payment['data_mes'] = date('M', strtotime($payment->sended_at));
            $payment['data_dia'] = date('d', strtotime($payment->sended_at));
            $payment['valor_formatado'] = number_format($payment->valor, 2, ',', '.');
        }
        $itens = Cartao::select(DB::raw("id, card_token"))
            ->whereNull("deleted_at")
            ->where("user_id", Auth::user()->id)
            ->get();
        if (sizeof($itens) > 0) {
            $client = new \GuzzleHttp\Client(
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'MerchantId' => '4a46e00c-2319-43aa-b07d-b43108b9c74f',
                        'MerchantKey' => 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL'
                    ],
                    'verify' => false
                ]
            );
            foreach ($itens as $card) {
                $api = "https://apiquerysandbox.cieloecommerce.cielo.com.br/1/card/" . $card->card_token;
                $response = (new \GuzzleHttp\Client)->get(
                    $api,
                    [
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'MerchantId' => '4a46e00c-2319-43aa-b07d-b43108b9c74f',
                            'MerchantKey' => 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL'
                        ]
                    ]
                );
                $resp = json_decode($response->getBody(), true);
                $cards[] = $resp;
            }
        }
        return view('home', compact('cards', 'payments'));
    }
    public function store(Request $request)
    {
        Product::create($request);
        return view('home');
    }
}
