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


// C A D A  select  É  P A R A  M O S T R A R  O  nome  E  id  Q U A N D O  O  U S U Á R I O  C L I C A  E M  editar
$sql_select_camera = "SELECT identificacao, nome_detalhado FROM camera";
$sql_query_camera = $con->query($sql_select_camera);


$sql_select_monitor = "SELECT identificacao, nome_detalhado FROM monitor";
$sql_query_monitor = $con->query($sql_select_monitor);


$sql_select_mouse = "SELECT identificacao, nome_detalhado FROM mouse";
$sql_query_mouse = $con->query($sql_select_mouse);


$sql_select_notebook = "SELECT identificacao, nome_detalhado FROM notebook";
$sql_query_notebook = $con->query($sql_select_notebook);

$sql_select_projetor = "SELECT identificacao, nome_detalhado FROM projetor";
$sql_query_projetor = $con->query($sql_select_projetor);


$sql_select_teclado = "SELECT identificacao, nome_detalhado FROM outros";
$sql_query_teclado = $con->query($sql_select_teclado);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <title>Alterar ou criar um produto</title>
</head>

<body>
    <div class="container">
        <br><br>
        <header>
            <h2>Selecione uma categoria</h2>
        </header>
        <br>
        <!-- C A I X A  P A R A  E D I T A R  U M A  C A M E R A -->
        <input type="radio" class="form-check-input" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1" id="collapseExample1" checked>
        <label for="collapseExample1" role="button">Câmera</label>

        <div class="collapse" id="collapseExample1">
            <div class="card card-body" style="width: 500px;">
                <div class="btn-group-sm">
                    <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Editar
                    </button>

                    <ul class="dropdown-menu">
                        <?php
                        $cam = 'camera';
                        while ($camera = $sql_query_camera->fetch_assoc()) {
                            echo "<li><a class='dropdown-item' href='editar_hwrd.php?identificacao=$camera[identificacao]&tabela=$cam'>" .
                                $camera['nome_detalhado'];
                            echo ' (identificação : ';
                            echo $camera['identificacao'] . ')';
                            echo '</a>';;
                        } ?>
                    </ul>

                </div>
                <br>
                <a href="criar_camera.php" style="width: 80px;"><button class="btn btn-outline-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg> Criar </button></a>
            </div>
        </div>
        <br>

        <!-- C A I X A  P A R A  E D I T A R  O  M O U S E -->
        <input type="radio" class="form-check-input" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" id="collapseExample2">
        <label for="collapseExample2" role="button">Monitor</label>

        <div class="collapse" id="collapseExample2">
            <div class="card card-body" style="width: 500px;">
                <div class="btn-group-sm">
                    <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Editar
                    </button>

                    <ul class="dropdown-menu">
                        <?php
                        $moni = 'monitor';
                        while ($monitor = $sql_query_monitor->fetch_assoc()) {
                            echo "<li><a class='dropdown-item' href='editar_hwrd.php?identificacao=$monitor[identificacao]&tabela=$moni'>" .
                                $monitor['nome_detalhado'];
                            echo ' (identificação : ';
                            echo $monitor['identificacao'] . ')';
                            echo '</a>';
                        } ?>
                    </ul>

                </div>
                <br>
                <a href="criar_monitor.php" style="width: 80px;"><button class="btn btn-outline-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg> Criar </button></a>
            </div>
        </div>
        <br>

        <!-- C A I X A  P A R A  E D I T A R  O  M O U S E  -->
        <input type="radio" class="form-check-input" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3" id="collapseExample3">
        <label for="collapseExample3" role="button">Mouse</label>

        <div class="collapse" id="collapseExample3">
            <div class="card card-body" style="width: 500px;">
                <div class="btn-group-sm">
                    <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Editar
                    </button>

                    <ul class="dropdown-menu">
                        <?php
                        $mou = 'mouse';
                        while ($mouse = $sql_query_mouse->fetch_assoc()) {
                            echo "<li><a class='dropdown-item' href='editar_hwrd.php?identificacao=$mouse[identificacao]&tabela=$mou'>" .
                                $mouse['nome_detalhado'];
                            echo ' (identificação : ';
                            echo $mouse['identificacao'] . ')';
                            echo '</a>';
                        } ?>
                    </ul>

                </div>
                <br>
                <a href="criar_mouse.php" style="width: 80px;"><button class="btn btn-outline-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg> Criar </button></a>
            </div>
        </div>
        <br>

        <!-- C A I X A  P A R A  E D I T A R  O  N O T E B O O K -->
        <input type="radio" class="form-check-input" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4" id="collapseExample4">
        <label for="collapseExample4" role="button">Notebook</label>

        <div class="collapse" id="collapseExample4">
            <div class="card card-body" style="width: 500px;">
                <div class="btn-group-sm">
                    <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Editar
                    </button>

                    <ul class="dropdown-menu">
                        <?php
                        $note = 'notebook';
                        while ($notebook = $sql_query_notebook->fetch_assoc()) {
                            echo "<li><a class='dropdown-item' href='editar_hwrd.php?identificacao=$notebook[identificacao]&tabela=$note'>" .
                                $notebook['nome_detalhado'];
                            echo ' (identificação : ';
                            echo $notebook['identificacao'] . ')';
                            echo '</a>';
                            echo '</li>';
                        }
                        ?>
                    </ul>

                </div>
                <br>
                <a href="criar_notebook.php" style="width: 80px;"><button class="btn btn-outline-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg> Criar </button></a>
            </div>
        </div>
        <br>

        <!-- C A I X A  P A R A  E D I T A R  O  P R O J E T O R -->
        <input type="radio" class="form-check-input" data-bs-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5" id="collapseExample5">
        <label for="collapseExample5" role="button">Projetor</label>

        <div class="collapse" id="collapseExample5">
            <div class="card card-body" style="width: 500px;">
                <div class="btn-group-sm">
                    <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Editar
                    </button>

                    <ul class="dropdown-menu">
                        <?php
                        $pro = 'projetor';
                        while ($projetor = $sql_query_projetor->fetch_assoc()) {
                            echo "<li><a class='dropdown-item' href='editar_hwrd.php?identificacao=$projetor[identificacao]&tabela=$pro'>" .
                                $projetor['nome_detalhado'];
                            echo ' (identificação : ';
                            echo $projetor['identificacao'] . ')';
                            echo '</a>';
                        } ?>
                    </ul>

                </div>

                <br>
                <a href="criar_projetor.php" style="width: 80px;"><button class="btn btn-outline-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg> Criar </button></a>
            </div>
        </div>
        <br>

        <!-- C A I X A  P A R A  E D I T A R  O  T E C L A D O -->
        <input type="radio" class="form-check-input" data-bs-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample6" id="collapseExample6">
        <label for="collapseExample6" role="button">Outros</label>

        <div class="collapse" id="collapseExample6">
            <div class="card card-body" style="width: 500px;">
                <div class="btn-group-sm">
                    <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Editar
                    </button>

                    <ul class="dropdown-menu">
                        <?php
                        $tec = 'teclado';
                        while ($teclado = $sql_query_teclado->fetch_assoc()) {
                            echo "<li><a class='dropdown-item' href='editar_hwrd.php?identificacao=$teclado[identificacao]&tabela=$tec'>" .
                                $teclado['nome_detalhado'];
                            echo ' (identificação : ';
                            echo $teclado['identificacao'] . ')';
                            echo '</a>';
                        } ?>
                    </ul>

                </div>
                <br>
                <a href="criar_outros.php" style="width: 80px;"><button class="btn btn-outline-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg> Criar </button></a>
            </div>
        </div>
        <br>
        <!-- C A I X A  P A R A  E D I T A R  O  U S U A R I O S (em breve)-->
        <input type="radio" class="form-check-input" data-bs-toggle="collapse" href="#collapseExample8" role="button" aria-expanded="false" aria-controls="collapseExample8" id="collapseExample8" name="collapseExample8" disabled>
        <label class="form-check-label" for="collapseExample8">Usuarios (Em breve)</label>
        <div class="collapse" id="collapseExample8">
            <div class="card card-body">
                <a href="editar_hwrd"><button class="btn btn-outline-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg> Editar</button></a>
                <br>
                <a href="editar_hwrd"><button class="btn btn-outline-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg> Criar </button></a>
            </div>
        </div>
        <br>
        <br>

        <!-- B O T Õ E S  P A R A  V O L T A R-->
        <h6>Voltar pra:</h6>
        <a href="incluir.php"> <button class="btn btn-outline-primary">Página de inclusão</button></a>
        <a href="consulta.php"><button class="btn btn-outline-success">Página de consulta</button></a>
        <a href="logout.php"><button class="btn btn-outline-danger">Sair</button></a>
        <br>
        <br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>