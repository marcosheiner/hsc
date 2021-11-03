<?php 
    session_start();
    include_once "../config/conn.php";

        $id_anuncio = intval($_GET['deletar_anuncio']);
    

        //deletar anúncio do banco de dados por id
        $query_delete = "DELETE FROM criar_anuncio WHERE id ='$id_anuncio'";
        
        if ($conn->query($query_delete) === TRUE) {
            $_SESSION['delete_sucesso'] = 'Anúncio Apagado! Não é possível recuperar.';
            header("Location: ../pages/meus_anuncios.php");

        }else{
            $_SESSION['delete_err'] = 'Algo deu errado, não foi possivel apagar o Anúncio! Tente novamente.';
            header("Location: ../pages/meus_anuncios.php");

        }               

    $conn->close();
    exit;
