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

// A Q U I  É  D E C L A R A D O  A S  V A R I Á V E I S  Q U E  V Ã O  S E R  P E G A D A S  D O  I N P U T  E  V Ã O  P A R A  O  B A N C O  D E  D A D O S
if (isset($_POST['submit'])) {
    include_once ('conexao.php') ?? null;
    $iproduto = $_POST['idproduto'];
    $dproduto = $_POST['dproduto'];
    $nreceptor = $_POST['nreceptor'];
    $numero_receptor = $_POST['numero_receptor'];
    $dreceptor = $_POST['dreceptor'];
    $creceptor = $_POST['creceptor'];
    $ndisponibilizador = $_POST['ndisponibilizador'];
    $dentrega = $_POST['dentrega'];
    $dretirada = $_POST['dretirada'];

    // A Q U I  É  O  input  Q U E  F A Z  A  L E I T U R A  D O S  D A D O S  D O  N O M E  D O  P R O D U T O  Q U E  A P A R E C E  N A  P A R T E  D E  "Selecione um hardware"
    // E S S A  V A R I Á V E L   É  I M P O R T A N T E  P A R A  Q U E  O  C A M P O  item  N A  P Á G I N A  resultado_consulta.php  E S T E J A  P R E E N C H I D O
    $select_tens_detalhados = $_POST['select_tens_detalhados'];

    $result = mysqli_query($con, "INSERT INTO cadastro_produto(id_produto,nome_produto,descricao,nomer,numeror,cpfr,codigor,nomed,datar,datad)
    VALUES ('$iproduto', '$select_tens_detalhados', '$dproduto', '$nreceptor', '$numero_receptor', '$dreceptor', '$creceptor', '$ndisponibilizador', '$dentrega', '$dretirada')");
    print('<br>');

    //CASO O CADASTRO SEJA REALIZADO COM SUCESSO
    if ($result) {
        echo '<br>';
        // I N C L U I N D O  O  C S S
        echo '    <link href="./css/bootstrap.min.css" rel="stylesheet">';
        echo '    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary invisible" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ver descrição do erro
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sucesso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Cadastro realizado com sucesso
                </div>
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
}</script>';

        // CASO HAJA ERRO NO CADASTRO

    } else {
        //ERRO 39
        echo '<br>';
        // I N C L U I N D O  O  C S S
        echo '    <link href="./css/bootstrap.min.css" rel="stylesheet">';
        echo '    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary invisible" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ver descrição do erro
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Erro 39</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Não foi possível cadastrar! <br>
                    Verifique se todos os campos foram digitados corretamente e tente novamente.
                </div>
                <div class="modal-footer">
                    <a href="incluir.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button></a>
                </div>
            </div>
        </div>
    </div>';

        // M O S T R A  O  E R R O  S Q L

        if (isset($con->connect_error)) {
            echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
        }
        if (isset($con->connect_errno)) {
            echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
        }


        // I N C L U I N D O  O  S C R I P T  C S S
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>';

        // S C R I P T  P A R A  A P A R E C E R  O  P O P  U P 
        echo '<script>var botoes = document.getElementsByTagName("button");
for (var i = 0; i < botoes.length; i++) {
    if (botoes[i].className === "btn btn-primary invisible") {
        botoes[i].click();
    }
}</script>';
    }
}

// A T E N Ç Ã O

// T O D O S  O S  select  S Ã O  P A R A  A P A R E C E R  O  N O M E  D O S  I T E N S  N A  P A R T E "Selecione um modelo"  N A  P Á G I N A incluir.php

$sql_select_camera = "SELECT identificacao, nome_detalhado FROM camera";
$sql_query_camera = $con->query($sql_select_camera);
$sql_query_idcamera = $con->query($sql_select_camera);

$sql_select_monitor = "SELECT identificacao, nome_detalhado FROM monitor";
$sql_query_monitor = $con->query($sql_select_monitor);
$sql_query_idmonitor = $con->query($sql_select_monitor);

$sql_select_mouse = "SELECT identificacao, nome_detalhado FROM mouse";
$sql_query_mouse = $con->query($sql_select_mouse);
$sql_query_idmouse = $con->query($sql_select_mouse);

$sql_select_notebook = "SELECT identificacao, nome_detalhado FROM notebook";
$sql_query_notebook = $con->query($sql_select_notebook);
$sql_query_idnotebook = $con->query($sql_select_notebook);

$sql_select_projetor = "SELECT identificacao, nome_detalhado FROM projetor";
$sql_query_projetor = $con->query($sql_select_projetor);
$sql_query_idprojetor = $con->query($sql_select_projetor);

$sql_select_teclado = "SELECT identificacao, nome_detalhado FROM outros";
$sql_query_teclado = $con->query($sql_select_teclado);
$sql_query_idteclado = $con->query($sql_select_teclado);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- I N C L U S Ã O  D O  C S S -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- A R Q U I V O  C S S  Q U E  D E I X A  O S  "*"  V E R M E L H O S -->
    <link href="./css/vermelinho.css" rel="stylesheet">

    <!-- S C R I P T  P A R A  O  F U N C I O N A M E N T O  D O S  input  Q U E  E S T Ã O  I N T E R L I G A D O S-->
    <!--OS INPUTS INTERLIGADOS NESSE CASO É OS DOIS SELECTS QUE DEPENDEM UM DO OUTRO PARA FUNCIONAR-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Controle empréstimo</title>
