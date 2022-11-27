
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Assets/lib-home/animate/animate.min.css" rel="stylesheet">
    <link href="Assets/lib-home/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assets/css/Estilos-home/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Assets/css/Estilos-home/style.css" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


   


    <!-- Navbar Start -->
  
    <?php
  _header($data);
        ?>

    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="cat" src="Assets/images/img/Home/header.JPG" alt="Image">
                    
                </div>
                <div class="carousel-item">
                    <img class="cat" src="Assets/images/img/Home/IMG_3860.JPG" alt="Image">
                
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row gx-3 h-100">
                        <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid" src="Assets/images/img/Home/zoncho1.png">
                        </div>
                        <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                            <img class="img-fluid" src="Assets/images/img/Home/mariposa.png">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">Bienvenidos al</p>
                    <h1 class="display-5 mb-4 color-text">Paraiso azul del Golfo Nicoya</h1>
                    <p class="mb-4">Es un proyecto extensión de CEMEDE, en conjunto con los estudiantes de la carrera de ingeniería en sistemas de la universidad Nacional de Costa Rica, sede regional chorotega
                    </p>
                  
                        <div class="ms-4">
                            <p><i class="fa fa-check text-primary me-2"></i>Desarrollo turistico</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Activacion economica</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Promocion de servicios</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Visibilidad para las comunidades</p>
                            <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Reconocimiento de emprendimientos</p>
                        </div>
                    </div>
                  
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid facts my-5 p-5">
        <h2>Fases del proyecto</h2>
        <div class="row g-5">
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center border p-5">
                    <i class="fa bi-1-circle fa-3x text-white mb-3"></i>
                    <h1 ></h1>
                    <span class="fs-5 fw-semi-bold text-white">Diagnóstico de los productos turísticos</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center border p-5">
                    <i class="fa bi-2-circle fa-3x text-white mb-3"></i>
                    <h1></h1>
                    <span class="fs-5 fw-semi-bold text-white">Mejora de la gestión y tambien capacitación</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center border p-5">
                    <i class="fa bi-3-circle fa-3x text-white mb-3"></i>
                    <h1></h1>
                    <span class="fs-5 fw-semi-bold text-white">Mejora de las prácticas de Gestión ambiental</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="text-center border p-5">
                    <i class="fa bi-4-circle  fa-3x text-white mb-3"></i>
                    <h1></h1>
                    <span class="fs-5 fw-semi-bold text-white">Desarrollo de estrategias de promoción</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


   


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Service Start -->
    <center>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d251652.5194380515!2d-84.88906910601568!3d9.76008520648181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa1d4dbd04d2ecb%3A0x63c6b31db43dd0fd!2sGolfo%20de%20Nicoya!5e0!3m2!1ses!2scr!4v1669588411262!5m2!1ses!2scr" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </center>
    <!-- Service End -->


    <!-- Project Start -->
    <div class="container-fluid bg-cuadro pt-5 my-5 px-0">
        <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            
            <h1 class="display-5 text-white mb-5">Involucrados del proyecto</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
            <a class="project-item" href="">
                <img class="cards-invo" src="Assets/images/img/Home/CEMEDE.png" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">CEMEDE</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img class="cards-invo" src="Assets/images/img/Home/LogoDeCarrea.jpeg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0"> Ingenieria en sistemas</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img class="cards-invo" src="Assets/images/img/Home/UNA.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Universidad Nacional</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img class="cards-invo" src="Assets/images/img/Home/enblanco.png" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Escuela de ciencias biologicas</h5>
                </div>
            </a>
         
            <a class="project-item" href="">
                <img class="cards-invo" src="Assets/images/img/Home/logouna.png" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Sede Chorotega</h5>
                </div>
            </a>
        </div>
    </div>
    <!-- Project End -->




   

    <!-- Footer Start -->
    <?php
  footer($data);
  ?>
 <!-- Footer End -->

  



  


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/lib-home/wow/wow.min.js"></script>
    <script src="Assets/lib-home/easing/easing.min.js"></script>
    <script src="Assets/lib-home/waypoints/waypoints.min.js"></script>
    <script src="Assets/lib-home/owlcarousel/owl.carousel.min.js"></script>
    <script src="Assets/lib-home/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="Assets/js/Js-home/main.js"></script>
</body>

</html>