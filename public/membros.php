<?php
// definições de host, database, usuário e senha
$host = "localhost";
$db   = "alcateia";
$user = "root";
$pass = "";
// conecta ao banco de dados
$con = mysqli_connect($host, $user, $pass) or trigger_error(mysqli_error (),E_USER_ERROR);
// seleciona a base de dados em que vamos trabalhar
mysqli_select_db($con, $db);
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT ID, nome, email FROM membros");
// executa a query
$dados = mysqli_query($con, $query) or die(mysqli_error());
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>

<html>
	<head>
	<title>Membros</title>

</head>
<body>
<?php
    $nome_cookie = $_COOKIE['nome'];
    if(isset($nome_cookie)){
    echo"<h1><b>Bem-Vindo, $nome_cookie <b></h1><br>";
    echo"<h2><b>Essas informações <font color='green'>PODEM</font> ser acessadas por você:<b></h2><br><br>";
    echo"<h2><b>===MEMBROS===$$$====E-MAILS==========<b></h2><br>";
    }else{
    echo"<h1><b>Bem-Vindo, convidado <b></h1><br>";
    echo"<h3><b>Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você<b></h3>";
    echo"<h2><b><br><a href='nome.html'>Faça login</a> Para ler o conteúdo<b></h2>";
    }
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
?>
			<p><?=$linha['nome']?> $$$ <?=$linha['email']?></p>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if
	}
?>
</body>
</html>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>
