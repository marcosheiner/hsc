<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['email_user']) && isset($_SESSION['id'])) {   ?>
  <!--//////////////////////////////////////////////////////////////////-->
  <?php

  //pegar todos os anuncios feitos por usuario
  $sel_anun_database = "SELECT * FROM criar_anuncio WHERE id_user_anun='$_SESSION[id]' ORDER BY id DESC";
  $result_anun = $conn->query($sel_anun_database) or die($conn->error);

  ?>

  <?php include '../includes/menudashboard.php'; ?>

  <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <?php if (isset($_SESSION['edit_sucesso'])) : ?>
      <div class="alert alert-success" role="alert">
        <?= $_SESSION['edit_sucesso']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    endif;
    unset($_SESSION['edit_sucesso']);
    ?>

    <?php if (isset($_SESSION['delete_sucesso'])) : ?>
      <div class="alert alert-success" role="alert">
        <?= $_SESSION['delete_sucesso']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    endif;
    unset($_SESSION['delete_sucesso']);
    ?>

    <?php if (isset($_SESSION['delete_err'])) : ?>
      <div class="alert alert-success" role="alert">
        <?= $_SESSION['delete_err']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    endif;
    unset($_SESSION['delete_err']);
    ?>

    <?php if (mysqli_affected_rows($conn) <= 0) { ?>

      <div class="alert">
        <div class="text-center">
          <p class="lead">Você não tem anúncios para editar. 😅 <a href="../pages/criar_anuncio.php">Criar primeiro anúncio</a></p>
        </div>
      </div>

    <?php } else { ?>

      <h1 class="h3 mb-3" style="font-weight: 700;">Meus Anúncios</h1>
      <div class="row">
        <?php while ($dados_anun = $result_anun->fetch_array()) { ?>
          <?php
          $visibilidade = $dados_anun["visibilidade"];
          if ($visibilidade == "Disponível") {
            $visibilidade = '<small style="color: green;font-weight: 600;">' . $visibilidade . '</small>';
          } else {
            $visibilidade = '<small style="color: red;font-weight: 600;">' . $visibilidade . '</small>';
          }

          ?>
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="area-card-anuncio">
              <div class="card border-0">
                <img src="<?php echo "../assets/img/update_foto_fachada/" . $dados_anun["foto_fachada"]; ?>" class="card-img-top img-card" alt="...">
                <div class="card-body border mt-2">
                  <h1 class="float-right h6 card-title mt-1">R$ <?php echo $dados_anun["valor"]; ?></h1>
                  <h5 class="card-title"><?php echo $dados_anun["tipo_anuncio"]; ?></h5>
                  <p class=""><?php echo $dados_anun["cidade"]; ?></p>
                  <p class="mb-2"><?php echo $dados_anun["bairro"]; ?></p>
                  <small class="float-right mt-1"><?php echo date("d/m/Y", strtotime($dados_anun["data_cadastro"])); ?></small>
                  <p class="mb-3"><?php echo $visibilidade; ?></p>
                  <a href="#" class="pl-5 pr-5 w-100 btn-lg btn btn-detalhes">Detalhes</a>
                  <a href="../pages/editar_anuncio.php?open_editar_anuncio=<?php echo $dados_anun['id']; ?>" class="pl-5 pr-5 mt-2 w-100 btn btn-editar">Editar</a>
                  <button class="pl-5 pr-5 mt-2 w-100 btn btn-deletar" data-toggle="modal" data-target="#exampleModal">Deletar</button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content border-0">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Deletar Anúncio?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body border-0 text-justify">
                          Uma vez que você exclui um anúncio, não há como voltar atrás. Por favor, tenha certeza.
                          <br>
                          <small>Código do Anúncio: <span class="badge badge-dark"><?php echo $dados_anun["id"]; ?></span></small>
                        </div>
                        <div class="modal-footer border-0">
                          <a href="../routes/deletar_anuncio_proc.php?deletar_anuncio=<?php echo $dados_anun['id']; ?>" class="w-100 btn btn-reset border border-danger pl-4 pr-4">Deletar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
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