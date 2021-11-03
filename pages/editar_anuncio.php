<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['email_user']) && isset($_SESSION['id'])) {   ?>
    <!--//////////////////////////////////////////////////////////////////-->

    <?php
    if (isset($_GET['open_editar_anuncio'])) {
        $id_anun_edit = mysqli_escape_string($conn, $_GET['open_editar_anuncio']);

        $sql_edit = "SELECT * FROM criar_anuncio WHERE id ='$id_anun_edit'";
        $result_edit = mysqli_query($conn, $sql_edit);

        $get_dados_for_edit = mysqli_fetch_array($result_edit);
    }
    ?>

    <?php include '../includes/menudashboard.php'; ?>

    <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <h1 class="h3 mb-3" style="font-weight: 700;">Editar Dados Anúncio</h1>
        <?php if (isset($_SESSION['edit_err'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['edit_err']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        endif;
        unset($_SESSION['edit_err']);
        ?>
        <form action="../routes/editar_anuncio_proc.php" method="POST" class="needs-validation" novalidate>
            <div class="form-row">
                <input type="hidden" class="" name="id_anuncio" placeholder="Proprietário" value="<?php echo $get_dados_for_edit['id']; ?>" required>
                <div class="form-group col-md-3">
                    <label for="">Corretor Responsável<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" name="post_user" placeholder="Proprietário" value="<?php echo $get_dados_for_edit['nome_corretor']; ?>" required>
                    <div class="invalid-feedback">
                        Digite um nome.
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Tipo de Anúncio<span class="text-danger">*</span></label>
                    <select class="form-control" name="tipo_anuncio" required>
                        <option value="<?php echo $get_dados_for_edit['tipo_anuncio']; ?>" selected><?php echo $get_dados_for_edit['tipo_anuncio']; ?></option>
                        <option value="Aluguel">Aluguel</option>
                        <option value="Venda">Venda</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Cidade<span class="text-danger">*</span></label>
                    <select class="form-control" name="cidade" required>
                        <option value="<?php echo $get_dados_for_edit['cidade']; ?>" selected><?php echo $get_dados_for_edit['cidade']; ?></option>
                        <option value="Juazeiro do Norte - CE">Juazeiro do Norte - CE</option>
                        <option value="Crato - CE">Crato - CE</option>
                        <option value="Barbalha - CE">Barbalha - CE</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">CEP<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="<?php echo $get_dados_for_edit['cep']; ?>" required>
                    <div class="invalid-feedback">
                        Digite um cep.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Endereço<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" name="endereco" placeholder="Endereço" value="<?php echo $get_dados_for_edit['endereco']; ?>" required>
                    <div class="invalid-feedback">
                        Digite um endereço.
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="">N°<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="num_casa" placeholder="123, 123 A" value="<?php echo $get_dados_for_edit['numero_casa']; ?>" required>
                    <div class="invalid-feedback">
                        Digite um número.
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Bairro<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" name="bairro" placeholder="Bairro" value="<?php echo $get_dados_for_edit['bairro']; ?>" required>
                    <div class="invalid-feedback">
                        Digite um bairro.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Visibilidade<span class="text-danger">*</span></label>
                    <select class="form-control disabled" name="visibilidade">
                        <option value="<?php echo $get_dados_for_edit['visibilidade']; ?>" selected><?php echo $get_dados_for_edit['visibilidade']; ?></option>
                        <option value="Disponível">Disponível</option>
                        <option value="Indisponível">Indisponível</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Telefone<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo $get_dados_for_edit['telefone']; ?>" required>
                    <div class="invalid-feedback">
                        Digite um telefone.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Whatsapp<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="wpp" name="wpp" placeholder="Whatsapp" value="<?php echo $get_dados_for_edit['wpp']; ?>" required>
                    <div class="invalid-feedback">
                        Digite um número de Whatsapp.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Valor do Imóvel<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="valor" name="valor" placeholder="R$ 0.000,00" value="<?php echo $get_dados_for_edit['valor']; ?>" required>
                    <div class="invalid-feedback">
                        Digite um valor.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Esse valor é negociável?<span class="text-danger">*</span></label>
                    <select class="form-control" name="valor_neg" required>
                        <option value="<?php echo $get_dados_for_edit['valor_neg']; ?>" selected><?php echo $get_dados_for_edit['valor_neg']; ?></option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Quantidade de Cômodos<span class="text-danger">*</span></label>
                    <select class="form-control" name="qtd_comodos" required>
                        <option value="<?php echo $get_dados_for_edit['qtd_comodos']; ?>" selected><?php echo $get_dados_for_edit['qtd_comodos']; ?></option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="Mais de 10">Mais de 10</option>
                    </select>
                </div>
            </div>

            <div class="form-inline mb-4">
                <button type="submit" name="editar_anuncio" class="btn btn-anunciar pl-4 pr-4">Editar</button>
            </div>
        </form>

        <h1 class="h3 mt-3 mb-3" style="font-weight: 700;">Editar Fotos</h1>
    </main>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    </div>
    <!--ROW-->
    </div>
    <!--container-->
    <?php include '../includes/footer.php'; ?>


    <!--//////////////////////////////////////////////////////////////////-->
<?php } else {
    header("Location: ../home/login.php");
} ?>