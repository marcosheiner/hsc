<?php
session_start();
include "../config/conn.php";
//pegar todos os anuncios recentes feitos
$sel_anun_recentes = "SELECT * FROM criar_anuncio ORDER BY id DESC LIMIT 3";
$result_anun_recentes = $conn->query($sel_anun_recentes) or die($conn->error);

//pegar todos os anuncios padrão
$sel_anun = "SELECT * FROM criar_anuncio";
$result_anun = $conn->query($sel_anun) or die($conn->error);
?>

<?php include '../includes/menu.php'; ?>

<?php if (mysqli_affected_rows($conn) <= 0) { ?>
  <div style="display: grid; place-content: center; height: 300px;">
    <div class="alert">
      <div class="text-center">
        <p class="lead">Hmm, ninguém publicou. <a href="../home/login.php">Você pode ser o primeiro! 😄</a></p>
      </div>
    </div>
  </div>

<?php } else { ?>

  <div class="container mt-5">
    <div class="area-buscar mb-5">
      <form action="">
        <div class="input-group mb-3">
          <input type="text" class="form-control mr-1 border text-capitalize" name="pesquisar_anuncio" id="pesquisar_anuncio" placeholder="Pesquisar Anúncio" required>
          <span class="input-group-btn">
            <button class="btn" type="submit" value="gerar_pesquisa"><i class="fas fa-search"></i></button>
          </span>
        </div>
      </form>
    </div>

    <h1 class="h3 pl-3" style="font-weight: 700;">Anúncios Recentes</h1>
    <?php if (isset($_SESSION['validar_denuncia'])) : ?>
      <div class="alert alert-success" role="alert">
        Agradecemos por denunciar o anúncio!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    endif;
    unset($_SESSION['validar_denuncia']);
    ?>
    <div class="row">
      <?php while ($dados_anun = $result_anun_recentes->fetch_array()) { ?>
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
            <div class="card border-0" style="width: 18rem;">
              <img src="<?php echo "../assets/img/update_foto_fachada/" . $dados_anun["foto_fachada"]; ?>" class="card-img-top img-card" alt="...">
              <div class="card-body border mt-2">
                <h1 class="float-right h6 card-title mt-1">R$ <?php echo $dados_anun["valor"]; ?></h1>
                <h5 class="card-title"><?php echo $dados_anun["tipo_anuncio"]; ?></h5>
                <p class=""><?php echo $dados_anun["cidade"]; ?></p>
                <p class="mb-2"><?php echo $dados_anun["bairro"]; ?></p>
                <small class="float-right"><?php echo date("d/m/Y", strtotime($dados_anun["data_cadastro"])); ?></small>
                <p class="mb-3"><?php echo $visibilidade; ?></p>
                <a href="#" class="mb-2 pl-5 pr-5 w-100 btn-lg btn btn-detalhes">Detalhes</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <h1 class="h3 pl-3" style="font-weight: 700;">Anúncios</h1>

    <div class="row">
      <?php while ($dados_anun_padrao = $result_anun->fetch_array()) { ?>
        <?php
        $visibilidade = $dados_anun_padrao["visibilidade"];
        if ($visibilidade == "Disponível") {
          $visibilidade = '<small style="color: green;font-weight: 600;">' . $visibilidade . '</small>';
        } else {
          $visibilidade = '<small style="color: red;font-weight: 600;">' . $visibilidade . '</small>';
        }

        ?>
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="area-card-anuncio">
            <div class="card border-0" style="width: 18rem;">
              <img src="<?php echo "../assets/img/update_foto_fachada/" . $dados_anun_padrao["foto_fachada"]; ?>" class="card-img-top img-card" alt="...">
              <div class="card-body border mt-2">
                <h1 class="float-right h6 card-title mt-1">R$ <?php echo $dados_anun_padrao["valor"]; ?></h1>
                <h5 class="card-title"><?php echo $dados_anun_padrao["tipo_anuncio"]; ?></h5>
                <p class=""><?php echo $dados_anun_padrao["cidade"]; ?></p>
                <p class="mb-2"><?php echo $dados_anun_padrao["bairro"]; ?></p>
                <small class="float-right"><?php echo date("d/m/Y", strtotime($dados_anun_padrao["data_cadastro"])); ?></small>
                <p class="mb-3"><?php echo $visibilidade; ?></p>
                <a href="#" class="pl-5 pr-5 w-100 btn-lg btn btn-detalhes">Detalhes</a>
                <button class="w-100 btn text-muted" data-toggle="modal" data-target="#exampleModal"><small>Denúnciar</small></button>
                <!--modal-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content border-0">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Denúnicar Anúncio?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body border-0 text-justify">
                        <form action="routes/proc_denun.php" method="POST">
                          <div class="form-row">
                            <div class="form-group col-md-12 margin-0">
                              <!--hidden dados user-->
                              <input type="hidden" value="<?php echo $dados_anun["id"]; ?>" name="id_anuncio">
                              <input type="hidden" value="<?php echo $dados_anun["id_user_anun"]; ?>" name="id_usuario">
                              <input type="hidden" value="<?php echo $dados_anun["nome_user"]; ?>" name="nome_user">
                              <!--////////////////-->
                              <label for="denuncia">Selecione uma opção<span class="text-danger">*</span></label>
                              <select class="form-control" name="denuncia" id="denuncia" required>
                                <option value="" disabled selected>...</option>
                                <option value="Spam ou enganoso">Spam ou enganoso</option>
                                <option value="Conteúdo abominável ou abusivo">Conteúdo abominável ou abusivo</option>
                                <option value="Conteúdo violento ou repulsivo">Conteúdo violento ou repulsivo</option>
                                <option value="Conteúdo violento ou repulsivo">Conteúdo violento ou repulsivo</option>
                                <option value="Atos perigosos ou nocivos">Atos perigosos ou nocivos</option>
                              </select>
                            </div>
                          </div>
                          <button class="w-100 btn btn-reset border border-danger pl-4 pr-4" type="submit" name="enviar_denuncia">Denúnciar</button>
                        </form>
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

    <div aria-label="Page navigation example">
      <ul class="pagination justify-content-center mb-5">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </div>

  </div>
<?php } ?>

<?php include '../includes/footer.php'; ?>