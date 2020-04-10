@extends('layouts.app')
@section('content')
{{-- Slide --}}
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('image/slide-fundo.png') }});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-2" style="font-family: 'Asap', sans-serif; font-size: 7vw;">Parcele Aqui seus débitos </h1>
          <div class="row hidden" id="div-servico">
            <div class="col-12">
              <div class="card-body">
                <form method="get" class="form-tipo-servico" action="{{ route('debitos.consulta') }}">
                  <div class="form-group mb-2">
                    <select class="custom-select" name="tipos" id="tipos" style="text-align-last: center; color: #fff; width: 75%; background-color: #0088ccd4;">
                      <option>Selecione o serviço...</option>
                      <option value="am">Detran Amazonas</option>
                      <option value="pa">Detran Pará</option>
                      <option value="ms">Detran Mato Grosso do Sul</option>
                      <option value="rs">Detran Rio Grande do Sul</option>
                      <option value="boleto">Pagar Boleto</option>
                    </select>
                  </div>
                  <p><button type="submit" class="btn btn-primary bg-color-3">Enviar</button></p>
                </form>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="slider-item" style="background-image: url({{ asset('image/maquinacartao2.jpg') }});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
            <p><a href="#" class="btn btn-primary">View Details</a></p>
          </div>

        </div>
      </div>
    </div> --}}
  </div>
</section>
{{-- End Slide --}}

{{-- Caracteristicas --}}
{{-- <section class="ftco-section ftco-category ftco-no-pt" style="background-color:rgb(232, 241, 250)">
    <div class="container">
      <div class="row">
        <div class="col"> 
          <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset('image/onde-nos-encontrar.png') }});">
          </div>
        </div>
        <div class="col">
          <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url({{ asset('image/servicos.png') }});">
          </div>
        </div>
        <div class="col">
          <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset('image/retire-suas-duvidas.png') }});">
          </div>
        </div>
        <div class="col">
          <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url({{ asset('image/parcelamento.png') }});">
          </div>
        </div>
      </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url({{ asset('image/category.jpg') }});">
                            <div class="text text-center">
                                <h2>Vegetables</h2>
                                <p>Protect the health of every home</p>
                                <p><a href="#" class="btn btn-primary">Shop now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset('image/onde-nos-encontrar.png') }});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Fruits</a></h2>
                            </div>
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url({{ asset('image/category-2.jpg') }});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Vegetables</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ asset('image/category-3.jpg') }});">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Juices</a></h2>
                    </div>		
                </div>
                <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url({{ asset('image/category-4.jpg') }});">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Dried</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section class="ftco-section ftco-partner" style="background-color:rgb(232, 241, 250)">
  <div class="container">
    <div class="row">
      <div class="col-sm ftco-animate d-flex align-content-center flex-wrap testimony-wrap">
        <a href="#" class="partner" style="padding: 0;"><img src="{{ asset('image/servicos.png') }}" class="img-fluid" alt="Colorlib Template"></a>
        <div class="text text-center">
          <p class="mb-5 pl-4 line">Mostramos para você todos os débitos que tiver com os Detrans credenciados e já pode pagar na hora</p>
          {{-- <p class="name">Garreth Smith</p>
          <span class="position">Interface Designer</span> --}}
        </div>
      </div>
      <div class="col-sm ftco-animate d-flex align-content-center flex-wrap testimony-wrap">
        <a href="#" class="partner" style="padding: 0;"><img src="{{ asset('image/onde-nos-encontrar.png') }}" class="img-fluid" alt="Colorlib Template"></a>
        <div class="text text-center">
          <p class="mb-5 pl-4 line">Estamos espalhados por todo o Brasil, clique aqui e veja se tem algum ponto perto de você</p>
          {{-- <p class="name">Garreth Smith</p>
          <span class="position">Interface Designer</span> --}}
        </div>
      </div>
      <div class="col-sm ftco-animate d-flex align-content-center flex-wrap testimony-wrap">
        <a href="#" class="partner" style="padding: 0;"><img src="{{ asset('image/parcelamento.png') }}" class="img-fluid" alt="Colorlib Template"></a>
        <div class="text text-center">
          <p class="mb-5 pl-4 line">Facilitamos sua vida parcelando todos os débitos que forem consultados com as melhores taxas</p>
          {{-- <p class="name">Garreth Smith</p>
          <span class="position">Interface Designer</span> --}}
        </div>
      </div>
      <div class="col-sm ftco-animate d-flex align-content-center flex-wrap testimony-wrap">
        <a href="#" class="partner" style="padding: 0;"><img src="{{ asset('image/retire-suas-duvidas.png') }}" class="img-fluid" alt="Colorlib Template"></a>
        <div class="text text-center">
          <p class="mb-5 pl-4 line">Se ficar com qualquer dúvida, entre em contato com a gente que teremos prazer em ajudar</p>
          {{-- <p class="name">Garreth Smith</p>
          <span class="position">Interface Designer</span> --}}
        </div>
      </div>
    </div>
  </div>
