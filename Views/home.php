<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://localhost/paraiso_azul/Assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/paraiso_azul/Assets/css/home.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- js -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <title>Paraiso Azul</title>
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

  <div id="general">

    <div id="foto">
      <br><br>
      <img id="logo" src="<?= media(); ?>/images/uploads/redCostera.jpg" width="350" height="350">
    </div>

    <div id="titulo">
      <div class="text-center">
        <h1 class="display-4">Paraiso Azul</h1>
      </div>
    </div>

    <div id="contenido">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus risus in augue porta rhoncus. Nunc at magna eleifend, sodales neque ut, aliquet nisi. Duis sit amet eros a arcu varius elementum posuere in eros. Donec turpis quam, egestas vel pretium sit amet, pulvinar ac nulla. Suspendisse ac tempor nunc. Morbi interdum ac risus sed semper. Etiam blandit augue id porta hendrerit. Nullam semper nibh sed ullamcorper elementum. Aenean vel ante a odio fermentum cursus at id nulla. Nulla pharetra felis eget ullamcorper ultrices. Maecenas sit amet viverra tortor. Ut tempor aliquet felis, in pellentesque elit. Aenean sollicitudin diam turpis, in vulputate magna sollicitudin quis. Nam imperdiet lectus dui, cursus iaculis elit dignissim ut. Maecenas a euismod nisl, et fermentum dolor. Pellentesque ornare magna non sem posuere, vitae tempor tortor sodales. In hac habitasse platea dictumst. Curabitur at libero at nisl interdum scelerisque. Donec nec sapien id nunc laoreet ultricies sit amet faucibus urna. Duis vel sodales ipsum, consequat tincidunt tortor. Integer id tristique leo. Morbi sagittis, mi nec commodo feugiat, augue risus consequat mi, at iaculis risus sapien ut odio. Fusce at odio fermentum, convallis nulla et, tempus magna. Proin finibus nunc quis metus volutpat, nec egestas diam tristique. Phasellus porta lobortis lorem, eu varius eros elementum a. In hac habitasse platea dictumst. Fusce pharetra hendrerit bibendum. Suspendisse dapibus, felis a aliquet auctor, dolor velit maximus tellus, at sodales lacus odio non libero. Maecenas rhoncus, dui quis pharetra accumsan, ligula justo luctus turpis, nec mollis lacus massa non dolor. Nulla et posuere metus. Morbi imperdiet erat id magna rutrum vehicula et vitae lectus. Pellentesque maximus, lectus consectetur malesuada congue, lorem mi scelerisque sem, et maximus tellus ipsum vitae massa. Proin massa nulla, pulvinar ac congue id, facilisis quis orci.
      </p>
    </div>

    <div id="texto">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus risus in augue porta rhoncus. Nunc at magna eleifend, sodales neque ut, aliquet nisi. Duis sit amet eros a arcu varius elementum posuere in eros. Donec turpis quam, egestas vel pretium sit amet, pulvinar ac nulla. Suspendisse ac tempor nunc. Morbi interdum ac risus sed semper. Etiam blandit augue id porta hendrerit. Nullam semper nibh sed ullamcorper elementum. Aenean vel ante a odio fermentum cursus at id nulla. Nulla pharetra felis eget ullamcorper ultrices. Maecenas sit amet viverra tortor. Ut tempor aliquet felis, in pellentesque elit. Aenean sollicitudin diam turpis, in vulputate magna sollicitudin quis. Nam imperdiet lectus dui, cursus iaculis elit dignissim ut. Maecenas a euismod nisl, et fermentum dolor. Pellentesque ornare magna non sem posuere, vitae tempor tortor sodales. In hac habitasse platea dictumst. Curabitur at libero at nisl interdum scelerisque. Donec nec sapien id nunc laoreet ultricies sit amet faucibus urna. Duis vel sodales ipsum, consequat tincidunt tortor. Integer id tristique leo. Morbi sagittis, mi nec commodo feugiat, augue risus consequat mi, at iaculis risus sapien ut odio. Fusce at odio fermentum, convallis nulla et, tempus magna. Proin finibus nunc quis metus volutpat, nec egestas diam tristique. Phasellus porta lobortis lorem, eu varius eros elementum a. In hac habitasse platea dictumst. Fusce pharetra hendrerit bibendum. Suspendisse dapibus, felis a aliquet auctor, dolor velit maximus tellus, at sodales lacus odio non libero. Maecenas rhoncus, dui quis pharetra accumsan, ligula justo luctus turpis, nec mollis lacus massa non dolor. Nulla et posuere metus. Morbi imperdiet erat id magna rutrum vehicula et vitae lectus. Pellentesque maximus, lectus consectetur malesuada congue, lorem mi scelerisque sem, et maximus tellus ipsum vitae massa. Proin massa nulla, pulvinar ac congue id, facilisis quis orci. Vivamus in velit ligula. Pellentesque maximus, lectus consectetur malesuada congue, lorem mi scelerisque sem.
      </p>
    </div>

  </div>

  <script src="http://localhost/paraiso_azul/Assets/js/bootstrap.min.js""></script>
</body>
</html>
<script src=" http://localhost/paraiso_azul/Assets/js/bootstrap.min.js""></script>