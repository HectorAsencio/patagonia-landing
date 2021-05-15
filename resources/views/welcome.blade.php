@extends('layout')

@section('content')
  
  <!-- Slider Area Start-->
        <div class="slider-area" style="margin-top:-150px">
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.png">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-7 col-md-9 ">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s">Recibe notificaciones y responde de manera eficiente.</h1>
                                    <p data-animation="fadeInLeft" data-delay=".6s">Tus notificaciones desde cualquier dispositivo</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                        <a href="#funcionalidades" class="btn hero-btn">Quiero probarlo!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                                    <img src="assets/img/hero/hero_right.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.png">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-7 col-md-9 ">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s">We Collect<br> High Quality Leads</h1>
                                    <p data-animation="fadeInLeft" data-delay=".6s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravi.</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                        <a href="#contacto" class="btn hero-btn">Conversemos</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                                    <img src="assets/img/hero/hero_right.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Area End-->
        <!-- What We do start-->
        <div class="what-we-do we-padding" id="funcionalidades">
            <div class="container">
                <!-- Section-tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center">
                            <h2>Funcionalidades</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-do text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-tasks"></span>
                            </div>
                            <div class="do-caption">
                                <h4>Revisa el estado de tus notificaciones</h4>
                                <p>Ingresa al panel de notificaciones y al accionar sobre el bóton de aceptar, darás curso a que se apruebe la notificación.</p>
                            </div>
                           
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="single-do active text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-social-media-marketing"></span>
                            </div>
                            <div class="do-caption">
                                <h4>Aprobar, rechazar o marcar como pendiente</h4>
                                <p>Al ingresar al panel, podrás accionar uno de los botones para aprobar, dejar pendiente o rechazar una notificación.</p>
                            </div>
                               
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="single-do text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-project"></span>
                            </div>
                            <div class="do-caption">
                                <h4>Realiza búsquedas de las notificaciones por fecha, categoria etc... </h4>
                                <p>Realiza búsquedas y has seguimiento a tus notificaciones de manera rápida y eficiente.</p>
                            </div>
                           
                        </div>
                       
                    </div>
                      
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        
                    </div>
                    <div class="col-lg-4 col-md-6">
                            <a href="{{ route('login') }}" class="btn hero-btn" style="width: 100%;padding: 30px;">Ingresa a tus notificaciones</a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        
                    </div>
                    
                </div>
               
            </div>
        </div>
        <!-- What We do End-->
        <!-- Nosotros -->
        <div class="we-create-area create-padding" id="nosotros">
            <div class="container">
                <div class="row d-flex align-items-end">
                    <div class="col-lg-6 col-md-12">
                        <div class="we-create-img">
                            <img src="assets/img//service/we-create.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="we-create-cap">
                            <h3>Aprueba notificaciones desde cualquier ubicación</h3>
                            <p><strong>Notifyboard</strong> es un producto de Softpatagonia dedicado facilitar el flujo de solicitudes de tu equipo de trabajo, el cual te permite acceder desde cualquier ubicación con un pc o smartphone.</p>
                            <!--<a href="#" class="btn">Contact Us</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nosotros End -->
        <!-- Nuestro sistema -->
        <div class="generating-area" id="software">
            <div class="container">
                 <!-- Section-tittle -->
                 <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center">
                            <h2>Nuestro sistema</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-generating d-flex mb-30">
                            <div class="generating-icon">
                                <i class="fas fa-list-alt" style="color: #4ad0ff;font-size: 60px;"></i>
                            </div>
                            <div class="generating-cap">
                                <h4>Organización</h4>
                                <p>Revisa una lista detallada de cada notificación en tu perfil ordenada por fecha, número de notificación y descripción.</p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-6 col-md-6">
                        <div class="single-generating d-flex mb-30">
                            <div class="generating-icon">
                                <i class="fas fa-user" style="color: #4ad0ff;font-size: 60px;"></i>
                            </div>
                            <div class="generating-cap">
                                <h4>Personalización</h4>
                                <p>Obtén un perfil propio acorde a tu nivel jerarquico, el cual te permitirá disponer tu propia organización y distribución de notificaciones.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-generating d-flex mb-30">
                            <div class="generating-icon">
                                <i class="fas fa-mobile-alt" style="color: #4ad0ff;font-size: 60px;"></i>
                            </div>
                            <div class="generating-cap">
                                <h4>Portabilidad</h4>
                                <p>Aprueba, rechaza o mantén notificaciones desde cualquier ubicación con un smartphone, pc o notebook.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-generating d-flex mb-30">
                            <div class="generating-icon">
                                <i class="fas fa-smile" style="color: #4ad0ff;font-size: 60px;"></i>
                            </div>
                            <div class="generating-cap">
                                <h4>Compromiso</h4>
                                <p>Estamos dispuestos a actualizar la plataforma en lo necesario y en disponer soporte a nuestros clientes, que son nuestra prioridad.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nuestro sistema End -->
        <!-- Visit Stuffs Start -->
        <div class="visit-area fix visite-padding" id="tecnologias">
            <div class="container">
                <!-- Section-tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 pr-0">
                        <div class="section-tittle text-center">
                            <h2>Tecnologías</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container p-0">
                <div class="row ">
                    <div class="col-lg-4 col-md-4">
                        <!--<div class="single-visited mb-30">
                            <div class="visited-img">
                                <img src="assets/img/visit/laravel.png" alt="">
                            </div>
                            <div class="visited-cap">
                                <h3><a href="#">Laravel</a></h3>
                                <p>Framework de php</p>
                            </div>
                        </div>-->
                        <div class="card" style="border-radius: 20px;">
                            <img src="assets/img/visit/laravel2.jpeg" class="card-img-top" style="border-radius: 20px;">
                            <div class="card-body">
                                <h5 class="card-title">Laravel</h5>
                                <p class="card-text">Framework de PHP</p>
                            </div>
                        </div>
                    </div> 
                     <div class="col-lg-4 col-md-4">
                        <div class="card" style="border-radius: 20px;">
                            <img src="assets/img/visit/bootstrap.png" class="card-img-top" style="border-radius: 20px;">
                            <div class="card-body">
                                <h5 class="card-title">Bootstrap</h5>
                                <p class="card-text">Librería de CSS</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        
                    <div class="card" style="border-radius: 20px;">
                            <img src="assets/img/visit/laragon.jpg" class="card-img-top" style="border-radius: 20px;">
                            <div class="card-body">
                                <h5 class="card-title">Laragon</h5>
                                <p class="card-text">Nuestro servidor local</p>
                            </div>
                        </div>
                    </div> 
                    
                </div>
            </div>
        </div>
        <!-- Visit Stuffs Start -->

         <!-- have-project Start-->
         <div class="have-project">
            <div class="container">
                <div class="haveAproject"  data-background="assets/img/team/have.jpg">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-7 col-lg-9 col-md-12">
                            <div class="wantToWork-caption">
                                <h2>Queremos conocer tu caso</h2>
                                <p>NotifyBoard se adapta a tus necesidades, cuéntanos qué tienes en mente</p>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-3 col-md-12">
                           <div class="wantToWork-btn f-right">
                                <a href="#contacto" class="btn btn-ans">Contactar</a>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- have-project End -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section visite-padding" id="contacto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Conversemos</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Consulta'" placeholder=" Consulta"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu nombre'" placeholder="Tu nombre">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu email'" placeholder="Tu email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Título'" placeholder="Título">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button btn-block button-contactForm boxed-btn">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>18 de Septiembre 619</h3>
                                <p>Temuco, Chile</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+56 9 4429 2425</h3>
                                <p>Lunes a viernes 9am a 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>info@softpatagonia.com</h3>
                                <p>¡Envía tus consultas!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
        
@endsection