<?php 
    session_start();
    if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
        header('Location: ../Login/Login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel nail</title>
    <link rel="stylesheet" href="Inicio.css">
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
                    <li><a href="../Agendamento/Agendamentos.php">Agendamentos</a></li>
                    <li><a href="">Quem somos?</a></li>
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
        <section>
            <div class="txt-topo-site">
                <h1>Agendamento Online</h1>
                <p>Faça seu Agendamento agora mesmo clicando no botão abaixo!</p>
                <form action="../Agendar/Agendar.php">
                    <button class="btn-agen" id="btn-agen">Agendar</button>
                </form>
                
            </div>

            <div class="img-topo-site">
                <img src="../img/img-topo-nova.png" alt="Foto unha em gel">
            </div> 

            <div class="content-doble">
                <div class="content-left">
                    <div class="container">
                        <img src="../img/icon-banhogel.png" alt="" class="icon-banhogel">
                        <h2>Banho em gel</h2>
                        <p>Ideal para o fortalecimento de unhas utilizando um gel especial aplicado diretamente sobre a superfície da unha natural.</p>
                        <img src="../img/img-gel.png" alt="" class="img-banhogel">
                    </div>
            
                </div>

                <div class="content-right">
                    <div class="container">
                        <img src="../img/icon-alongamento.png" class="icon-alongamento" alt="" srcset="">
                        <h2>Alongamento fibra</h2>
                        <p>O alongamento de unhas de fibra de vidro é uma técnica inovadora que oferece unhas longas, fortes e com aparência natural.</p>
                        <img src="../img/img-fibra.png" alt="" class="img-fibra">
                    </div>
                </div>

            </div>

            
        
        </section>
        <div class="quem-somos">
                    <h2>Quem somos?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores quod ipsa enim accusantium doloribus, blanditiis officia, tenetur minus repellat accusamus magnam corrupti placeat? Molestias maiores enim voluptas voluptate accusantium animi.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod vitae eos natus expedita illo quae rem quasi tempora, cum qui commodi fugiat, accusantium dolore voluptate doloremque deleniti at eaque adipisci!
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi eaque adipisci possimus a necessitatibus iure, libero assumenda. Esse veniam, perspiciatis commodi voluptates odio expedita quo sapiente eaque repudiandae enim maxime.
                    
                    </p>
            </div>
        
    
        <div class="linha"></div>
    
    </main>

    <footer>
       
            
                
                <nav class="redes-sociais">
                    <ul>
                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,256,256"
                            style="fill:#6d6d6d;">
                            <g fill="#6d6d6d" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M16,3c-7.16752,0 -13,5.83248 -13,13v18c0,7.16752 5.83248,13 13,13h18c7.16752,0 13,-5.83248 13,-13v-18c0,-7.16752 -5.83248,-13 -13,-13zM16,5h18c6.08648,0 11,4.91352 11,11v18c0,6.08648 -4.91352,11 -11,11h-18c-6.08648,0 -11,-4.91352 -11,-11v-18c0,-6.08648 4.91352,-11 11,-11zM37,11c-1.10457,0 -2,0.89543 -2,2c0,1.10457 0.89543,2 2,2c1.10457,0 2,-0.89543 2,-2c0,-1.10457 -0.89543,-2 -2,-2zM25,14c-6.06329,0 -11,4.93671 -11,11c0,6.06329 4.93671,11 11,11c6.06329,0 11,-4.93671 11,-11c0,-6.06329 -4.93671,-11 -11,-11zM25,16c4.98241,0 9,4.01759 9,9c0,4.98241 -4.01759,9 -9,9c-4.98241,0 -9,-4.01759 -9,-9c0,-4.98241 4.01759,-9 9,-9z"></path></g></g>
                            </svg></a></li>
                        
                            <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,256,256"
                                style="fill:#6d6d6d;">
                                <g fill="#6d6d6d" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M24.40234,9c-6.60156,0 -12.80078,0.5 -16.10156,1.19922c-2.19922,0.5 -4.10156,2 -4.5,4.30078c-0.39844,2.39844 -0.80078,6 -0.80078,10.5c0,4.5 0.39844,8 0.89844,10.5c0.40234,2.19922 2.30078,3.80078 4.5,4.30078c3.50391,0.69922 9.5,1.19922 16.10156,1.19922c6.60156,0 12.59766,-0.5 16.09766,-1.19922c2.20313,-0.5 4.10156,-2 4.5,-4.30078c0.40234,-2.5 0.90234,-6.09766 1,-10.59766c0,-4.5 -0.5,-8.10156 -1,-10.60156c-0.39844,-2.19922 -2.29687,-3.80078 -4.5,-4.30078c-3.5,-0.5 -9.59766,-1 -16.19531,-1zM24.40234,11c7.19922,0 12.99609,0.59766 15.79688,1.09766c1.5,0.40234 2.69922,1.40234 2.89844,2.70313c0.60156,3.19922 1,6.60156 1,10.10156c-0.09766,4.29688 -0.59766,7.79688 -1,10.29688c-0.29687,1.89844 -2.29687,2.5 -2.89844,2.70313c-3.60156,0.69922 -9.60156,1.19531 -15.60156,1.19531c-6,0 -12.09766,-0.39844 -15.59766,-1.19531c-1.5,-0.40234 -2.69922,-1.40234 -2.89844,-2.70312c-0.80078,-2.80078 -1.10156,-6.5 -1.10156,-10.19922c0,-4.60156 0.40234,-8 0.80078,-10.09766c0.30078,-1.90234 2.39844,-2.50391 2.89844,-2.70312c3.30078,-0.69922 9.40234,-1.19922 15.70313,-1.19922zM19,17v16l14,-8zM21,20.40234l8,4.59766l-8,4.59766z"></path></g></g>
                                </svg></a></li>
                        
                        <li><a href="#"></a><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,256,256"
                            style="fill:#6d6d6d;">
                            <g fill="#6d6d6d" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M9,4c-2.74952,0 -5,2.25048 -5,5v32c0,2.74952 2.25048,5 5,5h16.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h5.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h8.8418c2.74952,0 5,-2.25048 5,-5v-32c0,-2.74952 -2.25048,-5 -5,-5zM9,6h32c1.66848,0 3,1.33152 3,3v32c0,1.66848 -1.33152,3 -3,3h-8v-14h3.82031l1.40039,-7h-5.2207v-2c0,-0.55749 0.05305,-0.60107 0.24023,-0.72266c0.18718,-0.12159 0.76559,-0.27734 1.75977,-0.27734h3v-5.63086l-0.57031,-0.27149c0,0 -2.29704,-1.09766 -5.42969,-1.09766c-2.25,0 -4.09841,0.89645 -5.28125,2.375c-1.18284,1.47855 -1.71875,3.45833 -1.71875,5.625v2h-3v7h3v14h-16c-1.66848,0 -3,-1.33152 -3,-3v-32c0,-1.66848 1.33152,-3 3,-3zM32,15c2.07906,0 3.38736,0.45846 4,0.70117v2.29883h-1c-1.15082,0 -2.07304,0.0952 -2.84961,0.59961c-0.77656,0.50441 -1.15039,1.46188 -1.15039,2.40039v4h4.7793l-0.59961,3h-4.17969v16h-4v-16h-3v-3h3v-4c0,-1.83333 0.46409,-3.35355 1.28125,-4.375c0.81716,-1.02145 1.96875,-1.625 3.71875,-1.625z"></path></g></g>
                            </svg></li>
                    </ul>
                </nav>
            
        
        <p>&copy;GustavoBento</p>
    </footer>
    
</body>
</html>