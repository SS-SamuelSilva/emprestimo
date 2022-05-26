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


if (isset($_GET['identificacao'])) {
    include_once('conexao.php');
    $id = $_GET['identificacao'];
    $variavel = $_GET['tabela'];
    echo 'tabela = ' . $variavel;
    echo '<br>';
    echo 'identificacao = ' . $id;
    echo '<br>';


    $sql_select = "SELECT * FROM $variavel WHERE identificacao LIKE '%$id%'";
    $result = $con->query($sql_select);

    if ($result->num_rows > 0) {
        $sql_delete = "DELETE FROM $variavel WHERE identificacao LIKE '%$id%'";
        $resultdelete = $con->query($sql_delete);

        // L O O P I N G  C A R E G A N D O
        if ($resultdelete) {
            echo 'deletado com sucesso';
            echo '<!DOCTYPE html>
                    <html lang="pt-br">

                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="css/bootstrap.min.css">
                        <title>Document</title>
                    </head>

                    <body>
                        <div class="container">
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col">

                                </div>
                                <div class="col">

                                </div>
                                <div class="col">
                                    <div class="spinner-border text-danger" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="col">

                                </div>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
                    </body>

                </html>';
        } else {
            printf("Errorcode: %d\n", $con->errno);
        }

        //
    } else {
        // E R R O 38  D A D O S  P A S S A D O S  P A R A  P Á G I N A  deletar.php     I N C O R R E T O S 
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
                                <h5 class="modal-title" id="exampleModalLabel">Erro 38</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Nenhum resultado encontrado para deletar. <br>
                                Verifique se as informaões fornecidas estão corretas. Caso esteja entre em contado com o administrador.
                            </div>
                            <div class="modal-footer">
                                <a href="inserir_hardw.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button></a>
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
        // M O S T R A  O  E R R O  S Q L
        /*
            if (isset($con->connect_error)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
            if(isset($con->connect_errno)){
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
        */
    }
}
// R E T O R T N A N D O  P A R A  P Á G I N A  inserir_hardw.php
header('Location: inserir_hardw.php');
