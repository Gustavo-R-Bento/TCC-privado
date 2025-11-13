<?php

require_once '../bd.php'; 
date_default_timezone_set('America/Cuiaba'); 

$horarios_master = ['07:00:00', '08:00:00', '09:00:00', '10:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00']; 

header('Content-Type: application/json');

if (!isset($_POST['data_selecionada']) || empty($_POST['data_selecionada'])) {
    echo json_encode(['ERRO: Data não recebida no POST.']);
    exit;
}

$data_selecionada = $_POST['data_selecionada']; 

$horarios_ocupados = [];

$tabela_agendamentos = "agendamento"; 
$coluna_data = "data_agendamento";
$coluna_horario = "horario"; 

try {
    $sql_ocupados = "SELECT $coluna_horario FROM $tabela_agendamentos WHERE $coluna_data = ?";
    $stmt = $connection->prepare($sql_ocupados);
    
    if (!$stmt) {
        error_log("Erro na preparação do SQL: " . $connection->error);
        echo json_encode([]);
        exit;
    }
    
    $stmt->bind_param("s", $data_selecionada);
    $stmt->execute();
    $resultado_ocupados = $stmt->get_result();

    while ($row = $resultado_ocupados->fetch_assoc()) {
        $horarios_ocupados[] = date('H:i', strtotime($row[$coluna_horario])); 
    }

    $stmt->close();
    
} catch (Exception $e) {
    error_log("Erro no banco de dados: " . $e->getMessage());
    echo json_encode([]);
    exit;
}


$horarios_disponiveis_formatado = array_diff($horarios_master, $horarios_ocupados);

$horarios_disponiveis_final = array_map(function($h) {
    return substr($h, 0, 5);
}, array_values($horarios_disponiveis_formatado)); 

echo json_encode($horarios_disponiveis_final);
?>