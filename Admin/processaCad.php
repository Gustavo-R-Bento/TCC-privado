<?php 
require_once '../bd.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['submit'])){
        $dados =[
        $nome = ($_POST['nome']),
        $sobrenome = ($_POST['sobrenome']),
        $cargo = $_POST['cargo'],
        $email = ($_POST['email']),
        $tel = ($_POST['tel']),
        $cpf = ($_POST['cpf']),
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT),
        ];

        $sql = "INSERT INTO funcionario (nome, sobrenome, email, tel, cpf, senha, cargo) VALUES (?,?,?,?,?,?,?)";


        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssssss", $nome, $sobrenome, $email, $tel, $cpf, $senha, $cargo);
        if($stmt->execute()){
            $_SESSION['mensagem_update'] = "Seu cadastro foi realizado com sucesso!";
            header('Location: ./pagAdmin.php');
           
            exit();
        }else{
            echo"Erro ao cadastrar" . $stmt->error;
        }

        
        $stmt->close();
    }else{
       echo "Deu ruim!";
    }
    
}
?>