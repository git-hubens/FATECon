<?php
session_start();
if (!isset($_SESSION["json"])) {
    $_SESSION["json"] = json_decode(file_get_contents('oficinas.json'), true);                  
}

//funções

//Carrega a oficina na página, se ele não encontrar nenhum, ele devera listar a primeira da lista
function carregaOficina($json){
    foreach ($json["oficinas"] as $oficina) {
        if ($oficina["oficinaAtiva"] === true) {
            // Define a variável da oficina a ser mostrada
            $_SESSION["oficinaID"] = $oficina["oficinaID"];
            $_SESSION["oficinaNome"] = $oficina["oficinaNome"];
            $_SESSION["oficinaDesc"] = $oficina["oficinaDesc"];
            $_SESSION["oficinaLocal"] = $oficina["oficinaLocal"];
            $_SESSION["oficinaData"] = $oficina["oficinaData"];
            $_SESSION["oficinaHora"] = $oficina["oficinaHora"];
            $_SESSION["oficinaImagem"] = $oficina["oficinaImagem"];
        }
        else{
            // Se não encontrar nenhuma oficina ativa, pega a primeira da lista
            $_SESSION["oficinaID"] = $json["oficinas"][0]["oficinaID"];
            $_SESSION["oficinaNome"] = $json["oficinas"][0]["oficinaNome"];
            $_SESSION["oficinaDesc"] = $json["oficinas"][0]["oficinaDesc"];
            $_SESSION["oficinaLocal"] = $json["oficinas"][0]["oficinaLocal"];
            $_SESSION["oficinaData"] = $json["oficinas"][0]["oficinaData"];
            $_SESSION["oficinaHora"] = $json["oficinas"][0]["oficinaHora"];
            $_SESSION["oficinaImagem"] = $json["oficinas"][0]["oficinaImagem"];
        }
    }
}

//essa função lista todas as outras oficinas que irão ocorrer
function listaOficinas($json){
    //a variavel $oficina recebe os dados do array $json
    foreach ($json["oficinas"] as $oficina) {
        //verifica se a oficina não está ativa
        if ($oficina["oficinaAtiva"] == false && $oficina["oficinaID"] != $_SESSION["oficinaID"]) {
            echo "<button type='submit' name='oficinaID' value='",$oficina['oficinaID'],"' class='btn m-1 p-0 col-sm-12 col-md-5 col-lg-4'>
                <div class='card flex-grow-0 colorCardWorkshop'>
                    <div class='row g-0'>
                        <div class='col-4'>
                            <img src='https://placehold.co/600' class='img-fluid rounded-start' alt='...'>
                        </div>
                        <div class='col-8'>
                            <div class='card-body align-middle p-0'>
                                <h5 class='card-title mt-2'>",$oficina['oficinaNome'],"</h5>
                                <p class='card-text txtSize'>",$oficina['oficinaDescCurta'],"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </button>";
        }  
    }
}
carregaOficina($_SESSION["json"]);

//verifica se a alguma requisição do método GET
if ($_SERVER["REQUEST_METHOD"] == "GET"){
    //quando há uma requisição do método get, ele pega os dados referente aquela oficina e envia para as 
    //variáveis de sessão
    $_SESSION["oficinaID"] = $_SESSION["json"]["oficinas"][$_GET["oficinaID"]]["oficinaID"];
    $_SESSION["oficinaNome"] = $_SESSION["json"]["oficinas"][$_GET["oficinaID"]]["oficinaNome"];
    $_SESSION["oficinaDesc"] = $_SESSION["json"]["oficinas"][$_GET["oficinaID"]]["oficinaDesc"];
    $_SESSION["oficinaLocal"] = $_SESSION["json"]["oficinas"][$_GET["oficinaID"]]["oficinaLocal"];
    $_SESSION["oficinaHora"] = $_SESSION["json"]["oficinas"][$_GET["oficinaID"]]["oficinaHora"];
    $_SESSION["oficinaData"] = $_SESSION["json"]["oficinas"][$_GET["oficinaID"]]["oficinaData"];
    $_SESSION["oficinaImagem"] = $_SESSION["json"]["oficinas"][$_GET["oficinaID"]]["oficinaImagem"];
}
?>

