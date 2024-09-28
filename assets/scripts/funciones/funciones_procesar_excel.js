document.addEventListener("DOMContentLoaded", () => {
    var contenedor_alertas = document.getElementById("contenedor-alertas");
    contenedor_alertas.innerHTML = generar_alerta_bootstrap_sin_titulo("warning", "El archivo debe ser de tipo de algun formato excel (.xls, .xlsx, .csv).");
});

function validar_procesar_excel(){
    if(valida_archivo()){
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Se procesaran los datos del archivo seleccionado.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                procesar_excel();
            }
        });
    }
}

function valida_archivo(){
    var archivo = document.getElementById("sel_archivo").value;
    var extension = archivo.split('.').pop();
    if(archivo == "" || archivo == null || archivo == undefined){
        Swal.fire({
            title: 'Error',
            text: 'Es necesario seleccionar un archivo',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        return false;
    }
    if(extension != "csv" || extension != "xls" || extension != "xlsx"){
        Swal.fire({
            title: 'Error',
            text: 'El archivo debe ser de tipo CSV',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        return false;
    }
    return true;
}

function procesar_excel(){
    var contenedor_bloqueo = document.getElementById("contenedor-bloquea");
    let archivo = document.getElementById("sel_archivo").files[0];
    let contenedor_status = document.getElementById("contenedor-status");
    let url = "./api/funciones_procesamiento.php";
    let datos = new FormData();
    datos.append("funcion", "subir_csv");
    datos.append("archivo", archivo);
    contenedor_status.innerHTML = getAnimacionCarga("Procesando archivo CSV...","secondary");
    contenedor_bloqueo.classList.remove("cargando_oculto");
    contenedor_bloqueo.classList.add("cargando");
}