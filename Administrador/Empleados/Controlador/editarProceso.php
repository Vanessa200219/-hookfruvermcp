<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include '../../Conexion/Conexion.php';;
	$id2 = $_POST['id2'];
    $telefon2=$_POST['Telefono2'];
    $email2=$_POST['CorreoElectronico2'];
    $contrasena2=md5($_POST['Contrasena2']);

	$sentencia = $bd->prepare("UPDATE persona SET Telefono = ?, CorreoElectronico = ?, Contrasena = ? WHERE NumerodeDocumento  = ?;");
	$resultado = $sentencia->execute([$telefon2,$email2,$contrasena2, $id2]);

	if ($resultado === TRUE) {
        // header('Location: ../index.php');
		echo '<script language="javascript">alert("Empleado Modificado con exito");window.location.href="../index.php"</script>';

	}else{
		echo "Error";
	}
?>