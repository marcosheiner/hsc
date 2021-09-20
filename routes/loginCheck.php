<?php
    session_start();
    include "../config/conn.php";

    if (isset($_POST['email']) && isset($_POST['senha'])) {
        
        function test_input($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email    = test_input($_POST['email']);
        $senha      = test_input($_POST['senha']);
        

        //mensagens de erro no login
        if (empty($email)) {
            header("Location: ../home/login.php?error=E-mail  em Branco!");
        } elseif (empty($senha)){
            header("Location: ../home/login.php?error=Senha em Branco!");
        } else {
            $senha = md5($senha);
            $sql = "SELECT * FROM usuario WHERE email_user='$email' AND senha='$senha'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                //nome de usuario unico
                $row = mysqli_fetch_assoc($result);

                if ($row['senha'] === $senha && $row['email_user'] === $email) {
                    $_SESSION['nome_usuario']       = $row['nome_usuario'];
                    $_SESSION['id']                 = $row['id'];
                    $_SESSION['nome_user']          = $row['nome_user'];
                    $_SESSION['email_user']         = $row['email_user'];
                    $_SESSION['telefone_user']      = $row['telefone_user'];
                    $_SESSION['funcao']             = $row['funcao'];
                    $_SESSION['data_cadastro']      = $row['data_cadastro'];

                    header("Location: ../pages/dashboard.php");
                }else{
                    header("Location: ../home/login.php?error=E-mail ou Senha Incorretos");
                }
            } else{
                header("Location: ../home/login.php?error=E-mail ou Senha Incorretos");
            }
        }

    }else{
        header("Location: ../home/login.php");
    }
