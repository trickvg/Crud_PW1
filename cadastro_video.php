<!DOCTYPE html>
<html>
<head>
<title>Insetindo video</title>
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

<p>
<table class="table1">
<tr>
	<td>	                                                            
	<form name="form1" method="POST" action="cadastro_video.php" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="titulo">Titulo</label>
	    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite o titulo...">
	  </div>
	  <div class="form-group">
	    <label for="descricao">Descricao</label>
	    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Digite a descricao...">
	  </div>
	  <div class="form-group">
	    <label for="caminho">Caminho</label>
	    <input type="file" name="caminho" id="caminho"">
	  </div>	  
	  
	  <button type="submit" class="btn btn-success">Salvar</button><button type="button" onclick="javascript: location.href='consulta_video.php';" class="btn btn-danger">Voltar</button>
	</form>
	
	</td>
	</tr>
</table>	

<?php 

if (isset($_POST["titulo"])){
	$titulo = $_POST["titulo"];
}else{
	$titulo = "";
}

if (isset($_POST["descricao"])){
	$descricao = $_POST["descricao"];
}else{
	$descricao = "";
}


if (isset($_FILES["caminho"])){
	//1º vamos criar uma variável para armazenar o endereço do arquivo no seu computador.
	$nome_temporario = $_FILES["caminho"]["tmp_name"];
	//2º Vamos criar uma segunda variável onde essa receberá como valor o nome do arquivo.
	$nome_real = str_replace(" ", "_", $_FILES["caminho"]["name"]);
	$caminho = $nome_real;
	//3º Copy("Endereço_local_do aquivo", "Endereço_de_destino/nome_que_o_arquivo_recebera");
	copy($nome_temporario,"caminho/".$nome_real);
}else{
	$caminho = "";
}


$id = 0;

/** Carrega a classe **/
include_once 'classes/Conexao.php';
include_once 'classes/Video.php';


if (($titulo != "")&&($descricao != "")&&($caminho != "")){
	
	//$conexao = new Conexao();
	//$conexao->getInstance();
	
	$video = new Video($id, $titulo, $descricao, $caminho);
	$video->Inserir($video);
	
}

?>

</body>
</html>