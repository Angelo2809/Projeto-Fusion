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
    <link rel="stylesheet" href="view/css/style-home.css">
</head>
<body>
    <header>
        <h1>Fusion</h1>
        <ul>
            <li><a href="">Músicas</a></li>
            <li><a href="">Filmes</a></li>
            <li><a href="">Option 3</a></li>
            <li><a href="">Option 4</a></li>

        </ul>
        <p>Boa tarde, <?php echo $dado['nickname'] ?></p> <!-- Apelido do usuário  -->
    </header>
    <div class="config">
        <h2>Menu</h2>
        <div class="config-area">
            <div id="img-area">
                <img src="view/img/foto-2.jpeg" height="250px">
                <p><?php echo $dado['fistname']. " ". $dado['lastname'] ?></p> <!-- Nome do usuário  -->
            </div>
            <div>
                <ul>
                    <li>Playlists</li>
                    <li>Option2</li>
                    <li>Option3</li>
                    <li>Option4</li>
                    <li><a href="account.php">Configurações</a></li>
                </ul>
            </div>
            <p><a href="controller/sair.php">Deslogar</a></p>
        </div>
    </div>
    <div class="txt-busca">
        <p>Qual é a boa de hoje?</p>
        <form action="">
            <input type="search" name="busca" id="busca">
        </form>
    </div>
    <div class="container">
        <p>Últimos acessos</p>
        <div class="cards">
            <div class="card">
                <img src="view/img/exemplo-card.jpg" alt="">
                <p>N.A.D.A. B.O.M. Part 3</p>
                <p>Costa Gold</p>
            </div>
            <div class="card">
                <img src="view/img/exemplo-card.jpg" alt="">
                <p>N.A.D.A. B.O.M. Part 3</p>
                <p>Costa Gold</p>
            </div>
        </div>
    </div>
    <div class="container">
        <p>Suas Músicas</p>
        <div class="cards">
            <div class="card">
                <img src="view/img/exemplo-card.jpg" alt="">
                <p>N.A.D.A. B.O.M. Part 3</p>
                <p>Costa Gold</p>
            </div>
            <div class="card">
                <img src="view/img/exemplo-card.jpg" alt="">
                <p>N.A.D.A. B.O.M. Part 3</p>
                <p>Costa Gold</p>
            </div>
        </div>
    </div>
    <div class="container">
        <p>Seus filmes inacabados</p>
        <div class="cards">
            <div class="card">
                <img src="view/img/exemplo-card.jpg" alt="">
                <p>N.A.D.A. B.O.M. Part 3</p>
                <p>Costa Gold</p>
            </div>
            <div class="card">
                <img src="view/img/exemplo-card.jpg" alt="">
                <p>N.A.D.A. B.O.M. Part 3</p>
                <p>Costa Gold</p>
            </div>
        </div>
    </div>
    <div class="container">
        <p>Assista novamente</p>
        <div class="cards">
            <div class="card">
                <img src="view/img/exemplo-card.jpg" alt="">
                <p>N.A.D.A. B.O.M. Part 3</p>
                <p>Costa Gold</p>
            </div>
            <div class="card">
                <img src="view/img/exemplo-card.jpg" alt="">
                <p>N.A.D.A. B.O.M. Part 3</p>
                <p>Costa Gold</p>
            </div>
        </div>
    </div>
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