</section>
{{-- End caracteristicas --}}

{{-- Vantagens --}}
<section class="ftco-section" style="">
  <div class="container">
          <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ftco-animate">
      <h2 class="mb-4">A quitação de suas dívidas está ao seu alcance</h2>
      {{-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> --}}
    </div>
  </div>   		
  </div>
  <div class="container">
    <div class="row ftco-animate text-center">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-2" style="background-image: url({{ asset('image/icon/rapido.png') }}); background-size:auto;">
              </div>
              <p class="name text-center">Velocidade</p>
              <span class="position">Com o cartão de crédito ou débito sua conta é compensada na hora</span>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-2" style="background-image: url({{ asset('image/icon/pratico.png') }}); background-size:auto;">
              </div>
              <p class="name text-center">Prático</p>
              <span class="position">Com poucos cliques já é possível simular seus débitos nos Detrans e pagar imediatamente</span>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-2" style="background-image: url({{ asset('image/icon/parcele-em-12x.png') }}); background-size:auto;">
              </div>
              <p class="name text-center">Parcele em até 12 vezes</p>
              <span class="position">Usando o cartão de crédito pode escolher a quantidade que mais se encaixa no orçamento</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-2" style="background-image: url({{ asset('image/icon/flexivel.png') }}); background-size:auto;">
              </div>
              <p class="name text-center">Flexível</p>
              <span class="position">Pode usar qualquer cartão disponível, sendo seu ou de familiares</span>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-2" style="background-image: url({{ asset('image/icon/atendimento-facil.png') }}); background-size:auto;">
              </div>
              <p class="name text-center">Atendimento Fácil</p>
              <span class="position">Prontos para atender rápido a qualquer dúvida que surgir, entrando em contato do jeito que mais facilitar</span>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-2" style="background-image: url({{ asset('image/icon/seguro.png') }}); background-size:auto;">
              </div>
              <p class="name text-center">Seguro</p>
              <span class="position">Estamos credenciados e possuímos os certificados de padrões internacionais exigidos para a atuação dos serviços prestados</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- End vantagens --}}
  
{{-- <section class="ftco-section img" style="background-image: url({{ asset('image/bg_3.jpg') }});">
  <div class="container">
          <div class="row justify-content-end">
    <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
        <span class="subheading">Best Price For You</span>
      <h2 class="mb-4">Deal of the day</h2>
      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      <h3><a href="#">Spinach</a></h3>
      <span class="price">$10 <a href="#">now $5 only</a></span>
      <div id="timer" class="d-flex mt-5">
                    <div class="time" id="days"></div>
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div>
                  </div>
    </div>
  </div>   		
  </div>
</section> --}}

<section class="ftco-section ftco-counter img" id="section-counter" style="background-color:rgb(232, 241, 250); padding: 4em 0;">
  <div class="container">
    <div class="row justify-content-center">
      <h2 class="mb-4">Em 4 anos trabalhando já foram mais de:</h2>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <i class="mdi mdi-file-document  mr-2" style="font-size: 30px;"></i>
                <strong class="number" data-number="68227">0</strong>
                <span>Boletos pagos</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <i class="mdi mdi-emoticon mr-2" style="font-size: 30px;"></i>
                <strong class="number" data-number="76760">0</strong>
                <span>Clientes Atendidos</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <i class="mdi mdi-account-group mr-2" style="font-size: 30px;"></i>
                <strong class="number" data-number="250">0</strong>
                <span>Empresas parceiras que usaram nossos serviços</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <i class="mdi mdi-face-agent mr-2" style="font-size: 30px;"></i>
                <strong class="number" data-number="251">0</strong>
                <span>Colaboradores para te atender</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Áreas de atuação --}}
