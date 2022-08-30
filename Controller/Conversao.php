<?php 
date_default_timezone_set('America/Sao_Paulo');

	function converte_data_hora($data){
	    return date("d/m/Y H:i:s", strtotime($data));

	}

	function converte_data($data){
	    return date("d/m/Y", strtotime($data));
	}

	function converte_idade($data){

		   list($ano, $mes, $dia) = explode('-', $data);

	    // data atual
	    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
	    // Descobre a unix timestamp da data de nascimento do fulano
	    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

	    // cálculo
	    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
	 return $idade;
	 }

	 function converte_tempo_espera($data){
		  $start_date = new DateTime($data);
		  $since_start = $start_date->diff(new DateTime(date("Y-m-d H:i:s")));
		  $tempo= $since_start->h.":".$since_start->i.":".$since_start->s;
	 	return $tempo." ";
	 }

?>