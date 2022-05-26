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

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--I M P O R T A N D O  O  B O O T S T R A P-->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <title>Contulta empréstimo</title>
</head>

<body>
    <div class="container">
        <div>
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                    <br>
                    <h4>Preencha um dos campos para realizar a consulta</h4>
                    <br>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <form action="resultado_consulta.php" method="POST" class="row g-3">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">ID do produto:</label>
                <input type="text" class="form-control" id="inputEmail4" name="iproduto" maxlength="" placeholder="Service tags ou algo único">
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Nome do produto:</label>
                <input type="text" class="form-control" id="inputPassword4" name="nproduto" maxlength="50" placeholder="O que você emprestou ?">
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Descrição do produto:</label>
                <input type="text" class="form-control" id="inputAddress" name="dproduto" maxlength="200" placeholder="Como ele estava ?">
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nome do receptor:</label>
                <input type="text" class="form-control" id="inputEmail4" name="nreceptor" placeholder="Foi destinado a quem ?">
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Número do receptor:</label>
                <input type="text" class="form-control" id="telefone" name="numero_receptor" placeholder="(XX) XXXXX-XXXX">
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Documento do receptor:</label>
                <input type="text" class="form-control" id="cpf" name="dreceptor" placeholder="XXX.XXX.XXX-XX" onkeyup="mascara_cpf()">
            </div>

            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Código do receptor:</label>
                <input type="text" class="form-control" id="inputPassword4" name="creceptor" maxlength="11" placeholder="RA">
            </div>

            <div class="col-md-4">
                <label for="inputCity" class="form-label">Nome do disponibilizador:</label>
                <input type="text" class="form-control" id="inputCity" name="ndisponibilizador" maxlength="60" placeholder="Seu nome">
            </div>

            <div class="col-md-4">
                <label for="inputState" class="form-label">data de entrega:</label>
                <input type="date" class="form-control" id="inputState" name="dentrega">
            </div>

            <div class="col-md-4">
                <label for="inputZip" class="form-label">data de retirada:</label>
                <input type="date" class="form-control" id="inputState" name="dretirada">
            </div>
            <div class="d-grid gap-2">
                <br>
                <button class="btn btn-primary" name=" submit" type="submit">Consultar</button>
                <br>
            </div>
        </form>

        <!--B O T Õ E S  P A R A  S A I R -->
        <div class="d-grid gap-2">
            <a href="incluir.php" class="btn btn-secondary">Incluir</a>
            <br>
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
    </div>

    <!--S R C R I P T  B O O T S T R A P-->
    <script src="https://cdn.jsdeivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- S R C I P T  D E  M A S C A R A -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#cpf").mask("000.000.000-00");
            $("#telefone").mask("(00) 00000-0000");
        });
    </script>
</body>

</html>