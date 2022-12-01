<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>GoGoBook</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ url('css/owl.theme.default.css') }}">
        <link rel="stylesheet" href="{{ url('css/custom.css') }}">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.js') }}"></script>
        <script>
            jQuery(document).ready(function($){
                $(".owl-carousel").owlCarousel({
                    loop:true,
                    autoplay:true,
                    margin:10,
                    nav:false,
                    dots: true,
                    items: 1,
                    center: true,
                });
            });
        </script>
    </head>
    <body>
        <div class="guest-home">
            @include('header-main')
            <div class="owl-carousel owl-theme">
                <div class="slide">
                    <img src="{{ url('img/slide-1.jpg') }}" alt="">
                    <button type="button" class="login-button homep">NAPRAVI KNJIGU</button>
                </div>
                <div class="slide">
                    <img src="{{ url('img/slide-1.jpg') }}" alt="">
                    <button type="button" class="login-button homep">NAPRAVI KNJIGU</button>
                </div>
            </div>
            <div class="products">
                <div class="col-md-3">
                    <div class="col-inner">
                        <img src="{{ url('img/image8.jpg') }}" alt="">
                        <h5>MALI KVADRAT</h5>
                        <p>
                            20x20 cm<br>
                            Tvrdo koričenje<br>
                            <strong>Već od 1500 rsd</strong>
                        </p>
                        <a href="" class="button-product">Napravi knjigu</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-inner">
                        <img src="{{ url('img/image8.jpg') }}" alt="">
                        <h5>VELIKI KVADRAT</h5>
                        <p>
                            30x30 cm<br>
                            Tvrdo koričenje<br>
                            <strong>Već od 1500 rsd</strong>
                        </p>
                        <a href="" class="button-product">Napravi knjigu</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-inner">
                        <img src="{{ url('img/image8.jpg') }}" alt="">
                        <h5>PANORAMA</h5>
                        <p>
                            20x28 cm<br>
                            Tvrdo koričenje<br>
                            <strong>Već od 1500 rsd</strong>
                        </p>
                        <a href="" class="button-product">Napravi knjigu</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-inner">
                        <img src="{{ url('img/image8.jpg') }}" alt="">
                        <h5>PORTRET</h5>
                        <p>
                            
                            28x20 cm<br>
                            Tvrdo koričenje<br>
                            <strong>Već od 1500 rsd</strong>
                        </p>
                        <a href="" class="button-product">Napravi knjigu</a>
                    </div>
                </div>
            </div>
            <div class="about-us">
                <div class="about-us-inner">
                    <div class="col-md-6">
                        <div class="col-inner">
                            <h3>ŠTA JE GOGOBOOK?</h3>
                            <p>
                            Gogobook je riznica najlepših događaja,<br>
                            ispričanih kroz fotograﬁje i i vaše priče.<br>
                            Vratite vreme, poklonite sebi ili dragim<br>
                            ljudima vaše zajedničke uspomene.
                            </p>
                            <p style="font-style:italic;">
                            Sa Gogobookom sreća traje zauvek.
                            </p>
                            <a href="" class="button-product green">Napravi knjigu</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-inner">
                            <img src="{{ url('img/about-us.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="services">
                <div class="col-md-2">
                    <div class="col-inner">
                        <img src="{{ url('img/service1.png') }}" alt="">
                        <p>
                            Dostava za 7 dana<br>
                            bilo gde u Srbiji
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-inner">
                        <img src="{{ url('img/service2.png') }}" alt="">
                        <p>
                            Neograničene mogućnosti<br>
                            kreiranja albuma
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-inner">
                        <img src="{{ url('img/service3.png') }}" alt="">
                        <p>
                            Kvalitet<br>
                            i cena
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-inner">
                        <img src="{{ url('img/service4.png') }}" alt="">
                        <p>
                            Jednostavno<br>
                            i lako
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-inner">
                        <img src="{{ url('img/service5.png') }}" alt="">
                        <p>
                            Plaćanje<br>
                            pouzećem
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer">
                <h2>#MYGOGOBOOK</h2>
                <div class="footer-top">
                    <div class="col-md-2">
                        <img src="{{ url('img/image19.png') }}" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ url('img/image18.png') }}" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ url('img/image17.png') }}" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ url('img/image16.png') }}" alt="">
                    </div>
                    <div class="col-md-2">
                        <img src="{{ url('img/image15-1.png') }}" alt="">
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="col-md-4" style="padding-left:10%;">
                        <div class="col-inner">
                        </div>
                    </div>
                    <div class="col-md-4" style="text-align:center;">
                        <div class="col-inner">
                            <p>
                                <img class="social" src="{{ url('img/fb.png') }}" alt=""> <img class="social" src="{{ url('img/in.png') }}" alt="">
                            </p>
                            
                            Copyright @Gogobook 2021
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-inner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
