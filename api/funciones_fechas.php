<?php
	function nombreMes($fecha){
		$fecha = strtotime($fecha);
		$mes=date("F", $fecha);
		switch ($mes) {
			case "January":
				$nomMess = "ENERO";
			break;
			case "February":
				$nomMess = "FEBRERO";
			break;
			case "March":
				$nomMess = "MARZO";
			break;
			case "April":
				$nomMess = "ABRIL";
			break;
			case "May":
				$nomMess = "MAYO";
			break;
			case "June":
				$nomMess = "JUNIO";
			break;
			case "July":
				$nomMess = "JULIO";
			break;
			case "August":
				$nomMess = "AGOSTO";
			break;
			case "September":
				$nomMess = "SEPTIEMBRE";
			break;
			case "October":
				$nomMess = "OCTUBRE";
			break;
			case "November":
				$nomMess = "NOVIEMBRE";
			break;
			case "December":
				$nomMess = "DICIEMBRE";
			break;
			default:
				$nomMess = "SM";
			break;
		}
		return $nomMess;
	}

	function nombreDia($fecha){
		$fecha = strtotime($fecha);
		switch (date('w', $fecha)){
			case 0:
				$diaCurso="DOMINGO";
			break;
			case 1:
				$diaCurso="LUNES";
			break;
			case 2:
				$diaCurso="MARTES";
			break;
			case 3:
				$diaCurso="MIÉRCOLES";
			break;
			case 4:
				$diaCurso="JUEVES";
			break;
			case 5:
				$diaCurso="VIERNES";
			break;
			case 6:
				$diaCurso="SÁBADO";
			break;
			default:
				$diaCurso = "SD";
			break;
		}
		return $diaCurso;
	}

	function contruirFechaTextoSinDia($fecha){
		$fechaCompletaTexto="";
		$fechaPartes = explode("-",$fecha);
		$nombreMes = nombreMes($fecha);
		$fechaCompletaTexto = $fechaPartes[2]." DE ".$nombreMes." DE ".$fechaPartes[0];
		return $fechaCompletaTexto;
	}

	function contruirFechaTextoConDia($fecha){
		$fechaCompletaTexto="";
		$fechaPartes = explode("-",$fecha);
		$nombreMes = nombreMes($fecha);
		$nombreDia = nombreDia($fecha);
		$fechaCompletaTexto = $nombreDia." ".$fechaPartes[2]." DE ".$nombreMes." DE ".$fechaPartes[0];
		return $fechaCompletaTexto;
	}
?>