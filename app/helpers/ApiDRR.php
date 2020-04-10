<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class ApiDRR
{
  //Testes
  public static function loginTeste() {
    $client = new Client([
      "headers" => [
        "Content-Type"  => "application/json"
      ]
    ]);
    $param = [
      "username" => "22493172000187",
      "password" => "PE4W9FFG1828OU"
    ];
    $data = json_encode($param);
    $resp = $client->post('https://loiwh3.searchtecnologia.com.br/parcelamento/login', [
      'json' => $param,
      'verify' => false
    ]);

    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
  public static function consultarVeiculoTeste($placa, $renavam) {
    $token = self::loginTeste();
    $client = new Client([
      'headers' => [
          "Content-Type"  => "application/json",
          "Authorization" => "Bearer ".$token
      ]
    ]);
    $param = [
      'placa'   => $placa,
      'renavam' => $renavam
    ];
    $data = json_encode($param);
    $resp = $client->post('https://www.rr.getran.com.br/getranServicos/rest/parcelamento/veiculo/', [
      'body' => $data,
      'verify' => false
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
  public static function liberarDebitosTeste($placa, $renavam, $debitos) {
    $token = self::login();
    $client = new Client([
      'headers' => [
          "Content-Type"  => "application/json",
          "Authorization" => "Bearer " . $token 
      ]
    ]);
    $param = [
      'placa'   => $placa,
      'renavam' => $renavam
    ];
    $param['debitos'] = $debitos;
    $data = json_encode($param);
    $resp = $client->post('https://www.rr.getran.com.br/parcelamento/veiculo/liberarDebitos', [
      'body' => $data,
      'verify' => false
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }

  //Produção
  public static function login() {
    $client = new Client([
      "headers" => [
        "Content-Type"  => "application/json"
      ]
    ]);
    $param = [
      "username" => "22493172000187",
      "password" => "PE4W9FFG1828OU"
    ];
    $data = json_encode($param);
    $resp = $client->post('https://www.rr.getran.com.br/parcelamento/login', [
      'json' => $param,
      'verify' => false
    ]);

    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
  public static function consultarVeiculo($placa, $renavam) {
    $token = self::login();
    \Log::info($token);
    $client = new Client([
      'headers' => [
          "Content-Type"  => "application/json",
          "Authorization" => "Bearer ".$token
      ]
    ]);
    $param = [
      'placa'   => $placa,
      'renavam' => $renavam
    ];
    $data = json_encode($param);
    $resp = $client->post('https://www.rr.getran.com.br/getranServicos/rest/parcelamento/veiculo/', [
      'body' => $data,
      'verify' => false
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
  public static function liberarDebitos($placa, $renavam, $debitos) {
    $token = self::login();
    $client = new Client([
      'headers' => [
          "Content-Type"  => "application/json",
          "Authorization" => "Bearer " . $token 
      ]
    ]);
    $param = [
      'placa'   => $placa,
      'renavam' => $renavam
    ];
    $param['debitos'] = $debitos;
    $data = json_encode($param);
    $resp = $client->post('https://www.rr.getran.com.br/parcelamento/veiculo/liberarDebitos', [
      'body' => $data,
      'verify' => false
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
}
