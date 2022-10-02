<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/paraiso_azul/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/paraiso_azul/Assets/css/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Alimentacion</title>
</head>

<body>

    <header>
        <nav class="navbar">
            <ul>

                <li><a href="<?= base_url(); ?>">Inicio</a></li>

                <li id="dd" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">¿Que ofrecemos?</a>
                    <ul id="dropdown" class="dropdown-menu" role="menu">
                        <li><a href="<?= base_url(); ?>/home/alimentacion">Alimentacion</a></li>
                        <li><a href="<?= base_url(); ?>/home/hospedaje">Hospedaje</a></li>
                        <li><a href="<?= base_url(); ?>/home/trasnporte">Transporte</a></li>
                        <li><a href="#">Tours</a></li>
                    </ul>
                <li>

                <li id="dd" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sobre el proyecto</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= base_url(); ?>/home/cemede">CEMEDE</a></li>
                        <li><a href="<?= base_url(); ?>/home/grupo">Grupos Organizados</a></li>
                        <li><a href="<?= base_url(); ?>/home/comunidad">Comunidades</a></li>
                    </ul>
                </li>

                <li><a href="<?= base_url(); ?>/home/voluntariado">Voluntariado</a></li>

                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>

                <li>
                    <a href="<?= base_url(); ?>/dashboard">
                        <i class="fa fa-user"></i> Dashboard
                    </a>
                </li>

            </ul>
        </nav>
    </header>

    <h1>Alimentacion</h1>
</body>

</html>