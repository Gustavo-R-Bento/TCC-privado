<?php 
    include_once '../bd.php';
    session_start();
    
    if(!empty ($_GET['id'])){

        $id_user = $_SESSION['id'] ?? null;
        $id_agendamento = $_GET['id'] ?? null;

        $sqlSelect = "SELECT * FROM agendamento WHERE id = $id_agendamento";
        $resultado = $connection->query($sqlSelect);
        
        if($resultado->num_rows > 0){
            
            $sqlDelete = "DELETE FROM agendamento WHERE id = $id_agendamento";
            $resultadoDelete = $connection->query($sqlDelete);
        }      
    }
  
    header('Location: Agendamentos.php');
?>