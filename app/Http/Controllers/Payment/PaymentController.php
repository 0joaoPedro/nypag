<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Cartao\CartaoController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Cartao;
use App\Http\Models\PaymentOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public $ctrl = array(
        "modulo"    => 1,
        "name"    => "Pgto Online",
        "route"   => "payment",
        "title"   => "Pgto Online",
        "errors" => ["error_all" => "Você não tem permissão!"]
    );

    public function index()
    {
        $ctrl = $this->ctrl;
        $ordem = PaymentOrder::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if($ordem){
            $token_head = new \GuzzleHttp\Client([
                'headers' => [ "Content-Type"  => "application/json" ]
            ]);
            $params = array("client_id" => "2", "client_secret" => "Mdom1FovUiKI6lMwSZmHXjWvZJ0POKVkCNZ1QX4r", "grant_type" => "password", "username" => "diogonoletodasilva@gmail.com", "password" => "(No)2019" );
            $token = json_decode($token_head->post('https://boleto.nyata.com.br/oauth/token', [ 'body' => json_encode($params) ])->getBody(), true);
    
            $client = new \GuzzleHttp\Client([ 'headers' => [ "Content-Type"  => "application/json",
                    "Authorization" => $token['token_type'].' '.$token['access_token']
            ]]);
            $response = $client->request('get', 'https://boleto.nyata.com.br/api/v1/boleto/outros/simulador?spgtb_modulo_id=2&spgtb_servico_id=2&boletos[]='.$ordem['boleto']);
            $data = json_decode($response->getBody(), true);

            $data['ordem'] = $ordem;

            $itens = Cartao::select(DB::raw("id, card_token"))
                        ->where("user_id", Auth::user()->id)
                        ->whereNull("deleted_at")
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
                foreach ($itens as $key => $card) {
                    $response = $client->request('get', 'https://apiquerysandbox.cieloecommerce.cielo.com.br/1/card/' . $card->card_token);
                    $resp = json_decode($response->getBody(), true);
                    $cardNumber = substr($resp['CardNumber'], 6, 10);
                    $cardHolder = $resp['Holder'];
                    $cardExpiration = $resp['ExpirationDate'];
                    $cards[$key] = array($card->id, $cardHolder, $cardNumber, $cardExpiration);
                }
            }

            return view($ctrl['route'] . '.index', compact('ctrl', 'data', 'cards'));
        } else {
            return view($ctrl['route'] . '.index', compact('ctrl'));
        }
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $ctrl = $this->ctrl;
        $order['user_id'] = Auth::user()->id;
        $order['valor'] = str_replace(',', '.', str_replace('.', '', $request->valor));
        $order['descricao'] = "Pagamento - Boleto #";
        $order['status'] = 1;
        $ordem = PaymentOrder::updateCustom($order);
        $token_head = new \GuzzleHttp\Client([
            'headers' => [ "Content-Type"  => "application/json" ]
        ]);
        $params = array("client_id" => "2", "client_secret" => "Mdom1FovUiKI6lMwSZmHXjWvZJ0POKVkCNZ1QX4r", "grant_type" => "password", "username" => "diogonoletodasilva@gmail.com", "password" => "(No)2019" );
        $token = json_decode($token_head->post('https://boleto.nyata.com.br/oauth/token', [ 'body' => json_encode($params) ])->getBody(), true);
 
        $client = new \GuzzleHttp\Client([ 'headers' => [ "Content-Type"  => "application/json",
                "Authorization" => $token['token_type'].' '.$token['access_token']
        ]]);
        $response = $client->request('get', 'https://boleto.nyata.com.br/api/v1/boleto/outros/simulador?spgtb_modulo_id=2&spgtb_servico_id=2&valor='.$order['valor']);
        $simulador = json_decode($response->getBody(), true);

        $data['ordem'] = $ordem;

        foreach ($simulador['simulador'] as $i => $s) {
            $data["simulador"][$i]["valor"] = number_format($order['valor'], 2, ',', '.');
            $data["simulador"][$i]["multi"] = $s['multi'];
            $data["simulador"][$i]["forma"] = $s['forma'];
            $data["simulador"][$i]["vtotal"] = number_format($order['valor'] * $s   ['multi'], 2, ',', '.');
        }
        $itens = Cartao::select(DB::raw("id, card_token"))
                       ->where("user_id", Auth::user()->id)
                       ->whereNull("deleted_at")
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
            foreach ($itens as $key => $card) {
                $response = $client->request('get', 'https://apiquerysandbox.cieloecommerce.cielo.com.br/1/card/' . $card->card_token);
                $resp = json_decode($response->getBody(), true);
                $cardNumber = substr($resp['CardNumber'], 6, 10);
                $cardHolder = $resp['Holder'];
                $cardExpiration = $resp['ExpirationDate'];
                $cards[$key] = array($card->id, $cardHolder, $cardNumber, $cardExpiration);
            }
        }

        return view($ctrl['route'] . '.index', compact('ctrl', 'data', 'cards'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
