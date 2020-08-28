<?php
	include("./lib/escuelaslib.php");
	#valido variable de entrada
	$arrv = valida_variable(strtoupper(escapa($_REQUEST['va'])));
	#Reactivos sec
	#$reactivos = array("1_5_LYC","1_11_LYC","1_12_LYC","1_13_LYC","1_14_LYC","1_20_LYC","1_24_LYC","1_27_LYC","1_28_LYC","1_35_LYC","1_42_LYC","1_46_LYC","1_49_LYC","2_6_LYC","2_8_LYC","2_10_LYC","2_18_LYC","2_25_LYC","3_3_LYC","3_22_LYC","3_29_LYC","3_31_LYC","3_40_LYC","3_43_LYC","3_45_LYC","4_1_LYC","4_4_LYC","4_16_LYC","4_17_LYC","4_23_LYC","4_26_LYC","4_33_LYC","4_36_LYC","4_37_LYC","4_41_LYC","5_7_LYC","5_9_LYC","5_15_LYC","5_19_LYC","5_34_LYC","5_38_LYC","5_39_LYC","5_44_LYC","5_47_LYC","5_50_LYC","1_1_MAT","1_3_MAT","1_4_MAT","1_5_MAT","1_6_MAT","1_7_MAT","1_8_MAT","1_9_MAT","1_27_MAT","1_28_MAT","1_29_MAT","1_30_MAT","1_31_MAT","1_32_MAT","1_33_MAT","1_34_MAT","2_10_MAT","2_11_MAT","2_12_MAT","2_35_MAT","2_36_MAT","2_37_MAT","3_13_MAT","3_14_MAT","3_15_MAT","3_16_MAT","3_17_MAT","3_18_MAT","3_19_MAT","3_20_MAT","3_21_MAT","3_22_MAT","3_23_MAT","3_24_MAT","3_25_MAT","3_38_MAT","3_39_MAT","3_40_MAT","3_41_MAT","3_42_MAT","3_43_MAT","3_44_MAT","3_45_MAT","3_46_MAT","3_47_MAT","3_48_MAT","3_49_MAT","3_50_MAT");
	$reactivos = array("1_1_LYC","1_10_LYC","1_11_LYC","1_12_LYC","1_13_LYC","1_14_LYC","1_15_LYC","1_17_LYC","1_18_LYC","1_19_LYC","1_2_LYC","1_20_LYC","1_21_LYC","1_22_LYC","1_23_LYC","1_25_LYC","1_26_LYC","1_27_LYC","1_28_LYC","1_29_LYC","1_3_LYC","1_30_LYC","1_31_LYC","1_32_LYC","1_33_LYC","1_35_LYC","1_36_LYC","1_37_LYC","1_38_LYC","1_39_LYC","1_4_LYC","1_41_LYC","1_42_LYC","1_43_LYC","1_44_LYC","1_45_LYC","1_46_LYC","1_47_LYC","1_48_LYC","1_49_LYC","1_50_LYC","1_6_LYC","1_7_LYC","1_9_LYC","2_16_LYC","2_24_LYC","2_34_LYC","2_40_LYC","2_5_LYC","2_8_LYC","1_11_MAT","1_12_MAT","1_13_MAT","1_14_MAT","1_15_MAT","1_16_MAT","1_17_MAT","1_18_MAT","1_36_MAT","1_37_MAT","1_38_MAT","1_39_MAT","1_40_MAT","1_41_MAT","1_42_MAT","1_43_MAT","2_19_MAT","2_20_MAT","2_21_MAT","2_22_MAT","2_23_MAT","2_24_MAT","2_25_MAT","2_44_MAT","2_45_MAT","2_46_MAT","2_47_MAT","2_48_MAT","2_49_MAT","2_50_MAT","3_1_MAT","3_10_MAT","3_2_MAT","3_26_MAT","3_27_MAT","3_28_MAT","3_29_MAT","3_3_MAT","3_30_MAT","3_31_MAT","3_32_MAT","3_33_MAT","3_34_MAT","3_35_MAT","3_4_MAT","3_5_MAT","3_6_MAT","3_7_MAT","3_8_MAT","3_9_MAT");
	if(is_array($arrv)){
		#si es válida la variable CCT+TURNO
		$escuela = $arrv['vent'];
		$con = dbc();
		#saco los datos de la escuela
		$qw = "select * from escuelas_dgiai_sec where ESCUELA = '$escuela'";
		$res_escuela = mysqli_query($con,$qw);
		#si existe la escuela en la base procedo a buscar las escuelas de la zona si no termino
		if(mysqli_num_rows($res_escuela)){
			
			#saco el catálogo de reactivos
			#$qw = "select * from reactivos_sec_lyc_2017";
			#$res_reactivos = mysqli_query($con,$qw);
			#for($i=0;$i<mysqli_num_rows($res_reactivos);$i++){
			#	$texto_reactivo_lyc[$i] = mysqli_fetch_array($res_reactivos);
			#}
			#
			#$qw = "select * from reactivos_sec_mat_2017";
			#$res_reactivos = mysqli_query($con,$qw);
			#for($i=0;$i<mysqli_num_rows($res_reactivos);$i++){
			#	$texto_reactivo_mat[$i] = mysqli_fetch_array($res_reactivos);
			#}
			#if($datos_escuela['MUESTRA']=="S"){
				$datos_escuela = mysqli_fetch_array($res_escuela);
				if($datos_escuela['POR_ASPECTO1_MAT']<40){
					$datos_escuela['COLOR_ASPECTO1_MAT'] = "FB4F57";
				}elseif($datos_escuela['POR_ASPECTO1_MAT']>=40&&$datos_escuela['POR_ASPECTO1_MAT']<60){
					$datos_escuela['COLOR_ASPECTO1_MAT'] = "FDD16C";
				}else{
					$datos_escuela['COLOR_ASPECTO1_MAT'] = "6ACB9C";
				}
				if($datos_escuela['POR_ASPECTO2_MAT']<40){
					$datos_escuela['COLOR_ASPECTO2_MAT'] = "FB4F57";
				}elseif($datos_escuela['POR_ASPECTO2_MAT']>=40&&$datos_escuela['POR_ASPECTO2_MAT']<60){
					$datos_escuela['COLOR_ASPECTO2_MAT'] = "FDD16C";
				}else{
					$datos_escuela['COLOR_ASPECTO2_MAT'] = "6ACB9C";
				}
				
				if($datos_escuela['POR_ASPECTO3_MAT']<40){
					$datos_escuela['COLOR_ASPECTO3_MAT'] = "FB4F57";
				}elseif($datos_escuela['POR_ASPECTO3_MAT']>=40&&$datos_escuela['POR_ASPECTO1_MAT']<60){
					$datos_escuela['COLOR_ASPECTO3_MAT'] = "FDD16C";
				}else{
					$datos_escuela['COLOR_ASPECTO3_MAT'] = "6ACB9C";
				}
				
				if($datos_escuela['POR_ASPECTO1_LYC']<40){
					$datos_escuela['COLOR_ASPECTO1_LYC'] = "FB4F57";
				}elseif($datos_escuela['POR_ASPECTO1_LYC']>=40&&$datos_escuela['POR_ASPECTO1_LYC']<60){
					$datos_escuela['COLOR_ASPECTO1_LYC'] = "FDD16C";
				}else{
					$datos_escuela['COLOR_ASPECTO1_LYC'] = "6ACB9C";
				}
				
				if($datos_escuela['POR_ASPECTO2_LYC']<40){
					$datos_escuela['COLOR_ASPECTO2_LYC'] = "FB4F57";
				}elseif($datos_escuela['POR_ASPECTO2_LYC']>=40&&$datos_escuela['POR_ASPECTO2_LYC']<60){
					$datos_escuela['COLOR_ASPECTO2_LYC'] = "FDD16C";
				}else{
					$datos_escuela['COLOR_ASPECTO2_LYC'] = "6ACB9C";
				}
			
				$r_lyc = 0;
				$r_mat = 0;
				for($j=0;$j<100;$j++){
					##error_log($j);
					$esta = $reactivos[$j];
					#error_log("R:".$reactivos[$j]);
					if($j<=50){
						if($datos_escuela["$esta"]!= -99.0000000000){
							$datos_reac = explode("_", $esta);
							$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["num_reactivo"] = intval($datos_reac[1]);
							$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["val_reactivo"] = $datos_escuela["$esta"];
							$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["eje_reactivo"] = intval($datos_reac[0]);
							#SACO EL TEXTO DEL REACTIVO
							$qw = "select TEXTO from reactivos_sec_lyc_2017 where EJE = '".$datos_reac[0]."' and REACTIVO = '".$datos_reac[1]."'";
							#error_log($qw);
							$res_reactivos = mysqli_query($con,$qw);
							$texto_reactivo_lyc = mysqli_fetch_array($res_reactivos);
							$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["txt_reactivo"] = $texto_reactivo_lyc[0];
							if($datos_escuela["$esta"]<40){
								$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["color_reactivo"] = "FB4F57";
							}elseif($datos_escuela["$esta"]>=40&&$datos_escuela["$esta"]<60){
								$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["color_reactivo"] = "FDD16C";
							}else{
								$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["color_reactivo"] = "6ACB9C";
							}
							#error_log("LYC $r_lyc Var: $esta Eje:".$datos_reac[0]." Num R:".$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["num_reactivo"]." Val:".$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["val_reactivo"]." Color:".$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["color_reactivo"]." TXT: ".$datos_escuela["reac_lyc"][$datos_reac[0]][$r_lyc]["txt_reactivo"]);
							$r_lyc ++;
						}
					}else{
						if($datos_escuela["$esta"]!= -99.0000000000){
							$datos_reac = explode("_", $esta);
							##error_log("ARR:".$datos_reac[1]);
							$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["num_reactivo"] = intval($datos_reac[1]);
							$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["val_reactivo"] = $datos_escuela["$esta"];
							$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["eje_reactivo"] = intval($datos_reac[0]);
							#SACO EL TEXTO DEL REACTIVO
							$qw = "select TEXTO from reactivos_sec_mat_2017 where EJE = '".$datos_reac[0]."' and REACTIVO = '".$datos_reac[1]."'";
							$res_reactivos = mysqli_query($con,$qw);
							$texto_reactivo_mat = mysqli_fetch_array($res_reactivos);
							$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["txt_reactivo"] = $texto_reactivo_mat[0];
							if($datos_escuela["$esta"]<40){
								$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["color_reactivo"] = "FB4F57";
							}elseif($datos_escuela["$esta"]>=40&&$datos_escuela["$esta"]<60){
								$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["color_reactivo"] = "FDD16C";
							}else{
								$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["color_reactivo"] = "6ACB9C";
							}
							#error_log("MAT $r_mat Var: $esta Eje:".$datos_reac[0]." Num R:".$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["num_reactivo"]." Val:".$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["val_reactivo"]." Color:".$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["color_reactivo"]." TXT: ".$datos_escuela["reac_mat"][$datos_reac[0]][$r_mat]["txt_reactivo"]);
							$r_mat ++;
						}
					}
				}
				
				for($j=1;$j<4;$j++){
					$inicio = $j*5-5;
					$fin = $j*5;
					for($i=$inicio;$i<$fin;$i++){
						$reac_mat_values[$datos_escuela['reac_mat'][$j][$i]['eje_reactivo']."_".$datos_escuela['reac_mat'][$j][$i]['num_reactivo']."_".$datos_escuela['reac_mat'][$j][$i]['color_reactivo']] = $datos_escuela['reac_mat'][$j][$i]['val_reactivo'];
						$reac_mat_val[$i] = $datos_escuela['reac_mat'][$j][$i]['eje_reactivo']."_".$datos_escuela['reac_mat'][$j][$i]['num_reactivo'];
						#error_log($reac_mat_values[$datos_escuela['reac_mat'][$j][$i]['eje_reactivo']."_".$datos_escuela['reac_mat'][$j][$i]['num_reactivo']]."=".$datos_escuela['reac_mat'][$j][$i]['val_reactivo']);
					}
				}
				#error_log(print_r($reac_mat_values));
				asort($reac_mat_values);
				#error_log("V1:".$reac_mat_values[0]);
				#error_log(print_r($reac_mat_val));
				$llaves_mat = array_keys($reac_mat_values);
				$i=0;
				$j=0;
				$k=0;
				$l=0;
				foreach($llaves_mat as $este){
					#error_log("ESTEMEROL: $este");
					$reac_part = explode("_",$este);
					#$este = $reac_part[0]."_".$reac_part[1];
					#error_log("ESTEMEROL2: $este");
					$color = $reac_part[2];
					$qw = "select TEXTO from reactivos_sec_mat_2017 where EJE = '".$reac_part[0]."' and REACTIVO = '".$reac_part[1]."'";
					#error_log("ESTEMEROL: $este QW: $qw");
					$res_reactivos = mysqli_query($con,$qw);
					$texto_reactivo_mat = mysqli_fetch_array($res_reactivos);
					$arr_txt[$i] = $texto_reactivo_mat[0];
					if(preg_match('/^1_/',$este)){
						$m1[$j]="['".$arr_txt[$i]."',".sprintf('%.2f',$reac_mat_values[$este]).",'".sprintf('%.2f%%',$reac_mat_values[$este])."','#".$color."']";
						$j++;
					}
					if(preg_match('/^2_/',$este)){
						$m2[$k]="['".$arr_txt[$i]."',".sprintf('%.2f',$reac_mat_values[$este]).",'".sprintf('%.2f%%',$reac_mat_values[$este])."','#".$color."']";
						$k++;
					}
					if(preg_match('/^3_/',$este)){
						$m3[$l]="['".$arr_txt[$i]."',".sprintf('%.2f',$reac_mat_values[$este]).",'".sprintf('%.2f%%',$reac_mat_values[$este])."','#".$color."']";
						$l++;
					}
					$i++;
				}
				
				
				for($j=1;$j<3;$j++){
					$inicio = $j*5-5;
					$fin = $j*5;
					for($i=$inicio;$i<$fin;$i++){
						$reac_lyc_values[$datos_escuela['reac_lyc'][$j][$i]['eje_reactivo']."_".$datos_escuela['reac_lyc'][$j][$i]['num_reactivo']."_".$datos_escuela['reac_lyc'][$j][$i]['color_reactivo']] = $datos_escuela['reac_lyc'][$j][$i]['val_reactivo'];
						$reac_lyc_num[$i]=$datos_escuela['reac_lyc'][$j][$i]['num_reactivo'];
						#error_log($reac_lyc_values[$datos_escuela['reac_lyc'][$j][$i]['eje_reactivo']."_".$datos_escuela['reac_lyc'][$j][$i]['num_reactivo']]."=".$datos_escuela['reac_lyc'][$j][$i]['val_reactivo']);
					}
				}
				#error_log(print_r($reac_lyc_values));
				asort($reac_lyc_values);
				#error_log(print_r($reac_lyc_values));
				#error_log(print_r($reac_mat_values));
				$llaves_lyc = array_keys($reac_lyc_values);
				$i=0;
				$j=0;
				$k=0;
				$l=0;
				$m=0;
				$n=0;
				foreach($llaves_lyc as $este){
					#error_log("ESTEMEROL: $este");
					$reac_part = explode("_",$este);
					#$este = $reac_part[0]."_".$reac_part[1];
					#error_log("ESTEMEROL2: $este");
					$color = $reac_part[2];
					$qw = "select TEXTO from reactivos_sec_lyc_2017 where EJE = '".$reac_part[0]."' and REACTIVO = '".$reac_part[1]."'";
					#error_log("ESTEMEROL: $este QW: $qw");
					$res_reactivos = mysqli_query($con,$qw);
					$texto_reactivo_lyc = mysqli_fetch_array($res_reactivos);
					$arr_txt[$i] = $texto_reactivo_lyc[0];
					if(preg_match('/^1_/',$este)){
						$l1[$j]="['".$arr_txt[$i]."',".sprintf('%.2f',$reac_lyc_values[$este]).",'".sprintf('%.2f%%',$reac_lyc_values[$este])."','#".$color."']";
						$j++;
					}
					if(preg_match('/^2_/',$este)){
						$l2[$k]="['".$arr_txt[$i]."',".sprintf('%.2f',$reac_lyc_values[$este]).",'".sprintf('%.2f%%',$reac_lyc_values[$este])."','#".$color."']";
						$k++;
					}
					if(preg_match('/^3_/',$este)){
						$l3[$l]="['".$arr_txt[$i]."',".sprintf('%.2f',$reac_lyc_values[$este]).",'".sprintf('%.2f%%',$reac_lyc_values[$este])."','#".$color."']";
						$l++;
					}
					if(preg_match('/^4_/',$este)){
						$l4[$m]="['".$arr_txt[$i]."',".sprintf('%.2f',$reac_lyc_values[$este]).",'".sprintf('%.2f%%',$reac_lyc_values[$este])."','#".$color."']";
						$m++;
					}
					if(preg_match('/^5_/',$este)){
						$l5[$n]="['".$arr_txt[$i]."',".sprintf('%.2f',$reac_lyc_values[$este]).",'".sprintf('%.2f%%',$reac_lyc_values[$este])."','#".$color."']";
						$n++;
					}
					$i++;
				}
			#}
			
			
			#error_log("TIPOO:".$datos_escuela['TIPO']);
			if($datos_escuela['TIPO']!="Comunitaria"){
				$zona = $datos_escuela['CV_CCT'];
				if($datos_escuela['MAT_M']>$datos_escuela['PROM_MAT']){
					$txt1 = "mayor";
				}elseif($datos_escuela['MAT_M']<$datos_escuela['PROM_MAT']){
					$txt1 = "menor";
				}else{
					$txt1="igual";
				}
				if($datos_escuela['LYC_M']>$datos_escuela['PROM_LYC']){
					$txt2 = "mayor";
				}elseif($datos_escuela['LYC_M']<$datos_escuela['PROM_LYC']){
					$txt2 = "menor";
				}else{
					$txt2="igual";
				}
				if($datos_escuela['MAT_M']>$datos_escuela['MAT_M_PRENT']){
					$txt3 = "mayor";
				}elseif($datos_escuela['MAT_M']<$datos_escuela['MAT_M_PRENT']){
					$txt3 = "menor";
				}else{
					$txt3="igual";
				}
				if($datos_escuela['LYC_M']>$datos_escuela['LYC_M_PRENT']){
					$txt4 = "mayor";
				}elseif($datos_escuela['LYC_M']<$datos_escuela['LYC_M_PRENT']){
					$txt4 = "menor";
				}else{
					$txt4="igual";
				}
				$qw = "SELECT PROM_LYC, PROM_MAT, LYC_M, MAT_M, ESCUELA FROM `escuelas_dgiai_sec` WHERE CV_CCT = '$zona'";
			}else{
				$zona = $datos_escuela['ENT'];
				if($datos_escuela['MAT_M']>$datos_escuela['PROM_MAT_COM']){
					$txt1 = "mayor";
				}elseif($datos_escuela['MAT_M']<$datos_escuela['PROM_MAT_COM']){
					$txt1 = "menor";
				}else{
					$txt1="igual";
				}
				if($datos_escuela['LYC_M']>$datos_escuela['PROM_LYC_COM']){
					$txt2 = "mayor";
				}elseif($datos_escuela['LYC_M']<$datos_escuela['PROM_LYC_COM']){
					$txt2 = "menor";
				}else{
					$txt2="igual";
				}
				if($datos_escuela['MAT_M']>$datos_escuela['MAT_M_PRENT']){
					$txt3 = "mayor";
				}elseif($datos_escuela['MAT_M']<$datos_escuela['MAT_M_PRENT']){
					$txt3 = "menor";
				}else{
					$txt3="igual";
				}
				if($datos_escuela['LYC_M']>$datos_escuela['LYC_M_PRENT']){
					$txt4 = "mayor";
				}elseif($datos_escuela['LYC_M']<$datos_escuela['LYC_M_PRENT']){
					$txt4 = "menor";
				}else{
					$txt4="igual";
				}
				$qw = "SELECT PROM_LYC_COM, PROM_MAT_COM,PROM_LYC, PROM_MAT, LYC_M, MAT_M, ESCUELA FROM `escuelas_dgiai_sec` WHERE ENT = '$zona' and TIPO = 'Comunitaria'";
				#error_log("QW: $qw");
			}
			#saco puntajes pormedio de LYC y MAT de las escuela de la zona y de la zona
			$res_zona = mysqli_query($con,$qw);
			$escuelas_zona = mysqli_num_rows($res_zona);
			$hay_multigrado = 0;
			$hay_anee = 0;
			$hay_compuesta = 0;
			for($i=0;$i<$escuelas_zona;$i++){
				$datos_escuelas_zona[$i] = mysqli_fetch_array($res_zona);
				#Poner aqui la rutinita para ubicar multigrados, anee y con ambos razgos en la zona para habilitar iconos en los cuadrantes
			}
		}else{
			#si no existe la escuela en la base termino
			echo "La escuela $escuela no existe en la base de datos";
			die();
		}	
	}else{
		echo "El criterio de búsqueda no es válido se debe concatenar CCT y TURNO";
		die();
	}
	#print_r($datos_escuela);
	#echo "AHI";
	#print_r($datos_escuela['reac_mat'][3]);
	#echo "AHI";
	#echo "SOF:".sizeof($datos_escuela['reac_mat'][2])."---<br/>";
	#echo "SOF111:".sizeof($datos_escuela['reac_mat'][2])."---br/";
	#for($i=10;$i<15;$i++){
	#	#error_log("ESTE_MEROL:['".$datos_escuela['reac_mat'][2][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_mat'][2][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_mat'][2][$i]['val_reactivo'])."']");
	#	echo "['".$datos_escuela['reac_mat'][2][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_mat'][2][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_mat'][2][$i]['val_reactivo'])."']";
	#if($i<4){echo ",\n";}
	#}
	#echo "<br/>";
	