<section class="ftco-section ftco-no-pb ftco-no-pt bg-light" style="background-color:rgb(242, 243, 245)">
  <div class="container">
    <div class="row">
      <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('image/mapa.png') }});">
      </div>
      <div class="col-md-7 py-5 wrap-about pb-md-1 ftco-animate">
        <div class="heading-section-bold mb-4 mt-md-5">
          <div class="ml-md-0">
            <h2 class="mb-2">Áreas de atuação</h2>
            <p>Estamos por todo o Brasil, veja aqui os locais que estão credenciados:</p>
          </div>
        </div>
        <div class="row">
          <div class="pb-md-5 col">
            <p><i class="mdi mdi-map-marker"></i> Detran Amazonas</p>
            <p><i class="mdi mdi-map-marker"></i> Detran Pará</p>
            <p><i class="mdi mdi-map-marker"></i> Detran Mato Grosso</p>
            <p><i class="mdi mdi-map-marker"></i> Detran Paraná</p>
            <p><i class="mdi mdi-map-marker"></i> Detran Rio Grande do Sul</p>
            {{-- <p><a href="#" class="btn btn-primary">Conheça Mais</a></p> --}}
          </div>
          <div class="pb-md-5 col" style="border-left: 1px solid gray; height: 200px;">
            <p>Em breve:</p>
            <p>Detran Pernambuco</p>
            <p>Detran Ceará</p>
            <p>Detran Maranhão</p>
            <p>Detran Roraima</p>
            {{-- <p><a href="#" class="btn btn-primary">Conheça Mais</a></p> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- end áreas de atuação --}}

{{-- <section class="ftco-section testimony-section" style="background-color:rgb(242, 243, 245)">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
          {{-- <span class="subheading">Testimony</span> --}}{{--
        <h2 class="mb-4">Áreas de atuação</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-5" style="background-image: url({{ asset('image/person_1.jpg') }})">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Garreth Smith</p>
                <span class="position">Marketing Manager</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-5" style="background-image: url({{ asset('image/person_2.jpg') }})">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Garreth Smith</p>
                <span class="position">Interface Designer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-5" style="background-image: url({{ asset('image/person_3.jpg') }})">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Garreth Smith</p>
                <span class="position">UI Designer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-5" style="background-image: url({{ asset('image/person_1.jpg') }})">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Garreth Smith</p>
                <span class="position">Web Developer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div class="user-img mb-5" style="background-image: url({{ asset('image/person_1.jpg') }})">
                <span class="quote d-flex align-items-center justify-content-center">
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Garreth Smith</p>
                <span class="position">System Analyst</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> <hr>--}}

{{-- Marcas --}}
<section class="ftco-section ftco-partner">
  <div class="container">
    <div class="row">
        <div class="col-sm ftco-animate d-flex align-content-center flex-wrap">
            <a href="#" class="partner"><img src="{{ asset('image/logo-detran-pr.png') }}" class="img-fluid" alt="Colorlib Template"></a>
        </div>
        <div class="col-sm ftco-animate d-flex align-content-center flex-wrap">
            <a href="#" class="partner"><img src="{{ asset('image/logo-detran-ms.jpg') }}" class="img-fluid" alt="Colorlib Template"></a>
        </div>
        <div class="col-sm ftco-animate d-flex align-content-center flex-wrap">
            <a href="#" class="partner"><img src="{{ asset('image/logo-detran-ma.jpg') }}" class="img-fluid" alt="Colorlib Template"></a>
        </div>
        <div class="col-sm ftco-animate d-flex align-content-center flex-wrap">
            <a href="#" class="partner"><img src="{{ asset('image/logo-detran-am.png') }}" class="img-fluid" alt="Colorlib Template"></a>
        </div>
        <div class="col-sm ftco-animate d-flex align-content-center flex-wrap">
            <a href="#" class="partner"><img src="{{ asset('image/logo-detran-pa.jpg') }}" class="img-fluid" alt="Colorlib Template"></a>
        </div>
    </div>
  </div>
</section>
<footer class="ftco-footer ftco-section" style="padding:0">
  <div class="container">
    <div class="row">
      <div class="mouse">
        <a href="#" class="mouse-icon" style="background:#007bff">
          <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
        </a>
      </div>
    </div>
  </div>
</footer>
{{-- End Marcas --}}
@endsection
