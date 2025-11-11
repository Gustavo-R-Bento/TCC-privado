<?php 
require_once '../bd.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['submit'])){
        $dados =[
        $nome = ($_POST['nome']),
        $sobrenome = ($_POST['sobrenome']),
        $endereco = ($_POST['endereco']),
        $cargo = $_POST['cargo'],
        $email = ($_POST['email']),
        $tel = ($_POST['tel']),
        $cpf = ($_POST['cpf']),
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT),
        ];

        $sql = "INSERT INTO funcionario (nome, sobrenome, email, tel, cpf, senha, endereco, cargo) VALUES (?,?,?,?,?,?,?,?)";


        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssssss", $nome, $sobrenome, $email, $tel, $cpf, $senha, $endereco, $cargo);
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