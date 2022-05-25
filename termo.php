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

//QUERY SQL PARA TRAZER OS DADOS QUE VEIO DA PÁGINA consulta_termo.php
if (isset($_GET['id'])) {
    $id_consulta = $_GET['id'];
}
$sql_code = "SELECT id, id_produto, nomer, nome_produto, datar  FROM cadastro_produto WHERE id LIKE '$id_consulta'";
$sql_query = $con->query($sql_code) or die("Erro de consulta");

//fetch_assoc É ONDE BUSCA OS DADOS JUNTAMENTE COM A $sql_query SENDO ARMAZENADA NO $dados
$dados = $sql_query->fetch_assoc();

//MUDANDO O FORMATO DA Data
#$data = new DateTime();
#echo $data->format('d-m-Y');

//AQUI O RESULTADO SEMPRE TEM QUE DAR 1 POIS É A QUANTIDADE DE LINHAS QUE FOI BUSCADA NO BANCO DE DADOS
#print_r(mysqli_num_rows($sql_query));

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <title></title>
</head>

<body>
    <div class="container">
        <!--GUIA CLIENTE-->
        <div>
            <div class="g-start-2">
                <h5>
                    <b> TERMO DE EMPRÉSTIMO/DELOVUÇÃO #<?php print_r($dados['id']) ?></b>
                </h5>
            </div>
            <div class="">
                <p>Emprestado para: <b> <?php print_r($dados['nomer']); ?></b></p>
                <p>Departamento:_______________________________</p>
                <p>Objeto: <b> <?php print_r($dados['nome_produto']) ?></b></p>
                <p>Retirado por:___________________________________</p>
                <p>Data de empréstimo: <b> <?php print_r($dados['datar']) ?></b></p>
                <p>Assinatura:
                    <br>
                    ______________________________________________________________________________________________________
                </p>
            </div>
            <div>
                <p>Devolvido em: ____/____/______</p>
                <p>Por:______________________________________________</p>
                <p>Assinatura TI:
                    <br>

                    ______________________________________________________________________________________________________
                </p>
                <button type="button" value="Print this page button" class="invisible" onClick="window.print()"></button>
                <script>
                    var botoes = document.getElementsByTagName("button");
                    for (var i = 0; i < botoes.length; i++) {
                        if (botoes[i].className === "invisible") {
                            botoes[i].click();
                        }
                    }
                </script>
            </div>
            <p>---------------------------------------------------------------------------------------------------------</p>
        </div>

        <!--GUIA DEPARTAMENTO DE TECNOLOGIA-->
        <div>
            <div class="g-start-2">
                <h5>
                    <b> EMPRÉSTIMO #<?php print_r($dados['id']) ?></b>
                </h5>
                <p>
                    <b> DEPARTAMENTO DE TECNOLOGIA</b>
                </p>
            </div>
            <div class="">
                <p>Emprestado para: <b> <?php print_r($dados['nomer']); ?></b></p>
                <p>Departamento:_______________________________</p>
                <p>Objeto: <b> <?php print_r($dados['nome_produto']) ?></b></p>
                <p>Retirado por:___________________________________</p>
                <p>Data de empréstimo: <b> <?php print_r($dados['datar']) ?></b></p>
                <p>Assinatura:
                    <br>
                    ______________________________________________________________________________________________________
                </p>
            </div>
            <div>
                <p>Devolvido em: ____/____/______</p>
                <p>Por:______________________________________________</p>
                <p>Assinatura TI:
                    <br>
                    ______________________________________________________________________________________________________
                </p>
                <button type="button" value="Print this page button" class="invisible" onClick="window.print()"></button>
                <script>
                    var botoes = document.getElementsByTagName("button");
                    for (var i = 0; i < botoes.length; i++) {
                        if (botoes[i].className === "invisible") {
                            botoes[i].click();
                        }
                    }
                </script>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>