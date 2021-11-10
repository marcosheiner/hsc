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

            <input type="hidden" class="" name="id_anuncio" placeholder="Proprietário" value="<?php echo $get_dados_for_edit['id']; ?>" required>

            <small class="text-muted"><span>Responsável e Localidade
                    <hr>
                </span></small>
            <div class="form-row mt-3">

                <div class="form-group col-md-3">
                    <label for="">Corretor Responsável<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize disabled" name="nameCorretor" value="<?php echo $get_dados_for_edit['nome_corretor']; ?>" required readonly="readonly">
                    <div class="invalid-feedback">
                        Digite um nome.
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="">CRECI<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize disabled" name="creci" value="<?php echo $get_dados_for_edit['creci']; ?>" required readonly="readonly">
                    <div class=" invalid-feedback">
                        Digite um creci.
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="">Tipo de Anúncio<span class="text-danger">*</span></label>
                    <select class="form-control" name="tipo_anuncio" required>
                        <option value="<?php echo $get_dados_for_edit['tipo_anuncio']; ?>" disabled selected><?php echo $get_dados_for_edit['tipo_anuncio']; ?></option>
                        <option value="Aluguel">Aluguel</option>
                        <option value="Venda">Venda</option>
                    </select>
                    <div class="invalid-feedback">
                        Escolha o tipo.
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="">Visibilidade<span class="text-danger">*</span></label>
                    <select class="form-control" name="visibilidade" required>
                        <option value="<?php echo $get_dados_for_edit['visibilidade']; ?>" disabled selected><?php echo $get_dados_for_edit['visibilidade']; ?></option>
                        <option value="Disponível">Disponível</option>
                        <option value="Indisponível">Indisponível</option>
                    </select>
                </div>

            </div>
            <!--form row-->
            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="">Cidade<span class="text-danger">*</span></label>
                    <select class="form-control" name="cidade" required>
                        <option value="<?php echo $get_dados_for_edit['cidade']; ?>" disabled selected><?php echo $get_dados_for_edit['cidade']; ?></option>
                        <option value="Juazeiro do Norte - CE">Juazeiro do Norte - CE</option>
                        <option value="Crato - CE">Crato - CE</option>
                        <option value="Barbalha - CE">Barbalha - CE</option>
                    </select>
                    <div class="invalid-feedback">
                        Escolha uma cidade.
                    </div>
                </div>



                <div class="form-group col-md-3">
                    <label for="">Endereço com número<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" name="endereco" placeholder="Rua Exemplo, 123" required value="<?php echo $get_dados_for_edit['endereco']; ?>">
                    <div class="invalid-feedback">
                        Digite um endereço.
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="">Bairro<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" name="bairro" placeholder="Bairro" required value="<?php echo $get_dados_for_edit['bairro']; ?>">
                    <div class="invalid-feedback">
                        Digite um bairro.
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="">CEP<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" id="cep" name="cep" placeholder="CEP" required value="<?php echo $get_dados_for_edit['cep']; ?>">
                    <div class="invalid-feedback">
                        Digite um CEP.
                    </div>
                </div>

            </div>
            <!--form row-->
            <small class="text-muted"><span>Contato do corretor
                    <hr>
                </span></small>

            <div class="form-row mt-3">

                <div class="form-group col-md-6">
                    <label for="">Telefone<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required value="<?php echo $get_dados_for_edit['telefone']; ?>">
                    <div class="invalid-feedback">
                        Digite um telefone.
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Whatsapp<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="wpp" name="wpp" placeholder="Whatsapp" required value="<?php echo $get_dados_for_edit['wpp']; ?>">
                    <div class="invalid-feedback">
                        Digite um número de Whatsapp.
                    </div>
                </div>

            </div>
            <!--form row-->

            <small class="text-muted"><span>Informações sobre o imóvel
                    <hr>
                </span></small>

            <div class="form-row mt-3">

                <div class="form-group col-md-4">
                    <label for="">Valor do Imóvel<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="valor" name="valor" placeholder="R$ 0.000,00" required value="<?php echo $get_dados_for_edit['valor']; ?>">
                    <div class="invalid-feedback">
                        Digite um valor.
                    </div>
                </div>

            </div>
            <!--form row-->

            <div class="form-row mt-3">

                <div class="form-group col-md-4">
                    <label for="">Quantidade de quartos<span class="text-danger">*</span></label>
                    <select class="form-control" name="qtd_quartos" required>
                        <option value="<?php echo $get_dados_for_edit['qtd_quartos']; ?>" disabled selected><?php echo $get_dados_for_edit['qtd_quartos']; ?></option>
                        <option value="3">1</option>
                        <option value="3">2</option>
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
                    <div class="invalid-feedback">
                        Informe a quantidade.
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="">Suíte(s)<span class="text-danger">*</span></label>
                    <select class="form-control" name="qtd_suites" required>
                        <option value="<?php echo $get_dados_for_edit['qtd_suites']; ?>" disabled selected><?php echo $get_dados_for_edit['qtd_suites']; ?></option>
                        <option value="3">0</option>
                        <option value="3">1</option>
                        <option value="3">2</option>
                        <option value="4">3</option>
                        <option value="4">4</option>
                        <option value="4">5</option>
                    </select>
                    <div class="invalid-feedback">
                        Informe a quantidade.
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="">Quantidade de banheiros<span class="text-danger">*</span></label>
                    <select class="form-control" name="qtd_banheiros" required>
                        <option value="<?php echo $get_dados_for_edit['qtd_banheiros']; ?>" disabled selected><?php echo $get_dados_for_edit['qtd_banheiros']; ?></option>
                        <option value="3">1</option>
                        <option value="3">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <div class="invalid-feedback">
                        Informe a quantidade.
                    </div>
                </div>

            </div>
            <!--form row-->

            <div class="form-row mt-3">

                <div class="form-group col-md-12">
                    <label for="">Título<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" name="titulo" placeholder="Ex: Casa com 4 quartos..." required value="<?php echo $get_dados_for_edit['titulo']; ?>">
                    <div class="invalid-feedback">
                        Digite um título.
                    </div>

                </div>
            </div>
            <!--form row-->
            <div class="form-row mt-3">

                <label for="">Descrição do anúncio<span class="text-danger">*</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="8" required><?php echo $get_dados_for_edit['descricao']; ?></textarea>
                <div class="invalid-feedback">
                    Digite uma descrição.
                </div>

            </div>
            <div class="form-inline mt-3 mb-4">
                <button type="submit" name="editar_anuncio" class="btn btn-anunciar pl-4 pr-4">Editar</button>
            </div>
        </form>

        <h1 class="h3 mt-3 mb-3" style="font-weight: 700;">-</h1>
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