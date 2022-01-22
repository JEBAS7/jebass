<?php
$nome = $_POST['nome'];
$entrar = $_POST['entrar'];
$email = $_POST['email'];
$connect = mysqli_connect('localhost','root','','alcateia');
$db = mysqli_select_db($connect, 'alcateia');
  if (isset($entrar)) {

    $verificar = mysqli_query($connect, "SELECT * FROM `membros` WHERE
    nome = '$nome' AND email = '$email'") or die("erro ao selecionar");
      if (mysqli_num_rows($verificar)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Nome e/ou email incorretos');window.location
        .href='Nome.html';</script>";
        die();
      }else{
         
         setcookie("nome",$nome);
         header("Location:membros.php");
      }
  }
?>