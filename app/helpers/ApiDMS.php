<?php

namespace App\Helpers;

class ApiDMS
{

  public static function header($data, $programa)
  {
    // $client = new \GuzzleHttp\Client(['headers' => ['Content-Type'   => 'text/plain', 'Dtn-auth-token' => '09A6D171-6286-824B-CE42-58D5E90FD854']]);
    $client = new \GuzzleHttp\Client(['headers' => ['Content-Type'   => 'text/plain', 'Dtn-auth-token' => 'A0928931-26DB-4D87-490C-0FF2BE560F4C']]);
    // $response = $client->post("http://web2.detran.ms.gov.br/detran-serv-online-ws/srvext/srvonlinews/executaIntegracao", ["body" => $data]);
    $response = $client->post("https://web.detran.ms.gov.br/detran-serv-online-ws/srvext/srvonlinews/executaIntegracao", ["body" => $data]);
    if ($programa == "AEANPA10") {
      $retorno = self::retornoConsultaDebito($response->getBody()->getContents());
    } else {
      $retorno = self::retornoEmissaoGuia($response->getBody()->getContents());
    }
    return $retorno;
  }

  public static function consultarDebito($placa, $renavam)
  {
    $NOME_PROGRAMA = "AEANPA10";       // 8
    $CODIGO_RETORNO = self::espaco(3); // 3
    $MENSAGEM = self::espaco(89);      // 89
    $PLACA = $placa;                   // 7
    $EM_BRANCO = self::espaco(4185);   // 4185
    $ORIGEM = "1";                     // 1
    $RENAVAM = $renavam;               // 11
    $data = $NOME_PROGRAMA . $CODIGO_RETORNO . $MENSAGEM . $PLACA . $EM_BRANCO . $ORIGEM . $RENAVAM;
    return self::header($data, $NOME_PROGRAMA);
  }

  public static function emissaoGuia($placa, $renavam)
  {
    $NOME_PROGRAMA = "AECNM036";       // 8
    $CODIGO_RETORNO = self::espaco(3); // 3
    $MENSAGEM = self::espaco(89);      // 89
    $PLACA = $placa;                   // 7
    $RENAVAM = $renavam;               // 11
    $IE = "L";
    $data = $NOME_PROGRAMA . $CODIGO_RETORNO . $MENSAGEM . $PLACA . $RENAVAM . $IE;
    return self::header($data, $NOME_PROGRAMA);
  }

  public static function espaco($qtde)
  {
    $e = "";
    for ($i = 0; $i < $qtde; $i++) {
      $e .= " ";
    }
    return $e;
  }

