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
            <div class="photo-name">
                <img src="view/img/foto-2.jpeg" height="250px">
                <h2><?php echo $dado['fistname']. " ". $dado['lastname'] ?></h2>
            </div>
            <div class="btns">
                <hr>
                <a href="account.php"><p>Visão Geral</p></a>
                <hr>
                <a href=""><p class="on">Alterar apelido</p></a>
                <hr>
                <a href="alterarSenha.php"><p>Trocar senha</p></a>
                <hr>
                <a href=""><p>Planos Disponíveis</p></a>
                <hr>
                <a href=""><p>Configurações de pagamento</p></a>
                <hr>
            </div>
            <div class="delete">
                <a href="deletarConta.php"><p>Excluir conta</p></a>
            </div>
        </div>
        
        <div class="info">
            <h2>Alterar apelido</h2>
            <form action="" method="post">
                <input type="text" name="apelido" id="apelido" placeholder="Novo apelido" required>
                <input type="submit" value="Alterar apelido" id="submit-btn">
            </form>
            <?php    
                    $novoApelido = addslashes($_POST['apelido']);
                    if($u->trocarApelido($_SESSION['id'], $novoApelido)){
                        ?>
                        <div class="return-forms"> Apelido alterado com sucesso!</div>
                        <?php
                    }else{
                        ?>
                        <div class="return-forms">Não foi possível alterar o apelido</div>
        </div>
    </section>
</body>
</html>


<?php
    }
    }else{
        ?>
            <div class="msg-erro">Erro com o banco de dados!</div>
            <?php
            echo "Erro: ".$u->msgErro;
    }
?>