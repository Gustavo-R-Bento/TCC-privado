<?php 
require_once '../bd.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['submit'])){
        $dados =[
        $nome = ($_POST['nome']),
        $sobrenome = ($_POST['sobrenome']),
        $email = ($_POST['email']),
        $tel = ($_POST['tel']),
        $cpf = ($_POST['cpf']),
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT),
        ];

        $sql = "INSERT INTO usuario (nome, sobrenome, email, tel, cpf, senha) VALUES (?,?,?,?,?,?)";


        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssss", $nome, $sobrenome, $email, $tel, $cpf, $senha);
        if($stmt->execute()){
            header('Location: ../Login/Login.php');
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