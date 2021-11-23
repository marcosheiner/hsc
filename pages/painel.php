<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['email_user']) && isset($_SESSION['id'])) {   ?>
    <!--//////////////////////////////////////////////////////////////////-->

    <?php

    //pegar todos os anuncios feitos
    $sel_anun_database = "SELECT * FROM criar_anuncio";
    $result_anun = $conn->query($sel_anun_database) or die($conn->error);

    ?>

    <?php include '../includes/menudashboard.php'; ?>

    <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <?php if (mysqli_affected_rows($conn) <= 0) { ?>

            <div class="alert">
                <div class="text-center">
                    <p class="lead">Hmm, estamos sem anúncios no momento!</p>
                </div>
            </div>

        <?php } else { ?>

            <h1 class="h3 mb-3" style="font-weight: 700;">Painel</h1>
            <!--pesquisar anuncio-->
            <form method="GET" action="../pages/buscar_anuncio.php">
                <small>Procure por Cidade, Bairro ou Tipo de Anúncio</small>
                <div class="input-group mb-3">
                    <input type="text" class="form-control mr-1 border text-capitalize" name="pesquisar_anuncio" id="pesquisar_anuncio" placeholder="Pesquisar Anúncio" required placeholder="Pesquisar Anúncio">
                    <span class="input-group-btn">
                        <button class="btn btn-warning" style="font-weight: 300;" type="submit" value="gerar_pesquisa">Procurar</button>
                    </span>
                </div>
            </form>


            <h1 class="h3 pl-3" style="font-weight: 700;">Anúncios</h1>

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