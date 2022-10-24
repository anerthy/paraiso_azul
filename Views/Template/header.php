<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title']; ?></title>

    <!-- Vendor CSS Files -->
    <link href="<?= media(); ?>/css/navbar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= media(); ?>/css/navbar/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= media(); ?>/css/navbar/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= media(); ?>/css/navbar/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= media(); ?>/css/navbar/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= media(); ?>/css/navbar/main.css" rel="stylesheet">

    <!-- Estilos CSS para las vistas -->
    <link rel="stylesheet" href="<?= media(); ?>/css/vistas.css">

</head>

<body>

    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="<?= base_url(); ?>" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="<?= media(); ?>/images/imagen2.png" alt="logo de cemede">
                <!-- <h1>Impact<span>.</span></h1> -->
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="<?= base_url(); ?>">Inicio</a></li>
                    <li class="dropdown"><a href="#"><span>¿Qué ofrecemos?</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <!-- <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li> -->
                            <li><a href="<?= base_url(); ?>/Servicios/alimentacion">Alimentacion</a></li>
                            <li><a href="<?= base_url(); ?>/Servicios/hospedaje">Hospedaje</a></li>
                            <li><a href="<?= base_url(); ?>/Servicios/transporte">Transporte</a></li>
                            <li><a href="<?= base_url(); ?>/Servicios/tours">Tours</a></li>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><span>Proyecto</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="<?= base_url(); ?>/SobreNosotros/cemede">CEMEDE</a></li>
                            <li><a href="<?= base_url(); ?>/SobreNosotros/grupos">Grupos Organizados</a></li>
                            <li><a href="<?= base_url(); ?>/SobreNosotros/comunidades">Comunidades</a></li>
                        </ul>
                    </li>

                    <li><a href="<?= base_url(); ?>/voluntariado">Voluntariado</a></li>

                    <li><a href="<?= base_url(); ?>/login">Login</a></li>

                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->