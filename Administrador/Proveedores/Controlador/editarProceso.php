<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include '../../Conexion/Conexion.php';;
	$id2 = $_POST['id2'];
    $Correo2=$_POST['txt2Correo'];
    $telefono=$_POST['txt2Telefono'];

	$sentencia = $bd->prepare("UPDATE persona SET Telefono = ?, CorreoElectronico = ? WHERE NumerodeDocumento  = ?;");
	$resultado = $sentencia->execute([$telefono,$Correo2,$id2]);

	if ($resultado === TRUE) {
        // header('Location: ../index.php');
		echo '<script language="javascript">alert("Proveedor Modificado con exito");window.location.href="../index.php"</script>';

	}else{
		echo "Error";
	}
?>