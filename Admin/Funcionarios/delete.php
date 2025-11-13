<?php 
    include_once '../../bd.php';
    session_start();
    
    if(!empty ($_GET['id'])){

        $id_user = $_GET['id'] ?? null;
        
        $sqlSelect = "DELETE FROM funcionario WHERE id = $id_user";
        $resultado = $connection->query($sqlSelect);
         
    }
  
    header('Location: funcionarios.php');
?>