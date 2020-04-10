<?php
namespace App\Helpers;

use SoapClient;

class ApiDMA
{
  public static function licenciamento($renavam)
  {
    $devWsdlCred = "http://wsdesenwebapp.detran.ma.gov.br:10010/wsstack/services/wsLicenciamento_dsv?wsdl";
		$devUrl = "http://wsdesenwebapp.detran.ma.gov.br:10010/wsstack/services/wsLicenciamento_dsv?wsdl";
		$param = [
			'WS_USUARIO'   => 'SWPAGAMENTOS',
			'WS_SENHA'     => '5WP@GJM27NT',
			'WSIN_RENAVAM' => $renavam,
		];
		$client = new SOAPClient($devWsdlCred, [
			'cache_wsdl'  => WSDL_CACHE_NONE,
			'exceptions' => 0,
			'trace' => 1,
			'location' => $devUrl
			]);
		$ob = $client->NJXVNLIC($param);
		return json_decode(json_encode($ob), true);
  }

  public static function parcelamento($data)
  {
    $devWsdlCred = "http://wsdesenwebapp.detran.ma.gov.br:10010/wsstack/services/wsParcelamentoTributos_dsv?wsdl";
	$devUrl = "http://wsdesenwebapp.detran.ma.gov.br:10010/wsstack/services/wsParcelamentoTributos_dsv?wsdl";
	$param = [
		'WSIN_USUARIO'   		=> 'SWPAGAMENTOS',
		'WSIN_SENHA'     		=> '5WP@GJM27NT',
		'WSIN_RENAVAM' 		=> $data['WSIN_RENAVAM'],
		'WSIN_DESCRICAO' 	=> $data['WSIN_DESCRICAO'],
		'WSIN_EXERCICIO'	=> $data['WSIN_EXERCICIO'],
		'WSIN_SITUACAO'		=> $data['WSIN_SITUACAO'],
		'WSIN_VALOR'		=> str_replace(',','', str_replace('.','',$data['WSIN_VALOR'])),
		'WSIN_VENCIMENTO'	=> date('Ymd', strtotime(str_replace('/', '-', $data['WSIN_VENCIMENTO']))),
		'WSIN_VALIDADE'		=> date('Ymd', strtotime(str_replace('/', '-', $data['WSIN_VALIDADE']))),
		'WSIN_COD_BARRAS'	=> $data['WSIN_COD_BARRAS'],
		'WSIN_NUM_CONTROLE' => $data['WSIN_NUM_CONTROLE'],
		'WSIN_TIPO'			=> $data['WSIN_TIPO'],
		'WSIN_DATA_PGTO'	=> $data['WSIN_DATA_PGTO'],
		'WSIN_BANCO'		=> $data['WSIN_BANCO'],
		'WSIN_AGENCIA_DIG'	=> $data['WSIN_AGENCIA_DIG'],
		'WSIN_VALOR_PGTO'	=> $data['WSIN_VALOR_PGTO'],
		'WSIN_AUTENTICACAO'	=> $data['WSIN_AUTENTICACAO']
	];
	$client = new SOAPClient($devWsdlCred, [
		'cache_wsdl'  => WSDL_CACHE_NONE,
		'exceptions'  => 0,
		'trace' 	  => 1,
		'location'    => $devUrl
    ]);
    $ob = $client->NJXVNPAR($param);
    return json_decode(json_encode($ob), true);
  }
}

