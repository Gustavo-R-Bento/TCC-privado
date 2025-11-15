<?php 
    require_once '../../bd.php';
    session_start();

    $user = $_GET['user'];
    $id_funcionario = [];
    $id_funcionario = $_GET['id_funcionario'];
    $_SESSION['id_funcionario'] = $id_funcionario;
    
    $dados = [];
    $mensagem_update = "";

    if(isset($_SESSION['mensagem_update'])){
            
            $mensagem_update = $_SESSION['mensagem_update'];
            unset($_SESSION['mensagem_update']);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Nail</title>
    <link rel="stylesheet" href="edit.css">
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
                    <li><a href="../Cadastro/pagAdmin.php">Cadastro</a></li>
                    <li><a href="../Usuarios/usuarios.php">Usuários</a></li>
                    <li><a href="./funcionarios.php">Funcionários</a></li>
                </ul>
            </nav>

            <div class="user">
                <a href="../Cadastro/Perfil.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        
                </a>
            </div>

        </div>
    </header>
    <main>
        
        <div class="container">
            <?php
                $sqlSelect = "SELECT * FROM funcionario WHERE id=$id_funcionario";
                $resultadoSelect = $connection->query($sqlSelect);
                while($dados = mysqli_fetch_assoc($resultadoSelect)){
            
            ?>
            
            
                <h1 class="txt-login">Editar</h1>
                <form method="POST" action="updateEdit.php">
            
                    <div class="labels">
                        <label for="nome">Nome</label>
                        <label for="sobrenome">Sobrenome</label>
                        <label for="cargo">Cargo</label>
                        <label for="email">E-mail</label>
                        <label for="cpf">CPF</label>
                        <label for="tel">Telefone</label>
                        
                    </div>
                    <div class="inputs">
                        <input type="text" name="nome" id="nome" class="inp-nome" value="<?php echo $dados['nome']; ?>" required>
                        <input type="text" name="sobrenome" id="sobrenome" class="inp-sobrenome" value="<?php echo $dados['sobrenome']; ?>" required>
                        <select name="cargo" id="cargo" class="inp-cargo" value="<?php $dados['cargo'] ?>">
                            <option value="manicure">Manicure</option>
                            <option value="recepcionista">Recepcionista</option>
                        </select>
                        <input type="text" name="email" id="email" class="inp-email" value="<?php echo $dados['email']; ?>" required>
                        <input type="text" name="cpf" id="cpf" class="inp-cpf" maxlength="15" value="<?php echo $dados['CPF']; ?>" required>
                        <input type="text" name="tel" id="tel" class="inp-tel" maxlength="18" value="<?php echo $dados['tel']; ?>" required>
                        
                         <?php if ($mensagem_update): ?>
                                <div style="color: green; font-size: 10pt; padding-top: 10px;">
                                    <?php echo htmlspecialchars($mensagem_update); ?>
                                </div>
                        <?php endif; ?> 
                        
                        
                        <input type="submit" name="submit" value="Editar" class="btn-cadastrar">
            
                    </div>
            
                </form>
            <?php
                }
            
            ?>
           
        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <script>
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#tel').mask('(00) 0 0000-0000');

        const eyeOpen = `
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bibi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                </svg>`;

        const eyeClose = `
                <svg xmlns="http://www.w3.org/2000/svg" width="16"   height="16" fill="currentColor" class="bibi-eye-slash" viewBox="0 0 16 16">
                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                </svg>
                `;

        function togglePassword(){
            const senhaInput = document.getElementById('senha');
            const container = document.getElementById('toggleIconContainer');

            if(senhaInput.type === 'password'){
                senhaInput.type = 'text';
                container.innerHTML = eyeOpen;
            }else{
                senhaInput.type = 'password';
                container.innerHTML = eyeClose;
            }

        }
    </script>
</body>
</html>