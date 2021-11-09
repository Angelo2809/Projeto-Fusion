<?php

class Usuario{

    private $pdo;
    public $msgErro = '';

    public function conectar($nome, $host, $usuario, $senha){
        global  $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch(PDOException $e){
            $msgErro = $e->getMessage();
            echo "Não foi possível conectar ao banco de dados";
        }
    }

    public function cadastrar($firstName, $lastName, $email, $senha,$celNumber, $birth, $nickname, $gender){
        global  $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false; // já está cadastrado

        } else{
            $sql = $pdo->prepare("INSERT INTO  usuarios(fistname, lastname, email, senha, celnumber, birth, nickname, gender) VALUES (:n, :l, :e, :s, :c, :b, :k, :g)");
            $sql->bindValue(":n", $firstName);
            $sql->bindValue(":l", $lastName);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->bindValue(":c", $celNumber);
            $sql->bindValue(":b", $birth);
            $sql->bindValue(":k", $nickname);
            $sql->bindValue(":g", $gender);
            $sql->execute();
            return true;
        }
    }

    public function logar($email, $senha){
        global  $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){

            $dado = $sql->fetch();
            session_start();
            $_SESSION['id'] = $dado['id'];
            return true; // logado 

        }else{
            return false;

        }
    }
}

?>