<?php
session_start();
include "../config/conn.php";

?>

<?php
//sistema de busca
//verifica se existe a variavel na url
if (!isset($_GET['pesquisar_anuncio'])) {
  header("Location: ../pages/painel.php");
} else {
  //pegar o valor do input buscar
  $valor_pesquisar = $_GET['pesquisar_anuncio'];
}

//select de todos os anuncios
$select_anuncio = "SELECT * FROM criar_anuncio WHERE tipo_anuncio LIKE '%$valor_pesquisar%' OR cidade LIKE '%$valor_pesquisar%' OR bairro LIKE '$valor_pesquisar'";
$result_select_pesquisar = mysqli_query($conn, $select_anuncio);


//pegar todos os anuncios feitos
$sel_anun_database = "SELECT * FROM criar_anuncio WHERE tipo_anuncio LIKE '%$valor_pesquisar%' OR cidade LIKE '%$valor_pesquisar%' OR bairro LIKE '$valor_pesquisar'";
$result_anun = $conn->query($sel_anun_database) or die($conn->error);

?>


<?php include '../includes/menu.php'; ?>

<?php if (mysqli_affected_rows($conn) <= 0) { ?>
  <div style="display: grid; place-content: center; height: 300px;">
    <div class="alert">
      <div class="text-center">
        <p class="lead">Hmm, não foi encontrado nada. <br><a href="../home/anuncios.php">Voltar</a></p>
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

    <div>
      <a href="../home/anuncios.php"><span class="badge badge-warning">Limpar Busca <i class="fas fa-broom"></i></span></a>
      <a href="#"><span class="badge badge-warning"><?php echo $valor_pesquisar; ?></span></a>
    </div>



    <h1 class="h3 pl-3" style="font-weight: 700;">Resultados</h1>

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
                <small class="float-right"><?php echo date("d/m/Y", strtotime($dados_anun["data_cadastro"])); ?></small>
                <p class="mb-3"><?php echo $visibilidade; ?></p>
                <a href="../pages/area_anuncio.php?open_anuncio=<?php echo $dados_anun["id"]; ?>" class="pl-5 pr-5 w-100 btn-lg btn btn-detalhes">Detalhes</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>


  </div>
<?php } ?>

<?php include '../includes/footer.php'; ?>