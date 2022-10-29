<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Assets/lib-home/animate/animate.min.css" rel="stylesheet">
    <link href="Assets/lib-home/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Assets/lib-home/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assets/css/Estilos-home/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Assets/css/Estilos-home/style.css" rel="stylesheet">


    <!-- Template carousel -->
    <link href="Assets/css/carousel-home/carousel-home.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
    <div class=" position-relative p-0">
        <?php
  _header($data);
        ?>


        <div class=" py-5 bg-portada-home  mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">PARAISO AZUL<br>GOLFO NICOYA</h1>
                        <p style="font-size: 20px" class="text-white animated slideInLeft mb-4 pb-2"> ¿Dé que se trata
                            el proyecto Paraíso Azul, Golfo de Nicoya? </p>
                        <p class="text-white animated slideInLeft mb-4 pb-2"> Es un proyecto extensión de CEMEDE, en
                            conjunto con los estudiantes de la carrera de ingeniería en sistemas de la universidad
                            Nacional de Costa Rica, sede regional chorotega</p>
                        <!-- <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Leer mas</a> -->

                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid" src="Assets/images/img/Home/collage.jpeg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">

        <h1 class="display-6 mb-5">Fases del proyecto</h1>

        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x bi bi-1-circle text-primary mb-4"></i>
                            <h5>Fase I</h5>
                            <p>Diagnóstico de los productos turísticos</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x bi bi-2-circle text-primary mb-4"></i>
                            <h5>Fase II</h5>
                            <p>Mejora de la gestión y tambien capacitación</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x bi bi-3-circle text-primary mb-4"></i>
                            <h5>Fase III</h5>
                            <p>Mejora de las prácticas de Gestión ambiental</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x bi bi-4-circle text-primary mb-4"></i>
                            <h5>Fase IV</h5>
                            <p>Desarrollo de estrategias de promoción</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- CASOUSEL -->

    <!-- Carousel -->
    <center>
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="carousel-tam" src="Assets/images/img/Home/carousel1.JPG" alt=" " class="d-block"
                        style="width:100%">
                </div>
                <div class="carousel-item">
                    <img class="carousel-tam" src="Assets/images/img/Home/carousel5.JPG" alt=" " class="d-block"
                        style="width:100%">
                </div>
                <div class="carousel-item">
                    <img class="carousel-tam" src="Assets/images/img/Home/carousel2.JPG" alt=" " class="d-block"
                        style="width:100%">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

    </center>

    <!-- CAROUSEL -->

    <!-- Reservation Start -->
    <!-- <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="video">
                   
                    <iframe width="1300" height="600" src="https://www.youtube.com/embed/LXb3EKWsInQ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
              
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Reservation Start -->


   
<br>
<br>

    <!-- Testimonial Start -->


    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Todos los</h5>
            <h1 class="mb-5">Involucrados</h1>
        </div>

    <div class="card-container">

        <div class="card">
            <div class="card-count-container">
                <div class="card-count"><img class="img-fluid tam-personal" src="Assets/images/fondo9.jpeg" alt=""></div>
            </div>

            <div class="card-content">
                <h2>Title</h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis iste vel accusamus sequi laboriosam
              
            </div>

            <div class="card-footer">
              Contacto:2332-9023
            </div>
        </div>

        <div class="card">
            <div class="card-count-container">
            <div class="card-count"><img class="img-fluid tam-personal" src="Assets/images/fondo9.jpeg" alt=""></div>
            </div>
            <div class="card-content">
                <h2>Title</h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis iste vel accusamus sequi laboriosam
           
            </div>

            <div class="card-footer">
            Contacto:2332-9023
            </div>
        </div>

        <div class="card">
            <div class="card-count-container">
            <div class="card-count"><img class="img-fluid tam-personal" src="Assets/images/fondo9.jpeg" alt=""></div>
            </div>
            <div class="card-content">
                <h2>Title</h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis iste vel accusamus sequi laboriosam
          
            </div>

            <div class="card-footer">
            Contacto:2332-9023
            </div>
        </div>


        <div class="card">
            <div class="card-count-container">
            <div class="card-count"><img class="img-fluid tam-personal" src="Assets/images/fondo9.jpeg" alt=""></div>
            </div>
            <div class="card-content">
                <h2>Title</h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis iste vel accusamus sequi laboriosam
                
            </div>

            <div class="card-footer">
            Contacto:2332-9023
            </div>
        </div>

    </div>



    
    


    <!-- Testimonial End -->

     <!-- Team Start -->
     <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Equipo de</h5>
                <h1 class="mb-5">Desarrolladores</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="overflow-hidden m-4 rounded-4">
                            <img class="img-fluid tam-personal" src="Assets/images/img/Home/Aaron.jpeg" alt="">
                        </div>
                        <h5 class="mb-0">Aaron Villegas Mora</h5>
                        <small>Desarrollador</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="overflow-hidden m-4 rounded-4">
                            <img class="img-fluid tam-personal" src="Assets/images/img/Home/Andrés.jpeg" alt="">
                        </div>
                        <h5 class="mb-0">Andrés Mejías González</h5>
                        <small>Desarrollador</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="overflow-hidden m-4 rounded-4">
                            <img class="img-fluid tam-personal" src="Assets/images/img/Home/Fiorella.jpg" alt="">
                        </div>
                        <h5 class="mb-0">Fiorella Bonilla González</h5>
                        <small>Desarrolladora</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="overflow-hidden m-4 rounded-4">
                            <img class="img-fluid tam-personal" src="Assets/images/img/Home/Sofia.jpeg" alt="">
                        </div>
                        <h5 class="mb-0">Sofia Moraga Gutierrez</h5>
                        <small>Desarrolladora</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Footer Start -->
    <?php
  footer($data);
  ?>
    <!-- Footer End -->



    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/lib-home/wow/wow.min.js"></script>
    <script src="Assets/lib-home/easing/easing.min.js"></script>
    <script src="Assets/lib-home/waypoints/waypoints.min.js"></script>
    <script src="Assets/lib-home/counterup/counterup.min.js"></script>
    <script src="Assets/lib-home/owlcarousel/owl.carousel.min.js"></script>
    <script src="Assets/lib-home/tempusdominus/js/moment.min.js"></script>
    <script src="Assets/lib-home/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="Assets/lib-home/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="Assets/js/Js-home/js/main.js"></script>


    <!-- Template Javascript CASOUSEL -->
    <!-- <script src="Assets/js/carousel-home/carousel-home.js"></script> -->


</body>

</html>