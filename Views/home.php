<?php
// _header($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $data['page_title'] ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

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
</head>

<body>

    <!-- Spinner End -->

    <?php
    _header($data);
    ?>

    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">

        <div class="container-xxl py-5 bg-portada-home  mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft"><b>Paraiso Azul<br>Golfo de Nicoya</b></h1>
                        <!-- <p style="font-size: 20px" class="text-white animated slideInLeft mb-4 pb-2"> ¿Dé que se trata el proyecto Paraíso Azul, Golfo de Nicoya? </p> -->
                        <h4 class="text-white animated slideInLeft mb-4 pb-2">
                            Es un proyecto extensión de CEMEDE y la Escuela de Ciencias Biológicas, en conjunto con los estudiantes de la carrera de ingeniería en sistemas de la Universidad Nacional de Costa Rica, Sede Regional Chorotega para las comunidades costeras e isleñas del Golfo de Nicoya.
                        </h4>
                        <!-- <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Leer mas</a> -->

                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid" style="border-radius: 30px;" src="Assets/images/img/Home/IMG_3860.JPG" alt="">
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
                            <p>Mejora de la gestión y capacitación</p>
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


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">-----</h5>
                <h1 class="mb-5">Involucrados</h1>
            </div>

            <div class="container-grupos">
                <div class="card-grupos">
                    <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, molestias ipsum. Distinctio eveniet nisi fuga ipsum explicabo architecto repellendus eum maiores qui cum modi nobis aspernatur repellat dolorum, reprehenderit ipsam?</h6>
                </div>
                <div class="card-grupos">
                    <h6>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit, nulla voluptatum facilis aperiam quibusdam soluta rem non pariatur obcaecati architecto, saepe ipsa maiores. In blanditiis, odit corporis rem eius accusantium!</h6>
                </div>
                <div class="card-grupos">
                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi excepturi vitae nemo doloribus animi! Sunt assumenda quos dolores? Itaque nisi expedita blanditiis dolore alias harum laborum maiores. Dicta, amet perferendis!</h6>
                </div>
            </div>

            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item bg-transparent border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="Assets/images/img/Home/testimonial-1.jpg" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Client Name</h5>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-transparent border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="Assets/images/img/Home/testimonial-2.jpg" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Client Name</h5>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-transparent border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="Assets/images/img/Home/testimonial-3.jpg" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Client Name</h5>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-transparent border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="Assets/images/img/Home/testimonial-4.jpg" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Client Name</h5>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

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
</body>

</html>

<!-- Footer Start -->
<?php
footer($data);
?>
<!-- Footer End -->