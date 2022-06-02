<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <br>
            <br>
            <h3>
                Login
            </h3>
            <br>
        </div>
        <form action="session.php" method="POST" class="row g-3">
            <div class="row">

                <div class="col-6">
                    <label for="staticEmail2" class="visually-hidden">Usuário</label>
                    <input type="text" class="form-control" id="inputPassword2" placeholder="User" name="usuario">
                </div>
                <div class="col-6">
                    <label for="inputPassword2" class="visually-hidden">Senha</label>
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="senha">
                    <br>
                </div>

                <div class="text-center">
                    <button type=" submit" class="btn btn-primary mb-3" name="submit">Entrar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- S C R I P T  js  P A R A  css-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>