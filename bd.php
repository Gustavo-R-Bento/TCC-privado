<?php
// CONEXÃO BD
$_servidor = "localhost";
$user = "root";
$senha = "";
$bd = "pixel_nail";

$connection = mysqli_connect($_servidor, $user, $senha, $bd);

if($connection ->connect_error){
    die("A conexão falhou: ". $connection->connect_error);
}
//echo "Conexão realizada com sucesso!!!"
;
?>