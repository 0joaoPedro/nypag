<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SimuladorController extends Controller
{
    public function simulador(Request $request)
    {
        // if(isset($request->valor)) {
        //     $order['valor'] = $request->valor;
        // }
        if(isset($request->boleto)) {
            $boleto = $request->boleto;
        }
        $token_head = new \GuzzleHttp\Client([
            'headers' => [ "Content-Type"  => "application/json" ]
        ]);
        $params = array("client_id" => "2", "client_secret" => "Mdom1FovUiKI6lMwSZmHXjWvZJ0POKVkCNZ1QX4r", "grant_type" => "password", "username" => "diogonoletodasilva@gmail.com", "password" => "(No)2019" );
        $token = json_decode($token_head->post('https://boleto.nyata.com.br/oauth/token', [ 'body' => json_encode($params) ])->getBody(), true);
 
        $client = new \GuzzleHttp\Client([ 'headers' => [ "Content-Type"  => "application/json",
                "Authorization" => $token['token_type'].' '.$token['access_token']
        ]]);
        $response = $client->request('get', 'https://boleto.nyata.com.br/api/v1/boleto/outros/simulador?spgtb_modulo_id=2&spgtb_servico_id=2&boletos[]='.$boleto);
        $data = json_decode($response->getBody(), true);
        // dd($data);
        if(isset($data['errors'])){
            return redirect('/')->with('messages', $data);
        }
        return view('Frontend.simulador', compact('data'));
    }
}
