@extends('layouts.app')
@auth
@section('content')
<div class="container" style="margin-top:70px">
	@if(!isset($data['simulador']))
	<div id="div-orgao">
		<h5 class="mb-4">Vamos comecar?</h5>
		<h5>Digite o valor para simular:</h5>
		<div class="row pb-4">
			<div class="col-lg-12 text-center p-0">
				<form action="" method="POST">
					@csrf
					<div class="input-group p-4">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroupFileAddon01">R$</span>
						</div>
						<input type="text" class="form-control text-right valor-format" name="valor" placeholder="0,00" required>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit">SIMULAR</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<h6 class="mb-4 text-center">OU</h6>
		<h5 class="mb-2 mt-4">Escolha a empresa crendenciada:</h5>
		<div class="row p-3">
			<div class="col-xl-2 col-lg-6 col-12 btn-simular-create pl-2 pr-2" rel="6">
				<div class="card pull-up">
					<div class="card-content">
						<div class="card-body p-2">
							<div class="media d-flex">
								<div class="media-body text-left">
									<div class="primary darken-4 font-weight-bold">DIVERSOS</div>
									<div>BOLETO</div>
								</div>
								<div>
									<i class="mdi mdi-barcode info font-large-2 float-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-2 col-lg-6 col-12 btn-simular-create pl-2 pr-2" rel="1">
				<div class="card pull-up">
					<div class="card-content">
						<div class="card-body p-2">
							<div class="media d-flex">
								<div class="media-body text-left">
									<div class="primary darken-4 font-weight-bold">DETRAN-AM</div>
									<div>BOLETO</div>
								</div>
								<div>
									<img src="{{ asset('image/logo-detran-am.svg') }}" style="height:40px">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-2 col-lg-6 col-12 btn-simular-create pl-2 pr-2" rel="2">
				<div class="card pull-up">
					<div class="card-content">
						<div class="card-body p-2">
							<div class="media d-flex">
								<div class="media-body text-left">
									<div class="primary darken-4 font-weight-bold">DETRAN-PA</div>
									<div>BOLETO</div>
								</div>
								<div>
									<img src="{{ asset('image/logo-detran-pa.png') }}" style="height:40px">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-2 col-lg-6 col-12 btn-simular-create pl-2 pr-2" rel="3">
				<div class="card pull-up">
					<div class="card-content">
						<div class="card-body p-2">
							<div class="media d-flex">
								<div class="media-body text-left">
									<div class="primary darken-4 font-weight-bold">DETRAN-PR</div>
									<div>BOLETO</div>
								</div>
								<div>
									<img src="{{ asset('image/logo-i-detran-pr.png') }}" style="height:40px">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-2 col-lg-6 col-12 btn-simular-create pl-2 pr-2" rel="4">
				<div class="card pull-up">
					<div class="card-content">
						<div class="card-body p-2">
							<div class="media d-flex">
								<div class="media-body text-left">
									<div class="primary darken-4 font-weight-bold">DETRAN-RS</div>
									<div>BOLETO</div>
								</div>
								<div>
									<i class="mdi mdi-barcode info font-large-2 float-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-2 col-lg-6 col-12 btn-simular-create pl-2 pr-2" rel="5">
				<div class="card pull-up">
					<div class="card-content">
						<div class="card-body p-2">
							<div class="media d-flex">
								<div class="media-body text-left">
									<div class="primary darken-4 font-weight-bold">CRECI-SP</div>
									<div>BOLETO</div>
								</div>
								<div>
									<i class="mdi mdi-barcode info font-large-2 float-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row hidden" id="div-servico">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="form-group mb-2">
						<label for="placa">SERVIÇO</label>
						<select class="custom-select" id="servico_id">
							<option selected>Selecione o tipo...</option>
							<option value="1">Detran-AM</option>
							<option value="2">Detran-PA</option>
							<option value="3">Detran-PR</option>
							<option value="3">Detran-RS</option>
							<option value="3">Detran-MS</option>
							<option value="3">Pref.-União da Vitória</option>
							<option value="3">JT-Maranhão</option>
							<option value="3">Pagar Boleto</option>
						</select>
					</div>
					<div class="form-group mb-2 hidden">
						<label for="placa">Placa</label>
						<input type="text" class="form-control" id="placa" aria-describedby="h-placa" placeholder="Digite a placa">
						<small id="h-placa" class="form-text text-muted">We'll never share your placa with anyone else.</small>
					</div>
					<div class="form-group mb-2 hidden">
						<label for="renavam">Renavam</label>
						<input type="text" class="form-control" id="renavam" aria-describedby="h-renavam" placeholder="Digite o renavam">
						<small id="h-renavam" class="form-text text-muted">We'll never share your renavam with anyone else.</small>
					</div>
					<div class="form-group mb-2 hidden">
						<label for="cnpj_cpf">CPF/CNPJ</label>
						<input type="text" class="form-control text-right cnpj_cpf" name="cnpj_cpf" aria-describedby="h_cnpj_cpf">
						@error('cnpj_cpf')
						<small id="h_cnpj_cpf" class="text-danger form-text">{{ $message }}</small>
						@enderror
					</div>
					<div class="text-right">
						<button name="form-submit" class="text-right btn btn-primary" type="submit">CONSULTAR</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	@else
	@if(isset($data['descricao']))
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-1">Descrição dos Débitos</h5>
					<!-- <p class="card-text p-0 mb-1">Descricao dos debitos capturados via api.</p> -->
					<div class="row">
						<div class="table-responsive col-sm-12">
							<table class="table mb-0">
								<thead>
									<tr style="font-size: 1rem; font-weight: 500; border-bottom: 1px dotted #9da3a6;">
										<th>#</th>
										<th>Descrição</th>
										<th class="text-right">Valor</th>
									</tr>
								</thead>
								<tbody>
									<tr style="font-size: 1rem; font-weight: 500; border-bottom: 1px dotted #9da3a6;">
										<td scope="row">1</td>
										<td>Licenciamento Ano Atual - 2019</td>
										<td class="text-right">R$ 140.00</td>
									</tr>
									<tr style="font-size: 1rem; font-weight: 500; border-bottom: 1px dotted #9da3a6;">
										<td scope="row">2</td>
										<td>Seguro (DPVAT) - Ano Atual</td>
										<td class="text-right">R$ 50.00</td>
									</tr>
									<tr style="font-size: 1rem; font-weight: 500; border-bottom: 1px dotted #9da3a6;">
										<td scope="row">3</td>
										<td>IPVA Ano Atual - 2019</td>
										<td class="text-right">R$ 60.00</td>
									</tr>
								</tbody>
								<tfoot>
									<tr style="font-size: 1rem; font-weight: 500;">
										<th colspan="2"></th>
										<th class="text-right">R$ 250,00</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="list-group">
						<h5 class="card-title mb-1">Forma de pagamento</h5>
						<p class="card-tetx p-0 mb-1">Clique na parcela desejada!.</p>
						<div class="row">
							<div class="table-responsive col-sm-12">
								<form method="post">
									<table class="table table-hover table-sm mb-0">
										@php
										foreach($data['simulador'] as $k => $i){
										$i['multi'] = $i['forma'] == "DÉBITO" ? 0 : $i['multi'] ;
										$i['forma'] = $i['forma'] == "C. À VISTA" ? "C.VISTA" : ( $i['forma'] == "DÉBITO" ? "DÉBITO" : $i['multi']."x");
										@endphp
										<tr style="font-size: 1rem;font-weight: 500;border-bottom: 1px dotted #9da3a6;">
                                            <td class="p-0 {{ $data['ordem']['forma'] == $i['multi'] ? 'atual' : 'hidden' }}">
                                                <div class="pretty parcela p-icon p-curve p-tada ml-1" style="display: block;">
                                                    <input type="radio" name="order_id" id="order-{{$k}}" value='{{$k}}' data-multi="{{ $i['multi'] }}" {{ $data['ordem']['forma'] == $i['multi'] ? 'checked' : null }}>
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
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row hidden">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<h5 class="card-title mb-0">Tipo de Boleto</h5>
							<p class="card-tetx p-1 mb-2">Clique na parcela desejada!.</p>
						</div>
						<div class="col-12">
							<div class="pretty p-icon p-curve p-tada">
								<input type="radio" name="boleto_tipo" name="radio1">
								<div class="state p-primary-o">
									<i class="icon mdi mdi-check"></i>
									<label>Água, Luz, Telefone e Gás</label>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="pretty p-icon p-curve p-tada">
								<input type="radio" name="boleto_tipo" name="radio1">
								<div class="state p-primary-o">
									<i class="icon mdi mdi-check"></i>
									<label>Boleto de Cobrança</label>
								</div>
							</div>
						</div>
						<div class="col-12 mb-4">
							<div class="pretty p-icon p-curve p-tada">
								<input type="radio" name="boleto_tipo" name="radio1">
								<div class="state p-primary-o">
									<i class="icon mdi mdi-check"></i>
									<label>Outros Pagamentos</label>
								</div>
							</div>
						</div>
						<div class="col-12">
							<h5 class="card-title mb-0">Número do Boleto</h5>
							<p class="card-tetx p-1 mb-2">Digitar o Numero do Boleto.</p>
						</div>
						<div class="col-12 mb-4">
							<input type="text" class="form-control text-right" name="numero_boleto">
						</div>
						<div class="col-12">
							<h5 class="card-title mb-0">Arquivo</h5>
							<p class="card-tetx p-1 mb-2">Envie uma foto ou o arquivo da conta que deseja pagar.</p>
						</div>
						<div class="col-12">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="" lang="es">
								<label class="custom-file-label" for="customFileLang" data-browse="Click aqui para selecionar o arquivo"> Selecione arquivo do tipo: pdf, png, jpeg</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="" id="cred-card">
		@if(isset($cards))
		<div class="card add-card table-cartao">
			<div class="card-body">
				<h5>Meus Cartões</h5>
				<table class="table">
					<tbody>
						@foreach ($cards as $card)
						<tr id="lista-cartao" style="border-bottom: 1px dotted #9da3a6;">
							<td class="align-middle">
								<div>
									{{ $card[1] }} {{ $card[2] }}
								</div>
								<div class="text-muted">
									Cartão expira {{ $card[3] }}
								</div>
							</td>
							<td class="text-right">
								<input type="hidden" class="card" value="{{ $card[0] }}">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-outline-success btn-usar" data-toggle="modal" data-target="#cvvModal"><i class="mdi mdi-check"></i>Usar</button>
								<!-- Modal -->
								<div class="modal fade" id="cvvModal" tabindex="-1" role="dialog" aria-labelledby="cvvModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="cvvModalLabel">Digite o Código de Verificação do Cartão (CVV).</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<input type="number" class="form-control cvv" min="3" max="4" placeholder="CVV" name="cvv" required>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<button type="button" data-route="" class="btn btn-outline-success btn-square btn-item-confirm-auth btn-confirmar">Confirmar</button>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<a class="btn btn-outline-primary rounded-pill float-right btn-novo-cartao btn-item-confirm-autorizado"><i class="mdi mdi-checkbox-multiple-marked-outline"></i> USAR NOVO CARTÃO</a>
			</div>
		</div>
		<div class="card add-card novo-cartao hidden">
			<form id="form-item-store" method="POST" action="{{ route('transacoes.store') }}">
				<div class="card-body">
					{{ csrf_field() }} @csrf
					<h5>Novo Cartão</h5>
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
							<div class="form-group">
								<input type="text" class="form-control card-number" name="number" id="card-number" maxlength="19" placeholder="Número do Cartão">
							</div>
							<div class="form-group">
								<input type="text" class="form-control card-name" name="name" id="card-name" placeholder="Nome Escrito no Cartão">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control card-expiry" name="expiry" id="card-expiry" placeholder="Data de Validade">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control card-cvc" name="cvc" id="card-cvc" maxlength="16" placeholder="Número do CVV">
									</div>
								</div>
							</div>
							<div class="col-12 pl-3 mt-0 mb-2">
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="save" name="save">
									<label class="custom-control-label" for="save">Deseja salvar este cartão para usar na proxima compra?</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-muted">
					<div class="col-12 p-0">
						<a class="btn btn-outline-primary rounded-pill btn-voltar btn-item-confirm-autorizado">Voltar</a>
						<button type="submit" class="btn btn-primary rounded-pill box-shadow-1 mr-2 float-right"><i class="mdi mdi-checkbox-multiple-marked-outline"></i> REALIZAR PAGAMENTO</button>
					</div>
				</div>
			</form>
		</div>
		@else
		<div class="card add-card table-cartao">
			<div class="card-body">
				<h5>Meus Cartões</h5>
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
						<form method="POST" action="{{ route('transacoes.store') }}">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control card-number" name="number" id="card-number" maxlength="19" placeholder="Número do Cartão">
							</div>
							<div class="form-group">
								<input type="text" class="form-control card-name" name="name" id="card-name" placeholder="Nome Escrito no Cartão">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control card-expiry" name="expiry" id="card-expiry" placeholder="Data de Validade">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control card-cvc" name="cvc" id="card-cvc" maxlength="16" placeholder="Número do CVV">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 pl-4 mt-2 mb-4">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" id="save" name="save">
										<label class="custom-control-label" for="save">Deseja salvar este cartão para usar na proxima compra?</label>
									</div>
								</div>
								<div class="col-12 text-right p-0">
									<button type="submit" class="btn btn-primary rounded-pill box-shadow-1 mr-2">REALIZAR PAGAMENTO</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- <div class="card-footer text-muted">
					<div class="col-12 p-0">
						<button type="submit" class="btn btn-primary rounded-pill box-shadow-1 mr-2 float-right"><i class="mdi mdi-checkbox-multiple-marked-outline"></i> REALIZAR PAGAMENTO</button>
					</div>
				</div> -->
			</div>
		</div>
		@endif
	</div>
	<form id="form-payment-create" class="hidden" method="POST">
		@csrf
		<input type="hidden" name="ordem_id" value="{{ $data['ordem']['id'] }}">
		<div></div>
	</form>
	@endif
</div>

<form id="form-item-delete" class="hidden" method="POST">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}
</form>
@endsection
@endauth