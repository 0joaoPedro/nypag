@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:70px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-title">
                    <h5>Resultado: </h5>
                </div>
                <div class="card-body">
                <!-- {{ isset($resultError[$paymentReturn]) ? $resultError[$paymentReturn] : null }}
                    {{ $resp }} -->
                    Pagamento Realizado com sucesso !
                </div>
                <div class="card-foot">
                   <a href="{{ route('home') }}" class="btn btn-success float-right m-2"> Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection