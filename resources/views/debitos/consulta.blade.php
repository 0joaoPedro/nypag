@extends('layouts.app')
@section('content')
<div class="container-fluid px-1 px-md-4 py-5 mx-auto">
  <div class="row d-flex justify-content-center">
    <div class="col-12">
      <div class="card card0 border-0">
        <div class="row">
          <div class="col-12">
            <div class="card card00 m-2 border-0">
              <div class="back-button text-center m-2 btn-consultar"><span class="fa fa-arrow-left"></span> Voltar  </div>
              <div class="row text-center justify-content-center px-3">
                <h3 class="mt-4">Consulte seus Débitos</h3>
              </div>
              <div class="d-flex flex-md-row px-3 mt-4 flex-column-reverse">
                <div class="col-md-4">
                  <div class="card1">
                    <ul id="progressbar" class="text-center">
                      <li class="active step0"></li>
                      <li class="step0"></li>
                      <li class="step0" style="margin-bottom: 30px;"></li>
                      <li class="step0" style="margin-bottom: 0;"></li>
                    </ul>
                    <h6 class="mb-5">Consulte seus Débitos</h6>
                    <h6 class="mb-5">Simulando os Valores</h6>
                    <h6 class="mb-5">Pagamento</h6>
                    <h6 class="mb-5">Confirmação</h6>
                  </div>
                </div>
                <div class="col">
                  <div class="card2 first-screen show ml-2">
                    <div class="row px-3 mt-4">
                      <form method="POST" action="{{ route('debitos.simulador') }}" class="form-debitos">
                        {{ csrf_field() }}
                        <div class="row align-items-end">
                          <div class="col-md-6">
                            <p class="mb-0">Estado / Serviço</p>
                            <div class="form-group" style="margin-bottom: 0;">
                              <div class="select">
                                <select name="account" class="form-control mb-0">
                                  <option value="am">Detran-AM</option>
                                  <option value="pa">Detran-PA</option>
                                  <option value="rs">Detran-RS</option>
                                  <option value="ms">Detran-MS</option>
                                  <option value="uv">Pref.-União da Vitória</option>
                                  <option value="boleto">Pagar Boleto</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group mt-1 mb-1">
                              <input type="text" id="cpf" class="form-control" required>
                              <label class="ml-3 form-control-placeholder" for="cpf">CPF</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group mt-1 mb-1">
                              <input type="text" id="placa" class="form-control" required>
                              <label class="ml-3 form-control-placeholder" for="placa">Placa</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group mt-1 mb-1">
                              <input type="text" id="renavam" class="form-control" required>
                              <label class="ml-3 form-control-placeholder" for="renavam">Renavam</label>
                            </div>
                          </div>
                          <div class="w-100"></div>
                          <div class="col-md-6">
                            <div class="form-group mt-1 mb-1">
                              <input type="text" id="telefone" class="form-control" required>
                              <label class="ml-3 form-control-placeholder" for="telefone">Telefone</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group mt-1 mb-1">
                              <input type="text" id="email" class="form-control" required>
                              <label class="ml-3 form-control-placeholder" for="email">Email</label>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="row px-3 justify-content-end">
                <div class="next-button text-center m-2 btn-consultar"> Consultar <span class="fa fa-arrow-right"></span> </div>
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
  $(document).on("click", ".btn-consultar", function() {
    $(".form-debitos").submit();
  });
  $(document).on("submit", ".form-debitos", function () {
    var url = $(this).attr("action");
    var get = $(this).attr("method");
    var data = $(this).serializeArray();
    console.log(data);
    $.ajax({
      url: url,
      type: get,
      data: data,
      success: function (data) {
        console.log(data);
      },
      error: function (data) {
        if (data.status == 404 || data.status == 401) {
          location.reload();
        } else if (data.status == 403) {
          $(list).html("Você não tem acesso a essa informações!!");
        }
        $(".se-pre-con").fadeOut();
      }
    });
  });
  $(document).ready(function () {
    var quantitiy = 0;
    $('.quantity-right-plus').click(function (e) {

      // Stop acting like a button
      e.preventDefault();
      // Get the field name
      var quantity = parseInt($('#quantity').val());

      // If is not undefined

      $('#quantity').val(quantity + 1);


      // Increment

    });

    $('.quantity-left-minus').click(function (e) {
      // Stop acting like a button
      e.preventDefault();
      // Get the field name
      var quantity = parseInt($('#quantity').val());

      // If is not undefined

      // Increment
      if (quantity > 0) {
        $('#quantity').val(quantity - 1);
      }
    });

  });
  $(document).ready(function () {
    var current_fs, next_fs, previous_fs;
    // No BACK button on first screen
    // if ($(".show").hasClass("first-screen")) {
    //   $(".prev").css({ 'display': 'none' });
    // }

    // Next button
    // $(".next-button").click(function () {
    //   current_fs = $(this).parent().parent();
    //   next_fs = $(this).parent().parent().next();

    //   $(".prev").css({ 'display': 'block' });

    //   $(current_fs).removeClass("show");
    //   $(next_fs).addClass("show");

    //   $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");

    //   current_fs.animate({}, {
    //     step: function () {
    //       current_fs.css({
    //         'display': 'none',
    //         'position': 'relative'
    //       });

    //       next_fs.css({
    //         'display': 'block'
    //       });
    //     }
    //   });
    // });

    // Previous button
    // $(".prev").click(function () {
    //   current_fs = $(".show");
    //   previous_fs = $(".show").prev();

    //   $(current_fs).removeClass("show");
    //   $(previous_fs).addClass("show");

    //   $(".prev").css({ 'display': 'block' });

    //   if ($(".show").hasClass("first-screen")) {
    //     $(".prev").css({ 'display': 'none' });
    //   }

    //   $("#progressbar li").eq($(".card2").index(current_fs)).removeClass("active");

    //   current_fs.animate({}, {
    //     step: function () {
    //       current_fs.css({
    //         'display': 'none',
    //         'position': 'relative'
    //       });

    //       previous_fs.css({
    //         'display': 'block'
    //       });
    //     }
    //   });
    // });
  });
</script>
@endpush