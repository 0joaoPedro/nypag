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
                <h3 class="mt-4">Simulando os Valores</h3>
              </div>
              <div class="d-flex flex-md-row px-3 mt-4 flex-column-reverse">
                <div class="col-md-3">
                  <div class="card1">
                    <ul id="progressbar" class="text-center">
                      <li class="step0"></li>
                      <li class="active step0"></li>
                      <li class="step0" style="margin-bottom: 30px;"></li>
                      <li class="step0" style="margin-bottom: 0;"></li>
                    </ul>
                    <h6 class="mb-5">Consulte seus Débitos</h6>
                    <h6 class="mb-5">Simulando os Valores</h6>
                    <h6 class="mb-5">Pagamento</h6>
                    <h6 class="mb-5">Confirmação</h6>
                  </div>
                </div>
                <div class="col card card0 border-0">
                  <div class="cart-detail cart-total p-3 p-md-4" style="border-color:transparent">
                    <h3 class="billing-heading mb-4">Débitos em Aberto</h3>
                    <p class="d-flex">
                      <span>Subtotal</span>
                      <span>$20.60</span>
                    </p>
                    <p class="d-flex">
                      <span>Multa</span>
                      <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                      <span>Licenciamento</span>
                      <span>$3.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                      <span>Total</span>
                      <span>$17.60</span>
                    </p>
                  </div>
                </div>
                <div class="col ftco-animate">
                  <div class="sidebar-box ftco-animate cart-detail cart-total ">
                    <h3 class="heading">Opções de Parcelamento</h3>
                    <span>Clique em uma das opções para avançar</span>
                    <ul class="categories">
                      <li><a href="#">DÉBITO | 1.053,98 <span style="color:#565050">R$ 1.053,98</span></a></li>
                      <li><a href="#">C.VISTA | 1.113,85 <span style="color:#565050">R$ 1.113,85</span></a></li>
                      <li><a href="#">2x | 596,87<span style="color:#565050">R$ 1.193,73</span></a></li>
                      <li><a href="#">3x | 401,41<span style="color:#565050">R$ 1.204,23</span></a></li>
                      <li><a href="#">4x | 303,73<span style="color:#565050">R$ 1.214,92</span></a></li>
                      <li><a href="#">5x | 245,16<span style="color:#565050">R$ 1.225,81</span></a></li>
                      <li><a href="#">6x | 206,15<span style="color:#565050">R$ 1.236,89</span></a></li>
                      <li><a href="#">7x | 178,85<span style="color:#565050">R$ 1.251,95</span></a></li>
                      <li><a href="#">8x | 159,08<span style="color:#565050">R$ 1.272,66</span></a></li>
                      <li><a href="#">9x | 142,72<span style="color:#565050">R$ 1.284,48</span></a></li>
                      <li><a href="#">10x | 129,65<span style="color:#565050">R$ 1.296,52</span></a></li>
                      <li><a href="#">11x | 118,98<span style="color:#565050">R$ 1.308,79</span></a></li>
                      <li><a href="#">12x | 110,11<span style="color:#565050">R$ 1.321,30</span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="row px-3 justify-content-end">
                <div class="back-button text-center m-2 btn-consultar"><span class="fa fa-arrow-left"></span> Voltar  </div>
                <div class="next-button text-center m-2 btn-consultar"> Consultar <span class="fa fa-arrow-right"></span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<form  method="POST" action="{{ route('debitos.checkout') }}" class="hidden form-checkout">
  {{ csrf_field() }}
</form>
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
  $(document).on("click", ".categories", function() {
    $(".form-checkout").submit();
  });
  $(document).on("submit", ".form-checkout", function() {
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