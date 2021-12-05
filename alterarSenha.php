<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: login.html");
        exit;
    }

    require_once 'model/usuarios.php';
    $u = new usuario;

    $u->conectar("fusion_project", "localhost", "root", "");
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
                <a href="alterarApelido.php"><p>Alterar apelido</p></a>
                <hr>
                <a href=""><p class="on">Trocar senha</p></a>
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
            <h2>Trocar senha</h2>
            <div>
                <form action="" method="post">
                    <input type="password" name="oldPass" id="oldPass" placeholder="Senha antiga" required>
                    <input type="password" name="newPass" id="newPass" placeholder="Nova senha" required>
                    <input type="submit" value="Trocar senha" id="submit-btn">
                </form>

                <!-- ----------------   Resposta do forms   ----------------------- --> 
                <?php
                    
                    $antigaSenha = addslashes($_POST['oldPass']);
                    $novaSenha = addslashes($_POST['newPass']);   
                    if($u->msgErro ==""){
                        if($u->verificarSenha($_SESSION['id'],$antigaSenha)){
                            if($u->trocarSenha($_SESSION['id'], $novaSenha)){
                                ?>
                                <div> Senha alterada com sucesso!</div>
                                <?php
                            }else{
                                ?>
                                <div class="msg-erro">Não foi possível alterar a senha!</div>
                                <?php
                            }
                        }else{
                                ?>
                                <div>A senha antiga não coincide!</div>
                                <?php
                        }
                ?>
                <!-- -------------------------------------------------------- --> 
            </div>
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