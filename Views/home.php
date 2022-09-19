<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://localhost/paraiso_azul/Assets/css/bootstrap.min.css">
  <title>Home</title>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/paraiso_azul">Paraiso Azul</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="http://localhost/paraiso_azul/home">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ¿Que ofrecemos?
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Hospedaje</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Alimentacion</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Transporte</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Tours</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sobre Nosotros
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">CEMEDE</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= base_url(); ?>/grupos">Grupos Organizados</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Comunidades</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Voluntariado</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>/dashboard">DashBoard</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>

  <h1 class="display-4">Paraiso Azul - Golfo de Nicoya</h1>

  <br />
  <br />
  <br />
  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed libero libero, molestie et purus dapibus, elementum fermentum nunc. Curabitur sit amet nisl elit. Nulla luctus purus vel orci porttitor, condimentum lacinia sapien fermentum. Quisque diam libero, vulputate et tortor a, imperdiet rutrum libero. In nec nulla efficitur, auctor elit ut, molestie libero. Ut venenatis turpis tincidunt, dapibus justo et, finibus metus. Phasellus venenatis enim diam, ut cursus tellus tristique non. Fusce at mi laoreet, pharetra felis ut, iaculis metus. Donec suscipit elementum nibh non bibendum. Praesent sit amet felis eget diam posuere eleifend. Vestibulum mattis dictum tempor.
    Cras sed leo lectus. Pellentesque nibh orci, tristique quis gravida non, dictum eget mi. Nulla in dui quam. Duis dui dolor, venenatis a pharetra non, dapibus a mauris. Quisque non bibendum ante. Vivamus ultrices consectetur purus, nec dapibus elit sodales non. Etiam ut odio rutrum, tincidunt dolor ac, ornare felis. Vivamus laoreet quam neque, at sollicitudin nisl lacinia vitae. Cras aliquet, nibh quis porttitor cursus, purus quam pellentesque lacus, vel euismod lorem nulla a tortor. Cras nec dui dolor.
    Ut ac elit ex. Sed non nisi sollicitudin, scelerisque dolor sed, dapibus felis. Sed efficitur sollicitudin justo non ultrices. Integer ornare feugiat aliquet. Donec mattis faucibus mauris, mollis mollis erat varius quis. Vestibulum sollicitudin commodo ultricies. Vestibulum consequat ultrices libero eu pellentesque. Donec vitae vestibulum neque. Suspendisse sagittis posuere nisl eleifend cursus. Duis iaculis dui sem, vitae hendrerit quam aliquam eget. Curabitur ac felis volutpat, tempor lorem vel, faucibus ante.
    Fusce posuere velit et convallis mattis. Suspendisse luctus imperdiet tellus, ut vestibulum odio bibendum nec. Donec vitae ipsum sed nibh scelerisque ultricies. Morbi vitae faucibus nunc. Integer sagittis nunc nec massa pretium pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi ac rhoncus quam. Suspendisse tempor faucibus neque at tempor. Fusce sit amet hendrerit orci. Suspendisse quis libero at urna sagittis tincidunt.
    Donec auctor enim sit amet nisl rutrum, id vulputate quam volutpat. Aenean risus metus, tempus a mollis ultricies, rhoncus vel nulla. Nam dictum sed odio in condimentum. Morbi eu tempor massa. Maecenas gravida urna nec mauris luctus fermentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent dapibus magna semper, blandit tortor at, commodo nisl.
  </p>

  <script src="http://localhost/paraiso_azul/Assets/js/bootstrap.min.js""></script>
</body>
</html>