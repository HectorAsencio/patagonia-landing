<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>NotifyBoard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/nice-select.css') }}">
            
            <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">

            <!--
            <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.css') }}">-->
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">

            <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>


            <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
            
            <style>
                .paginate_button .current {
                    background: linear-gradient(to bottom, #4ad0ff, #3a59ca 100%)!important;
                    color: white !important;
                    border: 0px;
                }
            </style>


   </head>

   <body>
       
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('assets/img/logo/logo.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent ">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="/"><img src="{{asset('assets/img/logo/logo.png')}}"></a>
                            </div>
                        </div>

                        @guest
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav> 
                                    <ul id="navigation">    
                                        <li><a href="/"> Inicio</a></li>
                                        <li><a href="#funcionalidades">Funcionalidades</a></li>
                                        <li><a href="#nosotros">Nosotros</a></li>
                                        <li><a href="#software">Software</a></li>
                                        <li><a href="#tecnologias">Tecnologías</a></li>
                                        <li><a href="#contacto">Contacto</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <a href="/login" class="btn header-btn">Iniciar sesión</a>
                            </div>
                        </div>
                        @else
                        <div class="col-xl-7 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/dashboard">Dashboard</a></li>
                                        <li><a href="/misnotificaciones"> Mis notificaciones</a></li>
                                        <li><a href="/notificaciones">Bandeja De Entrada</a></li>
                                        <li><a href="/equipo">Equipo</a></li>
                                        <li class="mobile-menu" style="display: none;"><a href="/perfil/{{ Auth::user()->id }}">Perfil</a></li>
                                        <li class="mobile-menu" style="display: none;"><a href="/ayuda/{{ Auth::user()->id }}">Ayuda</a></li>
                                        <li class="mobile-menu" style="display: none;"><a href="{{ route('logout') }}">Salir</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <style>
                            @media screen and (max-width: 600px) {
                                .my-menu {
                                    visibility: hidden;
                                    clear: both;
                                    display: none;
                                }
                            }
                            @media screen and (max-width: 600px) {
                                .mobile-menu {
                                    visibility: block !important;
                                    clear: both;
                                    display: block !important;
                                }
                            }
                            .badge {
                                
                                border-radius: 10px 10px 10px 10px;
                                color:white;
                               
                            }
                        </style>

                        <div class="col-xl-3 col-lg-2 col-md-2">
                            <div class="btn-group show-on-hover my-menu" style="margin-top: -25px;position: absolute;right: 10%;">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    style="padding: 9px;font-size: 18px;background-color: #021A8E;"
                                    aria-expanded="false">

                                    {{ Auth::user()->name }}

                                    <img src="{{asset('assets/img/users/'.Auth::user()->avatar)}}"
                                        style="width:30px;margin-right: 5px;border-radius: 100%;border: 2px solid;">


                                            @if ($nNotificacionesPorResponder > 0)
                                            <span class="badge bg-danger">{{$nNotificacionesPorResponder}}</span>
                                            @else
                                            @endif

                                </button>
                                <ul class="dropdown-menu" role="menu"
                                    style="margin-top: 0px; padding: 15px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);"
                                    x-placement="bottom-start">
                                    <li><a class="btn btn-primary btn-block" href="/perfil/{{ Auth::user()->id }}"
                                            style="color: #60ad5e;color:white;"><i style="margin-right: 5px;color:white;"
                                                class="fa fa-user"></i> Perfil</a></li>
                                    <li style="margin-top: 10px;"><a class="btn btn-primary btn-block" href="/ayuda/{{ Auth::user()->id }}"
                                            style="color: #60ad5e;color:white;"><i style="margin-right: 5px;color:white;"
                                                class="fa fa-question-circle"></i> Ayuda</a></li>
                                    <li class="divider"></li>
                                    <hr style="margin: 10px 0;">
                                    <li><a class="btn btn-danger btn-block" href="{{ route('logout') }}"
                                            style="color: #60ad5e;color:white;">Salir</a></li>
                                </ul>
                            </div>

                            <img class="mobile-menu" src="{{asset('assets/img/users/'.Auth::user()->avatar)}}"
                                        style="width: 30px;display: none;
    border-radius: 100%;
    border: 2px solid #4ad0ff;
    position: absolute;
    top: -33px;
    right: 70px;">

                        </div>
                        @endguest

                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

    <main style="margin-top:130px">

    @yield('content')

    </main>
   <footer>

       <!-- Footer Start-->
      <div class="footer-main" data-background="{{asset('assets/img/shape/footer_bg.png')}}">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-lg-3 col-md-4 col-sm-8">
                       <div class="single-footer-caption mb-50">
                         <div class="single-footer-caption mb-30">
                              <!-- logo -->
                             <div class="footer-logo">
                                 <a href="index.html"><img src="{{asset('assets/img/logo/logo2_footer.png')}}" alt=""></a>
                             </div>
                             <div class="footer-tittle">
                                 <div class="footer-pera">
                                     <p class="info1">+56 2 2360 7775</p>
                                     <p class="info2">info@softpatagonia.com</p>
                                </div>
                             </div>
                             <div class="footer-social">
                                <a target="_blank" href="https://www.facebook.com/softpatagoniaSPA"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="https://twitter.com/SoftPatagonia"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="https://www.softpatagonia.com/"><i class="fas fa-globe"></i></a>
                                <a target="_blank" href="https://www.instagram.com/softpatagonia/"><i class="fab fa-instagram"></i></a>
                            </div>
                         </div>
                       </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Acceso rápido</h4>
                                <ul>
                                    <li><a href="/" target="_blank">Nosotros</a></li>
                                    <li><a href="https://www.softpatagonia.com" target="_blank">Patagonia</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-2 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Soporte</h4>
                                <ul>
                                    <li><a href="#">Política de privacidad</a></li>
                                    <li><a href="#">Términos y condiciones</a></li>
                                    <li><a href="#"> Sitemap</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Report a bugb</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Core Features</h4>
                                <ul>
                                 <li><a href="#">Email Marketing</a></li>
                                 <li><a href="#"> Offline SEO</a></li>
                                 <li><a href="#">Social Media Marketing</a></li>
                                 <li><a href="#">Lead Generation</a></li>
                                 <li><a href="#"> 24/7 Support</a></li>
                             </ul>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex align-items-center">
                         <div class="col-xl-12 ">
                             <div class="footer-copy-right text-center">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                 Todos los derechos reservados &copy;<script>document.write(new Date().getFullYear());</script> <a href="https://www.softpatagonia.com/" target="_blank"> SoftPatagonia </a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
      </div>
       <!-- Footer End-->

   </footer>
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/slick.min.js')}}"></script>
        <!-- Date Picker -->
        <script src="{{asset('assets/js/gijgo.min.js')}}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
		<script src="{{asset('assets/js/animated.headline.js')}}"></script>
        <script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
        
        <!-- contact js -->
        <script src="{{asset('assets/js/contact.js')}}"></script>
        <script src="{{asset('assets/js/jquery.form.js')}}"></script>
        <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('assets/js/mail-script.js')}}"></script>
        <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>

        <script src="{{asset('assets/js/jquery.dataTables.js') }}"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

    </body>
</html>