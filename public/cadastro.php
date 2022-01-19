<?php

$nome = $_POST['nome'];
$email = MD5($_POST['email']);
$connect = mysqli_connect('localhost', 'root', '', 'alcateia') or die('Não foi possível conectar');
$db = mysqli_select_db($connect,'alcateia');
$query_select = "SELECT nome FROM membros WHERE nome = $nome";
$select = mysqli_query($query_select, $connect);
$array = mysqli_fetch_array($select);
$logarray = $array['nome'];

  if($nome == "" || $nome == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo nome deve ser preenchido');window.location.href='
    cadastro.html';</script>";

    }else{
      if($logarray == $nome){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse nome já existe');window.location.href='
        cadastro.html';</script>";
        die();

      }else{
        $query = "INSERT INTO usuarios (nome,email) VALUES ('$nome','$email')";
        $insert = mysql_query($query,$connect);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='nome.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";
        }
      }
    }
?>