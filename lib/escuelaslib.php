<?php

	function dbc(){
		$con = mysqli_init();
		if (!$con){
			die("mysqli_init failed");
		}
		if (!mysqli_real_connect($con, "analisis-database", "websir_r_escuela", "**********", "websir_r_escuela")){
			die("Connect Error: " . mysqli_connect_error());
		}
		if (!mysqli_set_charset($con, "utf8")) {
			printf("Error de encoding: %s\n", mysqli_error($con));
    		exit();
    	}
		return $con;
	}
	
	function dbd($db){
		mysqli_close($db);
	}
	
	function escapa($texto){
		$db = dbc();
		$regreso = mysqli_real_escape_string ($db,$texto);
		dbd($db);
		return $regreso;
	}
	
	function valida_variable($var){
		#echo "VV: $var";
		if(is_string($var) && strlen($var) == 11){
			#es CCT TURNO
			$regreso = array('tipo'=>1,'vent'=>$var);
		}elseif(((strlen($var) == 2) || (strlen($var) == 3)) && is_string($var)){
			#es generación de pdf por estado/nivel
			$regreso = array('tipo'=>2,'vent'=>$var);
		}else{
			#param inválido
			$regreso = 0;
		}
		return $regreso;
	}
?>