<!doctype html>
<html lang="pt-BR">
    
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FATECon HQs 2025!</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="css/estilo.css">
    <!-- Fontes do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Comic+Neue:wght@600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- =================================================== -->
    <!-- HEADER                                              -->
    <!-- =================================================== -->

    <!-- Faixa Fixa: Data & Local -->
    <div class="top-bar-info fixed-top p-2 text-center">
        <span><i class="bi bi-chat-heart-fill"></i> FATECon HQs 2025 • 26 e 27 de Setembro • na BRASITAL</span>
        <button type="button" class="btn-close btn-close-white position-absolute top-50 end-0 translate-middle-y me-3"
            aria-label="Close" onclick="this.parentElement.style.display='none'"></button>
    </div>

    <div class="container mt-5">

        <!-- Faixa: Patrocinadores (Header) -->
        <section class="sponsors-bar-header text-center py-2">
            <!-- Logos dos patrocinadores aqui -->
            <img src="https://placehold.co/100x40/cccccc/000000?text=Logo" alt="Logo Patrocinador 1" class="mx-2">
            <img src="https://placehold.co/100x40/cccccc/000000?text=Logo" alt="Logo Patrocinador 2" class="mx-2">
            <img src="https://placehold.co/100x40/cccccc/000000?text=Logo" alt="Logo Patrocinador 3" class="mx-2">
        </section>

        <!-- =================================================== -->
        <!-- ÁREA PRINCIPAL                                      -->
        <!-- =================================================== -->
        <header class="main-header my-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>FATECon HQs</h1>
                <div class="social-icons">
                    <a href="https://www.instagram.com/fateconhqs" target="_blank" class="ms-2"
                        aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://web.facebook.com/fateconhqs" target="_blank" class="ms-2" aria-label="Facebook"><i
                            class="bi bi-facebook"></i></a>
                    <a href="https://bsky.app/profile/fatecon.bsky.social" target="_blank" class="ms-2"
                        aria-label="Bluesky"><i class="bi bi-bluesky"></i></a>
                </div>
            </div>

            <hr class="hr-themed">

            <nav class="nav-principal">
                <ul class="nav justify-content-start">
                    <li class="nav-item"><a class="nav-link" href="#" aria-label="Home"><i class="bi bi-house-fill"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#quemsomos">Quem Somos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#edicoes-anteriores">Edições Anteriores</a></li>
                </ul>
            </nav>



            <main>
                
                <artice class="text-center">
                    <h1><?php echo $_SESSION["oficinaNome"]?></h1>
                    <p><?php echo $_SESSION["oficinaDesc"]?></p>
                    <figure class="text-center">
                       <img class="img-fluid rounded my-2" src="<?php echo $_SESSION["oficinaImagem"]?>" alt="PLACEHOLDER">
                    </figure>
                    <div class="text-start">
                        <p>Ficou interessado? Então venha participar dessa oficina!</p>
                        <ul class="ms-2 list-unstyled">
                            <li>Dia: <?php echo $_SESSION["oficinaData"]?></li>
                            <li>Horário: <?php echo $_SESSION["oficinaHora"]?></li>
                            <li>Local: <?php echo $_SESSION["oficinaLocal"]?></li>
                        </ul>
                    </div>
                </artice>
                <form method="get" action="oficinas.php" class="text-center row justify-content-around">
                    <h2>Outras Oficinas</h2>
                    <?php listaOficinas($_SESSION["json"])?>
                </form>
    </div>





    </main>
    <footer class="footer-themed pt-5 pb-4">
        <div class="container">
            <div class="row">
                <!-- Coluna 1: Sobre -->
                <div class="col-md-3">
                    <h5>FATECon HQs</h5>
                    <p>Um evento feito de fãs para fãs, celebrando a arte dos quadrinhos e a cultura pop em São Roque e
                        região.</p>
                </div>
                <!-- Coluna 2: Mapa do Site -->
                <div class="col-md-3">
                    <h5>Mapa do Site</h5>
                    <ul class="list-unstyled">
                        <li><a href="#fatecon">A FATECon</a></li>
                        <li><a href="#inscricoes">Inscrições</a></li>
                        <li><a href="#edicoes-anteriores">Edições Anteriores</a></li>
                        <li><a href="#quemsomos">Quem Somos</a></li>
                    </ul>
                </div>
                <!-- Coluna 3: Localização -->
                <div class="col-md-3">
                    <h5><a href="https://emsaoroque.com.br/locais/centro-cultural-brasital/" target="_blank">Centro
                            Cultural Brasital</a></h5>
                    <p>
                        Avenida Araçaí, 280<br>
                        São Roque-SP<br>
                        18130-235<br>
                        Vila Aguiar
                    </p>
                </div>
                <!-- Coluna 4: Redes Sociais -->
                <div class="col-md-3">
                    <h5>Siga-nos</h5>
                    <a href="https://www.instagram.com/fateconhqs" target="_blank" class="fs-4 me-2"
                        aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://web.facebook.com/fateconhqs" target="_blank" class="fs-4 me-2"
                        aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://bsky.app/profile/fatecon.bsky.social" target="_blank" class="fs-4 me-2"
                        aria-label="Bluesky"><i class="bi bi-bluesky"></i></a>
                </div>
            </div>
            <hr class="hr-themed">
            <div class="text-center">
                <small>
                    Website criado e mantido por <a href="quemsomos.html">alunos do segundo semestre</a> do curso de
                    Sistemas para Internet da Faculdade de Tecnologia Doutor Bernardino de Campos, a FATEC São Roque.
                </small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tA3VOhS+XjdO4ds+F+ZgAPPBYTE9MOcM9vocsn8RTrE+G2F" crossorigin="anonymous"></script>
</body>

</html>