?>
<html>
<head>
<title>Reporte por escuelas - <?php echo $escuela;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
	@media all {
		div.saltopagina{
			display: none;
		}
	}
			
	@media print{
		div.saltopagina{ 
			display:block; 
			page-break-before:always;
		}
	}
	
	body{
		font-family: arial,verdana;
		background-color: #ffffff;
	}
	
	table{
		width:100%;
		border:0;
		padding:0;
		border-spacing: 0px;
		border-collapse: collapse;
	}
	
	td{
		font-size: 12px;
		text-align: left;
		padding-left: 10px;
	}
	
	.td_green{
		background-color: #beeae4;
		color: #212449;
		font-weight: bold;
		border-style: solid;
		border-color: #212449;
		border-top-width: 1px;
		border-left-width: 0px;
		border-bottom-width: 1px;
		border-right-width: 0px;
	}
	
	.td_data{
		color: #000000;
		border-style: solid;
		border-color: #212449;
		border-top-width: 1px;
		border-left-width: 0px;
		border-bottom-width: 1px;
		border-right-width: 0px;
		margin: 0px;
	}
	
	.td_center{
		text-align: center;
		color: #333e75;
		font-size: 12px;
		font-weight: bold;
	}
	
	.td_center_gray{
		text-align: center;
		color: #999999;
		font-size: 12px;
		font-weight: bold;
	}
	
	.td_left{
		text-align: left;
	}
	
	.td_right{
		text-align: right;
		color: #333e75;
		font-weight: bold;
	}
	
	.td_just{
		font-size: 12px;
		text-align: justify;
	}
	
	.td_top{
		vertical-align:top;
		color: #333e75;
		font-size: 12px;
		font-weight: bold;
	}
	
	.elem_center{
		margin-left: auto;
		margin-right: auto;
	}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load("current", {packages:["corechart"]});
