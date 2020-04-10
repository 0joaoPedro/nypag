<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiDRS
{
  public static function token()
  {
    $url = "https://www.soe.rs.gov.br/soeauth/connect/token";
    $param['form_params'] = [
      'Content-Type'  => 'application/x-www-form-urlencoded',
      'grant_type'    =>'client_credentials',
      'client_id'     => 'asf00008.e5.e2CQbB1wTctNOVYqMy',
      'client_secret' => 'tkYLUHi6ztLzJWEr3XVfzbFzZ'
    ];
    try {
      return json_decode((new Client)->post($url, $param)->getBody(), true);
    } catch (RequestException $e) {
      return json_decode($e->getResponse()->getBody()->getContents(), true);
    }
  }
  public static function consultarDebitos($placa, $renavam) {
    $token = self::token();
    $auth = $token['token_type']." ".$token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $client = new Client([
      'headers' => [
        "Content-Type"  => "application/json",
        "authorization" => $auth
      ],
      'verify' => false,
      'cert'   => [ $certificate, '123456']
    ]);
    try {
      return json_decode($client->get("https://rpv.detran.rs.gov.br/rpv/rest/licenciamento/asf/debitos/$placa/$renavam")->getBody(), true);
    } catch (RequestException $e) {
      return json_decode($e->getResponse()->getBody()->getContents(), true);
    }
  }
}
