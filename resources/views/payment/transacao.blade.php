@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card" style="top:50px;">

        <div class="card-body">
            <h6 style="font-weight: 600;">Todas as Atividades</h6>
            <table class="table">
                <tbody>
                    @forelse($payments as $p)
                    <tr style="font-size: 1rem; font-weight: 500; border-bottom: 1px dotted #9da3a6;">
                        <td scope="row" class="text-center">
                            <div class="text-uppercase">{{ $p->data_mes }}</div>
                            <div>{{ $p->data_dia }}</div>
                        </td>
                        <td>
                            <div class="text-uppercase">{{ $p->descricao }}</div>
                            <div style="font-size: .7375rem; font-weight: 500;">
                                @if($p->status)Aprovada
                                @elseif(is_bool($p->status)) Reprovada | <a href="{{ url('/pagamento') }}">Tente Novamente</a>
                                @else Aguardando Pagamento | <a href="{{ url('/pagamento') }}">Pague Aqui</a>@endif
                            </div>
                        </td>
                        <td class="text-right" style="vertical-align: middle;">
                            <div class="text-uppercase">R$ {{ $p->valor_formatado }}</div>
                            @if($p->payment_id)
                            <div style="font-size: .7375rem; font-weight: 500;">Cartão Usado: {{ $p->cartao['CardNumber'] }}</div>
                            <div style="font-size: .7375rem; font-weight: 500;">Método: {{ __($p->compra['tipo']) }}</div>
                            @if ($p->compra['parcela'])
                            <div style="font-size: .7375rem; font-weight: 500;">Parcelas: {{ $p->compra['parcela'] }}</div>
                            @endif
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr style="font-size: 1rem; font-weight: 500; border-bottom: 1px dotted #9da3a6;">
                        <td scope="row" class="text-center">
                            Não foi encontrada nenhuma atividade!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
