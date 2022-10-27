<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Paraíso Azul</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />

  <!-- Favicon -->
  <link href="Assets/images/img/favicon.ico" rel="icon" />
  <link rel="stylesheet" href="<?= media(); ?>/css/navbar.css">
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="Assets/lib/animate/animate.min.css" rel="stylesheet" />
  <link href="Assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="Assets/css/bootstrap.minn.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="Assets/css/styles.css" rel="stylesheet" />
</head>

<body>
  <!-- Spinner Start -->

  <?php
  _header($data);
  ?>


  <!-- About Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px">
            <img class="position-absolute w-100 h-100" src="Assets/images/collage.jpeg" alt="" style="object-fit: cover" />
            <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3" style="width: 200px; height: 200px">
              <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                <h1 class="text-white mb-0">RED</h1>
                <h2 class="text-white">COSTERA</h2>
                <h5 class="text-white mb-0"></h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="h-100">
            <h1 class="display-6 mb-5">
              ¿Dé que se trata el proyecto Paraíso Azul, Golfo de Nicoya?
            </h1>
            <p class="fs-5 text-primary mb-4">
              Es un proyecto extensión de CEMEDE, en conjunto con los estudiantes de la carrera de ingeniería en sistemas de la universidad Nacional de Costa Rica, sede regional chorotega
            </p>

            <div class="col-sm-6">
              <div class="d-flex align-items-center">
                <img class="flex-shrink-0 me-3" src="Assets/images/img/icon/icon-03-primary.png" alt="" />
                <h5 class="mb-0">Objetivo del proyecto</h5>
              </div>
              <p class="mb-4">
                Brindar mayor visibilización a los productos y servicios que brindas los habitantes del golfo de nicoya
              </p>
            </div>
          </div>

          <div class="border-top mt-4 pt-4">
            <div class="d-flex align-items-center">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- About End -->

  <!-- Carousel Start -->
  <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="Assets/images/manzanillo.jpg" alt="Image" height="850" />
          <div class="carousel-caption">
            <div class="container">
              <div class="row">
                <div class="col-12 col-lg-6">
                  <h1 class="display-3 text-dark mb-4 animated slideInDown">
                  </h1>
                  <p class="fs-5 text-body mb-5">

                  </p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">

          <img class="w-100" src="Assets/images/2.jpg" alt="Image" height="600" />
          <div class="carousel-caption">
            <div class="container">
              <div class="row">
                <div class="col-12 col-lg-6">
                  <h1 class="display-3 text-dark mb-4 animated slideInDown">

                  </h1>
                  <p class="fs-5 text-body mb-5">

                  </p>

                </div>
              </div>
            </div>
          </div>
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

  <!-- Features Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          <h1 class="display-6 mb-5">Fases del proyecto</h1>
          <p class="mb-4">
            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
            diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet
            lorem sit clita duo justo magna dolore erat amet
          </p>
          <div class="row g-3">
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
              <div class="bg-light rounded h-100 p-3">
                <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                  <img class="align-self-center mb-3" src="Assets/images/img/icon/icon-06-primary.png" alt="" />
                  <h5 class="mb-0">Easy Process</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
              <div class="bg-light rounded h-100 p-3">
                <div class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3">
                  <img class="align-self-center mb-3" src="Assets/images/img/icon/icon-03-primary.png" alt="" />
                  <h5 class="mb-0">Fast Delivery</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
              <div class="bg-light rounded h-100 p-3">
                <div class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3">
                  <img class="align-self-center mb-3" src="Assets/images/img/icon/icon-04-primary.png" alt="" />
                  <h5 class="mb-0">Policy Controlling</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
              <div class="bg-light rounded h-100 p-3">
                <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                  <img class="align-self-center mb-3" src="Assets/images/img/icon/icon-07-primary.png" alt="" />
                  <h5 class="mb-0">Money Saving</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="position-relative rounded overflow-hidden h-100" style="min-height: 400px">
            <img class="position-absolute w-100 h-100" src="Assets/images/red.jpeg" alt="" style="object-fit: cover" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Features End -->

  <!-- Service Start -->
  <div class="container-xxl py-5">

    <div class="container">
      <div class="text-center mx-auto" style="max-width: 500px">
        <h1 class="display-6 mb-5">
          Grupos Organizados
        </h1>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo2.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Asociación de pesca responsable de Montero Isla Chira</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>

          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo3.jpeg" alt="" />
              </div>
              <h4 class="mb-0">ADI isla caballo</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo4.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Asociación de mujeres de la Montañita de Coyolito</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>

          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo6.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Asociación de mujeres mariposa</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/img/icon/icon-07-light.png" alt="" />
              </div>
              <h4 class="mb-0">Mudecoop</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo5.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Mudencos</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/img/fondo1.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Asociación de Jovenes de Isla Venado</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo8.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Coopeacuicultores Isla Venado</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo8.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Asociación de desarrollo integral de Isla Caballo
              </h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo9.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Asopecupachi</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo10.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Asociación de desarrollo integral de Isla Venado</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>

        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img class="img-fluid" src="Assets/images/fondo11.jpeg" alt="" />
              </div>
              <h4 class="mb-0">Asociación de cultivo de mejillones y maríscos de Isla Chira</h4>
            </div>
            <p class="mb-4">
              Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
              sit clita duo justo erat amet
            </p>

          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Service End -->


  <!-- Team Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center mx-auto" style="max-width: 500px">
        <h1 class="display-6 mb-5">Desarrolladores</h1>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item rounded">
            <img class="img-fluid" src="Assets/images/Andrés.jpeg" alt="" />
            <div class="text-center p-4">
              <h5>Andrés Mejía González</h5>
              <span>Designation</span>
            </div>
            <div class="team-text text-center bg-white p-4">
              <h5>Fauricio Andrés Mejía González</h5>
              <p>Designation</p>

            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="team-item rounded">
            <img class="img-fluid" src="Assets/images/Sofia.jpeg" alt="" />
            <div class="text-center p-4">
              <h5>Sofia Moraga Gutierréz</h5>
              <span>Designation</span>
            </div>
            <div class="team-text text-center bg-white p-4">
              <h5>Glenda Sofia Moraga Gutierréz</h5>
              <p>Designation</p>

            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="team-item rounded">
            <img class="img-fluid" src="Assets/images/Fiorella.jpeg" alt="" />
            <div class="text-center p-4">
              <h5>Fiorella Bonilla González</h5>
              <span>Designation</span>
            </div>
            <div class="team-text text-center bg-white p-4">
              <h5>Fiorella Bonilla González</h5>
              <p>Designation</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
          <div class="team-item rounded">
            <img class="img-fluid" src="Assets/images/Aaron.jpeg" alt="" />
            <div class="text-center p-4">
              <h5>Aaron Villegas Mora</h5>
              <span>Designation</span>
            </div>
            <div class="team-text text-center bg-white p-4">
              <h5>Aaron Villegas Mora</h5>
              <p>Designation</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Team End -->

  <!-- Testimonial Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center mx-auto" style="max-width: 500px">
        <h1 class="display-6 mb-5">What They Say About Our Insurance</h1>
      </div>
      <div class="row g-5">
        <div class="col-lg-3 d-none d-lg-block">
          <div class="testimonial-left h-100">
            <img class="img-fluid animated pulse infinite" src="Assets/images/CEMEDE.png" alt="" />
            <img class="img-fluid animated pulse infinite" src="Assets/images/ingenieria.png" alt="" />
            <img class="img-fluid animated pulse infinite" src="Assets/images/UNA.jpg" alt="" />
          </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
          <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item text-center">
              <img class="img-fluid rounded mx-auto mb-4" src="Assets/images/UNA.jpg" alt="" />
              <p class="fs-5">
                Dolores sed duo clita tempor justo dolor et stet lorem kasd
                labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy
                et labore et tempor diam tempor erat.
              </p>
              <h5>Universidad Nacional de Costa Rica</h5>
              <span>Colaborador</span>
            </div>
            <div class="testimonial-item text-center">
              <img class="img-fluid rounded mx-auto mb-4" src="Assets/images/CEMEDE.png" alt="" />
              <p class="fs-5">
                Dolores sed duo clita tempor justo dolor et stet lorem kasd
                labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy
                et labore et tempor diam tempor erat.
              </p>
              <h5>CEMEDE</h5>
              <span>Colaborador</span>
            </div>
            <div class="testimonial-item text-center">
              <img class="img-fluid rounded mx-auto mb-4" src="Assets/images/ingenieria.png" alt="" />
              <p class="fs-5">
                Dolores sed duo clita tempor justo dolor et stet lorem kasd
                labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy
                et labore et tempor diam tempor erat.
              </p>
              <h5>Ingeniería en sistemas de información</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-3 d-none d-lg-block">
          <div class="testimonial-right h-100">
            <img class="img-fluid animated pulse infinite" src="Assets/images/CEMEDE.png" alt="" />
            <img class="img-fluid animated pulse infinite" src="Assets/images/ingenieria.png" alt="" />
            <img class="img-fluid animated pulse infinite" src="Assets/images/UNA.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonial End -->

  <!-- Footer Start -->
  <?php
  footer($data);
  ?>
  <!-- Footer End -->

  <!-- Back to Top -->
  <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="Assets/lib/wow/wow.min.js"></script>
  <script src="Assets/lib/easing/easing.min.js"></script>
  <script src="Assets/lib/waypoints/waypoints.min.js"></script>
  <script src="Assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="Assets/lib/counterup/counterup.min.js"></script>

  <!-- Template Javascript -->
  <script src="Assets/js/mainn.js"></script>
</body>

</html>