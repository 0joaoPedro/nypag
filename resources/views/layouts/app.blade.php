<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>NyPag</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
  {{-- <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet"> --}}
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Asap:400,400i&display=swap" rel="stylesheet">
  <link href="{{ asset('fonts/museo-700.otf') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

  <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/materialdesign/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('materialDesign/css/mdb.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.css') }}"> 
  
  <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('link')
  @stack('style')
</head>

<body class="goto-here">
  <div class="py-1 bg-color-3">
    <div class="container">
      <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
        <div class="col-lg-12 d-block">
          <div class="row d-flex">
            <div class="col-md pr-4 d-flex topper align-items-center">
              <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
              <span class="text">(42) 3577-0118</span>
            </div>
            <div class="col-md pr-4 d-flex topper align-items-center">
              <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
              <span class="text">contato@nyata.com.br</span>
            </div>
            {{-- <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
              <span class="text">3-5 Business days delivery &amp; Free Returns</span>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img class="brand-logo" src="{{ asset('image/logoN.png') }}">
        <h3 class="brand-text pl-0"><img class="brand-logo" src="{{ url('image/logoYpag.png') }}"></h3>
      </a>
      {{-- <a class="navbar-brand" href="index.html"></a> --}}
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empresa</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="shop.html">Shop</a>
              <a class="dropdown-item" href="wishlist.html">Wishlist</a>
              <a class="dropdown-item" href="product-single.html">Single Product</a>
              <a class="dropdown-item" href="cart.html">Cart</a>
              <a class="dropdown-item" href="checkout.html">Checkout</a>
            </div>
          </li> --}}
          <li class="nav-item" style="font-size: 11px;
          padding-top: 1.5rem;
          padding-bottom: 1.5rem;
          padding-left: 20px;
          padding-right: 20px;
          font-weight: 400;
          color: #000000;
          text-transform: uppercase;
          letter-spacing: 2px;
          opacity: 1 !important;">Soluções</li>
          <li class="nav-item" style="font-size: 11px;
          padding-top: 1.5rem;
          padding-bottom: 1.5rem;
          padding-left: 20px;
          padding-right: 20px;
          font-weight: 400;
          color: #000000;
          text-transform: uppercase;
          letter-spacing: 2px;
          opacity: 1 !important;">Sobre</li>
          <li class="nav-item" style="font-size: 11px;
          padding-top: 1.5rem;
          padding-bottom: 1.5rem;
          padding-left: 20px;
          padding-right: 20px;
          font-weight: 400;
          color: #000000;
          text-transform: uppercase;
          letter-spacing: 2px;
          opacity: 1 !important;">Contato</li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  @yield('content')

  <footer class="ftco-footer ftco-section">
    <div class="container">
      {{-- <div class="row">
        <div class="mouse">
          <a href="#" class="mouse-icon" style="background:#007bff">
            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
          </a>
        </div>
      </div> --}}
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <img class="brand-logo mr-5" src="{{ asset('image/logo_fundo_branco.png') }}">
            {{-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p> --}}
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Menu</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Empresa</a></li>
              <li><a href="#" class="py-2 d-block">Soluções</a></li>
              <li><a href="#" class="py-2 d-block">Sobre</a></li>
              <li><a href="#" class="py-2 d-block">Contato</a></li>
            </ul>
          </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Help</h2>
            <div class="d-flex">
              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
              </ul>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                <li><a href="#" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
        </div> --}}
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Alguma Dúvida?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">Rua Professor Cleto, 57, 1° andar União da Vitoria – PR</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">(42) 3577-0118</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">contato@nyata.com.br</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div> --}}
    </div>
  </footer>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('js/scrollax.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('materialDesign\js\mdb.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

  <script>
    $(document).on("click", "#tipos", function(e){
      console.log($(this));
      
    });
    $(document).on("submit", ".form-tipo-servico", function() {
      var url = $(this).attr("action");
      var get = $(this).attr("method");
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
  @stack('scripts')
</body>
</html>