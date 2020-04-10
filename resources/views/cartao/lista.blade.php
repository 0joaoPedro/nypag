@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:70px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-title">
                    <h5>@if(isset($cards))
                        Seus Cartões
                        @else
                        Nenhum Cartão cadastrado
                        @endif
                    </h5>
                    <a href="{{ route('cartao.create') }}" class="btn btn-outline-success btn-square btn-item-confirm-autorizado"><i class="mdi mdi-checkbox-multiple-marked-outline"></i> ADICIONAR CARTÃO</a>
                </div>
                <div class="card-body">
                    @if(isset($cards))
<<<<<<< HEAD
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome no Cartão</th>
                                <th>Número do Cartão</th>
                                <th class="text-right">Data de Validade</th>
                                <th width="55"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cards as $card)
                            <tr id="lista-cartao">
                                <th scope="row">{{ $card[1] }}</th>
                                <td>{{ $card[2] }}</td>
                                <td class="text-right">{{ $card[3] }}</td>
                                <td width="55">
                                    <div class="tools" style="background-color: transparent;margin-top: -10px;">
                                        <ul>
                                            <button type="button" class="btn-outline-danger" data-toggle="modal" data-target="#deleteCvvModal"><i class="mdi mdi-delete"></i>Remover</button>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="deleteCvvModal" tabindex="-1" role="dialog" aria-labelledby="cvvModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cvvModalLabel">Deletando o Cartão</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span>Tem certeza que quer remover este cartão?</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" data-route="{{ route('cartao.delete', $card[0]) }}" class="btn btn-outline-success btn-square btn-cartao-delete">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>
=======
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome no Cartão</th>
                                    <th>Número do Cartão</th>
                                    <th class="text-right">Data de Validade</th>
                                    <th width="55"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cards as $card)
                                <tr id="lista-cartao">
                                    <th scope="row">{{ $card[1] }}</th>
                                    <td>{{ $card[2] }}</td>
                                    <td class="text-right">{{ $card[3] }}</td>
                                    <td width="55">
                                    <div class="tools" style="background-color: transparent;margin-top: -10px;">
                                        <ul>
                                        <li class="bqX btn-item-delete" data-tooltip="Excluir" data-route="{{ route('cartao.delete'), $card[0] }}"><i class="mdi mdi-delete"></i></li>
                                        </ul>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
>>>>>>> 034a422b8f1a4b6635acc7a924fd4089db75d93e
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