  public static function retornoConsultaDebito($data)
  {
    $ret["nome_programa"] = trim(substr($data, 0, 8));
    $ret["codigo_retorno"] = trim(substr($data, 8, 3));
    $ret["mensagem"] = trim(substr($data, 11, 89));
    $ret["placa"] = trim(substr($data, 100, 7));
    $ret["chassi"] = trim(substr($data, 107, 21));
    $ret["valor_uferms"] = (float) trim(substr($data, 128, 6)) / 100;
    $ret["exerc_deb_licenciamento"] = trim(substr($data, 134, 30));
    $ret["valor_deb_licenciamento"] = (float) trim(substr($data, 164, 11)) / 100;
    $ret["exerc_deb_ipva"] = trim(substr($data, 175, 30));
    $ret["valor_deb_ipva"] = (float) trim(substr($data, 205, 11)) / 100;
    $ret["exerc_deb_seguro"] = trim(substr($data, 216, 10));
    $ret["valor_deb_seguro"] = (float) trim(substr($data, 226, 11)) / 100;
    $ret["deb_multa_urbana"] = (float) trim(substr($data, 237, 11)) / 100;
    $ret["deb_multa_prf"] = (float) trim(substr($data, 248, 11)) / 100;
    $ret["deb_multa_dnit"] = (float) trim(substr($data, 259, 11)) / 100;
    $ret["deb_multa_agesul"] = (float) trim(substr($data, 270, 11)) / 100;
    $ret["deb_multa_renainf"] = (float) trim(substr($data, 281, 11)) / 100;
    $v = 0;
    for ($i = 0; $i < 50; $i++) {
      $value = trim(substr(substr($data, 292, 4000), $v, 80));
      if ($value != "") {
        $ret["informativos"][] = $value;
      }
      $v += 80;
    }
    $ret["origem"] = trim(substr($data, 4292, 1));
    $ret["renavam"] = trim(substr($data, 4293, 11));
    $ret["motor"] = trim(substr($data, 4304, 21));
    $ret["marca"] = trim(substr($data, 4325, 30));
    $ret["cor"] = trim(substr($data, 4355, 10));
    $ret["municipio"] = trim(substr($data, 4365, 30));
    $ret["ano_fabricacao"] = trim(substr($data, 4395, 4));
    $ret["ano_modelo"] = trim(substr($data, 4399, 4));
    $ret["data_expedicao_documento"] = str_pad(trim(substr($data, 4403, 2)), 2, '0', STR_PAD_LEFT) . str_pad(trim(substr($data, 4405, 2)), 2, '0', STR_PAD_LEFT) . trim(substr($data, 4407, 4));
    $ret["consulta_multa_suspensa"] = trim(substr($data, 4411, 65));
    $ret["msg_existencia_multa_atuada"] = trim(substr($data, 4476, 75));
    $ret["msg_existencia_atuacao_renainf"] = trim(substr($data, 4551, 75));
    $v = 0;
    for ($i = 0; $i < 4; $i++) {
      $value = trim(substr(substr($data, 4626, 280), $v, 70));
      if ($value != "") {
        $ret["msg_restricao_renajud"][] = $value;
      }
      $v += 70;
    }
    $ret["categoria"] = trim(substr($data, 4906, 14));
    $ret["msg_ipva"] = trim(substr($data, 4920, 1));
    $ret["licenciado_ate"] = trim(substr($data, 4921, 20));
    $v = 0;
    $d = 0;
    for ($i = 0; $i < 10; $i++) {
      $value = trim(substr(substr($data, 4941, 390), $d, 39));
      if ($value != "") {
        $ret["debitos"][$i]["descricao"] = $value;
        $ret["debitos"][$i]["valor"] = trim(substr(substr($data, 5331, 100), $v, 10));
      }
      $d += 39;
      $v += 10;
    }
    $ret["ipva_atual"] = trim(substr($data, 5431, 28));
    $ret["ipva_atraso"] = trim(substr($data, 5459, 77));
    $ret["total_multas"] = trim(substr($data, 5536, 13));
    $ret["total_geral"] = trim(substr($data, 5549, 13));
    $ret["observacao"] = trim(substr($data, 5562, 280));
    $v = 0;
    for ($i = 0; $i < 4; $i++) {
      $value = trim(substr(substr($data, 5562, 280), $v, 70));
      if ($value != "") {
        $ret["observacoes"][] = $value;
      }
      $v += 70;
    }
    return $ret;
  }

  public static function retornoEmissaoGuia($data)
  {
    $ret["nome_programa"] = trim(substr($data, 0, 8));
    $ret["codigo_retorno"] = trim(substr($data, 8, 3));
    $ret["mensagem"] = trim(substr($data, 11, 89));
    $ret["placa"] = trim(substr($data, 100, 7));
    $ret["renavam"] = trim(substr($data, 107, 11));
    $ret["indicativo_emissao"] = trim(substr($data, 118, 1));
    $ret["exercicio"] = trim(substr($data, 119, 4));
    $ret["nome"] = trim(substr($data, 123, 35));
    $ret["emissao"] = trim(substr($data, 158, 10));
    $ret["vencimento"] = trim(substr($data, 168, 10));
    $ret["numero_guia"] = trim(substr($data, 178, 11));
    $ret["municipio"] = trim(substr($data, 189, 30));
    $ret["chassi"] = trim(substr($data, 219, 21));
    $ret["linha_digitavel"] = trim(substr($data, 240, 60));
    $ret["barras"] = trim(substr($data, 300, 44));
    $ret["valor_total_guia"] = trim(substr($data, 344, 15));
    $v = 0;
    $d = 0;
    for ($i = 0; $i < 20; $i++) {
      $value = trim(substr(substr($data, 359, 780), $d, 39));
      if ($value != "") {
        $ret["debitos"][$i]["descricao"] = $value;
        $ret["debitos"][$i]["valor"] = trim(substr(substr($data, 1139, 200), $v, 10));
      }
      $d += 39;
      $v += 10;
    }
    $ret["infracoes"] = trim(substr($data, 1339, 750));
    $v = 0;
    for ($i = 0; $i < 50; $i++) {
      $value = trim(substr(substr($data, 1339, 750), $v, 15));
      if ($value != "") {
        $ret["observacoes"][] = $value;
      }
      $v += 15;
    }

    $ret["dpvat"] = trim(substr($data, 2089, 1));
    $ret["pge"] = trim(substr($data, 2090, 1));
    $ret["valor_uferms"] = trim(substr($data, 2091, 7));
    $ret["cpf_cnpj"] = trim(substr($data, 2098, 18));

    return $ret;
  }
}
