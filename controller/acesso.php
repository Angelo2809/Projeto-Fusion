<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: index.html");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>Imagem by pexels</div>
    <div id="areaAcessada">Login realizado com sucesso!!!</div>
    <p><a href="sair.php">deslogar</a></p>
</body>
</html>