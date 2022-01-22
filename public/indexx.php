<?php
 $link = mysqli_connect('localhost', 'root', '', 'alcateia');
 $sql = mysqli_query("SELECT `ID`, `nome`, `email` FROM `membros` WHERE 'nome' AND 'email'");
     /* executa a query */
     mysqli_stmt_execute($stmt);
     $nome_cookie = $_COOKIE['nome'];
       if(isset($nome_cookie)){
       echo"<h1><b>Bem-Vindo, $nome_cookie <b></h1><br>";
       echo"<h1><b>Essas informações <font color='green'>PODEM</font> ser acessadas por você:<br>";
       echo "<h3><b> $sql <b></h3><br>";

    }else{
      echo"<h1><b>Bem-Vindo, convidado <b></h1><br>";
      echo"<h1><b>Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você<b></h1>";
      echo"<h1><b><br><a href='nome.html'>Faça login</a> Para ler o conteúdo<b></h1>";
    }
?>
