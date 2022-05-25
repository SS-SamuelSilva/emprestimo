<?php
//CONEXÃO COM O BD
include_once('conexao.php');

//INICIO DA SESSÃO
session_start();


// U S A D O  P A R A  N Ã O  P E R M I T I R  A C E S S A R  C O M  U M  L I N K  D I R E T O  S E M  P E D I R  O  L O G I N
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location: index.php');
}
// CASO QUEIRA CONSULTAR A SESSÃO
#print_r($_SESSION);

//PARA QUEBRAR A SESSÃO É SÓ ATIVAR "#unset($_SESSION['usuario']); #unset($_SESSION['senha']);"
#unset($_SESSION['usuario']);
#unset($_SESSION['senha']);

// P E G A N D O  O S  D A D O S  D O  F O R M U L Á R I O
if (isset($_POST['submit'])) {
    $service_tag = $_POST['identificação'];
    $nome_detalhado  = $_POST['modelo'];
    $descricao  = $_POST['descricao'];

    // select P A R A  V E R I F I C A R  S E  J Á  E X I S T E  A L G U M  I T E M  C O M  A  S E R V I C E  T A G  A R M A Z E N A D A  N A  V A R I A V E L $service_tag
    $sql_search = "SELECT identificacao, nome_detalhado FROM teclado WHERE identificacao LIKE '$service_tag'";
    $sql_search_query = $con->query($sql_search);

    // P E G A N D O  O  D A D O  D O  B A N C O   D E  D A D O S  E  A R M A Z E N A N D O  N A  V A R I A V E L  $dados
    while ($result_sql_query = $sql_search_query->fetch_assoc()) {
        $objeto = $result_sql_query['nome_detalhado'];
    }

    // I N S E R I N D O  O S  D A D O S  D O  F O R M U L Á R I O
    $sql_injection = mysqli_query($con, "INSERT INTO teclado (identificacao, nome_detalhado, descricao) 
        VALUES ('$service_tag', '$nome_detalhado', '$descricao')");


    // C A S O  S E J A  I N C L U I D O
    if ($sql_injection) {
        echo '<br>';
        // I N C L U I N D O  O  C S S
        echo '<link href="./css/bootstrap.min.css" rel="stylesheet">';
        echo '<!-- Button trigger modal -->
                <button type="button" class="btn btn-primary invisible" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ver descrição do erro
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Criado com sucesso!</h5>
                                <a href="inserir_hardw.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                                Parabéns o objeto <strong class="fw-bold">' . $nome_detalhado . '</strong> foi criado com sucesso.
                            </div>
                            <div class="modal-footer">
                                <a href="inserir_hardw.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button></a>
                            </div>
                        </div>
                    </div>
                </div>';

        // I N C L U I N D O  O  S C R I P T  C S S
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>';

        // S C R I P T  P A R A  A P A R E C E R  O  P O P  U P 
        echo '<script>var botoes = document.getElementsByTagName("button");
                for (var i = 0; i < botoes.length; i++) {
                    if (botoes[i].className === "btn btn-primary invisible") {
                        botoes[i].click();
                    }
                }
            </script>';
    }
    // C A S O  T E N H A  D A D O  E R R O
    else {

        echo '<br>';
        // I N C L U I N D O  O  C S S
        echo '<link href="./css/bootstrap.min.css" rel="stylesheet">';
        echo '<!-- Button trigger modal -->
                <button type="button" class="btn btn-primary invisible" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ver descrição do erro
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Erro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Já existe um objeto criado com a service tag: <strong class="fw-bold">' . $service_tag . '</strong>. <br> Por favor confira as informações informadas
                                e tente novamente. <br>
                                Objeto: ' . $objeto . '</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>';

        // I N C L U I N D O  O  S C R I P T  C S S
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>';

        // S C R I P T  P A R A  A P A R E C E R  O  P O P  U P 
        echo '<script>var botoes = document.getElementsByTagName("button");
                for (var i = 0; i < botoes.length; i++) {
                    if (botoes[i].className === "btn btn-primary invisible") {
                        botoes[i].click();
                    }
                }
            </script>';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir teclado</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <!--H E A D E R -->
        <div class="row align-items-center">
            <div class="col">
            </div>
            <div class="col-md-4">
                <h2>Incluir um teclado</h2>
            </div>
            <div class="col">
            </div>
        </div>
        <form action="criar_teclado.php" method="POST">
            <legend>Identificação:</legend>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="identificação">
                <label for="floatingInput">Ex.: Service tag n° de série...</label>
            </div>
            <br>
            <legend>Modelo:</legend>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="modelo">
                <label for="floatingInput">Ex.: Estado do teclado...</label>
            </div>
            <br>
            <legend>Descrição:</legend>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="descricao">
                <label for="floatingInput">Ex.: Qualidade de imagem, tamanho...</label>
            </div> 
            <br>
            <legend>Tamanho da tela:</legend>
            <div class="form-floating col-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="descricao">
                <label for="floatingInput">Ex.: 19"</label>
            </div>
            <div>
                <br>
                <button class="btn btn-outline-success" type="submit" name="submit">Enviar</button>
            </div>
        </form>
        <br>
        <!--B O T O E S  P A R A  S A I R-->
        <div class="row g-3">
            <h6>Volte para: </h6>

            <div class="col-md-2">
                <a href="inserir_hardw.php"> <button class="btn btn-outline-info form-control">Seleção de itens</button></a>
            </div>

            <div class="col-md-1">
                <a href="incluir.php"><button class="btn btn-outline-primary form-control">incluir</button></a>
            </div>
            <div class="col-md-2">
                <a href="consulta.php"><button class="btn btn-outline-secondary form-control">Consultar</button></a>
            </div>
            <div class="col-md-1">
                <a href="logout.php"><button class="btn btn-outline-danger form-control">Sair</button></a>
            </div>
        </div>

    </div>
    <!--S C R I P T  P A R A  N A O  A P A R E C E R  A  C A I X A  P O P  U P   Q U E  R E E N V I A  O  F O R M U L A R I O  (ele também não permite o reenvio do formulario)-->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>