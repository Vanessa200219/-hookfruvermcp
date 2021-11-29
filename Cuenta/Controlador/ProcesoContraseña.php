<?php
session_start();
$usu = $_SESSION['NumerodeDocumento'];


if (!isset($_POST['oculto'])) {
    header('Location: ../Vista/inicio.php');
}
// print_r($_POST);

include '../Conexion/Conexion.php';

$id3 = $_POST['id3'];




$NuevaContraseña=md5($_POST['NuevaContrasena']);

$NuevaContraseña2=md5($_POST['ConfirmeContrasena']);

if ($NuevaContraseña == $NuevaContraseña2) {
    $sentencia = $bd->prepare("UPDATE persona SET Contrasena = ?  WHERE NumerodeDocumento  = ?");
    $resultado = $sentencia->execute([$NuevaContraseña2,$id3]);


    if ($resultado === TRUE) {
        echo '<script language="javascript">alert("Contraseña Modificada Existosamente");window.location.href="../Vista/Informacion.php"</script>';

	}else{
        echo '<script language="javascript">alert("Error al modificar Contraseñas");window.location.href="../Vista/Informacion.php"</script>';
	}
}else {
    echo '<script language="javascript">alert("Las contraseñas no son iguales");window.location.href="../Vista/Informacion.php"</script>';
    
}


?>