<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$codigo = $_GET['id'];
	include '../Conexion/Conexion.php';
	$sentencia = $bd->prepare("DELETE FROM persona WHERE NumerodeDocumento  = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		header('Location: ../Vista/Listar.php');
	}else{
		echo "Error";
	}

?>