<?php
include_once('conexao.php');

if (isset($_GET['submit'])) {
    //  D E F I N I N D O  O  N O M E  D O S  I N P U T S  E M  V A R I A V E I S
    $tabela = $_GET['tabela'];
    $foreign_key_id = $_GET['identificacao'];
    print_r($tabela);
    print_r("<br>");
    print_r($foreign_key_id);

    if($tabela =='camera'){
        $service_tag = $_GET['service_tag'];
        $modelo = $_GET['modelo'];
        $descricao = $_GET['descricao'];
        $qualidade = $_GET['qualidade'];
        $update_sql = "UPDATE camera SET identificacao = '$service_tag', nome_detalhado = '$modelo', descricao = '$descricao', qualidade = '$qualidade'";
        $update_query = mysqli_query($con, $update_sql);

        // C A S O  S E J A  A T U A L I Z A D O  N O  B A N C O 
        if ($update_query) {
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
                                <h5 class="modal-title" id="exampleModalLabel">Atualizado com sucesso!</h5>
                                <a href="inserir_hardw.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                                Parabéns o objeto <strong class="fw-bold">' . $modelo . '</strong> foi atualizado com sucesso.
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
        } else {
            // C A S O  D E  E R R O  D E  A T U A L I Z A Ç Ã O  D E  D A D O S
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
                                <h5 class="modal-title" id="exampleModalLabel">Erro 19113</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Infelizmente tivemos um erro interno.<br>
                                Entre em contado com o administrador.
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

            if (isset($con->connect_error)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
            if (isset($con->connect_errno)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
        }
    }

    if ($tabela == 'monitor') {
        $identificacao = $_GET['service_tag'];
        $nome_detalhado = $_GET['modelo'];
        $descricao = $_GET['descricao'];

        $update_sql = "UPDATE monitor SET identificacao = '$identificacao', nome_detalhado = '$nome_detalhado', descricao = '$descricao'";
        $update_query = mysqli_query($con, $update_sql);

        // C A S O  S E J A  A T U A L I Z A D O  N O  B A N C O 
        if ($update_query) {
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
                                <h5 class="modal-title" id="exampleModalLabel">Atualizado com sucesso!</h5>
                                <a href="inserir_hardw.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                                Parabéns o objeto <strong class="fw-bold">' . $identificacao . '</strong> foi atualizado com sucesso.
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
        } else { // C A S O  N Ã O  S E J A  A T U A L I Z A D O
            // C A S O  D E  E R R O  D E  A T U A L I Z A Ç Ã O  D E  D A D O S
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
                                <h5 class="modal-title" id="exampleModalLabel">Erro 19113</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Infelizmente tivemos um erro interno.<br>
                                Entre em contado com o administrador.
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

            if (isset($con->connect_error)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
            if (isset($con->connect_errno)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
        }
    }

    if ($tabela == 'mouse') {
        $identificacao = $_GET['service_tag'];
        $nome_detalhado = $_GET['modelo'];
        $descricao = $_GET['descricao'];
        $update_sql = "UPDATE mouse SET identificacao = '$identificacao', nome_detalhado = '$nome_detalhado', descricao = '$descricao'";
        $update_query = mysqli_query($con, $update_sql);

        // C A S O  S E J A  A T U A L I Z A D O  N O  B A N C O 
        if ($update_query) {
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
                                <h5 class="modal-title" id="exampleModalLabel">Atualizado com sucesso!</h5>
                                <a href="inserir_hardw.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                                Parabéns o objeto <strong class="fw-bold">' . $identificacao . '</strong> foi atualizado com sucesso.
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
        } else { // C A S O  N Ã O  S E J A  A T U A L I Z A D O
            // C A S O  D E  E R R O  D E  A T U A L I Z A Ç Ã O  D E  D A D O S
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
                                <h5 class="modal-title" id="exampleModalLabel">Erro 19113</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Infelizmente tivemos um erro interno.<br>
                                Entre em contado com o administrador.
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

            if (isset($con->connect_error)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
            if (isset($con->connect_errno)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
        }
    }

    if ($tabela == 'notebook') {
        $service_tag = $_GET['service_tag'];
        $modelo = $_GET['modelo'];
        $descricao = $_GET['descricao'];
        $processador = $_GET['processador'];
        $memora_ram = $_GET['memoria_ram'];
        $bateria = $_GET['bateria'];
        $dominio = $_GET['dominio'];
        $update_sql = "UPDATE notebook SET identificacao = '$service_tag', nome_detalhado = '$modelo', descricao = '$descricao', processador = '$processador', memora_ram = '$memora_ram', bateria = '$bateria', dominio = '$dominio' 
        WHERE identificacao LIKE '$foreign_key_id'";
        $update_query = mysqli_query($con, $update_sql);

        // C A S O  S E J A  A T U A L I Z A D O  N O  B A N C O 
        if ($update_query) {
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
                                <h5 class="modal-title" id="exampleModalLabel">Atualizado com sucesso!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Parabéns o objeto <strong class="fw-bold">' . $modelo . '</strong> foi atualizado com sucesso.
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
        } else {
            // C A S O  D E  E R R O  D E  A T U A L I Z A Ç Ã O  D E  D A D O S
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
                                <h5 class="modal-title" id="exampleModalLabel">Erro 19113</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Infelizmente tivemos um erro interno.<br>
                                Entre em contado com o administrador.
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

            if (isset($con->connect_error)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
            if (isset($con->connect_errno)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
        }
    }

    if ($tabela == 'projetor') {
        $service_tag = $_GET['service_tag'];
        $modelo = $_GET['modelo'];
        $descricao = $_GET['descricao'];
        $qualidade = $_GET['qualidade'];
        $update_sql = "UPDATE camera SET identificacao = '$service_tag', nome_detalhado = '$modelo', descricao = '$descricao', qualidade = '$qualidade'";
        $update_query = mysqli_query($con, $update_sql);

        // C A S O  S E J A  A T U A L I Z A D O  N O  B A N C O 
        if ($update_query) {
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
                                <h5 class="modal-title" id="exampleModalLabel">Atualizado com sucesso!</h5>
                                <a href="inserir_hardw.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                                Parabéns o objeto <strong class="fw-bold">' . $modelo . '</strong> foi atualizado com sucesso.
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
        } else {
            // C A S O  D E  E R R O  D E  A T U A L I Z A Ç Ã O  D E  D A D O S
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
                                <h5 class="modal-title" id="exampleModalLabel">Erro 19113</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Infelizmente tivemos um erro interno.<br>
                                Entre em contado com o administrador.
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

            if (isset($con->connect_error)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
            if (isset($con->connect_errno)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
        }
    }

    if ($tabela == 'outros') {
        $service_tag = $_GET['service_tag'];
        $modelo = $_GET['modelo'];
        $descricao = $_GET['descricao'];
        $qualidade = $_GET['qualidade'];
        $update_sql = "UPDATE camera SET identificacao = '$service_tag', nome_detalhado = '$modelo', descricao = '$descricao', qualidade = '$qualidade'";
        $update_query = mysqli_query($con, $update_sql);

        // C A S O  S E J A  A T U A L I Z A D O  N O  B A N C O 
        if ($update_query) {
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
                                <h5 class="modal-title" id="exampleModalLabel">Atualizado com sucesso!</h5>
                                <a href="inserir_hardw.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                                Parabéns o objeto <strong class="fw-bold">' . $modelo . '</strong> foi atualizado com sucesso.
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
        } else {
            // C A S O  D E  E R R O  D E  A T U A L I Z A Ç Ã O  D E  D A D O S
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
                                <h5 class="modal-title" id="exampleModalLabel">Erro 19113</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Infelizmente tivemos um erro interno.<br>
                                Entre em contado com o administrador.
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

            if (isset($con->connect_error)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
            if (isset($con->connect_errno)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
        }
    }

    //U S U A R I O S  E M  B R E V E 
/*
    if ($tabela == 'monitor') {
        $service_tag = $_GET['service_tag'];
        $modelo = $_GET['modelo'];
        $descricao = $_GET['descricao'];
        $qualidade = $_GET['qualidade'];
        $update_sql = "UPDATE camera SET identificacao = '$service_tag', nome_detalhado = '$modelo', descricao = '$descricao', qualidade = '$qualidade'";
        $update_query = mysqli_query($con, $update_sql);

        // C A S O  S E J A  A T U A L I Z A D O  N O  B A N C O 
        if ($update_query) {
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
                                <h5 class="modal-title" id="exampleModalLabel">Atualizado com sucesso!</h5>
                                <a href="inserir_hardw.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                            </div>
                            <div class="modal-body">
                                Parabéns o objeto <strong class="fw-bold">' . $modelo . '</strong> foi atualizado com sucesso.
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
        } else {
            // C A S O  D E  E R R O  D E  A T U A L I Z A Ç Ã O  D E  D A D O S
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
                                <h5 class="modal-title" id="exampleModalLabel">Erro 19113</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Infelizmente tivemos um erro interno.<br>
                                Entre em contado com o administrador.
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

            if (isset($con->connect_error)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
            if (isset($con->connect_errno)) {
                echo "Erro: (" . $con->connect_errno . ")" . $con->connect_error;
            }
        }
    }
    */
}
