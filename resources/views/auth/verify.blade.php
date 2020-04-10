@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:70px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verficação de seu numero de celular') }}</div>
                <div class="card-body">
                    <form accept-charset="UTF-8" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="code">Digite o código:</label>
                            <input type="text" class="form-control text-right" name="code" aria-describedby="h_code" placeholder="Digite o código" autocomplete="off">
                            @error('code')
                            <small id="h_code" class="text-danger form-text">{{ $message }}</small>
                            @enderror
                            @error('verified')
                            <small id="h_code" class="text-danger form-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <button name="button" type="submit" class="btn btn-success">Verificar</button>
                        </div>
                    </form>
                    <hr />
                    <h4>Não recebeu o código?</h4>
                    <form accept-charset="UTF-8" method="post" action="{{ url('/resend') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label><input type="radio" class="hidden" name="channel" value="sms" checked /></label>
                            <button id="btEnviar" name="form-submit" type="submit" class="btn btn-secondary">Reenviar</button>
                        </div>
                        <div class="form-group mb-2">
                            <p id="clock"></p>
                            <p id="clockMsg" class="hidden">Aguarde para solicitar um novo código.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
