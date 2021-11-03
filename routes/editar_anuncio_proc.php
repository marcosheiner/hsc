<?php
session_start();
include_once "../config/conn.php";


if (isset($_POST['editar_anuncio'])) {


    //variaveis padrão do formulário
    $id_anuncio         = $_POST['id_anuncio'];
    $nameCorretor          = $_POST['nameCorretor'];
    $creci       = $_POST['creci'];
    $tipo_anuncio             = $_POST['tipo_anuncio'];
    $visibilidade                = $_POST['visibilidade'];
    $cidade           = $_POST['cidade'];
    $endereco           = $_POST['endereco'];
    $bairro             = $_POST['bairro'];
    $cep       = $_POST['cep'];
    $telefone           = $_POST['telefone'];
    $wpp                = $_POST['wpp'];
    $valor              = $_POST['valor'];
    $qtd_quartos          = $_POST['qtd_quartos'];
    $qtd_suites        = $_POST['qtd_suites'];
    $qtd_banheiros        = $_POST['qtd_banheiros'];
    $titulo        = $_POST['titulo'];
    $descricao        = $_POST['descricao'];



    //inserir dados do form para o banco
    $query_edit = "UPDATE criar_anuncio SET nameCorretor='$nameCorretor', creci='$creci', tipo_anuncio='$tipo_anuncio', cidade='$cidade', cep='$cep', endereco='$endereco', bairro='$bairro', visibilidade='$visibilidade', telefone='$telefone', wpp='$wpp', valor='$valor', qtd_quartos='$qtd_quartos', qtd_suites='$qtd_suites', qtd_banheiros='$qtd_banheiros', titulo='$titulo', descricao='$descricao' WHERE id='$id_anuncio'";

    if ($conn->query($query_edit) === TRUE) {
        $_SESSION['edit_sucesso'] = 'Anúncio Atualizado! Acesse o <b>Perfil</b> ou <b>Meus Anúncios</b> para visualizá-lo.';
        header("Location: ../pages/meus_anuncios.php");
    } else {
        $_SESSION['edit_err'] = 'Algo deu errado, não foi possivel atualizar o Anúncio! Tente novamente.';
        header("Location: ../pages/editar_anuncio.php?open_editar_anuncio=$id_anuncio");
    }
}



$conn->close();
exit;
