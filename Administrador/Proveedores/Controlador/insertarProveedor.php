<?php  

 
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include '../../Conexion/Conexion.php';

	try {
	$NumerodeDocumento = $_POST['txtNumerodeDocumento'];
	$NitProveedor = $_POST['txtNitProveedor'];
	$Ciudad = $_POST['txtCiudad'];

	$sentencia = $bd->prepare("INSERT INTO proveedores(NumerodeDocumento,NitProveedor,Ciudad) VALUES (?,?,?);");
	$resultado = $sentencia->execute([$NumerodeDocumento,$NitProveedor,$Ciudad]);

	} catch(PDOException) {
		 echo '<script language="javascript">alert("Error al ingresar datos");window.location.href="../index.php"</script>';
    }
	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: ../Vista/informacion.php?id='.$NumerodeDocumento);
	}else{
		echo "Error";
	}
?>