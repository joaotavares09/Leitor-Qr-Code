<?php
	session_start();
  	include_once("../Model/Conexao.php");
  	include_once("../Model/Funcionario.class.php");
try {
  	$fun = new FuncionarioModel();
	$matricula = $_GET['qrcode'];
	$res=$fun->pesquisar_funcionario_por_matricula($conexao,$matricula);
	$conta=0;
	$nome="";
	$funcionario_id="";
	$matricula="";
	foreach ($res as $key => $value) {
		$funcionario_id=$value['id'];
		$nome=$value['nome']." ".$value['cargo'];
		$matricula=$value['matricula'];
		$conta++;
	}
	if ($conta>0) {
		$fun->registrar_entrada($conexao,$funcionario_id);
		echo "$nome/$matricula";

	}else{
		echo "erro";
	}

} catch (Exception $e) {
	echo "erro";	
}	

?>