<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['email_user']) && isset($_SESSION['id'])) {   ?>
  <!--//////////////////////////////////////////////////////////////////-->

  <?php include '../includes/menudashboard.php'; ?>

  <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="row m-0">
      <div class="col-xl-6 col-md-6">
        <div class="area-login">
          <div class="box-login mb-5 mt-5 border">
            <h1 class="h3 mb-3" style="font-weight: 600;">Registrar</h1>
            <?php if (isset($_SESSION['email_existe'])) : ?>
              <div class="alert alert-danger" role="alert">
                E-mail já cadastrado! Tente outro e-mail.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php
            endif;
            unset($_SESSION['email_existe']);
            ?>

            <?php if (isset($_SESSION['usuario_existe'])) : ?>
              <div class="alert alert-danger" role="alert">
                Nome de usuário já cadastrado! Tente outro nome.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php
            endif;
            unset($_SESSION['usuario_existe']);
            ?>

            <?php if (isset($_SESSION['emailAnduser_existe'])) : ?>
              <div class="alert alert-danger" role="alert">
                O e-mail e nome de usuário já existem! Tente outros.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php
            endif;
            unset($_SESSION['emailAnduser_existe']);
            ?>

            <?php if (isset($_SESSION['extensao_err'])) : ?>
              <div class="alert alert-danger" role="alert">
                <?= $_SESSION['extensao_err']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php
            endif;
            unset($_SESSION['extensao_err']);
            ?>

            <?php if (isset($_SESSION['tamanho_senha'])) : ?>
              <div class="alert alert-danger" role="alert">
                A senha deve ter o tamanho mínimo de 6 caracteres!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php
            endif;
            unset($_SESSION['tamanho_senha']);
            ?>

            <form action="../routes/registerValidation.php" method="POST" onsubmit="return valida( this ) ; ">
              <div class="form-group">
                <label for="nome_completo">Corretor Responsável</label>
                <input type="text" class="form-control form-control-lg input-login text-capitalize disabled" id="nome_completo" name="nome_completo" placeholder="Seu nome" value="Talys Eduardo" required readonly="readonly">
              </div>
              <div class="form-group">
                <label for="nome_completo">CRECI</label>
                <input type="text" class="form-control form-control-lg input-login text-capitalize" id="creci" name="creci" placeholder="Seu Creci" value="20748" required readonly="readonly">
              </div>
              <div class="form-group">
                <label for="nome_user">Nome Usuário</label>
                <input type="text" class="form-control form-control-lg input-login text-lowercase" id="nome_user" name="nome_user" placeholder="Usuário" required>
              </div>
              <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control form-control-lg input-login" id="telefone" name="telefone_user" placeholder="Telefone" value="(88) 98845-7881" required readonly="readonly">
              </div>
              <div class="form-group">
                <label for="email_user">E-mail</label>
                <input type="email" class="form-control form-control-lg input-login" id="email_user" name="email_user" placeholder="example@mail.com" required>
              </div>
              <div class="form-group">
                <label for="senha_user">Senha</label>
                <input type="password" class="form-control form-control-lg input-login" id="senha_user" name="senha_user" placeholder="Senha" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Escolha a função do usuário</label>
                <select class="form-control" id="funcao_user" name="funcao_user">
                  <option value="admin">Admin</option>
                  <option value="gerente">Gerente</option>
                  <option value="funcionario">Funcionário</option>
                </select>
              </div>
              <button type="submit" name="cadastrar_usuario" class="mb-4 w-100 btn btn-lg btn-login">Criar Conta</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-md-6 border-left mb-5">

      </div>
    </div>

    <script>
      //user name input
      const nome_user = document.querySelector("#nome_user");

      nome_user.addEventListener("keyup", () => {
        let value = nome_user.value.replace(/ /g, "_");

        nome_user.value = value;
      });
    </script>

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