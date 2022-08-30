<?php
	session_start();
  	include_once("../Model/Conexao.php");
  	include_once("../Model/Funcionario.class.php");
  	include_once("../Controller/Conversao.php");
	try {
  		$fun = new FuncionarioModel();
		$data_inicial=$_GET['data_inicial']." 06:00:00";
		$data_final=$_GET['data_final']." 08:00:00";

		$res=$fun->relatorio_entrada($conexao,$data_inicial,$data_final);
		$conta=1;
		$result="";
		foreach ($res as $key => $value) {
			$result.="
			<tr>
				<td>".$conta."</td>
				<td>".$value['nome']." ".$value['cargo']."</td>
				<td>".$value['matricula']."</td>";
				$result.="<td>". converte_data_hora($value['data_hora'])."</td>
			</tr>
			";
			$conta++;
		}
	echo "$result";
	} catch (Exception $e) {
		echo "Erro ou buscar dados.!". $e;	
	}
?>