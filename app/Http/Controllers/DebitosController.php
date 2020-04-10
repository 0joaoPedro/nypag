<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Helpers\ApiDMA;
use App\Helpers\ApiDRR;

class DebitosController extends Controller
{
  public function consulta(Request $request)
  {
    return view('debitos.consulta', compact('dados'));
      // switch ($request->tipo) {
      //   case 'f':
      //     $debitos = ApiDMA::licenciamento($request->renavam);
      //     break;
      //   case 'am':
      //     $debitos = ApiDRR::consultarVeiculo($request->placa, $request->renavam);
      //     dd($debitos);
      //     break;
      //   case 'uv':
      //     $od = \App\Helpers\ApiDPR::consultarLicenciamento($request->renavam);
      //     $od = \App\Helpers\ApiDPR::gerarLicenciamento($od['resultado'][0]['ciclo'], $request->renavam);
      //     dd($od);
      //     break;
      //   default:
      //     break;
      // }
  }
  
  public function simulador(Request $request)
  {
    return view('debitos.simulador');
  }
  
  public function checkout(Request $request)
  {
    return view('debitos.checkout');
  }

  public function pagamento(Request $request)
  {
    return $request->all();
  }
}
