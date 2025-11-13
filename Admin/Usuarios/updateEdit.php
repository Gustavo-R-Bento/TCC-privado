<?php 
require_once '../../bd.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['submit'])){
        
            $nome = ($_POST['nome']);
            $sobrenome = ($_POST['sobrenome']);
            $cargo = $_POST['cargo'];
            $email = ($_POST['email']);
            $tel = ($_POST['tel']);
            $cpf = ($_POST['cpf']);
            $id_usuario = $_SESSION['id_usuario'];
            
        $id_user = $_SESSION['id'];

        $sqlUpdate = "UPDATE usuario SET nome = ?, sobrenome = ?, email = ?, tel = ?, cpf = ? WHERE id = ?";

        $stmt = $connection->prepare($sqlUpdate);
        $stmt->bind_param("sssssi", $nome, $sobrenome, $email, $tel, $cpf, $id_funcionario);
        $resultado = $stmt->execute();

        if($resultado){
            $_SESSION['mensagem_update'] = "Seus dados foram alterados com sucesso!";
        }else{
            $_SESSION['mensagem_update'] = "Erro ao alterar dados: " . $stmt->error;
        }

        header("Location: ./edit.php?id_usuario=$id_usuario&user=0");
    }else{
        $_SESSION ['mensagem_update'] = "Não foi possível alterar seus dados.";
        header('Location: funcionarios.php');
        exit();
    }
    
}

?>