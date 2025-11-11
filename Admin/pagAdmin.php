<?php 
    session_start();
    require_once "../bd.php";

    if(!isset($_SESSION['is_admin'])){
    
    }

    
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Nail</title>
    <link rel="stylesheet" href="pagAdmin.css">
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
                    <li><a href="./pagAdmin.php">Cadastro</a></li>
                    <li><a href="./usuarios.php">Usuários</a></li>
                    <li><a href="./funcionarios.php">Funcionários</a></li>
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
        <form method="POST" action="processaCad.php">
            <h1 class="txt-login">Cadastro</h1>
        
            <div class="input-doble">
                <div class="input-left">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="inp-nome" required>
                </div>
                <div class="input-right">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome" id="sobrenome" class="inp-sobrenome" required>
                </div>
        
            </div>
            <div class="input-center">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="inp-email" required>
            </div>
            <div class="input-center">
                <label for="cargo">Cargo</label>
               <select name="cargo" id="cargo" class="inp-email" required>
                    <option value="recepcionista">Recepcionista</option>
                    <option value="manicure">Manicure</option>
               </select>
            </div>
        
            <div class="input-center">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" class="inp-email" required>
            </div>
            <div class="input-doble">
                <div class="input-left">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="inp-cpf" maxlength="15" required>
                </div>
        
                <div class="input-right">
                    <label for="tel">Telefone</label>
                    <input type="text" name="tel" id="tel" class="inp-tel" maxlength="18" required>
                </div>
            </div>
        
            <div class="input-center">
                <label for="senha">Senha</label>
                <span class="toggle-senha" id="toggleIconContainer" onclick="togglePassword()">     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bibi-eye-slash" viewBox="0 0 16 16">
                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                    <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                </svg></span>
                <input type="password" name="senha" id="senha" class="inp-senha" require>
        
            </div>
        
        
            <div class="input-btn">
                <input type="submit" name="submit" value="Cadastrar" class="btn-cadastrar">
            </div>
            
        </form>
    </main>
    
</body>
</html>