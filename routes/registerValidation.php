<?php

include '../config/conn.php';

if (!isset($_SESSION)) {
  session_start();

  if (isset($_POST['cadastrar_usuario'])) {

    $nome_user = trim($_POST['nome_user']);
    $nome_completo = trim($_POST['nome_completo']);
    $creci = trim($_POST['creci']);
    $email_user = trim($_POST['email_user']);
    $telefone_user = $_POST['telefone_user'];
    $funcao_user = $_POST['funcao_user'];
    $senha_user = trim(md5($_POST['senha_user']));




    //verifcar se existe o email cadastrado
    $check_sql = "SELECT COUNT(*) AS total_email FROM usuario WHERE email_user ='$email_user'";
    $result_sql = mysqli_query($conn, $check_sql);
    $row_sql = mysqli_fetch_assoc($result_sql);

    //verifica se existe o nome de usuario
    $check_username = "SELECT COUNT(*) AS total_username FROM usuario WHERE nome_user ='$nome_user'";
    $result_check_username = mysqli_query($conn, $check_username);
    $row_check_username = mysqli_fetch_assoc($result_check_username);

    $check_usermail = "SELECT COUNT(*) AS total_usermail FROM usuario WHERE nome_user ='$nome_user' AND email_user ='$email_user'";
    $result_check_usermail = mysqli_query($conn, $check_usermail);
    $row_check_usermail = mysqli_fetch_assoc($result_check_usermail);

    if ($row_sql['total_email'] == 1) {
      $_SESSION['email_existe'] = true;
      header("Location: ../pages/registerUser.php");
      exit;
    }

    if ($row_check_username['total_username'] == 1) {

      $_SESSION['usuario_existe'] = true;
      header("Location: ../pages/registerUser.php");
      exit;
    }

    if (strlen(trim($_POST['senha_user'])) < 6) {

      $_SESSION['tamanho_senha'] = true;
      header("location: ../pages/registerUser.php");
      exit;
    }

    $check_sql = "INSERT INTO usuario (nome_completo, creci, nome_user, email_user, telefone_user, senha, funcao, data_cadastro) VALUES ('$nome_completo', '$creci', '$nome_user', '$email_user', '$telefone_user', '$senha_user', '$funcao_user', NOW())";

    if ($conn->query($check_sql) === TRUE) {
      $_SESSION['validar_cadastro'] = true;
    }

    $conn->close();
    header("Location: ../pages/usuarios.php");
    exit;
  }
}
