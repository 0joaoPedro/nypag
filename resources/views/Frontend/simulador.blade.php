@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:70px">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
          @foreach($data['boleto'] as $b)
            <input type="hidden" name="boleto" value="{{ $b['boleto'] }}">
            <input type="hidden" name="valor" value="{{ $b['valor'] }}">
          @endforeach
          <div class="card-body">
            <div class="list-group">
              <h5 class="card-title mb-1">Forma de pagamento</h5>
              <p class="card-tetx p-0 mb-1">Clique na parcela desejada!.</p>
              <div class="row">
                <div class="table-responsive col-sm-12">
                  <table class="table table-hover table-sm mb-0">
                    @php
                    foreach($data['simulador'] as $k => $i){
                    $i['multi'] = $i['forma'] == "DÉBITO" ? 0 : $i['multi'] ;
                    $i['forma'] = $i['forma'] == "C. À VISTA" ? "C.VISTA" : ( $i['forma'] == "DÉBITO" ? "DÉBITO" : $i['multi']."x");
                    @endphp
                    
                    <tr style="font-size: 1rem;font-weight: 500;border-bottom: 1px dotted #9da3a6;">
                      <td class="p-0">
                        <div class="pretty parcela p-icon p-curve p-tada ml-1" style="display: block;">
                          <input type="radio" name="order_id" id="order-{{$k}}" value='{{$k}}' data-forma="{{ $i['forma'] }}" data-multi="{{ $i['multi'] }}" data-transacao="{{ $i['vtotal'] }}">
                          <div class="state p-primary-o">
                            <i class="icon mdi mdi-check"></i>
                            <label style="display: block; margin: 10px;">
                              <div class="forma font-small-1 text-right" style="min-width: 35px; display: inline-block;" id="forma">{{ $i['forma'] }} </div> |
                              <span class="font-medium-3 font-weight-bold" id="valor">R$ {{ $i['valor'] }}</span>
                              <span class="float-right">R$ {{ $i['vtotal'] }}</span>
                            </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @php
                    }
                    @endphp
                  </table>
                  <p class="atual-info hidden">*Para editar clique na opção selecionada acima</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-outline-primary btn-square btn-item-confirm-auth btn-confirmar hidden">QUERO PAGAR</button>
            <div class='col-12'>
              <div class="form-group mb-1">
                <label for="name">NOME COMPLETO</label>
                <input type="text" name="name" class="form-control text-right" value="{{ old('name') }}" aria-describedby="h_name" placeholder="Digite o seu nome completo" required>
                @error('name')
                <small id="h_name" class="text-danger form-text">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-1">
                <label for="cnpj_cpf">CPF/CNPJ</label>
                <input type="text" name="cnpj_cpf" value="{{ old('cnpj_cpf') }}" class="form-control text-right cnpj_cpf" aria-describedby="h_cnpj_cpf" required>
                @error('cnpj_cpf')
                <small id="h_cnpj_cpf" class="text-danger form-text">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-1">
                <label for="email">E-MAIL</label>
                <input type="email" class="form-control text-right" name="email" placeholder="Digite o email" value="{{ old('email') }}" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Insira um email válido" aria-describedby="h_email" required>
                @error('email')
                <small id="h_email" class="text-danger form-text">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="phone_number">TELEFONE</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control text-right" value="{{ old('phone_number') }}" aria-describedby="h_phone_number" placeholder="Digite o telefone" required>
                @error('phone_number')
                <small id="h_phone_number" class="text-danger form-text">{{ $message }}</small>
                @enderror
              </div>
              <div class="text-right">
                <input type="hidden" name="multi">
                <input type="hidden" name="valor_transacao" value="{{ $b['valor'] }}">
                <input class="hidden" type="radio" name="channel" value="sms" checked />
                <a href="#" class="btn-login text-left mr-4">Já possui cadastro?</a>
                <button type="submit" class="text-right btn btn-outline-primary">CADASTRAR</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<form method="POST" action="{{ route('login') }}" id="login" class="hidden">
  <h5>Logar</h5>
  <hr>
  @csrf
  <div class="form-group mb-2">
    <label for="cnpj_cpf">CPF/CNPJ</label>
    <input type="text" class="form-control text-right cnpj_cpf" name="cnpj_cpf" aria-describedby="h_cnpj_cpf">
    @error('cnpj_cpf')
    <small id="h_cnpj_cpf" class="text-danger form-text">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group mb-2">
    <label for="password">SENHA</label>
    <input type="password" class="form-control text-right" name="password" aria-describedby="h_password" placeholder="Digite uma senha">
    @error('password')
    <small id="h_password" class="text-danger form-text">{{ $message }}</small>
    @enderror
  </div>
  <div class="text-right">
    <a href="#" class="btn-login text-left mr-4">Não possui cadastro?</a>
    <button name="form-submit" class="text-right btn btn-primary" type="submit">CONSULTAR</button>
  </div>
</form>
@endsection
