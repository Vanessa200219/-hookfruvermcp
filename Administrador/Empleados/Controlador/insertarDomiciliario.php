<?php  

 
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include '../../Conexion/Conexion.php';

	try {
	$NumerodeDocumento = $_POST['txtNumerodeDocumento'];
	$CarnetdeTrabajo = $_POST['txtCarnetdeTrabajo'];
	$NumeroSeguroDom = $_POST['txtNumeroSeguroDom'];
	$NumeroSeguroVehi = $_POST['txtNumeroSeguroVehi'];
	$ValorDomicilio = $_POST['txtValorDomicilio'];

	$sentencia = $bd->prepare("INSERT INTO domiciliarios(NumerodeDocumento,CarnetdeTrabajo,NumeroSeguroDom,NumeroSeguroVehi,ValorDomicilio) VALUES (?,?,?,?,?);");
	$resultado = $sentencia->execute([$NumerodeDocumento,$CarnetdeTrabajo,$NumeroSeguroDom,$NumeroSeguroVehi,$ValorDomicilio]);

	} catch(PDOException) {
		 echo '<script language="javascript">alert("Error al ingresar datos");window.location.href="../index.php"</script>';
    }
	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: ../Vista/empleadoD.php?id='.$NumerodeDocumento);
	}else{
		echo "Error";
	}
?>