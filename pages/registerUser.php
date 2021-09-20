<?php
session_start();
include "../config/conn.php";
?>

<?php include '../includes/menu.php'; ?>

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
            <label for="nome_completo">Nome Completo</label>
            <input type="text" class="form-control form-control-lg input-login text-capitalize" id="nome_completo" name="nome_completo" placeholder="Seu nome" value="" required>
          </div>
          <div class="form-group">
            <label for="nome_user">Nome Usuário</label>
            <input type="text" class="form-control form-control-lg input-login text-lowercase" id="nome_user" name="nome_user" placeholder="Usuário" required>
          </div>
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control form-control-lg input-login" id="telefone" name="telefone_user" placeholder="Telefone" required>
          </div>
          <div class="form-group">
            <label for="email_user">E-mail</label>
            <input type="email" class="form-control form-control-lg input-login" id="email_user" name="email_user" placeholder="example@mail.com" required>
          </div>
          <div class="form-group">
            <label for="customFile">Foto de Perfil</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="img_perfil">
              <label class="custom-file-label" for="customFile">Escolher foto</label>
            </div>
          </div>
          <div class="form-group">
            <label for="senha_user">Senha</label>
            <input type="password" class="form-control form-control-lg input-login" id="senha_user" name="senha_user" placeholder="Senha" required>
          </div>
          <div class="form-group">
            <input type="hidden" name="funcao_user" value="admin" required>
          </div>
          <button type="submit" name="cadastrar_usuario" class="mb-4 w-100 btn btn-lg btn-login">Criar Conta</button>
        </form>
        <div class="">
          <a href="../home/login.php" class="text-dark">Já tenho conta</a>
        </div>
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

<?php include '../includes/footer.php'; ?>