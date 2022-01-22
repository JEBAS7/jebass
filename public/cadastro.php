<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$connect = mysqli_connect('localhost', 'root', '', 'alcateia') or die('Não foi possível conectar');
$db = mysqli_select_db($connect, 'alcateia');
$query_select = "SELECT nome FROM membros WHERE nome = '$nome'";
$select = mysqli_query($connect, $query_select);
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
        $query = "INSERT INTO membros (nome,email) VALUES ('$nome','$email')";
        $insert = mysqli_query($connect, $query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Membro cadastrado com sucesso!');window.location.
          href='nome.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse membro');window.location
          .href='cadastro.html'</script>";
        }
      }
    }
?>
