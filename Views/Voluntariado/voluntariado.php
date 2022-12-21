<?php
_header($data);
getModal('modalVoluntariado', $data);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Voluntariado</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="Assets/css/voluntariado.css" rel="stylesheet" />

    <!-- ////////CCS DE Carousel -->
    <!-- CSS -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/carousel-voluntariado/animate.css">
    <link rel="stylesheet" href="Assets/css/carousel-voluntariado/style.css">
    <link rel="stylesheet" href="Assets/css/carousel-voluntariado/media-queries.css">
    <link rel="stylesheet" href="Assets/css/carousel-voluntariado/carousel.css">






    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    <link rel="stylesheet" href="<?= media(); ?>/css/navbar.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->

        <!-- Header-->
        <header class="bg-header py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Voluntariado</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra ante sed dui maximus, vel tristique libero laoreet. Curabitur nec venenatis augue. Maecenas feugiat mattis tellus, nec vulputate quam tristique at. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quis porttitor odio. Nulla in mi erat. Nulla at porta mi. In hac habitasse platea dictumst. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas facilisis, eros ut finibus dapibus, velit nisi vestibulum sem, id aliquam leo ipsum quis velit. Nunc id tempus tellus.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Leer mas</a>
                                <!-- <a class="btn btn-outline-light btn-lg px-4" href="openModal();">Llenar formulario</a>  -->

                                <button class="btn btn-outline-light btn-lg px-4" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i>Llenar formulario</button>

                                </h1>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-5 my-1" src="Assets/images/voluntarios.png" alt="..." /></div>
                </div>
            </div>
        </header>


        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0">Actividades del voluntariado</h2>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-voluntarios rounded-5 my-1" src="Assets/images/UNA.jpg" alt="..." /></div>
                    </div>
                
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                                <h2 class="h5">Ayudar a las comunidades</h2>
                                <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                                <h2 class="h5">Unir la poblacion</h2>
                                <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                <h2 class="h5">Dar a conocer activides</h2>
                                <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                            </div>
                            <div class="col h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                <h2 class="h5">Prestar ayuda</h2>
                                <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section-->

              <!-- Reservation Start -->
              <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Book A Table Online</h1>
                        <form id="formVoluntario" name="formVoluntario" class="form-horizontal">
                        <input type="hidden" id="id_Voluntario" name="id_Voluntario" value="">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtNombre_vol" name="txtNombre_vol" placeholder="Your Name">
                                        <label for="txtNombre_vol">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="txtApellido1" name="txtApellido1" placeholder="Your Email">
                                        <label for="txtApellido1">Primer Apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="txtApellido2" name="txtApellido2" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="txtApellido2">Segundo Apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="txtCedula" name="txtCedula" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="txtCedula">Cedula</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="email" class="form-control datetimepicker-input" id="txtCorreo" name="txtCorreo" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="txtCorreo">Correo electronico</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="txtTelefono" name="txtTelefono" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="txtTelefono">Telefono</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="txtFecha_nacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control valid validText" placeholder="Fecha de nacimiento" id="txtFecha_nacimiento" name="txtFecha_nacimiento" required="">
                                </div>

                                <div class="col-md-6">
                                 <label for="txtGenero">Genero</label>            
                                   <select class="form-control" id="txtGenero" name="txtGenero" required="">
                                      <option value="1">Masculino</option>
                                      <option value="2">Femenino</option>
                                    </select>
                                     </div>                            
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="txtLugar_residencia" name="txtLugar_residencia" style="height: 100px"></textarea>
                                        <label for="txtLugar_residencia">Lugar donde residencia</label>
                                    </div>
                                </div>
                                <div class="form-group">
                   <label for="listStatus">Estado</label>
                   <select class="form-control" id="listStatus" name="listStatus" required="">
                     <option value="1">Activo</option>
                     <option value="2">Inactivo</option>
                   </select>
               </div>      



                                <div class="col-12">
                                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </form>
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
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation Start -->

        <!-- Carousel Start -->


        <div class="container-fluid">
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner row w-100 mx-auto" role="listbox">

                    <div class="tam-carousel">
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img class="redimension" src="Assets/images/img/carousel-voluntatiado/backgrounds/santa.jpg" class="img-fluid mx-auto d-block" alt="img3">
                        </div>
                    </div>


                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img class="redimension" src="Assets/images/img/carousel-voluntatiado/backgrounds/manzanillo.jpg" class="img-fluid mx-auto d-block" alt="img4">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img class="redimension" src="Assets/images/img/carousel-voluntatiado/backgrounds/mar.jpg" class="img-fluid mx-auto d-block" alt="img5">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                        <img class="redimension" src="Assets/images/img/carousel-voluntatiado/backgrounds/Nicoya.jpg" class="img-fluid mx-auto d-block" alt="img6">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img class="redimension" src="Assets/images/img/carousel-voluntatiado/backgrounds/piedra2.jpg" class="img-fluid mx-auto d-block" alt="img7">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img class="redimension" src="Assets/images/img/carousel-voluntatiado/backgrounds/playa.jpg" class="img-fluid mx-auto d-block" alt="img8">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img class="redimension" src="Assets/images/img/carousel-voluntatiado/backgrounds/playaaa.jpg" class="img-fluid mx-auto d-block" alt="img1">
                    </div>
                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                        <img class="redimension" src="Assets/images/img/carousel-voluntatiado/backgrounds/piedra.jpeg" class="img-fluid mx-auto d-block" alt="img2">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- Carousel End -->




        <!-- Blog preview section-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Recuerdos de voluntariados</h2>
                            <p class="lead fw-normal text-muted mb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum voluptatem eveniet quae praesentium atque ducimus, repellat excepturi illum quia esse, porro ipsa provident non magnam expedita aliquid animi saepe est!</p>
                        </div>
                    </div>
                </div>


                <div class="row gx-5">
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="voluntariadocard" src="Assets/images/img/cards-voluntariado/mudecop.jpeg" alt="..." />
                            <div class="card-body p-4">

                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">MUDECOOP</h5>
                                </a>
                                <p class="card-text mb-0">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="voluntariadocard" src="Assets/images/img/cards-voluntariado/mariposas.jpg" alt="..." />
                            <div class="card-body p-4">

                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">Mariposas del Golfo</h5>
                                </a>
                                <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of each card. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="voluntariadocard" src="Assets/images/img/cards-voluntariado/cope.jpg" alt="..." />
                            <div class="card-body p-4">

                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">Coopeacuicultores Isla Venado</h5>
                                </a>
                                <p class="card-text mb-0">Some more quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>



            <!-- Call to action-->








        </section>
    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="Assets/js/voluntariado.js"></script>

    <!-- Javascript CAROUSEL-->
    <script src="Assets/js/carousel-voluntariado/jquery-3.3.1.min.js"></script>
    <script src="Assets/js/carousel-voluntariado/jquery-migrate-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="Assets/js/carousel-voluntariado/jquery.backstretch.min.js"></script>
    <script src="Assets/js/carousel-voluntariado/wow.min.js"></script>
    <script src="Assets/js/carousel-voluntariado/scripts.js"></script>





</body>

</html>


<?php
footer($data);
?>