<?php include '../includes/menu.php'; ?>

<div class="container">
  <i class="float-right fas fa-sign-in-alt mt-4"></i>
  <h1 class="mb-3 mt-5 title-page">Login</h1>

  <div class="row">
    <div class="col-xl-6 col-md-6 mt-5">
      <form method="POST" action="../routes/login_check.php">
        <div class="form-group">
          <i class="float-right fas fa-envelope fa-sm" style="margin-top: 2px;"></i>
          <label for="email">E-mail</label>
          <input type="email" class="form-control form-control-lg input-login" id="email" name="email" placeholder="example@mail.com" required>
        </div>
        <div class="form-group">
          <i class="float-right fas fa-key fa-sm" style="margin-top: 2px;"></i>
          <label for="senha">Senha</label>
          <input type="password" class="form-control form-control-lg input-login" id="senha" name="senha" placeholder="Senha" required>
        </div>
        <!--<input type="hidden" id="funcao" name="funcao" value="admin" required>-->
        <button type="submit" class="mb-4 w-100 btn btn-lg btn-login">Entrar</button>
      </form>

      <div class="alert alert-danger" role="alert">
        <i class="fa-xs fas fa-exclamation-triangle"></i>
        <p>Atenção! Área restrita apenas para funcionários.</p>
        <p>Voltar para o início <a href="../index.php">Clique aqui</a></p>
      </div>
    </div>
    <div class="col-xl-6 col-md-6 area-img mt-5 mb-4">
      <div class="">
        <img src="../assets/img/home/login1.jpeg" alt="" class="img-home" width="360">
      </div>
    </div>
  </div>
  <!--row-->
</div>
<!--container-->

<?php include '../includes/footer.php'; ?>