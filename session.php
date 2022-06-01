<?php
//CONEXÃO COM O BD
include_once('conexao.php');
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



if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    # MOSTRAR USUARIO E SENHA DIGITADO
    //echo $usuario;
    //echo $senha;



    //C O N S U L T A  SQL  N A  T A B E L A  U S U Á R I O
    $sql = "SELECT * FROM usuarios WHERE usuario LIKE '$usuario' AND senha LIKE '$senha'";
    $result = $con->query($sql);

    // E R R O  333  D E  U S U Á R I O  I N C O R R E T O
    if (mysqli_num_rows($result) < 1) {
        print_r('Usuário ou senha não encontrado');
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        echo '<br>';
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
                    <h5 class="modal-title" id="exampleModalLabel">Erro 333</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Usuário ou senha incorreto. <br> Por favor tente novamente.
                </div>
                <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button></a>
                </div>
            </div>
        </div>
    </div>';
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>';

        echo '<script>var botoes = document.getElementsByTagName("button");
    for (var i = 0; i < botoes.length; i++) {
    if (botoes[i].className === "btn btn-primary invisible") {
        botoes[i].click();
    }
    }</script>';
    }
    // C A S O  O  L O G I N  D E  C E R T O  R E D I R E C I O N A  P A R A  O N D E  Q U E  O  header(abaxio)  M A N D A
    else {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        print_r('Conectado com sucesso');
        header('Location: resultado_consulta.php');
    }
} //else {
    //header('Location: index.php');
//}
