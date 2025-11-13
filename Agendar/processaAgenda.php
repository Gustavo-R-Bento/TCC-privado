<?php
     require_once '../bd.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['confirmar'])){
            $servico_selecionado = $_POST['servico'];
            $data_selecionado = $_POST['data_selecionado'];
            $horario_selecionado = $_POST['horario'];
            $especialista_selecionado = $_POST['especialista'];
            
            $id_user = $_SESSION['id'];

            $sql = "INSERT INTO agendamento (servico, data_agendamento, horario, especialista, id_user ) VALUES (?,?,?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssssi", $servico_selecionado, $data_selecionado, $horario_selecionado, $especialista_selecionado, $id_user);
            if($stmt->execute()){
                header('location:../Agendamento/Agendamentos.php');
                exit();
            }else{
                echo"Erro ao cadastrar" . $stmt->error;
            }

            $stmt->close();

            


        }
    }
?>