</head>

<body>
    <div class="container">
        <!--H E A D E R -->
        <div class="row align-items-center">
            <div class="col">
            </div>

            <div class="col">
                <br>
                <h1>Realizar inclusão</h1>
                <br>
            </div>

            <div class="col">
            </div>

        </div>
        <!-- F O R M U L A R I O-->
        <form action="incluir.php" method="post" class="row g-3">
            <!--D A T A  L I S T  I D  D O  P R O D U T O-->
            <div class="col-md-2">
                <label for="browser" class="form-label">ID do produto:</label>
                <br>
                <input list="browsers" name="idproduto" id="browser" class="form-control" placeholder="Digite para pesquisar...">
                <datalist id="browsers">
                    <?php

                    // I S T O  É  P A R A  A P A R E C E R  O  N O M E  D O  id do produto  Q U E  E S T Ã O  E M  T O D A S  A S  T A B E L A S  D O  B A N C O
                    // C A D A  while  U M  É  R E S P O N S Á V E L  P O R  T R A Z E R  O  id do produto  D E  U M A  T A B E L A  D I F E R E N T E
                    while ($idnotebook = $sql_query_idnotebook->fetch_assoc()) {
                        echo '<option>' . $idnotebook['identificacao'];
                        echo '</option>';
                    }

                    while ($idteclado = $sql_query_idteclado->fetch_assoc()) {
                        echo '<option>' . $idteclado['identificacao'];
                        echo '</option>';
                    }

                    while ($idprojetor = $sql_query_idprojetor->fetch_assoc()) {
                        echo '<option>' . $idprojetor['identificacao'];
                        echo '</option>';
                    }

                    while ($idmouse = $sql_query_idmouse->fetch_assoc()) {
                        echo '<option>' . $idmouse['identificacao'];
                        echo '</option>';
                    }

                    while ($idmonitor = $sql_query_idmonitor->fetch_assoc()) {
                        echo '<option>' . $idmonitor['identificacao'];
                        echo '</option>';
                    }

                    while ($idcamera = $sql_query_idcamera->fetch_assoc()) {
                        echo '<option>' . $idcamera['identificacao'];
                        echo '</option>';
                    }
                    ?>
                </datalist>
            </div>

            <!--I N P U T  D E S C R I C A O  D O  P R O D U T O-->
            <div class="col-10">
                <label for="inputAddress" class="form-label">Observação do equipamento:</label>
                <input type="text" class="form-control" id="inputAddress" name="dproduto" maxlength="200" placeholder="Quais condições do produto ?">
            </div>

            <!-- S E L E C T  T I P O  D E  I T E M -->
            <div class="col-6">
                <select class="form-select" aria-label="Default select example" name='select_tens' autofocus>
                    <option disabled selected>Selecione um hardware</option>
                    <option value='camera'>Câmera</option>
                    <option value='monitor'>Monitor</option>
                    <option value='mouse'>Mouse</option>
                    <option value='notebook'>Notebook</option>
                    <option value='projetor'>Projetor</option>
                    <option value='teclado'>Outros</option>
                </select>
            </div>
            <div class="col-4">
                <select class="form-select" aria-label="Default select example" name='select_tens_detalhados'>
                    <option value="" disabled selected>Selecione um modelo</option>
                </select>

                <!--S E L E C T  C A M E R A-->
                <div class="hidden select_tens_detalhados-fcamera">
                    <select>
                        <option value="" disabled selected place>Selecione um modelo</option>
                        <?php
                        // S E L E C T  C A M E R A
                        while ($camera = $sql_query_camera->fetch_assoc()) {
                            echo '<option>' . $camera['nome_detalhado'];
                            echo ' (Identificação : ';
                            echo $camera['identificacao'] . ')';
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!--S E L E C T  M O N I T O R-->
                <div class="hidden select_tens_detalhados-fmonitor">
                    <select>
                        <option value="" disabled selected place>Selecione um modelo</option>
                        <?php
                        while ($monitor = $sql_query_monitor->fetch_assoc()) {
                            echo '<option>' . $monitor['nome_detalhado'];
                            echo ' (Identificação : ';
                            echo $monitor['identificacao'] . ')';
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!--S E L E C T  M O U S E-->
                <div class="hidden select_tens_detalhados-fmouse">
                    <select>
                        <option value="" disabled selected place>Selecione um modelo</option>
                        <?php
                        while ($mouse = $sql_query_mouse->fetch_assoc()) {
                            echo '<option>' . $mouse['nome_detalhado'];
                            echo ' (Identificação : ';
                            echo $mouse['identificacao'] . ')';
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!--S E L E C T  N O T E B O O K-->
                <div class="hidden select_tens_detalhados-fnotebook">
                    <select>
                        <option value="" disabled selected place>Selecione um modelo</option>
                        <?php
                        while ($notebook = $sql_query_notebook->fetch_assoc()) {
                            echo '<option>' . $notebook['nome_detalhado'];
                            echo ' (Identificação : ';
                            echo $notebook['identificacao'] . ')';
                            echo '</option>';
                        }

                        ?>
                    </select>
                </div>

                <!--S E L E C T  P R O J E T O R-->
                <div class="hidden select_tens_detalhados-fprojetor">
                    <select>
                        <option value="" disabled selected place>Selecione um modelo</option>
                        <?php
                        while ($projetor = $sql_query_projetor->fetch_assoc()) {
                            echo '<option>' . $projetor['nome_detalhado'];
                            echo ' (Identificação : ';
                            echo $projetor['identificacao'] . ')';
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!--S E L E C T  T E C L A D O-->
                <div class="hidden select_tens_detalhados-fteclado">
                    <select>
                        <option value="" disabled selected place>Selecione um modelo</option>
                        <?php
                        while ($teclado = $sql_query_teclado->fetch_assoc()) {
                            echo '<option>' . $teclado['nome_detalhado'];
                            echo ' (Identificação : ';
                            echo $teclado['identificacao'] . ')';
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- L I N K  P A R A  P Á G I N A  D E  A D I C I O N A R  O U  E D I T A R -->
            <div class="col-2">
                <a href="inserir_hardw.php" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z" />
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                    </svg>
                    </svg>HRDW</a>
            </div>

            <!--S C R I P T  D O S  S E L E C T S-->
            <script>
                $(function() {

                    $('.hidden').hide();

                    $('select[name=select_tens_detalhados]').html($('div.select_tens_detalhados-f1').html());


                    $('select[name=select_tens]').change(function() {
                        var id = $('select[name=select_tens]').val();

                        $('select[name=select_tens_detalhados]').empty();

                        $('select[name=select_tens_detalhados]').html($('div.select_tens_detalhados-f' + id).html());

                    });

                });
            </script>

            <!--I N P U T  D E  Q U E M  V AI  R E C E B E R-->
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nome de quem vai receber:<span class="vermelinho">*</span></label>
                <input type="text" class="form-control" id="inputEmail4" name="nreceptor" required placeholder="Quem vai receber ?">
            </div>

            <!--I N P U T  N U M E R O  D E  Q U E M  V A I  R E C E B E R-->
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Número de quem vai receber:<span class="vermelinho">*</span></label>
                <input type="text" class="form-control" id="telefone" name="numero_receptor" required maxlength="60" placeholder="Número de celular com DDD">
            </div>

            <!--I N P U T  C P F  D E  Q U E M  V A I  R E C E B E R-->
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">CPF da pessoa que vai receber:<span class="vermelinho">*</span></label>
                <input type="text" class="form-control" id="cpf" name="dreceptor" required maxlength="14" placeholder="XXX.XXX.XXX-XX" onkeyup="mascara_cpf()">
            </div>

            <!--I N P U T  R A  D E  Q U E M  V A I  R E C E B E R-->
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">RA de quem está recebendo:<span class="vermelinho">*</span></label>
                <input type="text" class="form-control" id="inputPassword4" name="creceptor" required maxlength="11" placeholder="RA">
            </div>

            <!--I N P U T  Q U E M  E S T A  E M P R E S T A N D O-->
            <div class="col-md-4">
                <label for="inputCity" class="form-label">Quem está emprestado ?<span class="vermelinho">*</span></label>
                <input type="text" class="form-control" id="inputCity" name="ndisponibilizador" required maxlength="60" placeholder="Seu nome">
            </div>

            <!--I N P U T  D A T A  D E  E N T R E G A-->
            <div class="col-md-4">
                <label for="inputState" class="form-label">data de entrega:<span class="vermelinho">*</span></label>
                <input type="date" class="form-control" id="inputState" name="dentrega" required>
            </div>

            <!--I N P U T  D A T A  Q U E  T E M  Q U E  S E R  D E V O L V I D O-->
            <div class="col-md-4">
                <label for="inputZip" class="form-label">data de devolução:</label>
                <input type="date" class="form-control" id="inputState" name="dretirada">
            </div>

            <!--B O T A O  D E  E N V I A R -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name='submit'>Incluir</button>
            </div>

            <!--B O T A O  D E  C O N S U L T A R-->
            <div class="d-grid gap-2">
                <a href="./consulta.php" class="btn btn-secondary">Consultar</a>
            </div>

        </form>
        <br>

        <!--B O T A O  S A I R-->
        <div class="d-grid gap-2">
            <a class="btn btn-danger" href="logout.php">Sair</a>
        </div>
    </div>

    <!--S C R I P T  P A R A  N A O  A P A R E C E R  A  C A I X A  P O P  U P   Q U E  R E E N V I A  O  F O R M U L A R I O-->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <!--S C R I P T  B O O T S T R A P-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>


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