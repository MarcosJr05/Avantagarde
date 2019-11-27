<?php

Class cadastro
{
  private $pdo;
  public $msgErro = "";

  public function conectar($nome, $host, $email, $senha)
  {
    global $pdo;
    try {
      $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$email,$senha);
    } catch (PDOException $e) {
      $msgErro = $e ->getMessage();

    }
        
  }

  public function cadastrar($nome,$email,$senha)
  {
    global $pdo;
    $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
    $sql ->bindValue(":e",$email);
    $sql ->execute();
    if($sql->rowCount() > 0){
      return false;
    } else{
      $sql = $pdo ->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (:n, :e, :s)");
      $sql ->bindValue(":n",$nome);
      $sql ->bindValue(":e",$email);
      $sql ->bindValue(":s",$senha);
      $sql ->execute();
      return true;
    }


  }
  public function logar()
  {
    global $pdo;
    $sql = $pdo ->prepare("SELECT id FROM cadastro WHERE email= :e AND senha = :s");
    $sql ->binValue(":e,",$email);
    $sql ->binValue(":s,",$senha);
    $sql ->execute();
    if($sql ->rowCount() >0){

      $dado = $sql->fetch();
      session_start();
      $_SESSION['id_usuario'] = $dado['id_usuario'];
      return true;

    } else {
      return false;

    }

  }

}





?>