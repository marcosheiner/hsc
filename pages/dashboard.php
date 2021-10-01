<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['email_user']) && isset($_SESSION['id'])) {   ?>

  <?php
  //mostrar quantidade de anuncios
  $get_qtd_anun       = "SELECT count(id) AS total_anuncio FROM criar_anuncio";
  $query_result       = mysqli_query($conn, $get_qtd_anun);
  $query_values       = mysqli_fetch_assoc($query_result);
  $num_anun           = $query_values['total_anuncio'];

  //mostrar quantidade de usuarios cadastrados
  $get_qtd_user       = "SELECT count(id) AS total_user FROM usuario";
  $query_result_user  = mysqli_query($conn, $get_qtd_user);
  $query_values_user  = mysqli_fetch_assoc($query_result_user);
  $num_user           = $query_values_user['total_user'];

  //mostrar quantos anuncios o usuario fez
  $id_user = $_SESSION['id'];
  $get_anun_user      = "SELECT count(id) AS total_anun_user FROM criar_anuncio WHERE id_user_anun ='$id_user'";
  $query_anun_result  = mysqli_query($conn, $get_anun_user);
  $query_anun_values  = mysqli_fetch_assoc($query_anun_result);
  $total_anun_user    = $query_anun_values['total_anun_user'];


  //pegar todos os anuncios feitos por usuario
  $sel_anun_database = "SELECT * FROM criar_anuncio WHERE id_user_anun='$_SESSION[id]' ORDER BY id DESC LIMIT 8";
  $result_anun = $conn->query($sel_anun_database) or die($conn->error);

  ?>

  <!--//////////////////////////////////////////////////////////////////-->

  <?php include '../includes/menudashboard.php'; ?>

  <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <?php if ($_SESSION['funcao'] == 'admin' || $_SESSION['funcao'] == 'funcionario' || $_SESSION['funcao'] == 'gerente') { ?>
      <span class="badge badge-danger text-light text-capitalize">
        <?php echo $_SESSION['funcao']; ?>
      </span>
      <span class="float-right text-muted text-capitalize">
        Bem-vindo, <?php echo $_SESSION['nome_user']; ?>! 😎
      </span>
    <?php } ?>

    <h1 class="h3 mb-3" style="font-weight: 700;">Dashboard</h1>
    <div class="row">
      <?php if ($_SESSION['funcao'] == 'funcionario' || $_SESSION['funcao'] == 'gerente' || $_SESSION['funcao'] == 'admin') { ?>


        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card-dados p-4">
            <h1 style="font-weight: 600;"><?php echo $total_anun_user ?></h1>
            <i class="float-right mt-1 fas fa-home"></i>
            <p>Meus Anúncios</p>
          </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card-dados-all p-4">
            <h1 style="font-weight: 600;"><?php echo $num_anun ?></h1>
            <i class="float-right mt-1 far fa-chart-bar"></i>
            <p>Total de Anúncios</p>
          </div>
        </div>

      <?php } ?>

      <?php if ($_SESSION['funcao'] == 'admin' || $_SESSION['funcao'] == 'gerente') { ?>
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card-dados-all p-4">
            <h1 style="font-weight: 600;"><?php echo $num_user ?></h1>
            <i class="float-right mt-1 fas fa-users"></i>
            <p>Usuários Cadastrados</p>
          </div>
        </div>
      <?php } ?>

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card-dados-all p-4">
          <h1 style="font-weight: 600;"><?php echo $_SESSION['id']; ?></h1>
          <i class="float-right mt-1 fas fa-key"></i>
          <p>Código de Usuário</p>
        </div>
      </div>
    </div>

    <?php if ($_SESSION['funcao'] == 'funcionario' || $_SESSION['funcao'] == 'gerente') { ?>

      <p class="mb-2" style="font-weight: 600;">Meus Anúncios</p>

      <?php if (mysqli_affected_rows($conn) <= 0) { ?>
        <div class="text-center mt-3">
          <p class="">Você ainda não possui anúncio. <a href="../pages/criar_anuncio.php">Criar primeiro anúncio</a></p>
        </div>
      <?php } else { ?>
        <div class="row">
          <?php while ($dados_anun = $result_anun->fetch_array()) { ?>
            <div class="col-xl-2 col-md-4 col-sm-4 mb-2">
              <div class="list-anun-dashboard border p-3 text-center">
                <p class="mb-2" style="font-weight: 600;"><?php echo $dados_anun["tipo_anuncio"]; ?></p>
                <p class="mb-2">R$ <?php echo $dados_anun["valor"]; ?></p>
                <a href="" class="w-100 btn btn-list-anun">Detalhes</a>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    <?php } ?>
  </main>

  </div>
  <!--ROW-->
  </div>
  <!--container-->
  <?php include '../includes/footer.php'; ?>


  <!--//////////////////////////////////////////////////////////////////-->
<?php } else {
  header("Location: ../home/login.php");
} ?>