<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include '../../Conexion/Conexion.php';
	$id2 = $_POST['id2'];
	$NombreC2 = $_POST['txt2NombreCategoria'];
	$DescripcionC2 = $_POST['txt2DescripcionCategoria'];

	$sentencia = $bd->prepare("UPDATE categoria SET NombredeCategoria = ?, DescripcionCategoria = ? WHERE CodigoCategoria = ?;");
	$resultado = $sentencia->execute([$NombreC2,$DescripcionC2,$id2]);

	if ($resultado === TRUE) {
		// header('Location: ../index.php');
		echo '<script language="javascript">alert("Categoria Modificada con exito");window.location.href="../index.php"</script>';

	}else{
		echo '<script language="javascript">alert("Error, No se pudo Modificar el dato");window.location.href="../index.php"</script>';
	}
?>