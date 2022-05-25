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


// A LÓGICA PARA FECHAR É BEM SIMPLES, A PÁGINA resultado_consulta.php SÓ VAI BUSCAR LINHAS QUE TENHAM O status aberto. ESSE CÓDIGO ABAIXO PEGA PELO ID ENVIADO PELO METODO GET E EDITA O status DE ABERTO PARA fechado FAZENDO ASSIM COM QUE ELE NÃO SEJA SELECIONADO NO select POIS O select TEM UM like%aberto%

// A T U A L I Z A  A  C O L U N A  status  P A R A  Fechado
$sql_update = "UPDATE `cadastro_produto` SET status ='Fechado' WHERE id LIKE " . $_GET['id'];

echo ($_GET['id']);
$resultado = mysqli_query($con, $sql_update) or die('Não foi possivel mudar o status erro: 2293');

// R E T O R N A  P A R A  O  R E S U L T A D O  D A  C O N S U L T A
header('Location: resultado_consulta.php');

if ($resultado) {
    echo "atualização ok";
} else {
}