google.charts.load("current", {packages:["bar"]});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {  
  var data1 = google.visualization.arrayToDataTable
		([['', '', {'type': 'string', 'role': 'style'}],
		  <?php if($datos_escuela['TIPO']!="Comunitaria"){?>
		  	[ <?php echo $datos_escuelas_zona[0]['PROM_LYC'];?>, <?php echo $datos_escuelas_zona[0]['PROM_MAT'];?>, 'point { size: 0; shape-type: circle; fill-color: #000000;}'],<?php
		  }else{?>
			[  <?php echo $datos_escuelas_zona[0]['PROM_LYC_COM'];?>, <?php echo $datos_escuelas_zona[0]['PROM_MAT_COM'];?>, 'point { size: 0; shape-type: circle; fill-color: #000000;}'],		  	  
		  <?php }?>[ <?php echo $datos_escuela['LYC_M_PRENT'];?>, <?php echo $datos_escuela['MAT_M_PRENT'];?>, 'point { size: 10; shape-type: triangle; fill-color: #aaaaaa;}'],
		  [ <?php echo $datos_escuela['LYC_M'];?>, <?php echo $datos_escuela['MAT_M'];?>, 'point { size: 10; shape-type: star; fill-color: #0000ff;}'],
<?php 
	$hay_poly = 0;
	for($i=0;$i<$escuelas_zona;$i++){
		$es_multi = 0;
		$es_nee = 0;
		$forma = "circle";
		if($datos_escuelas_zona[$i]['ESCUELA'] != $datos_escuela['ESCUELA']){
			if($datos_escuelas_zona[$i]['ESCUELA']){
			
			}
			echo "\t\t  [".$datos_escuelas_zona[$i]['LYC_M'].",".$datos_escuelas_zona[$i]['MAT_M'].",'point { size: 6; shape-type: ".$forma."; fill-color: #087037;}']";
			if($i<$escuelas_zona-1){echo ",";}echo "\n";
		}
	}
?>
  ]);

  
  var options1 = {
	chart: {
		title: 'Puntajes promedio PLANEA 2017',
		subtitle: 'Mi escuela en mi zona escolar',
	},
	legend: 'none',
	height: 400,
	width: 400,
	crosshair: {
		trigger: 'selection',
		orientation: 'both',
		color: 'gray'
	},
	vAxis: {
		gridlines: {
			color: 'transparent'
		},
		title: 'Puntaje en matemáticas'
	},
	hAxis: {
		gridlines: {
			color: 'transparent'
		},
		title: 'Puntaje en lenguaje y comunicación',
	}
	//series:{
	  //	  0:{
	  //	  	  color: '#FF0000',
    //	  },
    //	  1:{
	 // 	  	  color: '#FFFF00'
    //	  },
    //	  2:{
	 // 	  	  color: '#00FF00'
    //	  },
    //	  3:{
	 // 	  	  color: '#0000FF'
    //	  }
	 // },
  }; <?php if($datos_escuela['CV_CCT']!="SINCLAVE"){?>
  var chart_div = document.getElementById('cuadrantes');
  var chart1 = new google.visualization.ScatterChart(chart_div);
  google.visualization.events.addListener(chart1, 'ready', function () {
        chart1.setSelection([{"row":0}]);
        chart_div.innerHTML = '<img id="cuadrante" src="' + chart1.getImageURI() + '">';
  });
  chart1.draw(data1, options1);<?php } ?>

  var data2 = google.visualization.arrayToDataTable([
	['Año', 'Nivel I', {role: 'annotation'}, 'Nivel II', {role: 'annotation'}, 'Nivel III', {role: 'annotation'}, 'Nivel IV', {role: 'annotation'}],
	<?php if($datos_escuela['LYC_P_NIVEL_I_15']>=0){?>['2015', <?php echo $datos_escuela['LYC_P_NIVEL_I_15']/100?>,<?php if($datos_escuela['LYC_P_NIVEL_I_15']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_I_15'])."'";}else{echo "''";}?> , <?php echo $datos_escuela['LYC_P_NIVEL_II_15']/100?>,<?php if($datos_escuela['LYC_P_NIVEL_II_15']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_II_15'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['LYC_P_NIVEL_III_15']/100?>, <?php if($datos_escuela['LYC_P_NIVEL_III_15']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_III_15'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['LYC_P_NIVEL_IV_15']/100?>, <?php if($datos_escuela['LYC_P_NIVEL_IV_15']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_IV_15'])."'";}else{echo "''";}?>],<?php }else{?>
	['2015', 0,'', 0, '',0,'', 0, ''],
	<?php } ?>['2017', <?php echo $datos_escuela['LYC_P_NIVEL_I']/100?>,<?php if($datos_escuela['LYC_P_NIVEL_I']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_I'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['LYC_P_NIVEL_II']/100?>, <?php if($datos_escuela['LYC_P_NIVEL_II']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_II'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['LYC_P_NIVEL_III']/100?>,<?php if($datos_escuela['LYC_P_NIVEL_III']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_III'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['LYC_P_NIVEL_IV']/100?>, <?php if($datos_escuela['LYC_P_NIVEL_IV']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_IV'])."'";}else{echo "''";}?>]
  ]);

  var options2 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },
	  title: 'Lenguaje y comunicación',
	  isStacked: 'percent',
	  height: 280,
	  width: 240,
	  legend: {position: 'none', maxLines: 3},
	  vAxis: {
	  	title: 'Porcentaje de alumnos',
		minValue: 0,
		ticks: [0, .2, .4, .6, .8, 1],
		maxValue: 1.2
	  },
	  series:{
	  	  0:{
	  	  	  color: '#FB4F57',
    	  },
    	  1:{
	  	  	  color: '#FDD16C'
    	  },
    	  2:{
	  	  	  color: '#6ACB9C'
    	  },
    	  3:{
	  	  	  color: '#90B0D9'
    	  }
	  },
	  chartArea: {
	  	  top: 20,
	  	  bottom: 20
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container2 = document.getElementById('comp_planea_lyc');
  var chart2 = new google.visualization.ColumnChart(container2);
  google.visualization.events.addListener(chart2, 'ready', function () {
        container2.innerHTML = '<img src="' + chart2.getImageURI() + '">';
  });
  chart2.draw(data2, options2);
  
  var data3 = google.visualization.arrayToDataTable([
	['Año', 'Nivel I', {role: 'annotation'}, 'Nivel II', {role: 'annotation'}, 'Nivel III', {role: 'annotation'}, 'Nivel IV', {role: 'annotation'}],
	<?php if($datos_escuela['MAT_P_NIVEL_I_15']>=0){?>['2015', <?php echo $datos_escuela['MAT_P_NIVEL_I_15']/100?>,<?php if($datos_escuela['MAT_P_NIVEL_I_15']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_I_15'])."'";}else{echo "''";}?> , <?php echo $datos_escuela['MAT_P_NIVEL_II_15']/100?>,<?php if($datos_escuela['MAT_P_NIVEL_II_15']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_II_15'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['MAT_P_NIVEL_III_15']/100?>, <?php if($datos_escuela['MAT_P_NIVEL_III_15']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_III_15'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['MAT_P_NIVEL_IV_15']/100?>, <?php if($datos_escuela['MAT_P_NIVEL_IV_15']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_IV_15'])."'";}else{echo "''";}?>],<?php }else{?>
	['2015', 0,'', 0, '',0,'', 0, ''],
	<?php } ?>['2017', <?php echo $datos_escuela['MAT_P_NIVEL_I']/100?>,<?php if($datos_escuela['MAT_P_NIVEL_I']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_I'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['MAT_P_NIVEL_II']/100?>, <?php if($datos_escuela['MAT_P_NIVEL_II']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_II'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['MAT_P_NIVEL_III']/100?>,<?php if($datos_escuela['MAT_P_NIVEL_III']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_III'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['MAT_P_NIVEL_IV']/100?>, <?php if($datos_escuela['MAT_P_NIVEL_IV']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_IV'])."'";}else{echo "''";}?>]
  ]);

  var options3 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },
	  title: 'Matemáticas',
	  isStacked: 'percent',
	  height: 280,
	  width: 240,
	  legend: {position: 'none', maxLines: 3},
	  vAxis: {
	  	title: 'Porcentaje de alumnos',
		minValue: 0,
		ticks: [0, .2, .4, .6, .8, 1],
		maxValue: 1.2
	  },
	  series:{
	  	  0:{
	  	  	  color: '#FB4F57',
    	  },
    	  1:{
	  	  	  color: '#FDD16C'
    	  },
    	  2:{
	  	  	  color: '#6ACB9C'
    	  },
    	  3:{
	  	  	  color: '#90B0D9'
    	  }
	  },
	  chartArea: {
	  	  top: 20,
	  	  bottom: 20
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	};

  var container3 = document.getElementById('comp_planea_mat');
  var chart3 = new google.visualization.ColumnChart(container3);
  google.visualization.events.addListener(chart3, 'ready', function () {
        container3.innerHTML = '<img src="' + chart3.getImageURI() + '">';
  });
  chart3.draw(data3, options3);
	
	var data5 = google.visualization.arrayToDataTable([
	['Parámetro', 'Insuficiente', {role: 'annotation'}, 'Apenas suficiente', {role: 'annotation'}, 'Bueno', {role: 'annotation'}, 'Excelente', {role: 'annotation'}],
	['Mi escuela', <?php echo $datos_escuela['LYC_P_NIVEL_I']*(-100)?>,<?php if($datos_escuela['LYC_P_NIVEL_I']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_I'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['LYC_P_NIVEL_II']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_II']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_II'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['LYC_P_NIVEL_III']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_III']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_III'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['LYC_P_NIVEL_IV']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_IV']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_IV'])."'";}else{echo "''";}?>],
	['Escuelas de la misma modalidad y marginación en mi entidad', <?php echo $datos_escuela['LYC_P_NIVEL_I_COMP']*(-100)?>,<?php if($datos_escuela['LYC_P_NIVEL_I_COMP']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_I_COMP'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['LYC_P_NIVEL_II_COMP']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_II_COMP']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_II_COMP'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['LYC_P_NIVEL_III_COMP']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_III_COMP']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_III_COMP'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['LYC_P_NIVEL_IV_COMP']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_IV_COMP']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_IV_COMP'])."'";}else{echo "''";}?>],
	['Escuelas en el estado', <?php echo $datos_escuela['LYC_P_NIVEL_I_PRENT']*(-100)?>,<?php if($datos_escuela['LYC_P_NIVEL_I_PRENT']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_I_PRENT'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['LYC_P_NIVEL_II_PRENT']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_II_PRENT']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_II_PRENT'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['LYC_P_NIVEL_III_PRENT']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_III_PRENT']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_III_PRENT'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['LYC_P_NIVEL_IV_PRENT']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_IV_PRENT']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_IV_PRENT'])."'";}else{echo "''";}?>],
	['Todas las escuelas de México', <?php echo $datos_escuela['LYC_P_NIVEL_I_PNAC']*(-100)?>,<?php if($datos_escuela['LYC_P_NIVEL_I_PNAC']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_I_PNAC'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['LYC_P_NIVEL_II_PNAC']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_II_PNAC']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_II_PNAC'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['LYC_P_NIVEL_III_PNAC']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_III_PNAC']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_III_PNAC'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['LYC_P_NIVEL_IV_PNAC']*(100)?>,<?php if($datos_escuela['LYC_P_NIVEL_IV_PNAC']>0){echo "'".sprintf('%.2f%%',$datos_escuela['LYC_P_NIVEL_IV_PNAC'])."'";}else{echo "''";}?>]
	]);
	
	var options5 = {
		tooltip: {
			trigger: 'none'
		},
		title: 'Lenguaje y Comunicación',
		hAxis: {
			textPosition: 'none',
			gridlines: {
				color: 'transparent'
			}
		},
		vAxis: {
			gridlines: {
				color: 'transparent'
			}
		},
		bar:{
			groupWidth: '80%'
		},
		annotations:{
	  	  textStyle: {
	  	  	  fontSize: 11,
	  	  }
	  	},
	  	chartArea: {
	  	  left: 300,
	  	  right: 0,
	  	  top: 20,
	  	  bottom: 0
	  	},
	  	series:{
	  	  0:{
	  	  	  color: '#FB4F57',
    	  },
    	  1:{
	  	  	  color: '#FDD16C'
    	  },
    	  2:{
	  	  	  color: '#6ACB9C'
    	  },
    	  3:{
	  	  	  color: '#90B0D9'
    	  }
    	},
		legend: 'none',
		width: 1100,
		height: 280,
		isStacked:true	  
	};  
	
	// Instantiate and draw the chart.
	var container5 = document.getElementById('comp_escuelas_ent_lyc');
	var chart5 = new google.visualization.BarChart(container5);
	google.visualization.events.addListener(chart5, 'ready', function () {
        container5.innerHTML = '<img src="' + chart5.getImageURI() + '">';
    });
	chart5.draw(data5, options5);
	
	
	var data6 = google.visualization.arrayToDataTable([
	['Parámetro', 'Insuficiente', {role: 'annotation'}, 'Apenas suficiente', {role: 'annotation'}, 'Bueno', {role: 'annotation'}, 'Excelente', {role: 'annotation'}],
	['Mi escuela', <?php echo $datos_escuela['MAT_P_NIVEL_I']*(-100)?>,<?php if($datos_escuela['MAT_P_NIVEL_I']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_I'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['MAT_P_NIVEL_II']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_II']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_II'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['MAT_P_NIVEL_III']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_III']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_III'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['MAT_P_NIVEL_IV']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_IV']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_IV'])."'";}else{echo "''";}?>],
	['Escuelas de la misma modalidad y marginación en mi entidad', <?php echo $datos_escuela['MAT_P_NIVEL_I_COMP']*(-100)?>,<?php if($datos_escuela['MAT_P_NIVEL_I_COMP']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_I_COMP'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['MAT_P_NIVEL_II_COMP']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_II_COMP']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_II_COMP'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['MAT_P_NIVEL_III_COMP']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_III_COMP']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_III_COMP'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['MAT_P_NIVEL_IV_COMP']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_IV_COMP']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_IV_COMP'])."'";}else{echo "''";}?>],
	['Escuelas en el estado', <?php echo $datos_escuela['MAT_P_NIVEL_I_PRENT']*(-100)?>,<?php if($datos_escuela['MAT_P_NIVEL_I_PRENT']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_I_PRENT'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['MAT_P_NIVEL_II_PRENT']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_II_PRENT']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_II_PRENT'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['MAT_P_NIVEL_III_PRENT']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_III_PRENT']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_III_PRENT'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['MAT_P_NIVEL_IV_PRENT']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_IV_PRENT']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_IV_PRENT'])."'";}else{echo "''";}?>],
	['Todas las escuelas de México', <?php echo $datos_escuela['MAT_P_NIVEL_I_PNAC']*(-100)?>,<?php if($datos_escuela['MAT_P_NIVEL_I_PNAC']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_I_PNAC'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['MAT_P_NIVEL_II_PNAC']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_II_PNAC']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_II_PNAC'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['MAT_P_NIVEL_III_PNAC']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_III_PNAC']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_III_PNAC'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['MAT_P_NIVEL_IV_PNAC']*(100)?>,<?php if($datos_escuela['MAT_P_NIVEL_IV_PNAC']>0){echo "'".sprintf('%.2f%%',$datos_escuela['MAT_P_NIVEL_IV_PNAC'])."'";}else{echo "''";}?>]
	]);
	
	var options6 = {
		tooltip: {
			trigger: 'none'
		},
		title: 'Matemáticas',
		hAxis: {
		textPosition: 'none',
		gridlines: {
			color: 'transparent'
		}
	  },
	  vAxis: {
		gridlines: {
			color: 'transparent'
		}
	  },
	  bar:{
		  groupWidth: '80%'
	  },
	  chartArea: {
	  	  left: 300,
	  	  right: 0,
	  	  top: 20,
	  	  bottom: 0
	  },
	  series:{
	  	  0:{
	  	  	  color: '#FB4F57',
    	  },
    	  1:{
	  	  	  color: '#FDD16C'
    	  },
    	  2:{
	  	  	  color: '#6ACB9C'
    	  },
    	  3:{
	  	  	  color: '#90B0D9'
    	  }
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 11,
	  	  }
	  },
	  //legend: {position: 'bottom', maxLines: 3},
	  legend: 'none',
	  width: 1100,
	  height: 280,
		isStacked:true	  
	};  
	
	// Instantiate and draw the chart.
	var container6 = document.getElementById('comp_escuelas_ent_mat');
	var chart6 = new google.visualization.BarChart(container6);
	google.visualization.events.addListener(chart6, 'ready', function () {
        container6.innerHTML = '<img src="' + chart6.getImageURI() + '">';
    });
	chart6.draw(data6, options6);
	
	var data7 = google.visualization.arrayToDataTable([
	['Métrica', 'Valor', {role: 'annotation'}, { role: "style" }],
	['Matriculación oportuna', <?php echo $datos_escuela["MO_T_1617"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["MO_T_1617"]);?>','gray'],
	['Alumnos en edad idónea y extraedad ligera', <?php echo $datos_escuela["PORC_EDAD_IDON"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["PORC_EDAD_IDON"]);?>','gray'],
	['Aprobación al final del ciclo escolar', <?php echo $datos_escuela["TAP_FIN_1718"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["TAP_FIN_1718"]);?>','gray'],
	['Aprobación después del periodo de regularización', <?php echo $datos_escuela["TAP_DESP_1718"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["TAP_DESP_1718"]);?>','gray'],
	['Retención intracurricular', <?php echo $datos_escuela["RET_INTR_1617"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["RET_INTR_1617"]);?>','gray']
	]);
	
	var options7 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },	  
	  height: 250,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 200,
	  	  right: 50,
	  	  top:0,
	  	  bottom: 20
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};
	
	// Instantiate and draw the chart.
	var container7 = document.getElementById('g7');
	var chart7 = new google.visualization.BarChart(container7);
	google.visualization.events.addListener(chart7, 'ready', function () {
        container7.innerHTML = '<img src="' + chart7.getImageURI() + '">';
    });
	chart7.draw(data7, options7);
	
<?php
if($datos_escuela['MUESTRA']=="S"){
?>
	var data8 = google.visualization.arrayToDataTable([
		['Eje', 'Nombre', {role: 'annotation'}],
		['Forma, espacio y medida', <?php echo $datos_escuela["POR_ASPECTO1_MAT"];?>,'<?php echo sprintf('%.2f%%',$datos_escuela['POR_ASPECTO1_MAT'])?>']
	]);
	
  var options8 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },
	  title: 'Eje temático',	  
	  height: 90,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  series:{
	  	  0:{
	  	  	  color: <?php echo "'#".$datos_escuela['COLOR_ASPECTO1_MAT']."'";?>,
    	  }
      },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container8 = document.getElementById('g8');
  var chart8 = new google.visualization.BarChart(container8);
  google.visualization.events.addListener(chart8, 'ready', function () {
        container8.innerHTML = '<img src="' + chart8.getImageURI() + '">';
  });
  chart8.draw(data8, options8);
  
  var data9 = google.visualization.arrayToDataTable([
	['Año', 'Nivel I', {role: 'annotation'},{role: 'style'}],
	<?php
		for($i=0;$i<5;$i++){
			#error_log();
			#echo "['".$datos_escuela['reac_mat'][1][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_mat'][1][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_mat'][1][$i]['val_reactivo'])."','#".$datos_escuela['reac_mat'][1][$i]['color_reactivo']."']";
			echo $m1[$i];
		if($i<4){echo ",\n";}
		}
	?>
  ]);
  
  var options9 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },	  
	  height: 300,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  	  bottom: 20
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  },
	};

  var container9 = document.getElementById('g9');
  var chart9 = new google.visualization.BarChart(container9);
  google.visualization.events.addListener(chart9, 'ready', function () {
        container9.innerHTML = '<img src="' + chart9.getImageURI() + '">';
  });
  chart9.draw(data9, options9);

  var data10 = google.visualization.arrayToDataTable([
		['Eje', 'Nombre', {role: 'annotation'}],
		['Manejo de la información', <?php echo $datos_escuela["POR_ASPECTO2_MAT"];?>,'<?php echo sprintf('%.2f%%',$datos_escuela['POR_ASPECTO2_MAT'])?>']
	]);

  var options10 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },
	  title: 'Eje temático',	  
	  height: 90,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  series:{
	  	  0:{
	  	  	  color: <?php echo "'#".$datos_escuela['COLOR_ASPECTO2_MAT']."'";?>,
    	  }
      },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container10 = document.getElementById('g10');
  var chart10 = new google.visualization.BarChart(container10);
  google.visualization.events.addListener(chart10, 'ready', function () {
        container10.innerHTML = '<img src="' + chart10.getImageURI() + '">';
  });
  chart10.draw(data10, options10);
  
  var data11 = google.visualization.arrayToDataTable([
	['Año', 'Nivel I', {role: 'annotation'},{role: 'style'}],
	<?php for($i=5;$i<10;$i++){
	#error_log("['".$datos_escuela['reac_mat'][2][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_mat'][2][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_mat'][2][$i]['val_reactivo'])."']");
	#echo "['".$datos_escuela['reac_mat'][2][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_mat'][2][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_mat'][2][$i]['val_reactivo'])."','#".$datos_escuela['reac_mat'][2][$i]['color_reactivo']."']";
	echo $m2[$i-5];
	if($i<9){echo ",\n";}
	}?>
  ]);
  
  var options11 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },	  
	  height: 300,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  	  bottom: 20
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container11 = document.getElementById('g11');
  var chart11 = new google.visualization.BarChart(container11);
  google.visualization.events.addListener(chart11, 'ready', function () {
        container11.innerHTML = '<img src="' + chart11.getImageURI() + '">';
  });
  chart11.draw(data11, options11);
  
  var data12 = google.visualization.arrayToDataTable([
		['Eje', 'Nombre', {role: 'annotation'}],
		['Sentido numérico y pensamiento algebraico', <?php echo $datos_escuela["POR_ASPECTO3_MAT"];?>,'<?php echo sprintf('%.2f%%',$datos_escuela['POR_ASPECTO3_MAT'])?>']
	]);

  var options12 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },
	  title: 'Eje temático',	  
	  height: 90,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  series:{
	  	  0:{
	  	  	  color: <?php echo "'#".$datos_escuela['COLOR_ASPECTO3_MAT']."'";?>,
    	  }
      },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container12 = document.getElementById('g12');
  var chart12 = new google.visualization.BarChart(container12);
  google.visualization.events.addListener(chart12, 'ready', function () {
        container12.innerHTML = '<img src="' + chart12.getImageURI() + '">';
  });
  chart12.draw(data12, options12);
  
  var data13 = google.visualization.arrayToDataTable([
	['Año', 'Nivel I', {role: 'annotation'},{role: 'style'}],
	<?php for($i=10;$i<15;$i++){
	#error_log("['".$datos_escuela['reac_mat'][3][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_mat'][3][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_mat'][3][$i]['val_reactivo'])."']");
	#echo "['".$datos_escuela['reac_mat'][3][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_mat'][3][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_mat'][3][$i]['val_reactivo'])."','#".$datos_escuela['reac_mat'][3][$i]['color_reactivo']."']";
	echo $m3[$i-10];
	if($i<14){echo ",\n";}
	}?>
  ]);
  
  var options13 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },	  
	  height: 300,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  	  bottom: 20
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container13 = document.getElementById('g13');
  var chart13 = new google.visualization.BarChart(container13);
  google.visualization.events.addListener(chart13, 'ready', function () {
        container13.innerHTML = '<img src="' + chart13.getImageURI() + '">';
  });
  chart13.draw(data13, options13);
  
  var data14 = google.visualization.arrayToDataTable([
		['Eje', 'Nombre', {role: 'annotation'}],
		['Reflexión sobre la lengua', <?php echo $datos_escuela["POR_ASPECTO2_LYC"];?>,'<?php echo sprintf('%.2f%%',$datos_escuela['POR_ASPECTO2_LYC'])?>']
	]);

  var options14 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },
	  title: 'Eje temático',	  
	  height: 90,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  series:{
	  	  0:{
	  	  	  color: <?php echo "'#".$datos_escuela['COLOR_ASPECTO2_LYC']."'";?>,
    	  }
      },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container14 = document.getElementById('g14');
  var chart14 = new google.visualization.BarChart(container14);
  google.visualization.events.addListener(chart14, 'ready', function () {
        container14.innerHTML = '<img src="' + chart14.getImageURI() + '">';
  });
  chart14.draw(data14, options14);
  
  var data15 = google.visualization.arrayToDataTable([
	['Año', 'Nivel I', {role: 'annotation'},{role: 'style'}],
	<?php for($i=0;$i<5;$i++){
	#error_log("['".$datos_escuela['reac_mat'][3][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_mat'][3][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_mat'][3][$i]['val_reactivo'])."']");
	#echo "['".$datos_escuela['reac_lyc'][1][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_lyc'][1][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_lyc'][1][$i]['val_reactivo'])."','#".$datos_escuela['reac_lyc'][1][$i]['color_reactivo']."']";
	echo $l2[$i];
	if($i<4){echo ",\n";}
	}?>
  ]);
  
  var options15 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },	  
	  height: 300,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  	  bottom: 20
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container15 = document.getElementById('g15');
  var chart15 = new google.visualization.BarChart(container15);
  google.visualization.events.addListener(chart15, 'ready', function () {
        container15.innerHTML = '<img src="' + chart15.getImageURI() + '">';
  });
  chart15.draw(data15, options15);
  
  var data16 = google.visualization.arrayToDataTable([
		['Eje', 'Nombre', {role: 'annotation'}],
		['Comprensión lectora', <?php echo $datos_escuela["POR_ASPECTO1_LYC"];?>,'<?php echo sprintf('%.2f%%',$datos_escuela['POR_ASPECTO1_LYC'])?>']
	]);

  var options16 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },
	  title: 'Eje temático',	  
	  height: 90,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  series:{
	  	  0:{
	  	  	  color: <?php echo "'#".$datos_escuela['COLOR_ASPECTO2_LYC']."'";?>,
    	  }
      },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container16 = document.getElementById('g16');
  var chart16 = new google.visualization.BarChart(container16);
  google.visualization.events.addListener(chart16, 'ready', function () {
        container16.innerHTML = '<img src="' + chart16.getImageURI() + '">';
  });
  chart16.draw(data16, options16);
  
  var data17 = google.visualization.arrayToDataTable([
	['Año', 'Nivel I', {role: 'annotation'},{role: 'style'}],
	<?php for($i=5;$i<10;$i++){
	#error_log("['".$datos_escuela['reac_mat'][3][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_mat'][3][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_mat'][3][$i]['val_reactivo'])."']");
	#echo "['".$datos_escuela['reac_lyc'][2][$i]['txt_reactivo']."',".sprintf('%.2f',$datos_escuela['reac_lyc'][2][$i]['val_reactivo']).",'".sprintf('%.2f%%',$datos_escuela['reac_lyc'][2][$i]['val_reactivo'])."','#".$datos_escuela['reac_lyc'][2][$i]['color_reactivo']."']";
	echo $l1[$i-5];
	if($i<9){echo ",\n";}
	}?>
  ]);
  
  var options17 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },	  
	  height: 300,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 500,
	  	  right: 50,
	  	  top:0,
	  	  bottom: 20
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};

  var container17 = document.getElementById('g17');
  var chart17 = new google.visualization.BarChart(container17);
  google.visualization.events.addListener(chart17, 'ready', function () {
        container17.innerHTML = '<img src="' + chart17.getImageURI() + '">';
  });
  chart17.draw(data17, options17);
