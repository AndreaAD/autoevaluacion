<?php
	error_reporting(0);
	session_start();

    include '../Modelo/PLM_Plan_Modelo.php';
	$instancia = new Plan;
	$informe = $instancia->informe_analisis($_SESSION['pk_proceso'])->GetRows();
	//$facultades = $instancia->lista_facultades()->GetRows();
	var_dump($informe);
	exit();
	
	if(count($informe) > 0){
		if ($_SESSION['pk_fase'] == '6'){
			require_once("../Vista/PLM_informe_analisis_Vista.php");
		}else{
			echo "
			<div class='aletra-fase'>
		    	<p></p>
		    </div>";
		}
	}else{
		echo "
		<div class='aletra-fase'>
		    	<p>El proceso actual no ha generado un análisis causal.</p>
		</div>";
	}

		

?>