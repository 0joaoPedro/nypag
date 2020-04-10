<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class ApiDPR {
  public static function token()
  {
    $resp = (new Client)->post(
      "https://auth-cs-hml.identidadedigital.pr.gov.br/centralautenticacao/api/v1/token?grant_type=client_credentials&scope=parcelamento.debitos.consultas%20parcelamento.debitos.guias",
    [
      'headers' => [
        'Content-Type' => 'application/x-www-form-urlencoded',
        "Authorization" => "Basic " . base64_encode('43feaeeecd7b2fe2ae2e26d917b6477d:Ny0t0'),
        ]
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
  public static function statusTransmissao()
  {
    $token = self::token();
    $auth = $token['token_type']." ".$token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/status/transmissao";
    $resp = (new Client)->get($api,[
      "headers" => [
        "Authorization" => $auth,
      ],
      'verify' => false,
      'cert'   => [ $certificate, '123456' ]
    ]);
    $ret = json_decode($resp->getBody(), true);
    return $ret;
  }
  public static function statusAuth()
  {
    $token = self::token();
    $auth = $token['token_type']." ".$token['access_token'];
    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/status/auth";
    $resp = (new Client)->get($api,[
      "headers" => [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
        "Authorization" => $auth
      ],
      'verify' => false
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
  public static function statusAssinatura()
  {
    $token = self::token();
    $auth = $token['token_type']." ".$token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $private_key = Storage::get('cert/private_key');
    
    $head = [
      'cty' =>  'application/json',
      'iat' =>  ''.time(),
      'exp' =>  ''.(time()+60)
    ];
    $payload = [ "teste_assinatura" => 0.5899 ];

    $encoded = JWT::encode($payload, $private_key, 'RS256', 'f63a89b9f22c53cf764499e30399f0466c183a8f', $head);
    dd($private_key);

    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/status/assinatura";

    // $data = json_encode($encoded);
    $resp = (new Client)->post($api,[
      "headers" => [
        "Authorization" => $auth,
      ],
      'verify' => false,
      'cert'   => [ $certificate, '123456' ],
      'body'   => $encoded
    ]);

    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }

  public static function consultarMulta($renavam)
  {
    $token = self::token();
    $auth = $token['token_type'] . " " . $token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/v1/debitos/veiculo/$renavam/multas";
    try {
      $resp = (new Client)->get($api, [
        "headers" => [
          "Content-Type" => "application/json",
          "Accept" => "application/json",
          "Authorization" => $auth
        ],
        'verify' => false,
        'cert'   => [$certificate, '123456']
      ]);
      return json_decode($resp->getBody(), true);
    } catch (\GuzzleHttp\Exception\RequestException $e) {
      return json_decode($e->getResponse()->getBody()->getContents(), true);
    }
  }
  public static function gerarMulta($ciclo, $multa)
  {
    $token = self::token();
    $auth = $token['token_type'] . " " . $token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $private_key = Storage::get('cert/private_key');
    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/v1/debitos/guia/multa";
    $head = [
      'cty' =>  'application/json',
      'iat' =>  '' . time(),
      'exp' =>  '' . (time() + 60)
    ];
    $payload = [
      "ciclo" => $ciclo,
      "multas" => $multa
    ];
    $encoded = JWT::encode($payload, $private_key, 'RS256', 'f63a89b9f22c53cf764499e30399f0466c183a8f', $head);
    $resp = (new Client)->post($api, [
      "headers" => [
        "Authorization" => $auth,
      ],
      'verify' => false,
      'cert'   => [$certificate, '123456'],
      'body'   => $encoded
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }

  public static function consultarLicenciamento($renavam)
  {
    $token = self::token();
    $auth = $token['token_type']." ".$token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/v1/debitos/veiculo/$renavam/licenciamento";
    try {
      $resp = (new Client)->get($api, [
        "headers" => [
          "Content-Type" => "application/json",
          "Accept" => "application/json",
          "Authorization" => $auth
        ],
        'verify' => false,
        'cert'   => [$certificate, '123456']
      ]);
      return json_decode($resp->getBody(), true);
    }
    catch (\GuzzleHttp\Exception\RequestException $e) {
      return json_decode($e->getResponse()->getBody()->getContents(), true);
    }
  }
  public static function gerarLicenciamento($ciclo, $renavam)
  {
    $token = self::token();
    $auth = $token['token_type'] . " " . $token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $private_key = Storage::get('cert/private_key');
    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/v1/debitos/guia/licenciamento";
    $head = [
      'cty' =>  'application/json',
      'iat' =>  '' . time(),
      'exp' =>  '' . (time() + 60)
    ];
    $payload = [
      "renavam" => $renavam,
      "atual" => true,
      "ciclo" => $ciclo
    ];
    $encoded = JWT::encode($payload, $private_key, 'RS256', 'f63a89b9f22c53cf764499e30399f0466c183a8f', $head);
    $resp = (new Client)->post($api,[
      "headers" => [
        "Authorization" => $auth,
      ],
      'verify' => false,
      'cert'   => [$certificate, '123456'],
      'body'   => $encoded
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
  
  public static function consultarProcesso($numProcesso)
  {
    $token = self::token();
    $auth = $token['token_type'] . " " . $token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/v1/debitos/processos/$numProcesso";
    try {
      $resp = (new Client)->get($api, [
        "headers" => [
          "Content-Type" => "application/json",
          "Accept" => "application/json",
          "Authorization" => $auth
        ],
        'verify' => false,
        'cert'   => [$certificate, '123456']
      ]);
      return json_decode($resp->getBody(), true);
    } catch (\GuzzleHttp\Exception\RequestException $e) {
      return json_decode($e->getResponse()->getBody()->getContents(), true);
    }
  }
  public static function gerarProcesso($numero, $ciclo)
  {
    $token = self::token();
    $auth = $token['token_type'] . " " . $token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $private_key = Storage::get('cert/private_key');
    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/v1/debitos/guia/processo";
    $head = [
      'cty' =>  'application/json',
      'iat' =>  '' . time(),
      'exp' =>  '' . (time() + 60)
    ];
    $payload = [
      "atual" => true,
      "renavam" => $renavam
    ];
    $encoded = JWT::encode($payload, $private_key, 'RS256', 'f63a89b9f22c53cf764499e30399f0466c183a8f', $head);
    $resp = (new Client)->post($api, [
      "headers" => [
        "Authorization" => $auth,
      ],
      'verify' => false,
      'cert'   => [$certificate, '123456'],
      'body'   => $encoded
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
  public static function cancelarCiclo($ciclo, $renavam)
  {
    $token = self::token();
    $auth = $token['token_type'] . " " . $token['access_token'];
    $certificate = storage_path('app/cert/certificate');
    $private_key = Storage::get('cert/private_key');
    $api = "https://homolog.parcelamento.detran.pr.gov.br/detran-parcelamento/api/v1/debitos/cancelar-ciclo";
    $head = [
      'cty' =>  'application/json',
      'iat' =>  '' . time(),
      'exp' =>  '' . (time() + 60)
    ];
    $payload = [
      "ciclo" => $ciclo,
      "renavam" => $renavam
    ];
    $encoded = JWT::encode($payload, $private_key, 'RS256', 'f63a89b9f22c53cf764499e30399f0466c183a8f', $head);
    $resp = (new Client)->post($api, [
      "headers" => [
        "Authorization" => $auth,
      ],
      'verify' => false,
      'cert'   => [$certificate, '123456'],
      'body'   => $encoded
    ]);
    $resp = json_decode($resp->getBody(), true);
    return $resp;
  }
}