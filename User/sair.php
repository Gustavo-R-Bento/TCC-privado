
<?php 
    session_start();

    $_SESSION['id'] = null;
    $id_user = $_SESSION['id'];

    if(!empty($id_user) == null){
        header('Location: ../Login/Login.php');
    }
?>