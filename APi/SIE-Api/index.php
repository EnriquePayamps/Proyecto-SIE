<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "proyectosmd";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);

//Modulo de Crud

// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){
    $sqlPacientes = mysqli_query($conexionBD,"SELECT * FROM pacientes WHERE PACIENTEID=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlPacientes) > 0){
        $pacientes = mysqli_fetch_all($sqlPacientes,MYSQLI_ASSOC);
        echo json_encode($pacientes);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar"])){
    $sqlPacientes = mysqli_query($conexionBD,"DELETE FROM pacientes WHERE PACIENTEID=".$_GET["borrar"]);
    if($sqlPacientes){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos
if(isset($_GET["insertar"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre=$data->NOMBRE;
    $apellido=$data->APELLIDO;
    $cedula=$data->CEDULA;
    $edad=$data->EDAD;
    $tipo_sangre=$data->TIPO_SANGRE;
    $sexo=$data->SEXO;
    $tel_emergencia=$data->TEL_EMERGENCIA;
    $doc_id=$data->DOC_ID;
    $dispositivo_medico=$data->DISPOSITIVO_MEDICO;
    $enfermedades_frecuentes=$data->ENFERMEDADES_FRECUENTES;
    $medicamentos_recetados=$data->MEDICAMENTOS_RECETADOS;
        if(($nombre!="")&&($apellido!="")&&($cedula!="")&&($edad!="")&&($tipo_sangre!="")&&($sexo!="")&&($tel_emergencia!="")&&($doc_id!="")&&($dispositivo_medico!="")&&($enfermedades_frecuentes!="")&&($medicamentos_recetados!="")){    

    $sqlPacientes = mysqli_query($conexionBD,"INSERT INTO pacientes(NOMBRE,APELLIDO,CEDULA,EDAD,TIPO_SANGRE,SEXO,TEL_EMERGENCIA,DOC_ID,DISPOSITIVO_MEDICO,ENFERMEDADES_FRECUENTES,MEDICAMENTOS_RECETADOS) 
        VALUES('$nombre','$apellido','$cedula','$edad','$tipo_sangre','$sexo','$tel_emergencia','$doc_id','$dispositivo_medico','$enfermedades_frecuentes','$medicamentos_recetados') ");
    echo json_encode(["success"=>1]);
        }
    exit();
}
// Actualiza datos pero recepciona datos y una clave para realizar la actualización
if(isset($_GET["actualizar"])){
    
    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $nombre=$data->NOMBRE;
    $apellido=$data->APELLIDO;
    $cedula=$data->CEDULA;
    $edad=$data->EDAD;
    $tipo_sangre=$data->TIPO_SANGRE;
    $sexo=$data->SEXO;
    $tel_emergencia=$data->TEL_EMERGENCIA;
    $doc_id=$data->DOC_ID;
    $dispositivo_medico=$data->DISPOSITIVO_MEDICO;
    $enfermedades_frecuentes=$data->ENFERMEDADES_FRECUENTES;
    $medicamentos_recetados=$data->MEDICAMENTOS_RECETADOS;
    $sqlPacientes = mysqli_query($conexionBD,"UPDATE pacientes 
        SET NOMBRE='$nombre',APELLIDO='$apellido',CEDULA='$cedula', EDAD='$edad',TIPO_SANGRE='$tipo_sangre', SEXO='$sexo',TEL_EMERGENCIA='$tel_emergencia', DOC_ID='$doc_id', DISPOSITIVO_MEDICO='$dispositivo_medico', ENFERMEDADES_FRECUENTES='$enfermedades_frecuentes', MEDICAMENTOS_RECETADOS='$medicamentos_recetados' 
        WHERE PACIENTEID='$id'");
    echo json_encode(["success"=>1]);
    exit();
}


//MODULO DE CONSULTAS

// Consulta datos y recepciona una cedula para consultar dichos datos con dicha cedula
if (isset($_GET["consultarCedulaPaciente"])){
    $sqlPacientes = mysqli_query($conexionBD,"SELECT * FROM pacientes WHERE CEDULA=".$_GET["consultarCedulaPaciente"]);
    if(mysqli_num_rows($sqlPacientes) > 0){
        $pacientes = mysqli_fetch_all($sqlPacientes,MYSQLI_ASSOC);
        echo json_encode($pacientes);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}


// Consulta todos los registros de la tabla
$sqlPacientes = mysqli_query($conexionBD,"SELECT * FROM pacientes ");
if(mysqli_num_rows($sqlPacientes) > 0){
    $pacientes = mysqli_fetch_all($sqlPacientes,MYSQLI_ASSOC);
    echo json_encode($pacientes);
}
else{ echo json_encode([["success"=>0]]); }

?>
