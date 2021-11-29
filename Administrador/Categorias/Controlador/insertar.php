<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include '../../Conexion/Conexion.php';

	$NombreC = $_POST['txtNombredeCategoria'];
	$DescripcionC = $_POST['txtDescripcionCategoria'];
	

	$sentencia = $bd->prepare("INSERT INTO categoria(NombredeCategoria,DescripcionCategoria) VALUES (?,?);");
	$resultado = $sentencia->execute([$NombreC,$DescripcionC]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		// header('Location: ../index.php');
		echo '<script language="javascript">alert("Categoria Insertada con exito");window.location.href="../index.php"</script>';
	}else{
		echo '<script language="javascript">alert("Error, No se pudo Insertar el dato");window.location.href="../index.php"</script>';
	}
?>