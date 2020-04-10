@extends('layouts.app')
@section('content')
<div class="container-fluid px-1 px-md-4 py-5 mx-auto">
  <div class="row d-flex justify-content-center">
    <div class="col-12">
      <div class="card card0 border-0">
        <div class="row">
          <div class="col-12">
            <div class="card card00 m-2 border-0">
              <div class="row text-center justify-content-center px-3">
                <h3 class="mt-4">Pagamento</h3>
              </div>
              <div class="d-flex flex-md-row px-3 mt-4 flex-column-reverse flex-wrap">
                <div class="col-md-3">
                  <div class="card1">
                    <ul id="progressbar" class="text-center">
                      <li class="step0"></li>
                      <li class="step0"></li>
                      <li class="active step0" style="margin-bottom: 30px;"></li>
                      <li class="step0" style="margin-bottom: 0;"></li>
                    </ul>
                    <h6 class="mb-5">Consulte seus Débitos</h6>
                    <h6 class="mb-5">Simulando os Valores</h6>
                    <h6 class="mb-5">Pagamento</h6>
                    <h6 class="mb-5">Confirmação</h6>
                  </div>
                </div>
                <div style="width: 75%;">
                  <h5 class="card-title mb-1">Forma de pagamento</h5>
                  <tr class="parcelas" style="font-size: 1rem;font-weight: 500;border-bottom: 1px dotted #9da3a6;">
                    <td>
                      <a href="#" style="padding: 0.3rem 0.85rem;">
                        <div class="forma font-small-1 text-right" style="min-width: 35px; display: inline-block;"
                          id="forma"></div> |
                        <span class="font-medium-3" id="valor"> </span>
                        <span
                          class="vtotal badge badge-default badge-pill bg-blue-grey bg-lighten-5 blue-grey lighten-1 float-right">
                        </span>
                      </a>
                    </td>
                  </tr>
                </div>
                <div class="align-self-center" style="border-top-style:solid; border-top-color: #F5F5F5;">
                  <h5 class="ml-5 pl-5"> Preencha os dados do Cartão </h5>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="ml-5 pl-5 col-xl-4">
                        <i class="fas fa-credit-card" style="font-size: 230px; color: #002fdcb5;"></i>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 ml-4">
                        <form id="form-item-store" method="POST" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group mt-1 mb-1">
                                <input type="text" id="numero_cartao" class="form-control" required>
                                <label class="ml-3 form-control-placeholder" for="numero_cartao">Número do Cartão</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group mt-1 mb-1">
                                <input type="text" id="nome_cartao" class="form-control" required>
                                <label class="ml-3 form-control-placeholder" for="nome_cartao">Nome no Cartão</label>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <p class="mb-0">Mês de Validade</p>
                              <div class="form-group" style="margin-bottom: 0;">
                                <div class="select">
                                  <select name="account" class="form-control mb-0">
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-0">Ano de Validade</p>
                              <div class="form-group" style="margin-bottom: 0;">
                                <div class="select">
                                  <select name="account" class="form-control mb-0">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 mt-2">
                              <div class="form-group mt-1 mb-1">
                                <input type="text" id="cvv" class="form-control" required>
                                <label class="ml-3 form-control-placeholder" for="cvv">CVV</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <fieldset class="mt-4">
                                <div class="form-group">
                                  <a type="button" id="create-payment" name="create-payment" data-route="http://localhost/ny-pag/public/payment" value="Usar" class="btn btn-primary">Usar</a>
                                </div>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title mb-1">Descrição dos Débitos</h5>
                      <!-- <p class="card-text p-0 mb-1">Descricao dos debitos capturados via api.</p> -->
                      <div class="row">
                        <div class="table-responsive col-sm-12">
                          <table class="table">
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('style')
<style>
  .card0 {
    background-color: #F5F5F5;
    border-radius: 8px;
    z-index: 0
  }

  .card00 {
    z-index: 0
  }

  .card1 {
    margin-left: 30px;
    z-index: 0;
    border-right: 1px solid #F5F5F5
  }

  .card2 {
    display: none
  }

  .card2.show {
    display: block
  }

  .social {
    border-radius: 50%;
    background-color: #FFCDD2;
    color: #347cbe;
    height: 47px;
    width: 47px;
    padding-top: 16px;
    cursor: pointer
  }

  input,
  select {
    padding: 2px;
    border-radius: 0px;
    box-sizing: border-box;
    color: #9E9E9E;
    border: 1px solid #BDBDBD;
    font-size: 16px;
    letter-spacing: 1px;
    height: 50px !important
  }

  select {
    width: 100%;
    margin-bottom: 85px
  }

  input:focus,
  select:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #347cbe !important;
    outline-width: 0 !important
  }

  .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
    background-color: #347cbe
  }

  .form-group {
    position: relative;
    margin-bottom: 1.5rem;
    width: 77%
  }

  .form-control-placeholder {
    position: absolute;
    top: 0px;
    padding: 12px 2px 0 2px;
    transition: all 300ms;
    opacity: 0.5
  }

  .form-control:focus+.form-control-placeholder,
  .form-control:valid+.form-control-placeholder {
    font-size: 95%;
    top: 10px;
    transform: translate3d(0, -100%, 0);
    opacity: 1;
    background-color: #fff
  }

  .next-button {
    width: 18%;
    height: 50px;
    background-color: #BDBDBD;
    color: #fff;
    border-radius: 6px;
    padding: 10px;
    cursor: pointer
  }

  .next-button:hover {
    background-color: #347cbe;
    color: #fff
  }

  .back-button {
    width: 10%;
    height: 7%;
    background-color: #BDBDBD;
    color: #fff;
    border-radius: 6px;
    padding: 5px;
    cursor: pointer
  }

  .back-button:hover {
    background-color: #347cbe;
    color: #fff
  }

  .get-bonus {
    margin-left: 154px
  }

  .pic {
    width: 230px;
    height: 110px
  }

  #progressbar {
    position: absolute;
    left: -12%;
    overflow: hidden;
    color: #347cbe
  }

  #progressbar li {
    list-style-type: none;
    font-size: 8px;
    font-weight: 400;
    margin-bottom: 36px
  }

  #progressbar li:nth-child(3) {
    margin-bottom: 88px
  }

  #progressbar .step0:before {
    content: "";
    color: #fff
  }

  #progressbar li:before {
    width: 30px;
    height: 30px;
    line-height: 30px;
    display: block;
    font-size: 20px;
    background: #fff;
    border: 2px solid #347cbe;
    border-radius: 50%;
    margin: auto
  }

  #progressbar li:last-child:before {
    width: 40px;
    height: 40px
  }

  #progressbar li:after {
    content: '';
    width: 3px;
    height: 66px;
    background: #BDBDBD;
    position: absolute;
    left: 58px;
    top: 15px;
    z-index: -1
  }

  #progressbar li:last-child:after {
    top: 147px;
    height: 132px
  }

  #progressbar li:nth-child(3):after {
    top: 81px
  }

  #progressbar li:nth-child(2):after {
    top: 0px
  }

  #progressbar li:first-child:after {
    position: absolute;
    top: -81px
  }

  #progressbar li.active:after {
    background: #347cbe
  }

  #progressbar li.active:before {
    background: #347cbe;
    font-family: FontAwesome;
    content: "\f00c"
  }

  .tick {
    width: 100px;
    height: 100px
  }

  .prev {
    display: block;
    position: absolute;
    left: 40px;
    top: 20px;
    cursor: pointer
  }

  .prev:hover {
    color: #D50000 !important
  }

  @media screen and (max-width: 912px) {
    .card00 {
      padding-top: 30px
    }

    .card1 {
      border: none;
      margin-left: 50px
    }

    .card2 {
      border-bottom: 1px solid #F5F5F5;
      margin-bottom: 25px
    }

    .social {
      height: 30px;
      width: 30px;
      font-size: 15px;
      padding-top: 8px;
      margin-top: 7px
    }

    .get-bonus {
      margin-top: 40px !important;
      margin-left: 75px
    }

    #progressbar {
      left: -25px
    }
  }
</style>
@endpush
@push('scripts')
<script>
$(document).on("submit", ".btn-voltar", function() {
  var url = $(this).attr("action");
  var get = $(this).attr("method");
  var data = $(this).serializeArray();
  $.ajax({
    url: url,
    type: get,
    data: data,
    success: function (data) {
    },
    error: function(data) {
      if (data.status == 404 || data.status == 401) {
        location.reload();
      } else if (data.status == 403) {
        $(list).html("Você não tem acesso a essa informações!!");
      }
      $(".se-pre-con").fadeOut();
    }
  });
});
</script>
@endpush