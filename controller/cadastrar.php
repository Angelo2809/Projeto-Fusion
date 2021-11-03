<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    


<?php
    require_once 'usuarios.php';
    $u = new usuario;
    
    $firstName = addslashes($_POST['first-name']);
    $lastName = addslashes($_POST['last-name']);
    $email = addslashes($_POST['email']);
    $confirmEmail = addslashes($_POST['confirm-email']);
    $senha = addslashes($_POST['password']);
    $confirmarSenha =addslashes($_POST['confirm-password']);
    $celNumber = addslashes($_POST['cel-number']);
    $birth = addslashes($_POST['nascimento']);
    $nickname = addslashes($_POST['apelido']);
    $gender = addslashes($_POST['select'])
    
    //verificacao se esta vazio por php
        
        $u->conectar("projeto_fusion", "localhost", "root", "");
        if($u->msgErro == ''){ //ok
            if($senha == $confirmarSenha){
                if($email == $confirmEmail){
                    if($u->cadastrar($firstName, $lastName, $email, $senha,$celNumber ,$birth, $nickname, $gender)){
                        ?>
                        <div class="msg-erro">cadastrado com sucesso</div> 
                        <?php
                    }else{
                        ?>
                        <div class="msg-erro">Email já cadastrado</div> 
                        <?php
                    }
                }else {
                    ?>
                    <div class="msg-erro">Os emails não correspodem!</div> 
                    <?php
                }
            }else{
                ?>
                <div class="msg-erro">As senhas não correspondem!</div> 
                <?php
            }
        } else{
            echo "Erro :".$u->msgErro;
        }
    
?>
</body>
</html>