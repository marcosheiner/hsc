<!doctype html>
<html lang="pt-BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/css.css">
  <title>Hire</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
</head>

<body>


  <nav class="navbar sticky-top p-0 border-bottom" style="background-color: #fff;">
    <a class="navbar-brand p-3" href="#">HSC</a>
    <button class="navbar-toggler d-md-none p-3 collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse border">
        <div class="sidebar-sticky pt-3">
          <?php if ($_SESSION['funcao'] == 'funcionario' || $_SESSION['funcao'] == 'gerente') { ?>
            <ul class="nav flex-column">
              <li class="nav-item m-1 border">
                <a class="nav-link" href="../pages/dashboard.php">
                  <i class="fas fa-tachometer-alt pr-2"></i>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item m-1 border">
                <a class="nav-link" href="../pages/criar_anuncio.php">
                  <i class="fas fa-plus pr-2"></i>
                  Criar Anúncio
                </a>
              </li>
              <li class="nav-item m-1 border">
                <a class="nav-link" href="../pages/meus_anuncios.php">
                  <i class="fas fa-home pr-2"></i>
                  Meus Anúncios
                </a>
              </li>
              <li class="nav-item m-1 border">
                <a class="nav-link" href="../pages/painel.php">
                  <i class="fas fa-columns pr-2"></i>
                  Acessar Painel
                </a>
              </li>
            </ul>
          <?php } ?>
          <?php if ($_SESSION['funcao'] == 'admin' || $_SESSION['funcao'] == 'gerente') { ?>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-1 mt-1 mb-1 text-muted">
              <small>Usuários</small>
              <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item m-1 border">
                <a class="nav-link" href="../pages/usuarios.php">
                  <i class="fas fa-user pr-2"></i>
                  Lista de Usuários
                </a>
              </li>
              <li class="nav-item m-1 border">
                <a class="nav-link" href="../pages/cad_usuario.php">
                  <i class="fas fa-user-cog pr-2"></i>
                  Cadastrar Usuário
                </a>
              </li>
              <li class="nav-item m-1 border">
                <a class="nav-link" href="../routes/logout.php">
                  <i class="fas fa-cog pr-2"></i>
                  Configurar Usuário
                </a>
              </li>
            </ul>
          <?php } ?>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-1 mt-1 mb-1 text-muted">
            <small>Configurações</small>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item m-1 border">
              <a class="nav-link" href="../pages/perfil.php">
                <i class="fas fa-user-circle pr-2"></i>
                Perfil
              </a>
            </li>
            <li class="nav-item m-1 border">
              <a class="nav-link" href="../routes/logout.php">
                <i class="fas fa-sign-out-alt pr-2"></i>
                Sair
              </a>
            </li>
          </ul>
        </div>
      </nav>