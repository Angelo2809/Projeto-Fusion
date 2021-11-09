<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: login.html");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streaming</title>
    <link rel="stylesheet" href="view/css/estilo.css">
</head>
<body>
    <header>
        <div id="logo"><p>Fusion</p></div>
        <nav>
            <ul>
                <li>Filmes</li>
                <li>Séries</li>
                <li>Documentários</li>
                <li>Podcast</li>
                <li>Músicas</li>
            </ul>
        </nav>
    </header>
    <div class="conta">
        <div class="pessoal">
            <div>
                <img src="view/img/foto-2.jpeg" alt="">
                <p id="nome">Angelo Queiroz</p>
            </div>
            <ul>
                <li>Novidades</li>
                <li>Curtidos</li>
                <li>Favoritos</li>
                <li>Biblioteca</li>
            </ul>
            <div>
                <p><a href="account.html">Configurações</a></p>
                <p><a href="controller/sair.php">Sair</a></p>
            </div>
        </div>
    </div>


    <div class="container">
        <p id="cumprimento">Boa Tarde, Angelo ")</p>
        <div class="box">
            <p class="titulo-box">Não saem do seu ouvido</p>
            <div class="conteudo">
                <div class="itens">

                </div>
                <div class="itens">

                </div>
                <div class="itens">

                </div>
                <div class="itens">

                
                </div>
            </div>
        </div>
        <div class="box">
            <p class="titulo-box">Suas Playlists</p>
            <div class="conteudo">
                <div class="itens">

                </div>
                <div class="itens">

                </div>
                <div class="itens">

                
               </div>
               <div class="itens">

                
            </div>
            </div>
        </div>
        <div class="box">
            <p class="titulo-box">Suas séries em andamento</p>
            <div class="conteudo">
                <div class="itens">

                </div>
                <div class="itens">

                </div>
                <div class="itens">

                
               </div>
               <div class="itens">

                
            </div>
            </div>
        </div>
        <div class="box">
            <p class="titulo-box">Filmes que você não acabou</p>
            <div class="conteudo">
                <div class="itens">

                </div>
                <div class="itens">

                </div>
                <div class="itens">

                
               </div>
               <div class="itens">

                
            </div>
            </div>
        </div>
    </div>
</body>
</html>