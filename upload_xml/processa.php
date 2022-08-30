<?php
	include_once("../Model/Conexao_Mysqli.php");
	ini_set('max_execution_time', 0);

	$filename = 'C:/adcionar.csv';
	if (file_exists($filename)) {
		if(mysqli_query($conn, "LOAD DATA INFILE '$filename' INTO TABLE funcionario FIELDS TERMINATED BY ';' LINES TERMINATED  BY 
			'\n' IGNORE 1 ROWS")){
			echo "Carregado com Sucesso!";
		}
		else{
			echo "Não foi possivel carregar dados!";
		}
	}
	else{
		echo "ARQUIVO NÃo EXISTE!";
	}



	// if(!empty($_FILES['arquivo']['tmp_name'])){
	// 	$arquivo = new DomDocument;
	// 	$arquivo->load($_FILES['arquivo']['tmp_name']);
	// 	$linhas = $arquivo->getElementsByTagName("Row");
	// 	$primeira_linha = true;
	// 	foreach($linhas as $linha){
	// 		if($primeira_linha == false){
	// 			$nome = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
	// 			echo "Nome: $nome <br>";
	// 			$sobrenome = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
	// 			echo "Sobrenome: $sobrenome <br>";
	// 			$cpf = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
	// 			echo "CPF: $cpf <br>";
	// 			$matricula = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
	// 			echo "Matricula: $matricula <br>";
	// 			$status = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
	// 			echo "Status: $status <br>";
	// 			echo "<hr>";
	// 			$result_usuario = "INSERT INTO teste(nome, sobrenome, cpf, matricula, status) VALUES ('$nome', '$sobrenome', '$cpf', '$matricula', '$status')";
	// 			$resultado_usuario = mysqli_query($conn, $result_usuario);
	// 			//$resultado_usuario->query($conexao, $result_usuario);
	// 			header("location:../View/administrador.php?status=1");
	// 		}
	// 		$primeira_linha = false;
	// 	}
	// 	header("location:../View/scanner.php?status=1");
	// }
?>