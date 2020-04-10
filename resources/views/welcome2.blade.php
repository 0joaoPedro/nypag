<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PagTudoAzul</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,500,600" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.1.95/css/materialdesignicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <!-- Styles -->
  <style>
    body {
      /* background-image: url(image/website4a.png); */
      background-position: top;
      background-repeat: no-repeat;
      background-size: 100% 101%;
    }

    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      margin: 0;
    }

    section,
    #hero {
      height: 100vh;
    }

    section {
      padding-top: 70px;
    }

    header {
      height: 70px;
      border-bottom: 1px solid #fff;
      background-color: #fff;
    }

    header a {
      text-decoration: none;
      display: inline-block;
      color: #000;
      font-family: "Roboto", Helvetica, Arial, sans-serif;
      font-weight: 500;
      font-size: 17px;
      outline: none;
    }

    .brk-call-us {
      color: #fff;
      box-shadow: 0 5px 16px rgba(0, 0, 0, .07);
      border: 1px solid rgba(255, 255, 255, .2);
      position: relative;
      display: inline-block;
      border-radius: 21px;
      font-weight: 600;
      font-size: .875rem;
      text-decoration: none;
      margin: 0;
    }

    .brk-call-us__number {
      display: block;
      line-height: 40px;
      padding-left: 30px;
      padding-right: 60px;
      right: -40px;
      text-decoration: none;
      border: 1px solid;
    }

    .brk-call-us__link {
      right: 0;
      text-transform: uppercase;
      width: 40px;
      height: 42px;
      color: #fff;
      border: 1px solid;
      background-color: #0f0f93;
      box-shadow: 0 5px 16px rgba(0, 0, 0, .07);
    }

    .brk-call-us__link i {
      vertical-align: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .vh-89 {
      height: 89vh !important;
    }

    .btn-primary {
      color: #fff;
      background-color: #0f0f93;
      border-color: #0f0f93;
    }

    .btn-primary {
      color: #fff;
      background-color: #4fafe4;
      border-color: #32a2df;
    }

    .hidden {
      display: none !important;
      visibility: hidden !important;
    }

    .table-sm td,
    .table-sm th {
      padding: .2rem;
    }

    .btn-outline-white {
      color: #fff;
      border-color: #fff;
    }

    label {
      font-size: 12px;
      margin-bottom: .0rem;
    }

    header {
      background-color: #fff0;
      border-bottom: 1px solid rgba(255, 255, 255, .3);
    }

    .navbar-dark .navbar-nav .nav-link {
      color: #fff;
    }

    .navbar-color {
      background-color: #082f6a;
    }
  </style>
</head>

<!-- <body style="position: relative; overflow: hidden;"> -->

<body>
  <header class="navbar fixed-top navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('image/logo.png') }}" alt="" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link tab-section" href="#contato">Contato</a></li>
        <li class="nav-item"><a class="nav-link tab-section" href="#sobre">Quem Somos</a></li>
        <li class="nav-item"><a class="nav-link tab-section" href="#servico">Nossos Serviços</a></li>
        <!-- <li class="nav-item"><a class="nav-link tab-section" href="#cliente">Nossos Parceiros</a></li> -->
        <!-- <li class="nav-item"><a class="nav-link tab-section" href="#parceiro">Parceiro</a></li>
        <li class="nav-item"><a class="nav-link tab-section" href="#ondeestamos">Onde Estamos</a></li> -->
      </ul>
      <!-- <ul class="navbar-nav mr-auto">
        <li>
          <a href="/login">Acessar minha conta</a>
        </li>
      </ul> -->
      <form class="form-inline my-2 my-lg-0">
        <a href="tel:08000420216" class="brk-call-us brk-call-us__number">0800 0420 216</a>
        <a href="tel:08000420216" class="brk-call-us brk-call-us__link">
          <i class="mdi mdi-phone"></i>
        </a>
      </form>
    </div>
  </header>
  <div class="hero active" id="hero">
    <!-- <div class="content" style="background-image:url(https://www.paypalobjects.com/digitalassets/c/website/marketing/latam/br/home/revamp_hero/hero2.jpg);background-position:left center;position:relative;background-size: cover;height: 90vh;"> -->
      <div class="content" style="background-image:url({{ asset('image/hero1.png') }} );background-position:left center;position:relative;background-size: cover;height: 90vh;">
      <!-- <img src="{{ asset('image/logo.png') }}"'alt="" height="100"> -->
      <div class="links hidden">
        <a href="#hero" class="nav-link tab-section" role="button">Home</a>
        <a href="#sobre" class="nav-link tab-section" role="button">Quem Somos</a>
        <a href="#servico" class="nav-link tab-section">Serviços</a>
        <a href="#cliente" class="nav-link tab-section">Clientes</a>
        <!-- <a href="#parceiro" class="nav-link tab-section">Parceiros</a> -->
        <a href="#contato" class="nav-link tab-section">Contato</a>
      </div>


      <!-- <div class="shadow rounded" style="position:fixed;right:50%;left:50%;margin-left: -214px;margin-right: -214px;bottom:2rem;background-color:#fff;">
						<form class="form-inline">
						<div class="form-group mt-2 mb-2 ml-3 mr-2 text-right">
						<label for="staticEmail2" class="">PAGUE ON-LINE:</label>
						</div>
						<div class="form-group mb-2 mt-2">
						<select class="custom-select" id="inlineFormCustomSelect">
						<option selected>Selecione o tipo...</option>
						<option value="1">Detran-AM</option>
						<option value="2">Detran-PA</option>
						<option value="3">Detran-PR</option>
						<option value="3">Detran-RS</option>
						<option value="3">Detran-MS</option>
						<option value="3">Prefeitura</option>
						<option value="3">Pagar Boleto</option>
						</select>
						</div>
						<button type="submit" class="btn btn-primary mt-2 mb-2 ml-2 mr-3">SIMULAR</button>
						</form>
						</div> -->

      <!-- <div id="btn-passo" class="shadow rounded" style="position:fixed;right:50%;left:50%;margin-left: -214px;margin-right: -214px;bottom:2rem;background-color:#fff;"> -->
      <div id="btn-passo" class="shadow rounded" style="position:absolute;right:50%;left:50%;margin-left: -496px;margin-right: -496px;bottom:-1.8rem;background-color:#fff;">
        <!-- <form class="form-inline">
          <div class="form-group mt-2 mb-2 ml-3 mr-2 text-right">
            <h3 for="staticEmail2" class="mb-0">PAGUE SEUS DEBITOS:</h3>
          </div>
          <a href="#passo" class="tab-section btn btn-primary mt-2 mb-2 ml-2 mr-3">SIMULE AQUI :)</a>
        </form> -->
        <form class="form-inline" method="get" action="{{ route('simulador') }}" id="registro">
          @csrf
          <div class="form-group mt-2 mb-2 ml-3 mr-2 text-right">
            <h3 class="mb-0">PAGUE SEUS DEBITOS:</h3>
          </div>
          <div class="form-group mt-2 mb-2 ml-3 mr-2 text-right">
            <input type="text" style="width:530px" class="form-control text-center" id="boleto" name="boleto" aria-describedby="h_boleto" placeholder="Digite o número do boleto">
            @error('boleto')
						<small id="boleto" class="text-danger form-text">{{ $message }}</small>
						@enderror
          </div>
          <button type="submit" class="tab-section btn btn-primary mt-2 mb-2 ml-2 mr-3">SIMULAR</button>
        </form>



      </div>
    </div>
  </div>
  <section class="sobre" id="sobre">
    <div class="container">
      <div class="row vh-89">
        <div class="col-12 align-self-center">
          <h4>DESCUBRA NOSSA HISTÓRIA</h4>
          <div class="row p-4">
            <div class="col-8 text-justify">
              <h5>Quem Somos</h5>
              <p>
                Com objetivo de criar facilidades para nossos clientes e parceiros , a Pagtudoazul é uma empresa de facilidades em Meios de Pagamentos ( Pagamentos via Cartão de Debito e Credito) , na qual atualmente atua com facilidade de parcelamento de boletos em
                cartão de Credito e Debito
              </p>
              <h5>Nossas Credenciais</h5>
              <p>
                Atualmente a PAGTUDOAZUL , é uma empresa homologada pelo Banco Central a atuar no Sistema de Pagamentos Brasileiros , alem de ser uma empresa credenciada pela Portaria 107 de 25 de Janeiro de 2019 , nos autoriza a operar em conformidade a Portaria 149
                do Denatran , na qual permite que as empresas credenciadas ,possam efetuar os parcelamento de tributos e demais serviços no que tange ao serviços veiculares nos cartões de Credito e Debito
              </p>
            </div>
            <div class="col-4">
              <img src="{{ asset('image/quemsomos-01.png') }}" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="passo" id="passo" style="background: linear-gradient(to right, #16c5db 0%, #002e90 100%);">
    <div class="container">
      <div class="row vh-89">
        <div class="col-12 align-self-center">
          <div class="row mb-4">
            <div class="col-12 text-center text-white">
              <h5 class="white">PASSO A PASSO</h5>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-3">
            </div>
            <div class="col-6">
              <img src="{{ asset('image/passoapasso.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-3">
            </div>
          </div>
          <div class="row">
            <div class="col-12 align-self-center text-center">
              <!-- <a href="#passo1" class="tab-section btn btn-outline-white rounded-pill">VAMOS COMEÇAR?</a> -->
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>
  <!-- <section class="passo1 hidden" id="passo1" style="background: linear-gradient(to right, #16c5db 0%, #002e90 100%);">
    <div class="container-fluid">
      <div class="row align-items-center vh-89">
        <div class="col-8 p-4">
			<div class="row justify-content-md-center">
			<div class="col-8">
			<img src="{{ asset('image/passoapasso.png') }}" alt="" class="img-fluid p-4">
			</div>
			</div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('register') }}" id="registro">
                @csrf
                <div class="form-group mb-2">
                  <label for="placa">SERVIÇO</label>
                  <select class="custom-select" id="inlineFormCustomSelect">
                    <option selected>Selecione o tipo...</option>
                    <option value="1">Detran-AM</option>
                    <option value="2">Detran-PA</option>
                    <option value="3">JT-Maranhão</option>
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
                <div class="form-group mb-1">
                  <label for="cnpj_cpf">CPF/CNPJ</label>
                  <input type="text" class="form-control text-right cnpj_cpf" name="cnpj_cpf" aria-describedby="h_cnpj_cpf">
                </div>
                @error('cnpj_cpf')
                <small id="h_cnpj_cpf" class="text-danger form-text">{{ $message }}</small>
                @enderror
                <div class="form-group mb-1">
                  <label for="name">NOME COMPLETO</label>
                  <input type="text" class="form-control text-right" name="name" aria-describedby="h_name" placeholder="Digite o seu nome completo">
                  @error('name')
                  <small id="h_name" class="text-danger form-text">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group mb-1">
                  <label for="password">SENHA</label>
                  <input type="password" class="form-control text-right" name="password" aria-describedby="h_password" placeholder="Digite uma senha de 8 a 16 caracteres" data-validation-minlength-message="Muito curta, mínimo de 8 caracteres" minlength="8" data-validation-maxlength-message="Muito longa, máximo de 16 caracteres" maxlength="16">
                  @error('password')
                  <small id="h_password" class="text-danger form-text">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group mb-1">
                  <label for="email">E-MAIL</label>
                  <input type="email" class="form-control text-right" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Insira um email válido" name="email" aria-describedby="h_email" placeholder="Digite o email">
                  @error('email')
                  <small id="h_email" class="text-danger form-text">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label for="phone_number">TELEFONE</label>
                  <input type="text" class="form-control text-right" id="phone_number" name="phone_number" aria-describedby="h_phone_number" placeholder="Digite o telefone">
                  @error('phone_number')
                  <small id="h_phone_number" class="text-danger form-text">{{ $message }}</small>
                  @enderror
                </div>
                <div class="text-right">
                  <input class="hidden" type="radio" name="channel" value="sms" checked />
                  <a href="#" class="btn-login text-left mr-4">Já possui cadastro?</a>
                  <button name="form-submit" class="text-right btn btn-primary" type="submit">CONSULTAR</button>
                </div>
              </form>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- <section class="passo1 hidden" id="passo1" style="background: linear-gradient(to right, #16c5db 0%, #002e90 100%);">
    <div class="container-fluid">
      <div class="row align-items-center vh-89">
        <div class="col-8 p-4">
          <div class="row justify-content-md-center">
            <div class="col-8">
              <img src="{{ asset('image/passoapasso.png') }}" alt="" class="img-fluid p-4">
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <form method="get" action="{{ route('simulador') }}" id="registro">
                @csrf
                <div class="form-group mb-4">
                  <label for="valor">VALOR</label>
                  <input type="text" id="valor" name="valor" class="valor-format form-control text-right" aria-describedby="h_valor" placeholder="Digite o valor">
                    @error('valor')
                      <small id="h_valor" class="text-danger form-text">{{ $message }}</small>
                    @enderror
                </div>
                <div align="center">OU</div>
                <div class="form-group mb-4">
                  <label for="boleto">BOLETO</label>
                  <input type="text" class="form-control text-right" id="boleto" name="boleto" aria-describedby="h_boleto" placeholder="Digite o número do boleto">
                    @error('boleto')
                      <small id="h_boleto" class="text-danger form-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="text-right">
                  <button name="form-submit" class="text-right btn btn-primary" type="submit">SIMULAR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <section class="servico" id="servico" style="background-color: #FAFAFA;">
    <div class="container">
      <div class="row vh-89 justify-content-end">
        <div class="col-8 align-self-center p-0">
          <div class="card shadow border-0">
            <div class="card-body pb-0 ">
              <h4>CONFIRA NOSSOS SERVIÇOS</h4>
              <div class="pt-2 pl-4 pr-4 pb-0">
                <h5>Tributos Veiculares</h5>
                <p>
                  Devidamente credenciado a PAGTUDOAZUL, presta os serviços de parcelamento dos tributos e demais serviços veiculares.
                </p>
                <h5>Tributos Municipais</h5>
                <p>
                  Devidamente credenciado a PAGTUDOAZUL, presta os serviços de parcelamento de todos os tributos municipais.
                </p>
                <h5>Meio de Pagamento</h5>
                <p>
                  Devidamente credenciado a PAGTUDOAZUL, presta o serviço de meio de pagamento dentro das livrarias do Senado Federal. Ou seja toda vez que comprar um livro dentro do Senado ou pelo seu site, saberá que estará usando a PAGTUDUAZUL.
                </p>
              </div>
            </div>
            <div class="card-footer text-right bg-white border-0">
              <button class="btn btn-primary">SAIBA MAIS</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contato" style="backgroud-color:#f1f1f1;">
    <div class="container">
      <div class="row vh-89">
        <div class="col-12 align-self-center">
          <div class="row pt-4">
            <div class="col-6 text-justify">
              <h4>ENTRE EM CONTATO CONOSCO</h4>
              <div class="row">
                <div class="col-1">
                  <i class="mdi mdi-map-marker mdi-24px"></i>
                </div>
                <div class="col-11">
                  <p>
                    Rua Professor Cleto, 57<br> Centro
                    <br> União da Vitória - PR<br> Cep: 84.600-140
                  </p>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-1">
                  <i class="mdi mdi-email mdi-24px"></i>
                </div>
                <div class="col-11 ">
                  <p>atendimento@nyata.com.br</p>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-1">
                  <i class="mdi mdi-phone  mdi-24px"></i>
                </div>
                <div class="col-11">
                  <p>0800 0420 216</p>
                </div>
              </div>
            </div>
            <div class="col-6">
              <form>
                <div class="form-group mb-2">
                  <!-- <label for="nome">NOME</label> -->
                  <input type="text" class="form-control" id="nome" aria-describedby="h-nome" placeholder="NOME">
                  <!-- <small id="h-nome" class="form-text text-muted hidden">We'll never share your nome with anyone else.</small> -->
                </div>
                <div class="form-group mb-2">
                  <!-- <label for="telefone">TELEFONE</label> -->
                  <input type="text" class="form-control" id="telefone" aria-describedby="h_telefone" placeholder="TELEFONE">
                  <!-- <small id="h_telefone" class="form-text text-muted hidden">We'll never share your telefone with anyone else.</small> -->
                </div>
                <div class="form-group mb-2">
                  <!-- <label for="email">E-MAIL</label> -->
                  <input type="text" class="form-control" id="email" aria-describedby="h-email" placeholder="E-MAIL">
                  <!-- <small id="h-email" class="form-text text-muted hidden">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group mb-2">
                  <!-- <label for="mensagem">MENSAGEM</label> -->
                  <textarea name="mensagem" id="mensagem" class="form-control" rows="4" placeholder="MENSAGEM"></textarea>
                  <!-- <input type="text" class="form-control" id="mensagem" aria-describedby="h_mensagem" placeholder="Digite a mensagem"> -->
                  <!-- <small id="h_mensagem" class="form-text text-muted hidden">We'll never share your mensagem with anyone else.</small> -->
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">ENVIAR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- <section class="cliente" id="cliente" style="background-color: #FAFAFA;">
    <div class="container">
      <div class="row vh-89">
        <div class="col-12 align-self-center p-0">
          <h3 class="mb-4 pb-4">SOMOS CREDENCIDOS:</h3>
          <p class="pl-4 mb-4">
            Para melhora atende-lo A PAGTUDOAZUL buscou o credenciamos em diversos orgão para que possamos efetuar os parcelamento de tributos e demais serviços, que lhe permite quitar os debitos devidos com cartões de Crédito e Débito, sem que voce precise ir ao
            local.....
          </p>
          <div class="row justify-content-center">
            <div class="col-11">
              <div id="carousel-example" class="carousel slide m-4" data-ride="carousel">
                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                  <div style="background-color: #dadada99;"></div>
                  <div class="carousel-item col-12 col-sm-6 pt-4 pb-4 col-md-4 col-lg-3 active">
                    <div class="card pt-2 pb-2 border-0 shadow">

                      <div class="card-body pt-4">
                        <img src="{{ asset('image/logo-detran-am.png') }}" class="img-fluid mx-auto d-block" alt="img1">
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item col-12 col-sm-6 pt-4 pb-4 col-md-4 col-lg-3">
                    <div class="card pt-2 pb-2 border-0 shadow">
                      <div class="card-body pt-4">
                        <img src="{{ asset('image/logo-detran-pr.png') }}" class="img-fluid mx-auto d-block" alt="img2">
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item col-12 col-sm-6 pt-4 pb-4 col-md-4 col-lg-3">
                    <div class="card pt-2 pb-2 border-0 shadow">
                      <div class="card-body pt-4">
                        <img src="{{ asset('image/logo-detran-pr.png') }}" class="img-fluid mx-auto d-block" alt="img2">
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item col-12 col-sm-6 pt-4 pb-4 col-md-4 col-lg-3">
                    <div class="card pt-2 pb-2 border-0 shadow">
                      <div class="card-body pt-4">
                        <img src="{{ asset('image/logo-detran-pr.png') }}" class="img-fluid mx-auto d-block" alt="img2">
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item col-12 col-sm-6 pt-4 pb-4 col-md-4 col-lg-3">
                    <div class="card pt-2 pb-2 border-0 shadow">
                      <div class="card-body pt-4">
                        <img src="{{ asset('image/logo-detran-pr.png') }}" class="img-fluid mx-auto d-block" alt="img2">
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item col-12 col-sm-6 pt-4 pb-4 col-md-4 col-lg-3">
                    <div class="card pt-2 pb-2 border-0 shadow">
                      <div class="card-body pt-4">
                        <img src="{{ asset('image/logo-detran-pr.png') }}" class="img-fluid mx-auto d-block" alt="img2">
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item col-12 col-sm-6 pt-4 pb-4 col-md-4 col-lg-3">
                    <div class="card pt-2 pb-2 border-0 shadow">
                      <div class="card-body pt-4">
                        <img src="{{ asset('image/logo-detran-pr.png') }}" class="img-fluid mx-auto d-block" alt="img2">
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item col-12 col-sm-6 pt-4 pb-4 col-md-4 col-lg-3">
                    <div class="card pt-2 pb-2 border-0 shadow">
                      <div class="card-body pt-4">
                        <img src="{{ asset('image/logo-detran-pr.png') }}" class="img-fluid mx-auto d-block" alt="img2">
                      </div>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Próximo</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- <section id="parceiro">
  </section>
  <section id="ondeestamos">
  </section> -->
  <footer class="site-footer">
    Rodape
  </footer>
  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>

  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script type="text/javascript" src="{{ asset('/plugins/jqueryScrollbar/jquery.scrollbar.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/plugins/maskInput/jquery.mask.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $(".cpf").mask('000.000.000-00', {
        placeholder: '000.000.000-00'
      });
      $(".cnpj").mask('00.000.000/0000-00', {
        placeholder: '00.000.000/0000-00',
        // onComplete: function(cnpj) {
        //     buscaCnpj(cnpj);
        // }
      });
      var maskcnpj = $(".cnpj_cpf").length && $(".cnpj_cpf").val().length < 15 ? '000.000.000-00#' : '00.000.000/0000-00';
      $(".cnpj_cpf").mask(maskcnpj, {
        placeholder: maskcnpj,
        onKeyPress: function(cn, e, field, options) {
          var masks = ['00.000.000/0000-00', '000.000.000-00#'];
          if (cn.length > 14) {
            mask = masks[0];
          } else {
            mask = masks[1];
          }
          $(".cnpj_cpf").mask(mask, options);
        }
        // ,
        // onComplete: function(cnpj) {
        // 	$("#razao_social").attr("placeholder", "Razão Social").parent().children("label").html("Razão Social<span>*</span>");
        // 	$("#data_nascimento").attr("placeholder", "Data da Fundação").parent().children("label").text("Data da Fundação");
        // 	$(".div-cnpj").removeClass("hidden");
        // 	$(".div-cpf").addClass("hidden");
        // 	buscaCnpj(cnpj);
        // }
      });
      $("#phone_number").mask("(00) 00000-0000", {
        onKeyPress: function(tel, e, field, options) {
          var masks = ["(00) 00000-0000", "(00) 0000-0000#"];
          mask = tel.length > 14 ? masks[0] : masks[1];
          $("#phone_number").mask(mask, options);
        },
        placeholder: "(00) 00000-0000"
      });
      $("#cep").mask("00.000-000", {
        onComplete: function(cep) {
          $(".se-pre-con").fadeIn();
          var v = $("#cep").val();
          $.ajax({
            url: urlCEP,
            type: "GET",
            data: {
              cep: v
            },
            success: function(data) {
              $.each(data, function(i, item) {
                $("#" + i).val(item).focus();
              })
              $("#numero").focus();
              $(".se-pre-con").fadeOut();
            },
            error: function(data) {
              $(".se-pre-con").fadeOut();
            }
          });
        }
      });
      $("#placa").mask("SSS-9A99");
      $("#renavam").mask("99999999999");

      $(".valor-format").mask("###.##0,00", {
        reverse: true
      });
      $(".boleto-format").mask("###.##0,00", {
        reverse: true
      });
      $(".fator-format").mask("##0.000000", {
        reverse: true
      });
      $(".perc-format").mask("##0.00", {
        reverse: true
      });
      $(document).on("click", "a[href='#passo1']", function(e) {
        e.preventDefault();
        $("#passo1").removeClass("hidden");
        $("#passo").addClass("hidden");
      });
      $(document).on("click", "a.tab-section", function(e) {
        e.preventDefault();
        $(".fadeInRight").removeClass("fadeInRight");
        $(".fadeInLeft").removeClass("fadeInLeft");
        $(".animated").removeClass("animated");
        $("#btn-passo").removeClass("hidden");

        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $("[name=' + this.hash.slice(1) + ']");
          if (target.length) {
            $("html, body").animate({
              scrollTop: target.offset().top
            }, 500);
            if ($(this).parents(".nav-menu").length) {
              $(".nav-menu .menu-active").removeClass("menu-active");
              $(this).closest("li").addClass("menu-active");
            }
            if (target.selector == "#hero") {
              // navbar
            } else if (target.selector == "#servico") {
              $("#servico .card").addClass("fadeInRight").addClass("animated");
            } else if (target.selector == "#sobre") {
              $("#sobre h5, #sobre h4, #sobre p").addClass("fadeInLeft").addClass("animated");
            } else if (target.selector == "#passo" || target.selector == "#passo1" || target.selector == "#passo2") {
              $("#btn-passo").addClass("hidden");
            }
            if (target.selector == "#hero") {
              $(".navbar").removeClass("navbar-color");
            } else {
              $(".navbar").addClass("navbar-color").addClass("animated").addClass("fadeInTop");
            }
            return false;
          }
        }
      });

      $(".form-item-lista").submit();
      $('.btn-parcela').on("click", function(e) {
        e.preventDefault();
        forma = $(this).find('.forma').html();
        valor = parseInt($(this).find('span').html().replace(",", ""));
        vtotal = parseInt($(this).find('.vtotal').html().replace(",", ""));
      });
      $(".btn-payment").on("click", function() {
        card = $(this).parent().prev().val();
        $("#form-payment-create").attr({
          "action": $(this).attr("data-route")
        }).append(`<input type="hidden" name="forma" value="${forma}">
                    <input type="hidden" name="valor" value="${valor}">
                    <input type="hidden" name="vtotal" value="${vtotal}">
                    <input type="hidden" name="card" value="${card}">`).submit();
      })
      $(".btn-item-create").on("click", function() {
        $("#form-item-create").attr({
          "action": $(this).attr("data-route")
        }).submit();
      })
      test();
      var card = "";

      $('#card-number').focusout(() => {
        var creditCardNumber = $('input[name="number"]').val();
        is_luhn_valid(creditCardNumber);
      });


      function test() {
        $("#card-name").val("Fulano de Tal");
        $("#card-number").val("5502090336751287");
        $("#card-expiry").val("10/2020");
        $("#card-cvc").val("123");
      }

      var luhnChk = (function(arr) {
        return function(ccNum) {
          var
            len = ccNum.length,
            bit = 1,
            sum = 0,
            val;

          while (len) {
            val = parseInt(ccNum.charAt(--len), 10);
            sum += (bit ^= 1) ? arr[val] : val;
          }

          return sum && sum % 10 === 0;
        };
      }([0, 2, 4, 6, 8, 1, 3, 5, 7, 9]));

      function is_luhn_valid(cardNumber) {
        if (luhnChk(cardNumber) === true) {
          console.log("Número de Cartão válido");
        } else {
          console.log("Número de Cartão inválido");
        }
      }
      // alert($(this).scrollTop())
      if ($(this).scrollTop() == 0) {
        $(".navbar").removeClass("navbar-color");
      } else {
        $(".navbar").addClass("navbar-color").addClass("animated").addClass("fadeInTop");
        if ($(this).scrollTop() == 1200 || $(this).scrollTop() == 1780 || $(this).scrollTop() == 2440) {
          $("#btn-passo").addClass("hidden");
        }
      }

      @if($errors->count() > 0)
      // alert("{{ $errors }}");
      // $("#passo1").removeClass("hidden");
      $("[href='#passo1']").trigger("click");
      @endif
      $("#carousel-example").on("slide.bs.carousel", function(e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 5;
        var totalItems = $(".carousel-item").length;
        if (idx >= totalItems - (itemsPerSlide - 1)) {
          var it = itemsPerSlide - (totalItems - idx);
          for (var i = 0; i < it; i++) {
            // append slides to end
            if (e.direction == "left") {
              $(".carousel-item").eq(i).appendTo(".carousel-inner");
            } else {
              $(".carousel-item").eq(0).appendTo(".carousel-inner");
            }
          }
        }
      });

      var maskcnpj = $("#cnpj_cpf").length && $("#cnpj_cpf").val().length < 12 ? '000.000.000-00#' : '00.000.000/0000-00';
      $("#cnpj_cpf").mask(maskcnpj, {
        placeholder: maskcnpj,
        onKeyPress: function(cn, e, field, options) {
          var masks = ['00.000.000/0000-00', '000.000.000-00#'];
          if (cn.length > 14) {
            mask = masks[0];
            $("#razao_social").attr("placeholder", "Razão Social").parent().children("label").html("Razão Social<span>*</span>");
            $("#data_nascimento").attr("placeholder", "Data da Fundação").parent().children("label").text("Data da Fundação");
            $(".div-cnpj").removeClass("hidden");
            $(".div-cpf").addClass("hidden");
            cn.length == 18 ? buscaCnpj(cn) : null;
          } else {
            mask = masks[1];
            $("#razao_social").attr("placeholder", "Nome Completo").parent().children("label").html("Nome<span>*</span");
            $("#data_nascimento").attr("placeholder", "Data de Nascimento").parent().children("label").text("Data de Nascimento");
            $(".div-cnpj").addClass("hidden");
            $(".div-cpf").removeClass("hidden");
          }
          $("#cnpj_cpf").mask(mask, options);
        },
        onComplete: function(cnpj) {
          $("#razao_social").attr("placeholder", "Razão Social").parent().children("label").html("Razão Social<span>*</span>");
          $("#data_nascimento").attr("placeholder", "Data da Fundação").parent().children("label").text("Data da Fundação");
          $(".div-cnpj").removeClass("hidden");
          $(".div-cpf").addClass("hidden");
          buscaCnpj(cnpj);
        }
      });
      $("#telefone").mask("(00) 00000-0000", {
        onKeyPress: function(tel, e, field, options) {
          var masks = ["(00) 00000-0000", "(00) 0000-0000#"];
          mask = tel.length > 14 ? masks[0] : masks[1];
          $("#telefone").mask(mask, options);
        },
        placeholder: "(00) 00000-0000"
      });
    });
    $(document).on("click", "table#parcelas tr", function(e) {
      e.preventDefault();
      $("table#parcelas tr").addClass("hidden");
      $(this).removeClass("hidden");
      console.log($(this));

      $("#login").removeClass("hidden");
      $("#cred-card").removeClass("hidden");
    });
    $(document).on("click", ".btn-login", function(e) {
      e.preventDefault();
      $("form").toggleClass("hidden");
    });
    if ($("#boleto").length > 0 && $("#boleto").val().length > 46) {
				if ($("#boleto").val().substring(0, 1) == 8) {
					$("#boleto").mask("99999999999-9 99999999999-9 99999999999-9 99999999999-9");
				} else {
					$("#boleto").mask("99999.99999 99999.999999 99999.999999 9 99999999999999");
				}
			}
			$(document).on("keyup", "#boleto", function(e) {
				if (e.which == 74 && e.ctrlKey) {
					e.preventDefault();
				} else {
					if (e.which == 17) {
						e.preventDefault();
					}
				}
				var v = $(this).val();
				if (v.substring(0, 1) == 8) {
					$("#boleto").mask("99999999999-9 99999999999-9 99999999999-9 99999999999-9");
				} else {
					$("#boleto").mask("99999.99999 99999.999999 99999.999999 9 99999999999999");
				}
			});
  </script>
</body>

</html>