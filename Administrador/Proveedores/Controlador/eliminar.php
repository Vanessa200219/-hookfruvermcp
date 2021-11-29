<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$codigo = $_GET['id'];
	include '../../Conexion/Conexion.php';
	$sentencia = $bd->prepare("DELETE FROM persona WHERE NumerodeDocumento = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		echo '<script language="javascript">alert("Se elimino el Empleado con exito");window.location.href="../index.php"</script>';
	}else{
		echo "Error";
	}

?>