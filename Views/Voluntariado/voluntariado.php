<?php
nav_bar($data);
 getModal('modalVoluntariado', $data);
 
 
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Paraíso Azul</title> 
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
                                <h1 class="display-5 fw-bolder text-white mb-2">Voluntarios</h1>
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
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">El voluntariado tiene como fin</h2>
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



            <!-- Carousel Start -->


            <div class="container-fluid">
        		<div id="carousel-example" class="carousel slide" data-ride="carousel">
        			<div class="carousel-inner row w-100 mx-auto" role="listbox">
            			
						<div class="cat">
						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
							<img src="Assets/images/img/carousel-voluntatiado/backgrounds/santa.jpg" class="img-fluid mx-auto d-block" alt="img3">
						</div>
                        </div>

						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
							<img src="Assets/images/img/carousel-voluntatiado/backgrounds/4.jpg" class="img-fluid mx-auto d-block" alt="img4">
						</div>
						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
							<img src="Assets/images/img/carousel-voluntatiado/backgrounds/5.jpg" class="img-fluid mx-auto d-block" alt="img5">
						</div>
						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
							<img src="Assets/images/img/carousel-voluntatiado/backgrounds/6.jpg" class="img-fluid mx-auto d-block" alt="img6">
						</div>
						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
							<img src="Assets/images/img/carousel-voluntatiado/backgrounds/7.jpg" class="img-fluid mx-auto d-block" alt="img7">
						</div>
						<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
							<img src="Assets/images/img/carousel-voluntatiado/backgrounds/8.jpg" class="img-fluid mx-auto d-block" alt="img8">
						</div>
        			<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
							<img src="Assets/images/img/carousel-voluntatiado/backgrounds/1.jpg" class="img-fluid mx-auto d-block" alt="img1">
						</div><div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
							<img src="Assets/images/img/carousel-voluntatiado/backgrounds/2.jpg" class="img-fluid mx-auto d-block" alt="img2">
						</div></div>
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
                                <h2 class="fw-bolder">informacion de interes</h2>
                                <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        
                   


                    </div>
                    <!-- Call to action-->
                
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
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