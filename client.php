<!DOCTYPE html>
<html lang="es">
<link rel="shortcut icon" href="./images/logo.png">
<head>
    <!-- Conexio amb la base de dades -->
    <?php
        include 'connexio.php';
    ?>
    <!-- Estils per la pagina -->
    <style> 
        
            
    </style>
    <!-- Titul de la pagina -->
     <title>Diari</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/aos.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-gymso-style.css">
</head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <!-- Titul principal de la pagina -->
            <a class="navbar-brand" href="client.php">DIARI INFORMATIU</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu de la pagina -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#buscador" class="nav-link smoothScroll">Buscador</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">Noticies</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Ubicacio</a>
                    </li>

                    <li class="nav-item">
                        <a href="login.php" class="nav-link smoothScroll">Iniciar Sessio</a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="https://es-es.facebook.com/jaumeviladoms/" class="fa fa-facebook"></a></li>
                    <li><a href="https://twitter.com/centrejviladoms" class="fa fa-twitter"></a></li>
                    <li><a href="https://www.instagram.com/centrejaumeviladoms/?hl=es" class="fa fa-instagram"></a></li>
                </ul>
            </div>

        </div>
    </nav>


     <!-- HERO -->
     <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

            <div class="bg-overlay"></div>

               <div class="container">
                    <div class="row">

                         <div class="col-lg-8 col-md-10 mx-auto col-12">
                              <div class="hero-text mt-5 text-center">
                                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="150">DIARI</h1>
                                    <h6 data-aos="fade-up" data-aos-delay="150"><?php date_default_timezone_set("Europe/Madrid"); print "DIARI DE NOTICIES DEL DIA " . date("d/m/y H:i:s"); ?></h6><br>
                                    <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="150">Perque donar?</a>
                                    <a href="#class" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="150">Registrarme</a>
                              </div>
                         </div>

                    </div>
               </div>
     </section>

     <!-- ABOUT -->
     

     <!-- CONTACT -->
     <section class="contact section" id="contact">
          <div class="container">
               <div class="row">
                    <div class="ml-auto col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="150">Pregunta</h2>
                        <!-- Formulari de contacte -->
                        <form action="#" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="150" role="form">
                            <input type="text" class="form-control" name="cf-name" placeholder="Nom">

                            <input type="email" class="form-control" name="cf-email" placeholder="Email">

                            <textarea class="form-control" rows="5" name="cf-message" placeholder="Missatge"></textarea>

                            <button type="submit" class="form-control" id="submit-button" name="submit">Registrar-se</button>
                        </form>
                    </div>
                    <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4" data-aos="fade-up" data-aos-delay="150">On pots <span>Trobarnos</span></h2>
                        <p data-aos="fade-up" data-aos-delay="150"><i class="fa fa-map-marker mr-1"></i> Carrer del Doctor Almera, 33, 08205 Sabadell, Barcelona</p>
                        <div class="google-map" data-aos="fade-up" data-aos-delay="150">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d11944.028556075145!2d2.0797216875741857!3d41.54744266799509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d41.5547788!2d2.0812307999999997!4m5!1s0x12a494f7a6b86651%3A0xe9a74531a2b7ca1!2sjaume%20viladoms!3m2!1d41.5439553!2d2.0982765999999997!5e0!3m2!1ses!2ses!4v1639120364282!5m2!1ses!2ses" width="1920" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    
               </div>
          </div>
     </section>

     <!-- FOOTER -->
     <footer class="site-footer">
          <div class="container">
               <div class="row">
                    <!-- Footer de la pagina principal -->
                    <div class="ml-auto col-lg-4 col-md-5">
                        <p class="copyright-text">Copyright &copy; 2022.
                        
                        <br>Design: Carlos Morales</p>
                    </div>

                    <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                        <p class="mr-4">
                            <i class="fa fa-envelope-o mr-1"></i>
                            <a href="#contact">secretaria@jviladoms.cat</a>
                        </p>
                    </div>
                    
               </div>
          </div>
     </footer>

    <!-- Modal -->
    <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
          <div class="modal-header">

            <h2 class="modal-title" id="membershipFormLabel">Membership Form</h2>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form class="membership-form webform" role="form">
                <input type="text" class="form-control" name="cf-name" placeholder="John Doe">

                <input type="email" class="form-control" name="cf-email" placeholder="Johndoe@gmail.com">

                <input type="tel" class="form-control" name="cf-phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

                <textarea class="form-control" rows="3" name="cf-message" placeholder="Additional Message"></textarea>

                <button type="submit" class="form-control" id="submit-button" name="submit">Submit Button</button>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="signup-agree">
                    <label class="custom-control-label text-small text-muted" for="signup-agree">I agree to the <a href="#">Terms &amp;Conditions</a>
                    </label>
                </div>
            </form>
          </div>
      </div>
    </div>

     <!-- SCRIPTS -->
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>