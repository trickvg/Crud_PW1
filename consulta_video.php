<!DOCTYPE html>
<html>
<head>
<title>Consultar Videos</title>
	<!-- Ultima versao CSS compilada e minificada -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<!-- Minha versao CSS -->
	<link rel="stylesheet" href="css/meu.css">
	
	<!-- Tema opcional -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	
	<!-- Ultima versao JavaScript compilada e minificada -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/npm.js"></script>
</head>
<body>

<form name="form1" method="get" action="consulta_video.php">
	<p>
	<table class="table1">
	<tr>
		<td>

<button type="button" onclick="javascript: location.href='cadastro_video.php';" class="btn btn-primary">Novo Cadastro</button>

	  <div class="form-group">
	    <label for="pesquisa">Pesquise por titulo</label>
	    <input type="text" class="form-control" name="pesquisa" id="pesquisa" placeholder="Digite o titulo..." onblur="document.form1.submit();">
	  </div>
	  

<?php 

/** trata campo de pesquisa **/
if (isset($_GET["pesquisa"])){
	$pesquisa = $_GET["pesquisa"];
}else{
	$pesquisa = "";
}

/** Carrega a classe **/
include_once 'classes/Conexao.php';

//$conexao = new Conexao();
//$conexao->getInstance();

session_start();


try {
	
	$sql = "SELECT * FROM videos";
	$result = Conexao::getInstance()->query($sql);
	$cont = 0;

	echo "<table class=table>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Titulo</th>";
	echo "<th>Descricao</th>";
	echo "<th>Caminho</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	
	while ($lista = $result->fetch(PDO::FETCH_ASSOC)) {	

		if ($lista['caminho'] != ""){
			$caminho = $lista["caminho"];
		}


		echo "<tr>";
		echo "<td> $lista[id] </th>";
		echo "<td> $lista[titulo] </th>";
		echo "<td> $lista[descricao] </th>";
		echo "<td> $lista[caminho] </td>";
		echo "<td><video width=320 height=240 controls>  ";
		echo "<source src=caminho/".$caminho." type='video/mp4'>";
		echo "</video></td>";
		echo "</tr>";
		$cont++;
	}
	
	

} catch (Exception $e) {
	print "Ocorreu um erro ao tentar executar esta acao, foi gerado um LOG do mesmo, tente novamente mais tarde.";
}

?>


</td>
	</tr>
</table>

</form>

</body>
</html>