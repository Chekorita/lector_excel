<?php
    require '../vendor/autoload.php';
    include './funciones_generales.php';
    include './funciones_fechas.php';

    $funcion = isset($_POST['funcion']) ? $_POST['funcion'] : null;
    if(is_null($funcion)){
        $respuesta = [
            "estado" => 2,
            "mensaje" => "No se ha recibido la función a ejecutar",
        ];
        echo json_encode($respuesta);
    }else{
        switch($funcion):
            case 'procesar_excel':
                echo json_encode(procesar_excel());
            break;
            default:
                $respuesta = [
                    "estado" => 2,
                    "mensaje" => "La función solicitada no existe",
                ];
                echo json_encode($respuesta);
            break;
        endswitch;
    }

    function procesar_excel(): array | bool {
        $archivo = isset($_FILES['archivo']) ? $_FILES['archivo'] : null;
        if(is_null($archivo)){
            $respuesta = [
                "estado" => 2,
                "mensaje" => "No se ha recibido el archivo a procesar",
            ];
            return $respuesta;
        }else{
            if($archivo['error'] == UPLOAD_ERR_OK){
                $nombre_archivo = $archivo['name'];
                $file_archivo = $archivo['tmp_name'];
                $tipo_archivo = $archivo['type'];
                switch($tipo_archivo){
                    case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                        //leer archivo excel
                        $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        $spreadsheet = $reader->load($file_archivo);
                        //leeter todas las hojas
                        $hojas = $spreadsheet->getSheetNames();
                        $columnas = [];
                        $datos = [];
                        foreach($hojas as $hoja){
                            $spreadsheet->setActiveSheetIndexByName($hoja);
                            $hoja = $spreadsheet->getActiveSheet();
                            $numero_fila = 0;
                            foreach($hoja->getRowIterator() as $fila){
                                $celdas = $fila->getCellIterator();
                                $numero_celda = 0;
                                $data = [];
                                foreach($celdas as $celda){
                                    $dato = mb_convert_encoding($celda->getValue(), 'ISO-8859-1', 'UTF-8');
                                    $dato = str_replace("??????", "", $dato);
                                    //esto lo realizo debido a que he encontrado puntos donde fallan ciertos caracteres como la ñ
                                    $dato = iconv("ISO-8859-1", "UTF-8", $dato);
                                    $dato = limpiarCadena($dato, "Con");
                                    if($dato != "" && $dato != null){
                                        array_push($data, $dato);
                                    }
                                    $numero_celda++;
                                }
                                if($numero_fila > 0){
                                    $numero_columnas = count($columnas);
                                    $numero_data = count($data);
                                    if($data != [] && $numero_data == $numero_columnas){
                                        array_push($datos,$data);
                                    }
                                }else{
                                    if($columnas == []){
                                        $columnas = $data;
                                    }
                                }
                                $numero_fila++;
                            }
                        }
                        $respuesta = [
                            "estado" => 1,
                            "mensaje" => "Archivo procesado correctamente",
                            "columnas" => $columnas,
                            "data" => $datos,
                        ];
                        return $respuesta;
                    break;
                    case 'application/vnd.ms-excel':
                        //leer archivo excel
                        $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        $spreadsheet = $reader->load($file_archivo);
                        //leeter todas las hojas
                        $hojas = $spreadsheet->getSheetNames();
                        $columnas = [];
                        $datos = [];
                        foreach($hojas as $hoja){
                            $spreadsheet->setActiveSheetIndexByName($hoja);
                            $hoja = $spreadsheet->getActiveSheet();
                            $numero_fila = 0;
                            foreach($hoja->getRowIterator() as $fila){
                                $celdas = $fila->getCellIterator();
                                $numero_celda = 0;
                                $data = [];
                                foreach($celdas as $celda){
                                    $dato = mb_convert_encoding($celda->getValue(), 'ISO-8859-1', 'UTF-8');
                                    $dato = str_replace("??????", "", $dato);
                                    //esto lo realizo debido a que he encontrado puntos donde fallan ciertos caracteres como la ñ
                                    $dato = iconv("ISO-8859-1", "UTF-8", $dato);
                                    $dato = limpiarCadena($dato, "Con");
                                    if($dato != "" && $dato != null){
                                        array_push($data, $dato);
                                    }
                                    $numero_celda++;
                                }
                                if($numero_fila > 0){
                                    $numero_columnas = count($columnas);
                                    $numero_data = count($data);
                                    if($data != [] && $numero_data == $numero_columnas){
                                        array_push($datos,$data);
                                    }
                                }else{
                                    if($columnas == []){
                                        $columnas = $data;
                                    }
                                }
                                $numero_fila++;
                            }
                        }
                        $respuesta = [
                            "estado" => 1,
                            "mensaje" => "Archivo procesado correctamente",
                            "columnas" => $columnas,
                            "data" => $datos,
                        ];
                        return $respuesta;
                    break;
                    case 'text/csv':
                        $numero_fila = 0;
                        $columnas = [];
                        $datos = [];
                        if($gestor = fopen($file_archivo, 'r')){
                            while(($data = fgetcsv($gestor,0,",")) !== false){
                                $numero = count($data);
                                for($c = 0; $c < $numero; $c++){
                                    $dato = str_replace("??????", "", $data[$c]);
                                    $dato = iconv("ISO-8859-1", "UTF-8", $dato);
                                    $data[$c] = $dato;
                                }
                                if($numero_fila == 0){
                                    $columnas = $data;
                                }else{
                                    $datos[] = $data;
                                }
                                $numero_fila++;
                            }
                        }
                        fclose($gestor);
                        $respuesta = [
                            "estado" => 1,
                            "mensaje" => "Archivo procesado correctamente",
                            "columnas" => $columnas,
                            "data" => $datos,
                        ];
                        return $respuesta;
                    break;
                    default:
                        $respuesta = [
                            "estado" => 2,
                            "mensaje" => "El archivo no es un archivo de excel",
                        ];
                        return $respuesta;
                    break;
                }
            }
        }
    }
?>
