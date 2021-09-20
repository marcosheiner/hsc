<!doctype html>
<html lang="pt-BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/css.css">
  <title>Hire</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>

  <!--menu + container-->
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg mt-3">
      <a class="navbar-brand" href="#"><img src="assets/img/logo/logo-azul.png" alt="" width="50"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active mr-3 pl-1 pr-1">
            <a class="nav-link" href="home/sobre.php">Sobre</a>
          </li>
          <li class="nav-item mr-3 pl-1 pr-1">
            <a class="nav-link" href="home/suporte.php">Suporte</a>
          </li>
          <li class="nav-item nav-get-start mr-3 pl-3 pr-3">
            <a class="nav-link nav-link-get-start" href="home/login.php">Anúncios</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!--container menu-->

  <div class="container mt-5">
    <div class="row">
      <div class="col-xl-6 col-md-6 mt-5">
        <div class="cont-left p-1 m-2">
          <h1 class="text-index">Realizando o seu melhor negócio!</h1>
          <p class="lead mb-5">Compra e venda de imóveis na região do Cariri</p>
          <a href="home/anuncios.php" class="btn btn-lg pl-5 pr-5 shadow-lg btn-get-start">Ver Anúncios</a>
        </div>
      </div>
      <div class="col-xl-6 col-md-6 area-img mt-5 mb-4">
        <div class="m-2">
          <img src="assets/img/home/ilustra-1-min.jpeg" alt="" class="img-home">
        </div>
      </div>
    </div>
  </div>

  <footer class="footer mt-5 py-3 footer-pages">
    <div class="area-footer p-5">
      <div class="row">
        <div class="col-xl-3 col-md-4">
          <h1 class="h5 mb-3">Talys Eduardo | Corretor</h1>
          <p class="mb-5">Realizando o seu melhor negócio! Compra e venda de imóveis na região do Cariri</p>
          <p class="text-light"><small>CRECI 20748</small></p>
        </div>
        <div class="col-xl-2 col-md-3">
          <h1 class="h5 mb-3"><i class="fas fa-bars"></i></h1>
          <a href="" class="text-light">
            <p><small>Sobre</small></p>
          </a>
          <a href="" class="text-light">
            <p><small>Suporte</small></p>
          </a>
          <a href="" class="text-light">
            <p><small>Anúncios</small></p>
          </a>
        </div>
        <div class="col-xl-3 col-md-4">
          <h1 class="h5 mb-3">Redes Sociais</h1>
          <a href="" class="text-light">
            <p><small><i class="fab fa-instagram"></i> Instagram</small></p>
          </a>
        </div>
      </div>
    </div>
    <div class="text-center">
      <p><small><a href="" class="text-light">G-Dev</a> - Desenvolvimento de Sistemas | Copyright 2021 </small> </p>
    </div>
  </footer>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script>
    jQuery(function($) {
      $("#cep").mask("00000-000");
      $("#valor").mask('#.##0,00', {
        reverse: true
      });
      $("#telefone").mask("(99) 99999-9999");
      $("#wpp").mask("(99) 99999-9999");

    });
  </script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
</body>

</html>