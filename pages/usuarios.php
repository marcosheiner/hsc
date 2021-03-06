<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['email_user']) && isset($_SESSION['id'])) {   ?>
  <!--//////////////////////////////////////////////////////////////////-->
  <?php

  //pegar todos os usuarios
  $get_users_database = "SELECT * FROM usuario";
  $result_query = $conn->query($get_users_database) or die($conn->error);

  ?>

  <?php include '../includes/menudashboard.php'; ?>

  <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <br>
    <div class="container-fluid">

      <h1 class="h4 mb-3">Lista de Usuários</h1>

      <div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Usuário</th>
              <th scope="col">Nome Funcionário</th>
              <th scope="col">Creci</th>
              <th scope="col">E-mail</th>
              <th scope="col">Telefone</th>
              <th scope="col">Função</th>
              <th scope="col">Data de Cadastro</th>
            </tr>
          </thead>
          <?php while ($dados_users_list = $result_query->fetch_array()) { ?>
            <tbody>
              <tr>
                <th scope="row"><?php echo $dados_users_list["id"]; ?></th>
                <td><?php echo $dados_users_list["nome_user"]; ?></td>
                <td><?php echo $dados_users_list["nome_completo"]; ?></td>
                <td><?php echo $dados_users_list["creci"]; ?></td>
                <td><?php echo $dados_users_list["email_user"]; ?></td>
                <td><?php echo $dados_users_list["telefone_user"]; ?></td>
                <td><?php echo $dados_users_list["funcao"]; ?></td>
                <td><?php echo date("d/m/Y", strtotime($dados_users_list["data_cadastro"])); ?></td>
              </tr>
              <tr>
            </tbody>
          <?php } ?>
        </table>
      </div>

    </div>

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