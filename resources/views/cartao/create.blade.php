@extends('layouts.app')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="tab-content">
                <div id="simular-create" class="tab-pane fade active show" role="tabpanel" aria-labelledby="simular-create-tab">
                    <div class="card add-card" style="top:50px">
                        <div class="card-header">
                            <h4>Informações do catão de crédito</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-3">
                                        <div class="card-wrapper" data-jp-card-initialized="true">
                                            <div class="jp-card-container">
                                                <div id="front-card" class="jp-card jp-card-identified">
                                                    <div class="jp-card-front">
                                                        <div class="jp-card-logo jp-card-elo">
                                                            <div class="e">e</div>
                                                            <div class="l">l</div>
                                                            <div class="o">o</div>
                                                        </div>
                                                        <div class="jp-card-logo jp-card-visa">Visa</div>
                                                        <div class="jp-card-logo jp-card-visaelectron">Visa<div class="elec">Electron</div>
                                                        </div>
                                                        <div class="jp-card-logo jp-card-mastercard">Mastercard</div>
                                                        <div class="jp-card-logo jp-card-maestro">Maestro</div>
                                                        <div class="jp-card-logo jp-card-amex"></div>
                                                        <div class="jp-card-logo jp-card-discover">discover</div>
                                                        <div class="jp-card-logo jp-card-dinersclub"></div>
                                                        <div class="jp-card-logo jp-card-dankort">
                                                            <div class="dk">
                                                                <div class="d"></div>
                                                                <div class="k"></div>
                                                            </div>
                                                        </div>
                                                        <div class="jp-card-logo jp-card-jcb">
                                                            <div class="j">J</div>
                                                            <div class="c">C</div>
                                                            <div class="b">B</div>
                                                        </div>
                                                        <div class="jp-card-lower">
                                                            <div class="jp-card-shiny"></div>
                                                            <div class="jp-card-cvc jp-card-display">•••</div>
                                                            <div class="jp-card-number jp-card-display">•••• •••• •••• ••••</div>
                                                            <div class="jp-card-name jp-card-display">Nome Completo</div>
                                                            <div class="jp-card-expiry jp-card-display" data-before="mês/ano" data-after="data validade">••/••</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                        <form id="form-item-store" method="POST" enctype="multipart/form-data" action="{{ route('cartao.store') }}">
                                            {{ csrf_field() }} @csrf
                                            <fieldset class="mb-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control card-number" name="number" id="card-number" maxlength="19" placeholder="Número do Cartão">
                                                </div>
                                            </fieldset>
                                            <fieldset class="mb-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control card-name" name="name" id="card-name" placeholder="Nome Escrito no Cartão">
                                                </div>
                                            </fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="mb-1">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control card-expiry" name="expiry" id="card-expiry" placeholder="Data de Validade">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="mb-1">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control card-cvc" name="cvc" id="card-cvc" maxlength="16" placeholder="Número do CVV">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="submit" id="generate" name="generate" value="Cadastrar" class="btn round btn-primary box-shadow-1 px-3 mr-1">
                                                    <a type="button" name="cancel" value="Voltar" href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(".form-item-lista").submit();
});
</script>
@endsection
