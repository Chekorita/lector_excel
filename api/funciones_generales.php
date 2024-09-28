<?php
	function obtener_string_random(int $length = 18): string | bool{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for($i = 0; $i < $length; $i++){
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	function obtener_string_hash($string_in): string | bool{
		$string_out = hash('sha256',$string_in);
		return $string_out;
	}

	function obtener_mensajes(): object | bool{
		$arreglo_mensajes = [];
		$mensaje = [
			'nombre' => 'Sergio',
			'mensaje' => 'PRUEBA DE MENSAJE',
			'hora' => '11:20',
		];
		array_push($arreglo_mensajes, $mensaje);
		$total_mensajes = count($arreglo_mensajes);
		$mensajes = [
			'total' => $total_mensajes,
			'mensajes' => $arreglo_mensajes,
		];
		return (object)$mensajes;
	}

	function obtener_notificaciones(): object | bool{
		$arreglo_notificaciones = [];
		$notificacion = [
			'hora' => '11:20',
			'notificacion' => 'Se hara una actualizaciona al sistema, favor de guardar su trabajo',
		];
		array_push($arreglo_notificaciones, $notificacion);
		$total_notificaciones = count($arreglo_notificaciones);
		$notificaciones = [
			'total' => $total_notificaciones,
			'notificaciones' => $arreglo_notificaciones,
		];
		return (object)$notificaciones;
	}

	function limpiarCadena($string,$espacios=' '){ //si no recibe parametro en espacios quita espacios en blanco
		$string = trim($string);
		$string = str_replace(
			array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
			array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
			$string
		);
		$string = str_replace(
			array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
			array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
			$string
		);
		$string = str_replace(
			array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
			array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
			$string
		);
		$string = str_replace(
			array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
			array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
			$string
		);
		$string = str_replace(
			array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
			array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
			$string
		);
		$string = str_replace(
			array('ç', 'Ç'),
			array('c', 'C',),
			$string
		);
		$string = str_replace(
			array("\\", "¨", "º","~", "\"",
				"|", "!", "·", "/", "¡",
				"(", ")", "?", "'", "]",
				"¿", "[", "`", "´", "¨",
				"}", "{", ">", "< ", ";", ":"),
			'',
			$string
		);
		$string = str_replace(
			array("\t","\n","\r","\v","\f"),
			'',
			$string
		);
		if($espacios == ' '){
			$string = str_replace(" ", "", $string);
		}
		if($espacios == 'Con'){
			$string = preg_replace("/\s+/", " ", $string);
		}
		return $string;
	}

	function limpiarCadenaParcial($string){
		$string = trim($string);
		$string = str_replace(
			array("\\", "¨", "-", "¨", "|",
				"\"", "·", "&", "'", "`",
				"´", ">", "< ", ",","+"),
			'',
			$string
		);
		$string = str_replace(
			array("\t","\n","\r","\v","\f"),
			'',
			$string
		);
		$string = preg_replace("/\s+/", " ", $string);
		return $string;
	}
?>