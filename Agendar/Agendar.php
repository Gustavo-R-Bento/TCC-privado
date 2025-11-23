<?php 
    require_once '../bd.php';
    session_start();
    date_default_timezone_set('America/Cuiaba');
    setlocale(LC_TIME, 'pt_BR.utf-8', 'portuguese');
    

    $dias_uteis = 5;
    $dias_uteis_contado = 0;
    $dias_pulados = 0;
    $data_hoje = time();
    $data_para_envio = '';
    $data_selecionada = $_POST['data_selecionada'] ?? '';
    
    $servicos = ['Banho em gel', 'Alongamento fibra','Esmaltação', 'Pedicure', 'Pés e mãos' ];

    $horarios = ['7:00', '8:00', '9:00', '10:00', '13:00', '14:00', '15:00', '16:00'];

    $sql = "SELECT * FROM funcionario ORDER BY id DESC";

    $resultado = $connection->query($sql);
    $funcionarios = [];
    
    $teste = [];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel nail</title>
    <link rel="stylesheet" href="Agendar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="barrasup">
            <div class="logo">
             <a href="Inicio.php">Pixel Nail</a>
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
        <form action="processaAgenda.php" method="POST" class="form">
            <h2 class="h2">Selecione um serviço</h2>
            <div class="container">
                <div class="inputs">
                    <?php
                        foreach($servicos as $servico){
                            
                    ?>  
                
                            <input
                            type="radio"
                            name="servico"
                            class="btn-servico"
                            value="<?php echo htmlspecialchars($servico);?>"
                            id="<?php echo htmlspecialchars($servico);?>"
                            required>
                            <label for="<?php echo htmlspecialchars($servico);?>" class="label-servico"> <?php echo htmlspecialchars($servico);?></label>
                    <?php
                
                            ;
                        }
                    ?>
                </div>
            </div>
            
            <h2 class="h2">Selecione uma data</h2>
            <div class="container">
                <div class="inputs">
                    <?php
                        while($dias_uteis_contado < $dias_uteis){
                            $timestamp_atual = strtotime("+$dias_pulados days", $data_hoje);
        
                            $dia_semana = date('w', $timestamp_atual);
        
                            if($dia_semana > 0 && $dia_semana < 6){
                            $dias_uteis_contado++;
        
                            $data_formatada = strftime('%a %d %b', $timestamp_atual);
                            $semanaFormatada = strftime('%a', $timestamp_atual);
                            $diaFormatado = strftime('%d', $timestamp_atual);
                            $mesFormatado = strftime('%b', $timestamp_atual);

                            $data_para_envio = date('Y-m-d', $timestamp_atual);
                            
                    ?>
                            <input 
                                type="radio" 
                                name="data_selecionado" 
                                class="btn-datas" 
                                id="data_<?php echo $data_para_envio; ?>"
                                value="<?php echo $data_para_envio; ?>" 
                                required
                            > 
                            <label for="data_<?php echo $data_para_envio;?>" class="label-datas">
                                <?php echo $semanaFormatada . "<div class='diaFormatado'>" . $diaFormatado . "</div>" . $mesFormatado;?>

                            </label>
                    <?php
                            }
                            $dias_pulados++;
                        }
                    ?>
            
                 </div>
            </div>
            <h2 class="h2">Selecione um horario</h2>
            <div class="container">
                <div class="inputs" id="container-horarios-ajax">
                    <p>Selecione uma data acima para carregar os horários disponíveis.</p>
                </div>
            </div>
            <h2 class="h2"  >Selecione um especialista</h2>
            <div class="especialistas">
                <?php 
                    while($funcionarios = mysqli_fetch_assoc($resultado)){
                        if($funcionarios['cargo'] == 'manicure'){
                ?>
                    <div class="card">
                        <img src="../img/<?php echo $funcionarios['img']; ?>" alt="" srcset="" class="img-gel">
                        <div class="input-especialista">
                            <h2> <?php echo $funcionarios['nome'] ?> </h2>
                            <input
                                type="radio"
                                name="especialista"
                                id="<?php echo htmlspecialchars($funcionarios['nome']) ?>"
                                value="<?php echo htmlspecialchars($funcionarios['nome']) ?>"
                                required
                            >
                            <label for="<?php echo htmlspecialchars($funcionarios['nome']) ?>">Selecionar</label>
                        </div>
                    </div>
                <?php
                        } 
                    }
                ?>
                
            </div>

            <div class="agendar"><button type="submit" name="confirmar" class="btn-confirmar">Confirmar meu agendamento</button></div>
        </form>
    </main>
<script>
    const AJAX_URL = 'buscar_horarios_livres.php';
    function buscarHorarios(dataSelecionada){
        const container = document.getElementById('container-horarios-ajax');
         container.innerHTML = 'Carregando horários...';

         fetch(AJAX_URL, {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded',},
            body: `data_selecionada=${dataSelecionada}`
        })
        .then(response => response.json())
        .then(horarios => {
            container.innerHTML = '';

            if (horarios.length === 0){
                container.innerHTML = '<p>Nenhum horário disponível nesta data</p>';
                return;
            }

            horarios.forEach(horario => {
                const id = 'horario_' + horario.replace(':', '-');

                const input = document.createElement('input');
                input.type = 'radio';
                input.name = 'horario';
                input.className = 'btn-horario';
                input.id = id;
                input.value = horario;
                input.required = true;

                const label = document.createElement('label');
                label.htmlFor = id;
                label.textContent = horario;
                label.className = 'label-horario'

                container.appendChild(input);
                container.appendChild(label);

            });
        })
        .catch(error => {
            console.error('Erro na requisição AJAX:', error);
            container.innerHTML = '<p>Erro ao carregar horários. Verifique o console.</p>';
        });
    
    }

    document.addEventListener('DOMContentLoaded', () => {
        
        const dataInputs = document.querySelectorAll('input[name="data_selecionado"]');

        dataInputs.forEach(input => {
            input.addEventListener('change', (event) => {
                buscarHorarios(event.target.value);
            })
        })
    })
</script>
</body>
</html>
