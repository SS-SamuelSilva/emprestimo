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
// CASO QUEIRA CONSULTAR  A SESSÃO
#print_r($_SESSION);

//PARA QUEBRAR A SESSÃO É SÓ ATIVAR "#unset($_SESSION['usuario']); #unset($_SESSION['senha']);"
#unset($_SESSION['usuario']);
#unset($_SESSION['senha']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--I M P O R T A N D O  O  B O O T S T R A P-->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <title>Lista de Empréstimo</title>
</head>

<body>
    <div class="container table-responsive-xxl">
        <br>
        <br>
        <table class="table table table-striped container">
            <thead class="table-dark ">
                <tr>
                    <th scope="col "> ID</a></th>
                    <th scope="col ">ID do produto</th>
                    <th scope="col">Item</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Código</th>
                    <th scope="col">Número</th>
                    <th scope="col">Emprestador</th>
                    <th scope="col">Data de retirada</th>
                    <th scope="col">Data de devolução</th>
                    <th scope="col">Status</th>
                    <th scope="col">Fechar</th>
                    <th scope="col">Imprimir</th>
                </tr>
            </thead>
            <tbody>
                <?php

                //DEFININDO O NOME DAS VARIAVEIS QUE FOI PEGA PELO POST SUBMIT E COLOCANDO PARA select sql
                if (isset($_POST['submit'])) {
                    $pesquisa = $_POST['iproduto'];
                    $nproduto = $_POST['nproduto'];
                    $dproduto = $_POST['dproduto'];
                    $nreceptor = $_POST['nreceptor'];
                    $numero_receptor = $_POST['numero_receptor'];
                    $dreceptor = $_POST['dreceptor'];
                    $creceptor = $_POST['creceptor'];
                    $ndisponibilizador = $_POST['ndisponibilizador'];
                    $dentrega = $_POST['dentrega'];
                    $dretirada = $_POST['dretirada'];
                }
                $sql_code = "SELECT id,id_produto,nome_produto,descricao,nomer,codigor,numeror,nomed,datad,datar,status FROM `cadastro_produto` WHERE status LIKE '%aBER%' 
                AND id_produto LIKE '%$pesquisa%'
                AND nome_produto LIKE '%$nproduto%' 
                AND descricao LIKE '%$dproduto%'
                AND nomer LIKE '%$nreceptor%'
                AND codigor LIKE '%$creceptor%'
                AND numeror LIKE '%$numero_receptor%'
                AND nomed LIKE '%$ndisponibilizador%'
                AND datad LIKE '%$dentrega%'
                AND datar LIKE '%$dretirada%'";


                //ERRO 475 DE CONSULTA. PARA CORRIGIR VERIFIQUE A LINHA DE CÓDIGO SELECT SQL 
                $sql_query = $con->query($sql_code) or die("<br>
                <link href='./css/bootstrap.min.css' rel='stylesheet'>
                <!-- Button trigger modal -->
                    <button type='button' class='btn btn-primary invisible' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                        Ver descrição do erro
                    </button>

                    <!-- Modal -->
                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>Erro 475</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    Infelizmente tivemos um erro interno ao realizar a consulta. Por favor tente novamente. Se o problema persistir contate o administrador.
                                </div>
                                <div class='modal-footer'>
                                    <a href='consulta.php'><button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Fechar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ' crossorigin='anonymous'></script>

                <script>var botoes = document.getElementsByTagName('button')
                for (var i = 0; i < botoes.length; i++) {
                    if (botoes[i].className === 'btn btn-primary invisible') {
                        botoes[i].click();
                    }
                }</script>");

                // M O S T R A  O  E R R O  S Q L
                /*
                if (isset($con->connect_error)) {
                    echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
                }
                if(isset($con->connect_errno)){
                    echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
                }
                */

                // E R R O  83  D E  D A D O S  F O R N E C I D O S  I N C O R E T O S  P A R A  C O N S U L T A  O U  I N E X I S T E N T E (erro na parte do usuário, se fosse erro no código seria na parte de cima)
                if ($sql_query->num_rows == 0) {
                    print_r('Nenhum resultado retornado');
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
                                        <h5 class="modal-title" id="exampleModalLabel">Erro 83</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Nenhum resultado encontrado. <br>
                                        Verifique se as informaões fornecidas estão corretas. Caso esteja entre em contado com o administrador.
                                    </div>
                                    <div class="modal-footer">
                                        <a href="consulta.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button></a>
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
                    }</script>';
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

                //CASO NÃO TENHA NENHUM ERRO ELE ARMAZENARAR OS DADOS NA VARIÁVEL $dados
                if (!$sql_query->num_rows == 0) {
                    while ($dados = $sql_query->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $dados['id'] . "</th>";
                        echo "<td>" . $dados['id_produto'] . "</td>";
                        echo "<td>" . $dados['nome_produto'] . "</td>";
                        echo "<td>" . $dados['descricao'] . "</td>";
                        echo "<td>" . $dados['nomer'] . "</td>";
                        echo "<td>" . $dados['codigor'] . "</td>";
                        echo "<td>" . $dados['numeror'] . "</td>";
                        echo "<td>" . $dados['nomed'] . "</td>";
                        echo "<td>" . $dados['datar'] . "</td>";
                        echo "<td>" . $dados['datad'] . "</td>";
                        echo "<td>" . $dados['status'] . "</td>";
                        echo "<td> <a  class= btn href='fechar.php?id=$dados[id]' title='Clique aqui para mudar os status do empréstimo para fechado. (Somente faça isso quando receber o que foi emprestado).'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check2-square' viewBox='0 0 16 16'>
                            <path d='M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z'/>
                            <path d='m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z'/>
                            </svg> </a></td>";
                        echo "<td> <a class=btn  href='termo.php?id=$dados[id]' title='Imprimir termo de empréstimo'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-printer' viewBox='0 0 16 16'>
                            <path d='M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z'/>
                            <path d='M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z'/>
                            </svg></a></td>";
                        echo "</tr>";
                        $teste = $dados['id_produto'];
                    }
                } else {
                    $dados = null;
                    echo "<br>";
                    echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
                    echo "<br>";
                    echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
                }
                ?>
            </tbody>
        </table>

        <!-- B O T Õ E S  D E  S A I R -->
        <div>
            <a href="incluir.php" class="btn btn-primary">Incluir</a>

            <a href="consulta.php" class="btn btn-success">Consultar</a>

            <a href="logout.php" class="btn btn-danger">Sair</a>
            <br>
            <br>

        </div>
    </div>

    <!--S R C R I P T  B O O T S T R A P-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

</body>




</html>