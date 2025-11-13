<?php 
    include_once '../../bd.php';
    session_start();
    
    if(!empty ($_GET['id'])){

        $id_user = $_GET['id'] ?? null;
        
        $sqlSelect = "DELETE FROM usuario WHERE id = $id_user";
        $resultado = $connection->query($sqlSelect);
         
    }
  
    header('Location: usuarios.php');
?>