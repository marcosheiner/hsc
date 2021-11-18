<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['nome_usuario']) && isset($_SESSION['id'])) {   ?>

    <?php

    if (isset($_GET['id'])) {
        $id_user_edit = mysqli_escape_string($conn, $_GET['id']);

        $sql_edit = "SELECT * FROM usuario WHERE id ='$id_user_edit'";
        $result_edit = mysqli_query($conn, $sql_edit);

        $get_dados_for_edit = mysqli_fetch_array($result_edit);
    }

    ?>

    <?php include_once '../includes/menudashboard.php'; ?>




    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <br>

        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../pages/perfil.php">Voltar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Perfil</li>
                </ol>
            </nav>
            <?php if (isset($_SESSION['img_perfil_err'])) : ?>
                <div class="alert alert-danger" role="alert">
                    Não foi possivel alterar a foto de perfil!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            endif;
            unset($_SESSION['img_perfil_err']);
            ?>

            <h1 class="h4 mb-3">Editar Perfil</h1>
            <hr class="linha-black">

            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="background-form-cad">
                        <form action="../routes/edit_perfil.php" method="POST">
                            <input type="hidden" name="id_user_session" value="<?php echo $get_dados_for_edit['id']; ?>">
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Corretor Responsável:</label>
                                    <input type="text" name="nome_completo" placeholder="Nome Completo" class="form-control" value="<?php echo $get_dados_for_edit['nome_completo']; ?>" disabled>
                                </div>
                                <div class="col">
                                    <label>Nome Usuário:</label>
                                    <input type="text" name="nome_user" id="nome_user" placeholder="Usuário" class="form-control" value="<?php echo $get_dados_for_edit['nome_user']; ?>" required>
                                </div>
                                <div class="col">
                                    <label>E-mail:</label>
                                    <input type="email" name="email_user" placeholder="examplo@mail.com" class="form-control" value="<?php echo $get_dados_for_edit['email_user']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Telefone do Corretor Responsável:</label>
                                    <input type="text" class="form-control" name="telefone_user" placeholder="(00) 90000-0000" id="telefone" value="<?php echo $get_dados_for_edit['telefone_user']; ?>" disabled>
                                </div>
                                <div class="col">
                                    <label>Função:</label>
                                    <input type="text" class="form-control" name="funcao_user" value="<?php echo $get_dados_for_edit['funcao']; ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <button type="submit" name="btn-atualizar" class="w-100 btn btn-primary btn-lg">Atualizar Dados</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        //user name input
        const nome_user = document.querySelector("#nome_user");

        nome_user.addEventListener("keyup", () => {
            let value = nome_user.value.replace(/ /g, "_");

            nome_user.value = value;
        });
    </script>

    <?php include_once '../includes/footer.php'; ?>

<?php } else {
    header("Location: ../pages/area_login.php");
} ?>