<?php
}
?>
 
  
  var data24 = google.visualization.arrayToDataTable([
	['Métrica', 'Valor', {role: 'annotation'}, { role: "style" }],
	['Un escritorio o una mesa para estudiar', <?php echo $datos_escuela["P_PAB41_1"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["P_PAB41_1"]);?>','#90b0d9'],
	['Una habitación sólo para ellos', <?php echo $datos_escuela["P_PAB42_1"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["P_PAB42_1"]);?>','#90b0d9'],
	['Una lugar tranquilo para estudiar', <?php echo $datos_escuela["P_PAB43_1"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["P_PAB43_1"]);?>','#90b0d9'],
	['Una computadora que pueda usar para sus tareas escolares', <?php echo $datos_escuela["P_PAB44_1"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["P_PAB44_1"]);?>','#90b0d9'],
	['Libros de literatura en su casa', <?php echo $datos_escuela["P_PAB45_1"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["P_PAB45_1"]);?>','#90b0d9'],
	['Porcentaje de alumnos que NO tiene ningún libro en su casa (que no sean los de la escuela)', <?php echo $datos_escuela["P_PAB48_1"];?>,'<?php echo sprintf("%.2f%%",$datos_escuela["P_PAB48_1"]);?>','red']
	]);
	
	var options24 = {
  	  tooltip: {
  	  	trigger: 'none'
	  },	  
	  height: 300,
	  width: 900,
	  legend: 'none',
	  chartArea: {
	  	  left: 200,
	  	  right: 50,
	  	  top:0,
	  	  bottom: 20
	  },
	  hAxis: {
		minValue: 0,
		ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
	  },
	  annotations:{
	  	  textStyle: {
	  	  	  fontSize: 10
	  	  }
	  }
	  
	};
	
	// Instantiate and draw the chart.
	var container24 = document.getElementById('g24');
	var chart24 = new google.visualization.BarChart(container24);
	google.visualization.events.addListener(chart24, 'ready', function () {
        container24.innerHTML = '<img src="' + chart24.getImageURI() + '">';
    });
	chart24.draw(data24, options24);
	
	var data25 = google.visualization.arrayToDataTable([
	['Parámetro', 'Insuficiente', {role: 'annotation'}, 'Apenas suficiente', {role: 'annotation'}, 'Bueno', {role: 'annotation'}, 'Excelente', {role: 'annotation'}],
	['Revisa sus cuadernos o libros de texto para saber qué ha aprendido', <?php echo $datos_escuela['P_PAB79_1']*(100)?>,<?php if($datos_escuela['P_PAB79_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB79_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB79_2']*(100)?>,<?php if($datos_escuela['P_PAB79_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB79_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB79_3']*(100)?>,<?php if($datos_escuela['P_PAB79_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB79_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB79_4']*(100)?>,<?php if($datos_escuela['P_PAB79_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB79_4'])."'";}else{echo "''";}?>],
	['Le pregunta si tiene dudas sobre sus clases', <?php echo $datos_escuela['P_PAB80_1']*(100)?>,<?php if($datos_escuela['P_PAB80_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB80_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB80_2']*(100)?>,<?php if($datos_escuela['P_PAB80_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB80_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB80_3']*(100)?>,<?php if($datos_escuela['P_PAB80_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB80_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB80_4']*(100)?>,<?php if($datos_escuela['P_PAB80_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB80_4'])."'";}else{echo "''";}?>],
	['Le pregunta sobre lo que ha aprendido en la escuela', <?php echo $datos_escuela['P_PAB81_1']*(100)?>,<?php if($datos_escuela['P_PAB81_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB81_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB81_2']*(100)?>,<?php if($datos_escuela['P_PAB81_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB81_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB81_3']*(100)?>,<?php if($datos_escuela['P_PAB81_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB81_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB81_4']*(100)?>,<?php if($datos_escuela['P_PAB81_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB81_4'])."'";}else{echo "''";}?>],
	['Realiza con el niño ejercicios de repaso sobre lo revisado en la escuela, cuando lo necesita', <?php echo $datos_escuela['P_PAB82_1']*(100)?>,<?php if($datos_escuela['P_PAB82_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB82_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB82_2']*(100)?>,<?php if($datos_escuela['P_PAB82_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB82_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB82_3']*(100)?>,<?php if($datos_escuela['P_PAB82_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB82_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB82_4']*(100)?>,<?php if($datos_escuela['P_PAB82_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB82_4'])."'";}else{echo "''";}?>],
	['Le ayuda a estudiar para la escuela, cuando no entiende', <?php echo $datos_escuela['P_PAB83_1']*(100)?>,<?php if($datos_escuela['P_PAB83_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB83_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB83_2']*(100)?>,<?php if($datos_escuela['P_PAB83_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB83_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB83_3']*(100)?>,<?php if($datos_escuela['P_PAB83_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB83_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB83_4']*(100)?>,<?php if($datos_escuela['P_PAB83_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB83_4'])."'";}else{echo "''";}?>],
	['Le explica hasta que le entiende, alguna duda sobre lo que enseñan en la escuela', <?php echo $datos_escuela['P_PAB84_1']*(100)?>,<?php if($datos_escuela['P_PAB84_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB84_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB84_2']*(100)?>,<?php if($datos_escuela['P_PAB84_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB84_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB84_3']*(100)?>,<?php if($datos_escuela['P_PAB84_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB84_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB84_4']*(100)?>,<?php if($datos_escuela['P_PAB84_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB84_4'])."'";}else{echo "''";}?>]
	]);
	
	var options25 = {
		tooltip: {
			trigger: 'none'
		},
		hAxis: {
			textPosition: 'none',
			gridlines: {
				color: 'transparent'
			}
		},
		vAxis: {
			gridlines: {
				color: 'transparent'
			}
		},
		bar:{
			groupWidth: '80%'
		},
		annotations:{
	  	  textStyle: {
	  	  	  fontSize: 11,
	  	  }
	  	},
	  	chartArea: {
	  	  left: 300,
	  	  right: 50,
	  	  top: 20,
	  	  bottom: 0
	  	},
	  	series:{
	  	  0:{
	  	  	  color: '#FB4F57',
    	  },
    	  1:{
	  	  	  color: '#FDD16C'
    	  },
    	  2:{
	  	  	  color: '#6ACB9C'
    	  },
    	  3:{
	  	  	  color: '#90B0D9'
    	  }
    	},
		legend: 'none',
		width: 1100,
		height: 350,
		isStacked:true	  
	};  
	
	// Instantiate and draw the chart.
	var container25 = document.getElementById('g25');
	var chart25 = new google.visualization.BarChart(container25);
	google.visualization.events.addListener(chart25, 'ready', function () {
        container25.innerHTML = '<img src="' + chart25.getImageURI() + '">';
    });
	chart25.draw(data25, options25);
	
	var data26 = google.visualization.arrayToDataTable([
	['Parámetro', 'Insuficiente', {role: 'annotation'}, 'Apenas suficiente', {role: 'annotation'}, 'Bueno', {role: 'annotation'}, 'Excelente', {role: 'annotation'}],
	['Hace su mayor esfuerzo para hacer su tarea', <?php echo $datos_escuela['P_PAB66_1']*(100)?>,<?php if($datos_escuela['P_PAB66_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB66_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB66_2']*(100)?>,<?php if($datos_escuela['P_PAB66_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB66_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB66_3']*(100)?>,<?php if($datos_escuela['P_PAB66_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB66_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB66_4']*(100)?>,<?php if($datos_escuela['P_PAB66_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB66_4'])."'";}else{echo "''";}?>],
	['Pone atención cuando hace la tarea', <?php echo $datos_escuela['P_PAB68_1']*(100)?>,<?php if($datos_escuela['P_PAB68_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB68_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB68_2']*(100)?>,<?php if($datos_escuela['P_PAB68_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB68_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB68_3']*(100)?>,<?php if($datos_escuela['P_PAB68_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB68_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB68_4']*(100)?>,<?php if($datos_escuela['P_PAB68_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB68_4'])."'";}else{echo "''";}?>],
	['Ordena el lugar donde harán su tarea antes de empezar a hacerla', <?php echo $datos_escuela['P_PAB69_1']*(100)?>,<?php if($datos_escuela['P_PAB69_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB69_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB69_2']*(100)?>,<?php if($datos_escuela['P_PAB69_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB69_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB69_3']*(100)?>,<?php if($datos_escuela['P_PAB69_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB69_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB69_4']*(100)?>,<?php if($datos_escuela['P_PAB69_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB69_4'])."'";}else{echo "''";}?>],
	['Evita cosas que les distraen cuando hace su tarea por ejemplo: apagar la televisión o dejar de jugar', <?php echo $datos_escuela['P_PAB71_1']*(100)?>,<?php if($datos_escuela['P_PAB71_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB71_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB71_2']*(100)?>,<?php if($datos_escuela['P_PAB71_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB71_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB71_3']*(100)?>,<?php if($datos_escuela['P_PAB71_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB71_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB71_4']*(100)?>,<?php if($datos_escuela['P_PAB71_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB71_4'])."'";}else{echo "''";}?>],
	['Cuando le cuesta resolver la tarea, sigue trabajando hasta que logra terminarla', <?php echo $datos_escuela['P_PAB74_1']*(100)?>,<?php if($datos_escuela['P_PAB74_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB74_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB74_2']*(100)?>,<?php if($datos_escuela['P_PAB74_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB74_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB74_3']*(100)?>,<?php if($datos_escuela['P_PAB74_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB74_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB74_4']*(100)?>,<?php if($datos_escuela['P_PAB74_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB74_4'])."'";}else{echo "''";}?>],
	['Buscan un lugar tranquilo para hacer su tarea', <?php echo $datos_escuela['P_PAB76_1']*(100)?>,<?php if($datos_escuela['P_PAB76_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB76_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB76_2']*(100)?>,<?php if($datos_escuela['P_PAB76_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB76_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB76_3']*(100)?>,<?php if($datos_escuela['P_PAB76_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB76_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB76_4']*(100)?>,<?php if($datos_escuela['P_PAB76_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB76_4'])."'";}else{echo "''";}?>]
	]);
	
	var options26 = {
		tooltip: {
			trigger: 'none'
		},
		hAxis: {
			textPosition: 'none',
			gridlines: {
				color: 'transparent'
			}
		},
		vAxis: {
			gridlines: {
				color: 'transparent'
			}
		},
		bar:{
			groupWidth: '80%'
		},
		annotations:{
	  	  textStyle: {
	  	  	  fontSize: 11,
	  	  }
	  	},
	  	chartArea: {
	  	  left: 300,
	  	  right: 50,
	  	  top: 20,
	  	  bottom: 0
	  	},
	  	series:{
	  	  0:{
	  	  	  color: '#FB4F57',
    	  },
    	  1:{
	  	  	  color: '#FDD16C'
    	  },
    	  2:{
	  	  	  color: '#6ACB9C'
    	  },
    	  3:{
	  	  	  color: '#90B0D9'
    	  }
    	},
		legend: 'none',
		width: 1100,
		height: 350,
		isStacked:true	  
	};  
	
	// Instantiate and draw the chart.
	var container26 = document.getElementById('g26');
	var chart26 = new google.visualization.BarChart(container26);
	google.visualization.events.addListener(chart26, 'ready', function () {
        container26.innerHTML = '<img src="' + chart26.getImageURI() + '">';
    });
	chart26.draw(data26, options26);
	
	var data27 = google.visualization.arrayToDataTable([
	['Parámetro', 'Insuficiente', {role: 'annotation'}, 'Apenas suficiente', {role: 'annotation'}, 'Bueno', {role: 'annotation'}, 'Excelente', {role: 'annotation'}],
	['Olvida hacer la tarea', <?php echo $datos_escuela['P_PAB67_1']*(100)?>,<?php if($datos_escuela['P_PAB67_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB67_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB67_2']*(100)?>,<?php if($datos_escuela['P_PAB67_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB67_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB67_3']*(100)?>,<?php if($datos_escuela['P_PAB67_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB67_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB67_4']*(100)?>,<?php if($datos_escuela['P_PAB67_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB67_4'])."'";}else{echo "''";}?>],
	['Le falta tiempo para terminar la tarea', <?php echo $datos_escuela['P_PAB70_1']*(100)?>,<?php if($datos_escuela['P_PAB70_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB70_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB70_2']*(100)?>,<?php if($datos_escuela['P_PAB70_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB70_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB70_3']*(100)?>,<?php if($datos_escuela['P_PAB70_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB70_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB70_4']*(100)?>,<?php if($datos_escuela['P_PAB70_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB70_4'])."'";}else{echo "''";}?>],
	['Se destrae fácilmente cuando está haciendo la tarea', <?php echo $datos_escuela['P_PAB73_1']*(100)?>,<?php if($datos_escuela['P_PAB73_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB73_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB73_2']*(100)?>,<?php if($datos_escuela['P_PAB73_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB73_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB73_3']*(100)?>,<?php if($datos_escuela['P_PAB73_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB73_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB73_4']*(100)?>,<?php if($datos_escuela['P_PAB73_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB73_4'])."'";}else{echo "''";}?>],
	['Le desagrada hacer la tarea', <?php echo $datos_escuela['P_PAB77_1']*(100)?>,<?php if($datos_escuela['P_PAB77_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB77_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB77_2']*(100)?>,<?php if($datos_escuela['P_PAB77_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB77_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB77_3']*(100)?>,<?php if($datos_escuela['P_PAB77_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB77_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB77_4']*(100)?>,<?php if($datos_escuela['P_PAB77_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB77_4'])."'";}else{echo "''";}?>]
	]);
	
	var options27 = {
		tooltip: {
			trigger: 'none'
		},
		hAxis: {
			textPosition: 'none',
			gridlines: {
				color: 'transparent'
			}
		},
		vAxis: {
			gridlines: {
				color: 'transparent'
			}
		},
		bar:{
			groupWidth: '80%'
		},
		annotations:{
	  	  textStyle: {
	  	  	  fontSize: 11,
	  	  }
	  	},
	  	chartArea: {
	  	  left: 300,
	  	  right: 50,
	  	  top: 20,
	  	  bottom: 0
	  	},
	  	series:{
	  	  0:{
	  	  	  color: '#90B0D9',
    	  },
    	  1:{
	  	  	  color: '#6ACB9C'
    	  },
    	  2:{
	  	  	  color: '#FDD16C'
    	  },
    	  3:{
	  	  	  color: '#FB4F57'
    	  }
    	},
		legend: 'none',
		width: 1100,
		height: 350,
		isStacked:true	  
	};  
	
	// Instantiate and draw the chart.
	var container27 = document.getElementById('g27');
	var chart27 = new google.visualization.BarChart(container27);
	google.visualization.events.addListener(chart27, 'ready', function () {
        container27.innerHTML = '<img src="' + chart27.getImageURI() + '">';
    });
	chart27.draw(data27, options27);
	
	var data28 = google.visualization.arrayToDataTable([
	['Parámetro', 'Insuficiente', {role: 'annotation'}, 'Apenas suficiente', {role: 'annotation'}, 'Bueno', {role: 'annotation'}, 'Excelente', {role: 'annotation'}],
	['Les piden escucharse entre compañeros cuando están en desacuerdo', <?php echo $datos_escuela['P_PAB62_1']*(100)?>,<?php if($datos_escuela['P_PAB62_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB62_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB62_2']*(100)?>,<?php if($datos_escuela['P_PAB62_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB62_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB62_3']*(100)?>,<?php if($datos_escuela['P_PAB62_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB62_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB62_4']*(100)?>,<?php if($datos_escuela['P_PAB62_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB62_4'])."'";}else{echo "''";}?>],
	['Toman en cuenta sus opiniones durante las clases', <?php echo $datos_escuela['P_PAB56_1']*(100)?>,<?php if($datos_escuela['P_PAB56_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB56_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB56_2']*(100)?>,<?php if($datos_escuela['P_PAB56_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB56_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB56_3']*(100)?>,<?php if($datos_escuela['P_PAB56_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB56_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB56_4']*(100)?>,<?php if($datos_escuela['P_PAB56_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB56_4'])."'";}else{echo "''";}?>],
	['Les animan a decir lo que piensan', <?php echo $datos_escuela['P_PAB57_1']*(100)?>,<?php if($datos_escuela['P_PAB57_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB57_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB57_2']*(100)?>,<?php if($datos_escuela['P_PAB57_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB57_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB57_3']*(100)?>,<?php if($datos_escuela['P_PAB57_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB57_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB57_4']*(100)?>,<?php if($datos_escuela['P_PAB57_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB57_4'])."'";}else{echo "''";}?>],
	['Les dan confianza para preguntar sus dudas en clase', <?php echo $datos_escuela['P_PAB58_1']*(100)?>,<?php if($datos_escuela['P_PAB58_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB58_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB58_2']*(100)?>,<?php if($datos_escuela['P_PAB58_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB58_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB58_3']*(100)?>,<?php if($datos_escuela['P_PAB58_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB58_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB58_4']*(100)?>,<?php if($datos_escuela['P_PAB58_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB58_4'])."'";}else{echo "''";}?>],
	['Organizan actividades en las que puedan dar su opinión y escuchar las de los otros (por ejemplo: trabajos, proyectos)', <?php echo $datos_escuela['P_PAB59_1']*(100)?>,<?php if($datos_escuela['P_PAB59_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB59_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB59_2']*(100)?>,<?php if($datos_escuela['P_PAB59_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB59_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB59_3']*(100)?>,<?php if($datos_escuela['P_PAB59_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB59_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB59_4']*(100)?>,<?php if($datos_escuela['P_PAB59_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB59_4'])."'";}else{echo "''";}?>],
	['Toman en cuenta sus opiniones sobre las reglas del salón de clases', <?php echo $datos_escuela['P_PAB60_1']*(100)?>,<?php if($datos_escuela['P_PAB60_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB60_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB60_2']*(100)?>,<?php if($datos_escuela['P_PAB60_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB60_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB60_3']*(100)?>,<?php if($datos_escuela['P_PAB60_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB60_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB60_4']*(100)?>,<?php if($datos_escuela['P_PAB60_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB60_4'])."'";}else{echo "''";}?>],
	['Les animan a decir lo que piensan cuando están molestos con algún compañero(a)', <?php echo $datos_escuela['P_PAB61_1']*(100)?>,<?php if($datos_escuela['P_PAB61_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB61_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB61_2']*(100)?>,<?php if($datos_escuela['P_PAB61_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB61_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB61_3']*(100)?>,<?php if($datos_escuela['P_PAB61_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB61_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB61_4']*(100)?>,<?php if($datos_escuela['P_PAB61_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB61_4'])."'";}else{echo "''";}?>]
	]);
	
	var options28 = {
		tooltip: {
			trigger: 'none'
		},
		hAxis: {
			textPosition: 'none',
			gridlines: {
				color: 'transparent'
			}
		},
		vAxis: {
			gridlines: {
				color: 'transparent'
			}
		},
		bar:{
			groupWidth: '80%'
		},
		annotations:{
	  	  textStyle: {
	  	  	  fontSize: 11,
	  	  }
	  	},
	  	chartArea: {
	  	  left: 300,
	  	  right: 50,
	  	  top: 20,
	  	  bottom: 0
	  	},
	  	series:{
	  	  0:{
	  	  	  color: '#FB4F57',
    	  },
    	  1:{
	  	  	  color: '#FDD16C'
    	  },
    	  2:{
	  	  	  color: '#6ACB9C'
    	  },
    	  3:{
	  	  	  color: '#90B0D9'
    	  }
    	},
		legend: 'none',
		width: 1100,
		height: 500,
		isStacked:true	  
	};  
	
	// Instantiate and draw the chart.
	var container28 = document.getElementById('g28');
	var chart28 = new google.visualization.BarChart(container28);
	google.visualization.events.addListener(chart28, 'ready', function () {
        container28.innerHTML = '<img src="' + chart28.getImageURI() + '">';
    });
	chart28.draw(data28, options28);
	
	var data29 = google.visualization.arrayToDataTable([
	['Parámetro', 'Insuficiente', {role: 'annotation'}, 'Apenas suficiente', {role: 'annotation'}, 'Bueno', {role: 'annotation'}, 'Excelente', {role: 'annotation'}],
	['Les interrumpen cuando participan en clase', <?php echo $datos_escuela['P_PAB63_1']*(100)?>,<?php if($datos_escuela['P_PAB63_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB63_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB63_2']*(100)?>,<?php if($datos_escuela['P_PAB63_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB63_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB63_3']*(100)?>,<?php if($datos_escuela['P_PAB63_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB63_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB63_4']*(100)?>,<?php if($datos_escuela['P_PAB63_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB63_4'])."'";}else{echo "''";}?>],
	['Les ignoran cuando participan en clase', <?php echo $datos_escuela['P_PAB64_1']*(100)?>,<?php if($datos_escuela['P_PAB64_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB64_1'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB64_2']*(100)?>,<?php if($datos_escuela['P_PAB64_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB64_2'])."'";}else{echo "''";}?>, <?php echo $datos_escuela['P_PAB64_3']*(100)?>,<?php if($datos_escuela['P_PAB64_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB64_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB64_4']*(100)?>,<?php if($datos_escuela['P_PAB64_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB64_4'])."'";}else{echo "''";}?>],
	['Les regañan cuando se equivocan', <?php echo $datos_escuela['P_PAB65_1']*(100)?>,<?php if($datos_escuela['P_PAB65_1']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB65_1'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB65_2']*(100)?>,<?php if($datos_escuela['P_PAB65_2']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB65_2'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB65_3']*(100)?>,<?php if($datos_escuela['P_PAB65_3']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB65_3'])."'";}else{echo "''";}?>,<?php echo $datos_escuela['P_PAB65_4']*(100)?>,<?php if($datos_escuela['P_PAB65_4']>0){echo "'".sprintf('%.2f%%',$datos_escuela['P_PAB65_4'])."'";}else{echo "''";}?>]
	]);
	
	var options29 = {
		tooltip: {
			trigger: 'none'
		},
		hAxis: {
			textPosition: 'none',
			gridlines: {
				color: 'transparent'
			}
		},
		vAxis: {
			gridlines: {
				color: 'transparent'
			}
		},
		bar:{
			groupWidth: '80%'
		},
		annotations:{
	  	  textStyle: {
	  	  	  fontSize: 11,
	  	  }
	  	},
	  	chartArea: {
	  	  left: 300,
	  	  right: 50,
	  	  top: 20,
	  	  bottom: 0
	  	},
	  	series:{
	  	  0:{
	  	  	  color: '#90B0D9',
    	  },
    	  1:{
	  	  	  color: '#6ACB9C'
    	  },
    	  2:{
	  	  	  color: '#FDD16C'
    	  },
    	  3:{
	  	  	  color: '#FB4F57'
    	  }
    	},
		legend: 'none',
		width: 1100,
		height: 350,
		isStacked:true	  
	};  
	
	// Instantiate and draw the chart.
	var container29 = document.getElementById('g29');
	var chart29 = new google.visualization.BarChart(container29);
	google.visualization.events.addListener(chart29, 'ready', function () {
        container29.innerHTML = '<img src="' + chart29.getImageURI() + '">';
    });
	chart29.draw(data29, options29);
  
}

</script>
</head>
<body>
<table>
	<tr>
		<td class="elem_center">
			<img src="./imagenes/cabeceras/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td>
			<br/>
			<table style="width: 95%">
				<tr>
					<td class="td_green" style="width: 120px;text-align: left;padding-left: 10px;">
						Escuela:
					</td>
					<td colspan="5" class="td_data" style="text-align: left;<?php if(strlen($datos_escuela['N_CCT'])>55){echo 'font-size: 12px;';}?>">
						<?php echo $datos_escuela['N_CCT'];?>
					</td>
				</tr>
				<tr>
					<td class="td_green" style="width: 120px;text-align: left;">
						Clave:
					</td>
					<td class="td_data">
						<?php echo $datos_escuela['CCT'];?>
					</td>
					<td class="td_green" style="width: 120px;">
						Turno:
					</td>
					<td class="td_data">
						<?php echo $datos_escuela['TURNO'];?>
					</td>
					<td class="td_green" style="width: 120px;">
						Zona:
					</td>
					<td class="td_data">
						<?php echo $zona;?>
					</td>
				</tr>
				<tr>
					<td class="td_green" style="width: 120px;text-align: left;">
						<span style="font-size: 10px;">Nivel de Marginación:</span>
					</td>
					<td class="td_data">
						<?php echo $datos_escuela['MARGINC'];?>
					</td>
					<td class="td_green" style="width: 120px;">
						Tipo de servicio:
					</td>
					<td class="td_data">
						<?php echo $datos_escuela['TIPO'];?>
					</td>
					<td class="td_green" style="width: 120px;">
						Sostenimiento:
					</td>
					<td class="td_data">
						<?php echo $datos_escuela['SOSTENIMIENTO'];?>
					</td>
				</tr>
				<tr>
					<td colspan="6" class="td_left">
						<br/>
						<br/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table style="width:95%;">
				<tr>
					<td class="td_top" style="width: 150px;">
						¿Para qué sirve?
					</td>
					<td class="td_just" style="width: 560px;">
						<span style="font-weight: bold"><?php if($datos_escuela["MUESTRA"]=="S"){?>El objetivo más importante de PLANEA es identificar las fortalezas y oportunidades de mejora en cada escuela, zona escolar y entidad federativa, así como en el contexto nacional.</span> Por ello, el Instituto Nacional para la Evaluación de la Educación (INEE) y el Gobierno del Estado ofrecen este Reporte para todas las escuelas secundaria que participaron en la evaluación de PLANEA 2017. El Reporte integra información sistematizada de logro educativo proveniente del INEE, de la Secretaría de Educación Pública (SEP) y del propio gobierno estatal, así como información derivada de cuestionarios de contexto que permiten conocer el entorno personal, familiar y escolar en que se desarrollan los aprendizajes desde la perspectiva de los propios estudiantes.<?php }else{?>El objetivo más importante de PLANEA es identificar las fortalezas y oportunidades de mejora en cada escuela, zona escolar y entidad federativa, así como en el contexto nacional.</span> Por ello, el Instituto Nacional para la Evaluación de la Educación (INEE) y el Gobierno del Estado ofrecen este Reporte para todas las escuelas secundaria que participaron en la evaluación de PLANEA 2017. El Reporte integra información sistematizada de logro educativo proveniente del INEE, de la Secretaría de Educación Pública (SEP) y del propio gobierno estatal, así como información derivada de cuestionarios de contexto que permiten conocer el entorno personal, familiar y escolar en que se desarrollan los aprendizajes desde la perspectiva de los propios estudiantes.<?php }?><br/>
						<br/>
						<span style="font-weight: bold"><?php if($datos_escuela["MUESTRA"]=="S"){?>Los resultados presentados en este Reporte reflejan en forma confiable el logro que obtuvo el conjunto de los alumnos del último grado en cada secundaria, aun cuando en algunas escuelas sólo se aplicó a una muestra de sus estudiantes.</span> Así mismo, los datos que se ofrecen deben verse como el resultado acumulado del proceso de aprendizaje de los estudiantes de la escuela a lo largo de los tres años de este nivel, pues reflejan el trabajo y esfuerzo de todo el equipo docente, además de las condiciones particulares de los estudiantes.<?php }else{?>Los resultados presentados en este Reporte reflejan en forma confiable el logro que obtuvo el conjunto de los alumnos del último grado en cada secundaria, aun cuando en algunas escuelas sólo se aplicó a una muestra de sus estudiantes.</span> Así mismo, los datos que se ofrecen deben verse como el resultado acumulado del proceso de aprendizaje de los estudiantes de la escuela a lo largo de los tres años de este nivel, pues reflejan el trabajo y esfuerzo de todo el equipo docente, además de las condiciones particulares de los estudiantes.<?php }?></br>  
						<br/><?php if($datos_escuela["MUESTRA"]=="I"){?>Los datos que se ofrecen deben verse como el resultado acumulado del proceso de aprendizaje de los estudiantes de la escuela a lo largo de los seis años de secundaria, pues reflejan el trabajo y esfuerzo de todo el equipo docente, además de las condiciones particulares de los estudiantes.<br/><br/><?php }?>
						<span style="font-weight: bold">Se sugiere ampliamente que, con base en esta información, en el conocimiento de las condiciones escolares y en el marco de una reflexión colectiva, el personal docente y directivo defina las acciones a seguir.</span> Es importante considerar que, para fortalecer los aprendizajes y habilidades que se identifiquen como susceptibles de mejora, será necesario reforzar no sólo las acciones en el tercer grado, sino también en los grados previos en los que se aporten las bases académicas de los temas que mide PLANEA.<br/>
						<br/>
					</td>
				<tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table style="width:95%;">
				<tr>
					<td>
						<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width: 95%">
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table style="width:95%;">
				<tr>
					<td class="td_top" style="width: 150px;">
						¿Qué contiene?
					</td><?php  if($datos_escuela["MUESTRA"]=="S"){?>
					<td class="td_just" style="width: 560px;">
						<span style="font-weight: bold;">A.</span>  El <span style="font-weight: bold;">comparativo entre los resultados de 2017 y los de 2015</span>, así como con los de escuelas similares, escuelas de su entidad y las escuelas de todo el país.<br/>
						<br/>
						<span style="font-weight: bold;">B.</span>	Una <span style="font-weight: bold;">comparación entre puntaje promedio obtenido por la escuela con el promedio de las escuelas de su misma zona escolar.</span><br/>
						<br/>
						<span style="font-weight: bold;">C.</span>	Las <span style="font-weight: bold;">prioridades de atención académica</span>, con base en los reactivos en los que los estudiantes obtuvieron menor porcentaje de aciertos por cada eje temático, en los dos campos de conocimiento evaluados: matemáticas y lenguaje y comunicación.</span><br/>
						<br/>
						<span style="font-weight: bold;">D.</span>	La <span style="font-weight: bold;">opinión de los alumnos </span>con relación al entorno personal, familiar y escolar en el que se desenvuelven.<br/>
						<br/>
						<span style="font-weight: bold;">E.</span>	La <span style="font-weight: bold;">información sobre docentes, grupos y alumnos</span> por grado escolar, así como los porcentajes de aprobación y, de alumnos en edad idónea o un año más por encima de la idónea de la escuela, como una referencia general.<br/>
						<br/>
						<br/>
						Usted podrá encontrar información complementaria, que incluye los resultados de su escuela en cada uno de los reactivos, en el portal del INEE (<a href="https://www.inee.edu.mx/">www.inee.edu.mx/</a>). Sírvase hacernos llegar sus comentarios y sugerencias al correo apoyosupervisores@inee.edu.mx
					<?php }else{?>
					<td class="td_just" style="width: 560px;">
						<span style="font-weight: bold;">A.</span>  El <span style="font-weight: bold;">comparativo entre los resultados de 2017 y los de 2015</span>, así como con los de escuelas similares, escuelas de su entidad y las escuelas de todo el país.<br/>
						<br/>
						<span style="font-weight: bold;">B.</span>	Una <span style="font-weight: bold;">comparación del puntaje promedio obtenido por la escuela con el promedio de las escuelas de su misma zona escolar.</span><br/>
						<br/>
						<span style="font-weight: bold;">C.</span>	La <span style="font-weight: bold;">opinión de los alumnos</span> con relación al entorno personal, familiar y escolar en el que se desenvuelven.<br/>
						<br/>
						<span style="font-weight: bold;">D.</span>	La <span style="font-weight: bold;">información sobre docentes, grupos y alumnos</span> por grado escolar, así como los porcentajes de aprobación y, de alumnos en edad idónea o un año más por encima de la idónea de la escuela, como una referencia general.<br/>
						<br/>
						<br/>
						Usted podrá encontrar información complementaria, que incluye los resultados de su escuela en cada uno de los reactivos, en el portal del INEE (<a href="https://www.inee.edu.mx/">www.inee.edu.mx/</a>). Sírvase hacernos llegar sus comentarios y sugerencias al correo apoyosupervisores@inee.edu.mx
					<?php }?>
					</td>
				<tr>
			</table>
			<br/>
			<br/>
			<br/>
		</td>
	</tr>
	<tr>
		<td class="td_right" style="vertical-align: bottom;padding-right: 50px;">
			<br/>
			<br/>
			Página <?php if($datos_escuela['MUESTRA']=="I"){echo "1 de 7";}else{echo "1 de 10";}?>
			<br/>
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
<div class="saltopagina"></div>

<table>
	<tr>
		<td>
			<img src="./imagenes/cabeceras/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td colspan="6" class="td_center">
			<br/>
			Comparativo PLANEA 2017 vs 2015
		</td>
	</tr>
	<tr>
		<td colspan="6" class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<th align="center" valign="top">
			<table style="width:100%;">
				<tr>
					<td id="comp_planea_lyc" colspan="2" style="width:50%;">
					</td>
					<td id="comp_planea_mat" colspan="2" style="width:50%;">
					</td>
				</tr>
				<tr>
					<td style="font-size:10px;width:25%;">
						<img src="./imagenes/widgets/nivel1.png" style="vertical-align: middle;">&nbsp;Nivel I Dominio insuficiente
					</td>
					<td style="font-size:10px;width:25%;">
						<img src="./imagenes/widgets/nivel2.png" style="vertical-align: middle;">&nbsp;Nivel II Dominio básico
					</td>
					<td style="font-size:10px;width:25%;">
						<img src="./imagenes/widgets/nivel3.png" style="vertical-align: middle;">&nbsp;Nivel III Dominio satisfactorio
					</td>
					<td style="font-size:10px;width:25%;">
						<img src="./imagenes/widgets/nivel4.png" style="vertical-align: middle;">&nbsp;Nivel IV Dominio sobresaliente
					</td>
				</tr>
			</table>
		</th>
	</tr>
	<tr>
		<td>
			<table style="width:95%;">
				<tr>
					<td class="td_center">
						<br/>
						Comparativo con escuelas de la entidad y del país
					</td>
				</tr>
				<tr>
					<td>
						<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width: 95%">
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<th align="center" valign="top">
			<div id="comp_escuelas_ent_lyc" style="width: 900px;"></div>
		</th>
	</tr>
	<tr>
		<th align="center" valign="top">
			<br/>
			<div id="comp_escuelas_ent_mat" style="width: 900px;"></div>
		</th>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td style="font-size:10px;width:25%;">
						<img src="./imagenes/widgets/nivel1.png" style="vertical-align: middle;">&nbsp;Nivel I Dominio insuficiente
					</td>
					<td style="font-size:10px;width:25%;">
						<img src="./imagenes/widgets/nivel2.png" style="vertical-align: middle;">&nbsp;Nivel II Dominio básico
					</td>
					<td style="font-size:10px;width:25%;">
						<img src="./imagenes/widgets/nivel3.png" style="vertical-align: middle;">&nbsp;Nivel III Dominio satisfactorio
					</td>
					<td style="font-size:10px;width:25%;">
						<img src="./imagenes/widgets/nivel4.png" style="vertical-align: middle;">&nbsp;Nivel IV Dominio sobresaliente
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="td_right" style="vertical-align: bottom;padding-right: 50px;">
			<br/>
			<br/>
			Página <?php if($datos_escuela['MUESTRA']=="I"){echo "2 de 7";}else{echo "2 de 10";}?>
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
<div class="saltopagina"></div>

<table>
	<tr>
		<td>
			<img src="./imagenes/cabeceras/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td colspan="6" class="td_center">
			<br/>
			Comparativo con las escuelas de la misma <span style="font-size: bold">ZONA ESCOLAR</span>
		</td>
	</tr>
	<tr>
		<td colspan="6" class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td class="td_just">
			<br/>
			<br/>
			<br/>
			<ul>
				<li>
					La línea vertical dentro de la gráfica representa el promedio de la zona escolar en lenguaje y comunicación
				</li>
				<li>
					La línea horizontal dentro de la gráfica representa el promedio de la zona escolar en matemáticas
				</li>
				<li>
					La intersección de ambas lineas representa el promedio de la zona escolar en ambas asignaturas
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<th align="center" valign="top">
			<table>
				<tr>
					<td class="elem_center" style="text-align: center;">
						<img src="./imagenes/cuadrantes.png" style="width: 300px;height: 300px;">
					</td>
					<td class="elem_center" style="text-align: center;">
						<div id="cuadrantes"></div>
					</td>
				</tr>
			</table>
			<table class="elem_center" style="width:100%">
				<tr>
					<td style="font-size:10px;vertical-align: top;">
						<img src="./imagenes/widgets/mi_escuela.png" style="vertical-align: middle;">&nbsp;Mi escuela
					</td>
					<td style="font-size:10px;vertical-align: top;">
						<img src="./imagenes/widgets/escuela_zona.png" style="vertical-align: middle;">&nbsp;Escuela de la zona
					</td>
					<td style="font-size:10px;vertical-align: top;">
						<img src="./imagenes/widgets/prom_estatal.png" style="vertical-align: middle;">&nbsp;Promedio estatal
					</td>
				</tr><?php if($hay_poly){?>
				<tr>
					<td colspan="5" style="font-size:10px;vertical-align: top;">
						<img src="./imagenes/widgets/poly.png" style="vertical-align: middle;">&nbsp;Escuela con 4.8% o más de alumnos con necesidades especiales y con condición de multigrado
					</td>
				</tr>
				<?php }?>
			</table>
		</th>
	</tr>
	<tr>
		<td>
			<br/>
			<table style="width:95%;">
				<tr>
					<td>
						<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width: 95%">
					</td>
				</tr>
			</table>
			<br/>
		</td>
	</tr>
	<tr>
		<td>
			<br/>
			<table style="width:95%;">
				<tr>
					<td class="td_just">
						<ul>
							<li>
								Mi escuela obtuvo un <span style="font-weight: bold;">puntaje <?php echo "$txt2";?></span> al promedio de las escuelas<?php if($datos_escuela['TIPO']=="Comunitaria"){?> comunitarias en el estado<?php }else{?> de la zona<?php }?> en <span style="font-weight: bold;">lenguaje y comunicación</span>.
							</li>
							<li>
								Mi escuela obtuvo un <span style="font-weight: bold;">puntaje  <?php echo "$txt1";?></span> al promedio de las escuelas<?php if($datos_escuela['TIPO']=="Comunitaria"){?> comunitarias en el estado<?php }else{?> de la zona<?php }?> en <span style="font-weight: bold;">matemáticas</span>.
							</li>
							<li>
								El puntaje obtenido por mi escuela es <span style="font-weight: bold;"><?php echo "$txt4";?></span> al de una escuela promedio en la entidad en <span style="font-weight: bold;">lenguaje y comunicación</span>.
							</li>
							<li>
								El puntaje obtenido por mi escuela es <span style="font-weight: bold;"><?php echo "$txt3";?></span> al de una escuela promedio en la entidad en <span style="font-weight: bold;">matemáticas</span>.
							</li>
						</ul>
					</td>
				<tr>
			</table>
		</td>
	</tr>
	<?php if($datos_escuela['IRREGULARIDAD']==1){
	?>
	<tr>
		<td>
			<br/>
			<br/>
			<table style="width:95%;">
				<tr>
					<td>
						Mi escuela presenta irregularidades en el análisis de la calidad de la aplicación de la prueba (excesiva similitud en la respuesta de los alumnos)
					</td>
				</tr>
			</table>
			<br/>
		</td>
	</tr>
	<?php
	}?>
	<?php if($datos_escuela['MENSAJE_LYC']==1 || $datos_escuela['MENSAJE_MAT']==1){
	?>
	<tr>
		<td>
			<br/>
			<br/>
			<table style="width:95%;">
				<tr>
					<td>
						Los alumnos evaluados en Lenguaje y Comunicación NO son representativos de la totalidad de los estudiantes de la escuela<br/>
						Los alumnos evaluados en Matemáticas NO son representativos de la totalidad de los estudiantes de la escuela
					</td>
				</tr>
			</table>
			<br/>
		</td>
	</tr>
	<?php
	}?>
	<tr>
		<td class="td_right" style="vertical-align: bottom;padding-right: 50px;">
			<br/>
			<br/>
			Página <?php if($datos_escuela['MUESTRA']=="I"){echo "3 de 7";}else{echo "3 de 10";}?>
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
<div class="saltopagina"></div>
<?php if($datos_escuela['MUESTRA']=="S"){?>
<table>
	<tr>
		<td>
			<img src="./imagenes/cabeceras/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Reactivos con menor porcentaje de aciertos en MATEMÁTICAS
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			<br/>
			Eje temático: Forma, espacio y medida
		</td>
	</tr>
	<tr>
		<td>
			<div id="g8" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			Especificaciones de los 5 reactivos con la menor cantidad de aciertos en este eje temático
		</td>
	</tr>
	<tr>
		<td>
			<div id="g9" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			<br/>
			Eje temático: Manejo de la información
		</td>
	</tr>
	<tr>
		<td>
			<div id="g10" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			Especificaciones de los 5 reactivos con la menor cantidad de aciertos en este eje temático
		</td>
	</tr>
	<tr>
		<td>
			<div id="g11" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td class="td_right" style="vertical-align: bottom;padding-right: 50px;">
			<br/>
			<br/>
			Página 4 de 10
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
<div class="saltopagina"></div>

<table>
	<tr>
		<td>
			<img src="./imagenes/cabeceras/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Reactivos con menor porcentaje de aciertos en matemáticas
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			<br/>
			Eje temático: Sentido numérico y pensamiento algebraico
		</td>
	</tr>
	<tr>
		<td>
			<div id="g12" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			Especificaciones de los 5 reactivos con la menor cantidad de aciertos en este eje temático
		</td>
	</tr>
	<tr>
		<td>
			<div id="g13" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td class="td_right" style="height:400px;vertical-align: bottom;padding-right: 50px;">
			Página 5 de 10
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
<div class="saltopagina"></div>

<table>
	<tr>
		<td>
			<img src="./imagenes/cabeceras/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Reactivos con menor porcentaje de aciertos en lenguaje y comunicación
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			<br/>
			Eje temático: Reflexión sobre la lengua
		</td>
	</tr>
	<tr>
		<td>
			<div id="g14" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			Especificaciones de los 5 reactivos con la menor cantidad de aciertos en este eje temático
	</tr>
	<tr>
		<td>
			<div id="g15" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			<br/>
			Eje temático: Comprensión lectora
		</td>
	</tr>
	<tr>
		<td>
			<div id="g16" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;font-weight:bold;">
			Especificaciones de los 5 reactivos con la menor cantidad de aciertos en este eje temático
		</td>
	</tr>
	<tr>
		<td>
			<div id="g17" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td class="td_right" style="vertical-align: bottom;padding-right: 50px;">
			<br/>
			<br/>
			Página 6 de 10
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
<div class="saltopagina"></div>
<?php
}
?>
<table>
	<tr>
		<td>
			<img src="./imagenes/cabeceras/contexto/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Disponibilidad de recursos para el estudio en la familia de los alumnos
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Porcentaje de alumnos en esta escuela que cuenta con:
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<br/>
			<div id="g24" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Apoyo académico recibido por parte de la familia
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Frecuencia con que alguno de los padres u otro familiar apoyan a los alumnos en las siguientes actividades:
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<br/>
			<div id="g25" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel1.png" style="vertical-align: middle;">&nbsp;Nunca
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel2.png" style="vertical-align: middle;">&nbsp;Pocas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel3.png" style="vertical-align: middle;">&nbsp;Muchas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel4.png" style="vertical-align: middle;">&nbsp;Siempre
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="td_right" style="vertical-align: bottom;padding-right: 50px;">
			<br/>
			Página <?php if($datos_escuela['MUESTRA']=="I"){echo "4 de 7";}else{echo "9 de 10";}?>
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
<div class="saltopagina"></div>

<table>
	<tr>
		<td>
			<img src="./imagenes/cabeceras/contexto/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Compromiso con las tareas escolares
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Frecuencia con que los alumnos realizan las siguientes actividades:
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<br/>
			<div id="g26" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel1.png" style="vertical-align: middle;">&nbsp;Nunca
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel2.png" style="vertical-align: middle;">&nbsp;Pocas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel3.png" style="vertical-align: middle;">&nbsp;Muchas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel4.png" style="vertical-align: middle;">&nbsp;Siempre
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Frecuencia con que los alumnos realizan las siguientes actividades:
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<br/>
			<div id="g27" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel4.png" style="vertical-align: middle;">&nbsp;Nunca
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel3.png" style="vertical-align: middle;">&nbsp;Pocas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel2.png" style="vertical-align: middle;">&nbsp;Muchas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel1.png" style="vertical-align: middle;">&nbsp;Siempre
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="td_right" style="vertical-align: bottom;padding-right: 50px;">
			<br/>
			Página <?php if($datos_escuela['MUESTRA']=="I"){echo "5 de 7";}else{echo "10 de 10";}?>
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
<div class="saltopagina"></div>

<table>
	<tr>
		<td>
			<img src="./imagenes/cabeceras/contexto/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Clima de participación y respeto en el aula
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Frecuencia con que los maestros realizan las siguientes actividades, en opinión de los alumnos de 6to grado:
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<br/>
			<div id="g28" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel1.png" style="vertical-align: middle;">&nbsp;Nunca
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel2.png" style="vertical-align: middle;">&nbsp;Pocas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel3.png" style="vertical-align: middle;">&nbsp;Muchas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel4.png" style="vertical-align: middle;">&nbsp;Siempre
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Frecuencia con que los maestros realizan las siguientes actividades, en opinión de los alumnos de 6to grado:
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<br/>
			<div id="g29" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel4.png" style="vertical-align: middle;">&nbsp;Nunca
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel3.png" style="vertical-align: middle;">&nbsp;Pocas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel2.png" style="vertical-align: middle;">&nbsp;Muchas veces
					</td>
					<td style="font-size:10px;">
						<img src="./imagenes/widgets/nivel1.png" style="vertical-align: middle;">&nbsp;Siempre
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="td_right" style="vertical-align: bottom;padding-right: 50px;">
			<br/>
			Página <?php if($datos_escuela['MUESTRA']=="I"){echo "6 de 7";}else{echo "10 de 10";}?>
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
<div class="saltopagina"></div>

<table>
	<tr>
		<td>
			<img src="./imagenes/cabeceras/matricula/cabeza_<?php echo $datos_escuela['CLAVE_RENAPO'];?>.png" class="elem_center" style="height: 100px">
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Alumnos, docentes y grupos ciclo 2017-2018
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td>
			<table style="width: 70%;margin-left: auto; margin-right: auto;">
				<tr style="background-color:#002060;color:#ffffff;">
					<td>
					</td>
					<td colspan="3" style="text-align: center;font-weight: bold;border-bottom-color: white;border-bottom-width: medium;border-bottom-style: solid;color: white;">
						Matrícula
					</td>
				</tr>
				<tr style="background-color:#002060;color:#ffffff;">
					<td style="text-align: center;font-weight: bold;color: white;">
						Grado
					</td>
					<td style="text-align: center;font-weight: bold;color: white;">
						2014-2015
					</td>
					<td style="text-align: center;font-weight: bold;color: white;">
						2015-2016
					</td>
					<td style="text-align: center;font-weight: bold;color: white;">
						2016-2017
					</td>
				</tr>
				<tr>
					<td style="text-align: center;background-color:#002060;color:#ffffff;font-weight: bold;">
						1°
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['MAT_PRIM_1415'];?>
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['MAT_PRIM_1516'];?>
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['MAT_PRIM_1617'];?>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;background-color:#002060;color:#ffffff;font-weight: bold;">
						2°
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['MAT_SEG_1415'];?>
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['MAT_SEG_1516'];?>
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['MAT_SEG_1617'];?>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;background-color:#002060;color:#ffffff;font-weight: bold;">
						3°
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['MAT_TER_1415'];?>
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['MAT_TER_1516'];?>
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['MAT_TER_1617'];?>
					</td>
				</tr>
			</table>
			<br/>
			<br/>
			<table style="width: 70%;margin-left: auto; margin-right: auto;">
				<tr style="background-color:#002060;color:#ffffff;">
					<td style="text-align: center;font-weight: bold;color: white;">
						Grado
					</td>
					<td style="text-align: center;font-weight: bold;color: white;">
						1°
					</td>
					<td style="text-align: center;font-weight: bold;color: white;">
						2°
					</td>
					<td style="text-align: center;font-weight: bold;color: white;">
						3°
					</td>
				</tr>
				<tr>
					<td style="text-align: center;background-color:#002060;color:#ffffff;font-weight: bold;">
						Grupos
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['GPOS_PRIM_1617'];?>
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['GPOS_SEG_1617'];?>
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['GPOS_TER_1617'];?>
					</td>
				</tr>
			</table>
			<br/>
			<br/>
			<table style="width: 70%;margin-left: auto; margin-right: auto;">
				<tr style="background-color:#002060;color:#ffffff;">
					<td colspan="2" style="text-align: center;font-weight: bold;color: white;">
						Total de docentes
					</td>
				</tr>
				<tr>
					<td style="text-align: center;background-color:#002060;color:#ffffff;font-weight: bold;width:200px;">
						Docentes
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['DOC_TOT_1617'];?>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;background-color:#002060;color:#ffffff;font-weight: bold;width:200px;">
						Docentes Especiales
					</td>
					<td style="background-color:#dee2f6;color:#999999;font-weight: bold;text-align: center">
						<?php echo $datos_escuela['DOC_ESP_1617'];?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Avance escolar (ciclo escolar 2016-2017)
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<br/>
			<div id="g7" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td class="td_center">
			<br/>
			Definiciones
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<img src="http://analisis.websire.inee.edu.mx:9191/reporte_sec/imagenes/separador.png" style="width:95%;">
		</td>
	</tr>
	<tr>
		<td class="td_left">
			<span style="font-weight: bold">Matriculación oportuna:</span> Porcentaje de alumnos matriculados en primer grado con 12 años de edad.<br/><br/>
			<span style="font-weight: bold">Alumnos en edad idónea y extraedad ligera:</span> Porcentaje de alumnos que cursan el grado correspondiente a su edad o un grado menos.<br/><br/>
			<span style="font-weight: bold">Aprobación al final del ciclo escolar:</span> Porcentaje de alumnos que acreditan el grado cursado al finalizar ciclo escolar.<br/><br/>
			<span style="font-weight: bold">Aprobación después del periodo de regularización:</span> Porcentaje de alumnos que acreditan el grado al finalizar el ciclo escolar o después del periodo de regularización.<br/><br/>
			<span style="font-weight: bold">Retención intracurricular:</span> Porcentaje de alumnos matriculados al final del ciclo escolar respecto de la matrícula al inicio del ciclo. Puede tomar valores por encima de 100% debido a alumnos que se incorporan en el transcurso del ciclo escolar<br/><br/>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<div id="alumn_por_grado" style="margin-left: auto; margin-right: auto;"></div>
		</td>
	</tr>
	<tr>
		<td class="td_right" style="vertical-align: bottom;padding-right: 50px;">
			<br/>
			Página <?php if($datos_escuela['MUESTRA']=="I"){echo "7 de 7";}else{echo "10 de 10";}?>
			<br/>
			Para más información sobre los resultados de tu escuela visita <a href="https://www.inee.edu.mx/index.php/sire-inee">www.inee.edu.mx/index.php/sire-inee</a>
		</td>
	</tr>
</table>
</html>
