<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: login.html");
        exit;
    }

    require_once 'model/usuarios.php';
    $u = new usuario;

    $u->conectar("fusion_project", "localhost", "root", "");
    if($u->msgErro ==""){
        $dado = $u->recuperarDados($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fusion</title>
    <link rel="stylesheet" href="view/css/style-config.css">
    <link rel="stylesheet" href="view/css/style-change.css">
    
</head>
<body>
    <header>
        <h1>Fusion</h1>
        <nav>
            <ul>
                <li><a href="">Suporte</a></li>
                <li><a href="acesso.php">Voltar pra sei lá</a></li>
                <li><?php

                        echo $dado['nickname'];
                    ?>
                </li>
            </ul>
        </nav>
    </header>
    <section class="container">
        <div class="menu">
            <div>
                <div id="img-area">
                <img src="view/img/foto-2.jpeg" height="250px">
                <p><?php echo $dado['fistname']. " ". $dado['lastname'] ?></p>
            </div>

            </div>
            <div class="btns">
                <hr>
                <a href="account.php"><p>Visão Geral</p></a>
                <hr>
                <a href="alterarApelido.php"><p>Alterar apelido</p></a>
                <hr>
                <a href="alterarSenha.php"><p>Trocar senha</p></a>
                <hr>
                <a href=""><p>Planos Disponíveis</p></a>
                <hr>
                <a href=""><p>Configurações de pagamento</p></a>
                <hr>
            </div>
        </div>
        
        <div class="info">
            <h2>Excluir conta</h2>
            <form action="" method="post">
                <input type="password" name="password" id="password" placeholder="Digite sua senha" required>
                <input type="checkbox" name="confirm" id="confirm" required> <p>Desejo realmente excluir minha conta e toda a base de dados já registrada no Fusion!</p>
                <input type="submit" value="Deletar Conta" id="submit-btn">
            </form>
        </div>
    </section>
</body>
</html>

<?php
    }else{
        ?>
            <div class="msg-erro">Erro com o banco de dados!</div>
            <?php
            echo "Erro: ".$u->msgErro;
    }
?>