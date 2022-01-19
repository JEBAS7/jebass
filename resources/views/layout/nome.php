<?php
$nome = $_POST['nome'];
$entrar = $_POST['entrar'];
$email = md5($_POST['email']);
$connect = mysql_connect('localhost','root','');
$db = mysql_select_db('alcateia');
  if (isset($entrar)) {

    $verifica = mysql_query("SELECT * FROM membro WHERE nome =
    '$nome' AND email = '$email'") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Nome e/ou email incorretos');window.location
        .href='Nome.html';</script>";
        die();
      }else{
        setcookie("nome",$nome);
        header("Location:index.php");
      }
  }
?>