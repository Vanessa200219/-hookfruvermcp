<?php  

 
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include '../../Conexion/Conexion.php';

	try {
	$CarnetdeTrabajo = $_POST['txtCarnetdeTrabajo'];
	$NumerodeDocumento = $_POST['txtNumerodeDocumento'];
	$SueldoBasico = $_POST['txtSueldoBasico'];
	$Direccion = $_POST['txtDireccion'];
	$Ciudad = $_POST['txtCiudad'];
	$estrato = $_POST['txtestrato'];

	$sentencia = $bd->prepare("INSERT INTO vendedores(CarnetdeTrabajo,NumerodeDocumento,SueldoBasico,Direccion,Ciudad,Estrato) VALUES (?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$CarnetdeTrabajo,$NumerodeDocumento,$SueldoBasico,$Direccion,$Ciudad,$estrato]);

	} catch(PDOException) {
		 echo '<script language="javascript">alert("Error al ingresar datos");window.location.href="../index.php"</script>';
    }
	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: ../Vista/empleadoV.php?id='.$NumerodeDocumento);
	}else{
		echo "Error";
	}
?>