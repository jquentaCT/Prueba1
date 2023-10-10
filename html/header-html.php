<!-- Page loader Start -->
<!--<div id="pageloader">   
  <div class="loader-item">
    <div class="loader">
      <div class="spin"></div>
      <div class="bounce"></div>
    </div>
  </div>
</div>-->
<!-- Page loader End -->

<header class="fixed-top header-fullpage top-border top-transparent wow fadeInDown">
  <div class="top-bar-right d-flex align-items-center text-md-left">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <i class="icofont-google-map"></i>  Av.Trapiche Nº 1209 - Comas, Lima - Perú
        </div>
        <div class="col-md-auto">
          <span class="mr-3"><i class="icofont-ui-touch-phone"></i> (+51) 980-637-430 / xxxxxxx </span>
          <span class="mr-3"><i class="icofont-ui-email"></i> Email: ventas@jhh.com.pe</span>                    
        </div>
      </div>
    </div>
  </div>
  
  <!-- Main Navigation Start -->
  <nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container text-nowrap">
      <div class="d-flex align-items-center w-100 col p-0">
        <a class="navbar-brand rounded-bottom light-bg" href="<?php echo URL_SITE; ?>/">
          <img nonce="<?php echo _SYSTEM_NONCE_; ?>" src="images/logo-JHH-2.png" alt="">
        </a> 
      </div>
      <!-- mi div programacion para el whatsapp -->
      <div id="sirena_button" class="right title">
        <a id="floating_button_sirena" href="https://api.whatsapp.com/send/?phone=51991891807&text&type=phone_number&app_absent=0"
        target="_blank" class="consultas-en-linea">
          <img src="https://tribulant.com/blog/wp-content/uploads/2018/08/whatsapp-button.png" alt="image" height="59" >
        </a>
      </div>
      <!-- Topbar Request Quote Start -->
      <div class="d-inline-flex request-btn order-lg-last col p-0"> 
         <!-- <a class="nav-link mr-2 ml-auto" href="#" id="search_home"><i class="icofont-search"></i></a>-->
         <!-- <a class="btn-theme icon-left bg-blue-light no-shadow d-none d-lg-inline-block align-self-center" href="#" role="button" data-toggle="modal" data-target="#request_popup"><i class="icofont-page"></i> Solicitar pedidos</a> -->
        <!-- Toggle Button Start -->
         <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
       </button>
        <!-- Toggle Button End -->  
      </div>
      <!-- Topbar Request Quote End -->

      <div class="collapse navbar-collapse" id="navbarCollapse" data-hover="dropdown" data-animations="slideInUp slideInUp slideInUp slideInUp">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link<?php if(enlace()=='index.php'){echo ' current';} ?>" href="<?php echo URL_SITE; ?>/">Nosotros</a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle-mob<?php if(enlace()=='productos.php'){echo ' current';} ?>" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marcas</a>
                <ul class="dropdown-menu">                  
                  <li class="dropdown">
                      <a class="dropdown-item" href="<?php echo URL_SITE; ?>"> Mazda </a>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown-toggle-mob dropdown-item" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Chevrolet <i class="icofont-rounded-right float-right"></i></a>
                  </li>
                 <li class="dropdown">
                      <a class="dropdown-toggle-mob dropdown-item" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Toyota <i class="icofont-rounded-right float-right"></i></a>
                  </li>
                 <li class="dropdown">
                      <a class="dropdown-toggle-mob dropdown-item" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Mitsubishi <i class="icofont-rounded-right float-right"></i></a>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown-toggle-mob dropdown-item" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Nissan <i class="icofont-rounded-right float-right"></i></a>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown-toggle-mob dropdown-item" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Honda <i class="icofont-rounded-right float-right"></i></a>
                  </li>
                </ul>
            </li>             
            <li class="nav-item"><a class="nav-link<?php if(enlace()=='nuestros-clientes.php'){echo ' current';} ?>" href="<?php echo URL_SITE; ?>/nuestros-clientes.php">Nuestros CLientes</a></li>              
            <li class="nav-item"><a class="nav-link<?php if(enlace()=='tipos-de-vehiculos.php'){echo ' current';} ?>" href="<?php echo URL_SITE; ?>/tipos-de-vehiculos.php">Tipos de Vehiculos</a></li>
        </ul>
        <!-- Main Navigation End -->
      </div>
    </div>
  </nav>
  <!-- Main Navigation End -->
</header>