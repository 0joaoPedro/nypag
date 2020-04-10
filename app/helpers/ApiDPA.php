<?php

namespace App\Helpers;

use SoapClient;

class ApiDPA
{
  public static function acessoDTO()
  {
    // desenvolvimento
    // $devWsdlCred = "https://sistemas.detran.pa.gov.br/desenvolvimento/renavam-jaxws/ServicesWeb/CrediarioGatewayFacade?wsdl";
    // $devUrl = "https://sistemas.detran.pa.gov.br/desenvolvimento/renavam-jaxws/ServicesWeb/CrediarioGatewayFacade";

    //producao 
    $devWsdlCred = "https://sistemas.detran.pa.gov.br/producao/renavam-jaxws/ServicesWeb/CrediarioGatewayFacade?wsdl";
    $devUrl = "https://sistemas.detran.pa.gov.br/producao/renavam-jaxws/ServicesWeb/CrediarioGatewayFacade";

    $acessoDTO = [
      'login'  => 'sandra.bondi.ws',
      'modulo' => '3',
      'senha'  => '1b77e478ab990be5fdddbee8614dd414'
    ];
    $op = stream_context_create([
      'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      ]
    ]);
    $client['soap'] = new SOAPClient($devWsdlCred, [
      'stream_context' => $op,
      'cache_wsdl'  => WSDL_CACHE_NONE,
      'exceptions' => 0, 'trace' => 1,
      'location' => $devUrl
    ]);
    $client['acessoDTO'] = $acessoDTO;
    return $client;
  }

  public static function obterDadosBoletoVeiculo($chaveConsulta, $tipoChave)
  {
    $client = self::acessoDTO();
    $odbv = $client['soap']->obterDadosBoletoVeiculo(["chaveConsulta" => $chaveConsulta, "tipoChave" => $tipoChave], $client['acessoDTO']);
    $odbv = json_decode(json_encode($odbv), true);
    return $odbv;
  }

  public static function abrirCaixaEmpresaTerceira($cpf, $obs)
  {
    $client = self::acessoDTO();
    $acet = $client['soap']->abrirCaixaEmpresaTerceira(["cpfUsuarioCaixa" => $cpf, "observacao" => $obs], $client['acessoDTO']);
    return response()->json($acet);
  }

  public static function registrarPagamentoTerceiroBoleto($cpf, $obs)
  {
    $odbv = ApiDPA::obterDadosBoletoVeiculo('21312312', '2');
    $odbv = ApiDPA::obterDadosBoletoVeiculo('21312312', '2');

    $client = self::acessoDTO();
    $rptb = $client['soap']->abrirCaixaEmpresaTerceira(["cpfUsuarioCaixa" => $cpf, "observacao" => $obs], $client['acessoDTO']);
    return response()->json($rptb);
  }

  public static function consultarOrcamentoLicenciamentoAnoAtualCrediario($renavam, $placa)
  {
    $client = self::acessoDTO();
    $colaac = $client['soap']->consultarOrcamentoLicenciamentoAnoAtualCrediario($placa, $renavam, $client['acessoDTO']);
    $colaac = json_decode(json_encode($colaac), true);
    return $colaac;
  }

  public static function gerarBoletoLicenciamentoAnoAtualCrediario($renavam, $placa)
  {
    $client = self::acessoDTO();
    $dadosBoleto = self::consultarOrcamentoLicenciamentoAnoAtualCrediario($renavam, $placa);
    $cdRenavam = $dadosBoleto['cdRenavam'];
    $nmSacado = $dadosBoleto['nmProprietario'];
    $noDocumentoSacado = $dadosBoleto['cpfCnpjProprietario'];
    $placaUnica = $dadosBoleto['placaUnica'];
    $gerarBoleto = $client['soap']->gerarBoletoLicenciamentoAnoAtualCrediario([
      'cdRenavam' => $cdRenavam, 'nmSacado' => $nmSacado, 'noDocumentoSacado' => $noDocumentoSacado, 'placaUnica' => $placaUnica,
    ], $client['acessoDTO']);
    return json_decode(json_encode($gerarBoleto), true);
  }
  public static function consultarOrcamentoLicenciamentoAnoAnteriorCrediario($renavam, $placa)
  {
    $client = self::acessoDTO();
    $colaac = $client['soap']->consultarOrcamentoLicenciamentoAnoAnteriorCrediario($placa, $renavam, $client['acessoDTO']);
    $colaac = json_decode(json_encode($colaac), true);
    return $colaac;
  }
  public static function gerarBoletoLicenciamentoAnoAnteriorCrediario($renavam, $placa)
  {
    $client = self::acessoDTO();
    $dadosBoleto = self::consultarOrcamentoLicenciamentoAnoAnteriorCrediario($renavam, $placa);
    $cdRenavam = $dadosBoleto['cdRenavam'];
    $nmSacado = $dadosBoleto['nmProprietario'];
    $noDocumentoSacado = $dadosBoleto['cpfCnpjProprietario'];
    $placaUnica = $dadosBoleto['placaUnica'];
    $gerarBoleto = $client['soap']->gerarBoletoLicenciamentoAnoAnteriorCrediario([
      'cdRenavam' => $cdRenavam, 'nmSacado' => $nmSacado, 'noDocumentoSacado' => $noDocumentoSacado, 'placaUnica' => $placaUnica,
    ], $client['acessoDTO']);
    return json_decode(json_encode($gerarBoleto), true);
  }
}
