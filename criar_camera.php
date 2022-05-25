<?php
include_once('conexao.php');
session_start();
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location: index.php');
}
// P E G A N D O  O S  D A D O S  D O  F O R M U L Á R I O
if (isset($_POST['submit'])) {
    $service_tag = $_POST['service_tag'];
    $nome_detalhado = $_POST['nome_detalhado'];
    $descricao = $_POST['descricao'];
    $qualidade = $_POST['qualidade'];

    // select P A R A  V E R I F I C A R  S E  J Á  E X I S T E  A L G U M  I T E M  C O M  A  S E R V I C E  T A G  A R M A Z E N A D A  N A  V A R I A V E L $service_tag
    $sql_search = "SELECT identificacao, nome_detalhado FROM camera WHERE identificacao LIKE '$service_tag'";
    $sql_search_query = $con->query($sql_search);

    // P E G A N D O  O  D A D O  D O  B A N C O   D E  D A D O S  E  A R M A Z E N A N D O  N A  V A R I A V E L  $dados
    while ($result_sql_query = $sql_search_query->fetch_assoc()) {
        $objeto = $result_sql_query['nome_detalhado'];
        
    }
    
    // I N S E R I N D O  O S  D A D O S  D O  F O R M U L Á R I O
    $sql_injection = mysqli_query($con, "INSERT INTO camera (identificacao, nome_detalhado, descricao, qualidade) 
    VALUES ('$service_tag', '$nome_detalhado', '$descricao', '$qualidade')");


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
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Criar câmera</title>
</head>

<body>
    <div class="container">
        <h3>Preencha os dados abaixo para cadastrar uma nova câmera</h3>
        <br>
        <form action="criar_camera.php" method="POST" oninput="x.value=parseInt(a.value)+parseInt(b.value)">
            <fieldset>
                <legend>Informações técnicas da câmera:</legend>
                <div class="form-floating col-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="service_tag" required>
                    <label for="floatingInput">Service tag, n° de identificação...</label>
                </div>
                <br>
                <div class="form-floating col-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="nome_detalhado">
                    <label for="floatingInput">Nome:</label>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <legend>Observações:</legend>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="descricao"></textarea>
                    <label for="floatingTextarea2">Comentário</label>
                </div>

                <input type="number" id="b" value="0.1" class="invisible">
                <div class="col-2">
                    <input type="range" id="a" value="50" class="form-range" name="qualidade">
                </div>
                <label for="">Qualidade de vídeo:</label>
                <output name="x" for="a b">50</output>
                <label for="">%</label>

            </fieldset>
            <br>
            <button type="submit" class="btn btn-outline-success" name="submit">Enviar</button>
        </form>
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