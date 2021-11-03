<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['email_user']) && isset($_SESSION['id'])) {   ?>
    <!--//////////////////////////////////////////////////////////////////-->

    <?php include '../includes/menudashboard.php'; ?>

    <main role="main" class="mt-2 col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <?php if (isset($_SESSION['img_perfil_sucesso'])) : ?>
            <div class="alert alert-success" role="alert">
                Foto Atualizada!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        endif;
        unset($_SESSION['img_perfil_sucesso']);
        ?>

        <?php if (isset($_SESSION['validar_edicao'])) : ?>
            <div class="alert alert-success" role="alert">
                Dados alterados com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        endif;
        unset($_SESSION['validar_edicao']);
        ?>

        <?php if (isset($_SESSION['editar_err'])) : ?>
            <div class="alert alert-danger" role="alert">
                Ocorreu um erro ao editar! Tente novamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        endif;
        unset($_SESSION['editar_err']);
        ?>

        <div class="row">
            <div class="col-xl-4 col-md-6 col-sm-4 mb-4">
                <div class="area-perfil p-3 mt-2 border">
                    <div class="text-center area-foto">
                        <img src="../assets/img/perfil/perfil.png" alt="imagem de perfil" class="foto-perfil">
                    </div>
                    <div class="text-center">
                        <h1 class="h4 mt-1 mb-3"><span style="font-weight: 600;"><?php echo $_SESSION['nome_usuario']; ?></span></h1>
                    </div>
                    <div>
                        <span style="float: right;"><i class="fas fa-user"></i> </span>
                        <p class="bio mb-3"><?php echo $_SESSION['nome_user']; ?></p>

                        <span style="float: right;"><i class="fas fa-envelope"></i> </span>
                        <p class="mb-3"><?php echo $_SESSION['email_user']; ?></p>

                        <span style="float: right;"><i class="fas fa-phone"></i> </span>
                        <p class="mb-3"><?php echo $_SESSION['telefone_user']; ?></p>

                        <span style="float: right;"><i class="fas fa-key"></i> </span>
                        <p class="bio mb-3">Código: <span class="badge badge-dark"><?php echo $_SESSION['id']; ?></span></p>


                        <span style="float: right;"><i class="fas fa-clock"></i> </span>
                        <p class="bio mb-1">Iniciou: <?php echo date("d/m/Y", strtotime($_SESSION['data_cadastro'])); ?></p>
                    </div>
                </div>
                <br>
                <div class="area-perfil">
                    <a href="../pages/edit_perfil.php?id=<?php echo $_SESSION['id']; ?>" class="w-100 btn mb-3 border">Editar Perfil</a>
                    <a href="../pages/password_reset.php" class="w-100 btn border">Redefinir Senha</a>
                </div>
            </div>
            <div class="col-xl-8 col-md-6 col-sm-8 mb-4">
                <!--<div class="area-capa mb-3">
                    <h1 class="h3 mb-3"></h1>
                </div>-->

                <?php
                //pegar todos os anuncios feitos
                $sel_anun_database = "SELECT * FROM criar_anuncio WHERE id_user_anun='$_SESSION[id]' ORDER BY id DESC LIMIT 3";
                $result_anun = $conn->query($sel_anun_database) or die($conn->error);
                ?>

                <div class="area-perfil mt-2 p-3 border">
                    <span style="float: right;"><i class="fas fa-newspaper"></i></span>
                    <h1 class="h4 mb-3">Meus Anúncios</h1>

                    <?php if (mysqli_affected_rows($conn) > 0) { ?>
                        <?php while ($dados_anun = $result_anun->fetch_array()) { ?>
                            <div class="row">
                                <div class="col-sm mb-3">
                                    <div class="w-100 card card-meus-anuncios border">

                                        <div class="card-body">
                                            <h5 class="card-title mb-4"><?php echo $dados_anun["tipo_anuncio"]; ?></h5>

                                            <a href="../pages/area_anuncio.php?open_anuncio=<?php echo $dados_anun["id"]; ?>"><img src="<?php echo "../assets/img/update_foto_fachada/" . $dados_anun["foto_fachada"]; ?>" class="img-meus-anuncios mb-3" alt="foto fachada"></a>

                                            <div class="">
                                                <span style="float: right;"><i class="fas fa-map-marked-alt"></i></span>
                                                <p class="card-text mb-2"><span class="infor-card"><?php echo $dados_anun["cidade"]; ?></span></p>
                                                <span style="float: right;"><i class="fas fa-map-pin"></i></span>
                                                <p class="card-text mb-2"><span><?php echo $dados_anun["endereco"]; ?></span></p>
                                                <span style="float: right;"><i class="fas fa-map-marker-alt"></i></span>
                                                <p class="card-text mb-3"><span><?php echo $dados_anun["bairro"]; ?></span></p>
                                            </div>
                                            <p class="card-text"><small class="text-muted">Data de Anúncio: <?php echo date("d/m/Y", strtotime($dados_anun['data_cadastro'])); ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="alert text-center">
                            <p class="lead" style="font-size: 17px;"><a href="../pages/meus_anuncios.php"><strong>Ver Todos</strong></a></p>
                        </div>
                    <?php } else { ?>
                        <div class="alert text-center">
                            <p class="lead" style="font-size: 17px;">Você ainda não possui anúncio! <a href="../pages/criar_anuncio.php"><strong>Criar primeiro anúncio.</strong></a></p>
                        </div>
                    <?php } ?>
                </div>
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