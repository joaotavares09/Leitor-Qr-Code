<?php
	session_start();
  	include_once("../Model/Conexao.php");
  	include_once("../Model/Funcionario.class.php");
  	include_once("../Controller/Conversao.php");
try {
  	$fun = new FuncionarioModel();
	
	$res=$fun->ultimas_entradas($conexao);
	$conta=0;
	$result="";
	foreach ($res as $key => $value) {
		$result.="
		<tr>
			<td>".$value['nome']." - ".$value['cargo']."</td>";
		$result.="<td>". converte_data_hora($value['data_hora'])."
			</td>
		</tr>
		";
		$conta++;
	}

echo "$result";

} catch (Exception $e) {
	echo "Erro ou buscar dados";	
}	

?>