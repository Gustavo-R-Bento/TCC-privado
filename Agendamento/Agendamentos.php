<?php 
    require_once '../bd.php';
    session_start();
    date_default_timezone_set('America/Cuiaba');
    setlocale(LC_TIME, 'pt_BR.utf-8', 'portuguese');
   
    $id_user = $_SESSION['id'] ?? null;

    $dataHoraAtual = new DateTime('now', new DateTimeZone('America/Cuiaba'));
    
    $sqlServicos = "SELECT titulo, valor FROM servicos";
    $resultadoServicos = $connection->query($sqlServicos);
    $servicos_map = [];

    $sqlAgendamentos = "SELECT * FROM agendamento WHERE id_user = $id_user ORDER BY data_agendamento DESC, horario DESC";
    $resultadoAgendamento = $connection->query($sqlAgendamentos);

    while ($servico = mysqli_fetch_assoc($resultadoServicos)){
        $servicos_map[$servico['titulo']] = $servico['valor'];
    }

    $agendamentos_futuros = [];
    $agendamentos_anteriores = [];

    if ($resultadoAgendamento && $resultadoAgendamento->num_rows > 0){
        while ($agendamento = mysqli_fetch_assoc($resultadoAgendamento)){
            $agendamentoCompleto = $agendamento['data_agendamento'] . " " . $agendamento['horario'];
            $dataHoraAgendamento = DateTime::createFromFormat('Y-m-d H:i:s' , $agendamentoCompleto, new DateTimeZone('America/Cuiaba'));

            $agendamento['data_formatada'] = $dataHoraAgendamento->format('d/m/Y');
            $agendamento['horario_formatado'] = $dataHoraAgendamento->format('H:i');
            $agendamento['valor'] = $servicos_map[$agendamento['servico']] ?? 'N/A';

            if ($dataHoraAgendamento > $dataHoraAtual){
                $agendamentos_futuros[] = $agendamento;
            }else{
                $agendamentos_anteriores[] = $agendamento;
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Agendamentos.css">
    <title>Pixel Nail</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="barrasup">
            <div class="logo">
             <a href="../Inicio/Inicio.php">Pixel Nail</a>
            </div>

            <nav class="menu-desktop">
                <ul>
                    <li><a href="../Inicio/Inicio.php">Início</a></li>
                    <li><a href="../Agendar/Agendar.php">Agendar</a></li>
                    <li><a href="../Agendamento/Agendamentos.php">Agendamentos</a></li>
                    <li><a href="../Inicio/Inicio.php#secao-quem-somos">Quem somos?</a></li>
                </ul>
            </nav>

            <div class="user">
                <a href="../User/Perfil.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        
                </a>
            </div>

        </div>
    </header>
    <main>
        <h1>Seus agendamentos</h1>
       
        <div class="agendamentos">
            <?php
                if (count($agendamentos_futuros) > 0): 
            ?>
            
            <?php 
                foreach($agendamentos_futuros as $agendamento):
            ?>
                <div class="container">
                    <div class="left">
                        <h2><?php echo $agendamento['servico']; ?></h2>
                        <p>Data: <?php echo $agendamento['data_formatada']; ?></p>
                        <p>Horário: <?php echo $agendamento['horario_formatado']; ?></p>
                        <p>Especialista: <?php echo $agendamento['especialista']; ?></p>
                    </div>
                    <div class="right">
                        <h2>R$ <?php echo $agendamento['valor']; ?>,00</h2>

                        <a href="./delete.php?id= <?php echo $agendamento['id']; ?>" 
                        class="btn-cancelar" 
                        onclick="return confirm('Tem certeza que deseja cancelar este agendamento?');"
                        >
                            Cancelar
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
                <div class="container">
                    <p>Você não possui nenhum agendamento futuro.</p>
                    <a href="../Agendar/Agendar.php" class="btn-agendar">Agendar</a>
                </div>
            <?php endif; ?>                
        </div>
        
        <h1>Agendamentos anteriores</h1>

        <div class="agendamentos">
            <?php  if (count($agendamentos_anteriores) > 0): ?>
                <?php foreach ($agendamentos_anteriores as $agendamento):?>
                    <div class="container"> 
                        <div class="left">
                            <h2><?php echo $agendamento['servico']; ?></h2>
                            <p>Data: <?php echo $agendamento['data_formatada']; ?></p>
                            <p>Horário: <?php echo $agendamento['horario_formatado']; ?></p>
                            <p>Especialista: <?php echo $agendamento['especialista']; ?></p>
                        </div>
                        <div class="right">
                            <h2>R$ <?php echo $agendamento['valor']; ?>,00</h2>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>   
                <div class="container">
                    <p>Você ainda não possui histórico de agendamentos.</p>
                </div>
            <?php endif;?>
        </div>
    </main>
    
</body>
</html>