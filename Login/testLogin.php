<?php 
    require_once '../bd.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT id, nome, senha, is_admin FROM usuario WHERE email = ? LIMIT 1";

        $stmt = $connection->prepare($sql);
        $stmt->execute([$email]); 
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        if($usuario && password_verify($senha, $usuario['senha'])){
            
            $_SESSION ['id'] = $usuario['id'];
            $_SESSION ['nome'] = $usuario['nome'];
            $_SESSION ['email'] = $email;
            $_SESSION ['senha'] = $senha;
            $_SESSION ['is_admin'] = $usuario['is_admin'];
            

            if($_SESSION['is_admin'] > 0){
                header('Location: ../Admin/Cadastro/pagAdmin.php');
                exit();
            }
            
            header('Location: ../Inicio/Inicio.php');


        }else{
            $_SESSION ['erro_login'] = "Email ou senha inválidos. Tente novamente";
            header('Location: Login.php');
            exit();
        }

    }
?>