<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['email_user']) && isset($_SESSION['id'])) {   ?>
  <!--//////////////////////////////////////////////////////////////////-->

  <?php include '../includes/menudashboard.php'; ?>

  <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <?php if ($_SESSION['funcao'] == 'admin' || $_SESSION['funcao'] == 'funcionario' || $_SESSION['funcao'] == 'gerente') { ?>
      <span class="badge badge-danger text-light text-capitalize">
        <?php echo $_SESSION['funcao']; ?>
      </span>
      <span class="float-right text-muted text-capitalize">
        Bem-vindo, Marcos! 😎
      </span>
    <?php } ?>

    <h1 class="h3 mb-3" style="font-weight: 700;">Dashboard</h1>
    <div class="row">
      <?php if ($_SESSION['funcao'] == 'funcionario' || $_SESSION['funcao'] == 'gerente' || $_SESSION['funcao'] == 'admin') { ?>


        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card-dados p-4">
            <h1 style="font-weight: 600;">6</h1>
            <i class="float-right mt-1 fas fa-home"></i>
            <p>Meus Anúncios</p>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card-dados-all p-4">
            <h1 style="font-weight: 600;">3</h1>
            <i class="float-right mt-1 far fa-chart-bar"></i>
            <p>Total de Anúncios</p>
          </div>
        </div>

      <?php } ?>

      <?php if ($_SESSION['funcao'] == 'admin' || $_SESSION['funcao'] == 'gerente') { ?>
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card-dados-all p-4">
            <h1 style="font-weight: 600;">3</h1>
            <i class="float-right mt-1 fas fa-users"></i>
            <p>Usuários Cadastrados</p>
          </div>
        </div>
      <?php } ?>

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card-dados-all p-4">
          <h1 style="font-weight: 600;">1</h1>
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
                <p class="mb-2" style="font-weight: 600;">Venda</p>
                <p class="mb-2">R$ 2.000,90</p>
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