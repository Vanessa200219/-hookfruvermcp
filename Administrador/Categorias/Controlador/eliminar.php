<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$codigo = $_GET['id'];
	include '../../Conexion/Conexion.php';
	$sentencia = $bd->prepare("DELETE FROM categoria WHERE CodigoCategoria  = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		// header('Location: index.php');
		echo '<script language="javascript">alert("Se Elimino Con exito");window.location.href="../index.php"</script>';
	}else{
		echo "Error";
	}

?>