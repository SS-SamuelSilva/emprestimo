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
    $id_produto = $_GET['identificacao'];
    $notebook = $_GET['tabela'];

    $query_sql = "SELECT * FROM $notebook WHERE identificacao LIKE '$id_produto'";
    $sql_query = $con->query($query_sql) or die("Erro de consulta");
    $dados = $sql_query->fetch_assoc();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Editar <?php echo $dados['nome_detalhado']; ?></title>
</head>

<body>
    <br>
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
            </div>
            <div class="col-md-4">
                <h2>Editar <?php echo $dados['nome_detalhado']; ?></h2>
            </div>
            <div class="col">
            </div>
        </div>
        <form class="" method="GET" action="editar.php" oninput="x.value=parseInt(a.value)+parseInt(b.value)">Service tag:</legend>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Item sem service tag ? Melhor colocar alguma antes que alguem veja" name="service_tag" value="<?php echo $dados['identificacao'] ?? null; ?>">

            </div>
            <br>
            <div class="col-3">
                <label for="floatingInput">Modelo: </label>
                <input type="text" class="form-control" id="floatingInput" placeholder="O que é isso que você vai emprestar ?" name="modelo" value="<?php echo $dados['nome_detalhado'] ?? null; ?>">
            </div>
            <br>
            <legend>Descrição:</legend>
            <div class="col-3">
                <textarea type="text" class="form-control" id="floatingInput" placeholder="As condições do item mudou ? Não se esqueça de comunicar a todos caso tenha mudado para negativo." name="descricao"><?php echo $dados['descricao'] ?? null; ?></textarea>
            </div>
            <br>
            <legend>Qualidade:</legend>
            <input type="number" id="b" value="0.1" class="invisible">
            <div class="col-2">
                <input type="range" id="a" value="50" class="form-range" name="qualidade">
            </div>
            <label for="">Qualidade de vídeo:</label>
            <output name="x" for="a b">50</output>
            <label for="">% (Somente para câmeras e/ou webcams).</label>
            <br>
            <legend>Processador:</legend>
            <div class="col-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="processador" value="<?php echo $dados['processador'] ?? null; ?>">
            </div>
            <br>
            <legend>Memória RAM:</legend>
            <div class="col-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="memoria_ram" value="<?php echo $dados['memora_ram'] ?? null; ?>">
            </div>
            <br>
            <legend>Bateria (em %):</legend>
            <div class="col-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="bateria" value="<?php echo $dados['bateria'] ?? null; ?>">
            </div>
            <br>
            <legend>Nome no domínio:</legend>
            <div class="col-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Digite aqui" name="dominio" value="<?php echo $dados['dominio'] ?? null; ?>">
            </div>
            <br>
            <div class="invisible">
                <input type="text" class="form-control" id="floatingInput" name="tabela" value="<?php echo $notebook = $_GET['tabela'] ?? null; ?>">
            </div>
            <div class="row g-3">
                <div class="col-1">
                    <button type="submit" name="submit" class="btn btn-outline-success">Editar</button>
                </div>
                <br>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger col-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Excluir
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar exclussão ?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja excluir ? Essa ação não poderar ser desfeita!
                            </div>
                            <div class="modal-footer">
                                <?php
                                echo "
                                    <a href=deletar.php?identificacao=$id_produto&tabela=$notebook>
                                        <button type='button' class='btn btn-danger'>Deletar</button>
                                    </a>";
                                ?>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>
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
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>