<?php 
require_once '../bd.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['submit'])){
        $dados =[
            $nome = ($_POST['nome']),
            $sobrenome = ($_POST['sobrenome']),
            $email = ($_POST['email']),
            $tel = ($_POST['tel']),
            $cpf = ($_POST['cpf']),
            
        ];
        $id_user = $_SESSION['id'];

        $sqlUpdate = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', tel = '$tel', cpf = '$cpf' WHERE id=$id_user";

        $resultado = $connection->query($sqlUpdate);

        $_SESSION['mensagem_update'] = "Seus dados foram alterados com sucesso!";

        header('Location: ./Perfil.php');
    }else{
        $_SESSION ['mensagem_update'] = "Não foi possível alterar seus dados.";
        header('Location: Perfil.php');
        exit();
    }
    
}

?>