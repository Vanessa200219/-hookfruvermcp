<?php 
	// print_r($_POST);


	if (!isset($_POST['oculto'])) {
		header('Location: ../Vista/inicio.php');
	}

	include '../../Conexion/Conexion.php';
	$id2 = $_POST['id2'];
    $nombre2=$_POST['Nombres2'];
    $apellido2=$_POST['Apellidos2'];
    $telefon2=$_POST['Telefono2'];
    $email2=$_POST['CorreoElectronico2'];

	$sentencia = $bd->prepare("UPDATE persona SET Nombres = ?, Apellidos = ?, Telefono = ?, 
												CorreoElectronico = ? WHERE NumerodeDocumento  = ?;");
	$resultado = $sentencia->execute([$nombre2,$apellido2,$telefon2,$email2, $id2]);

	if ($resultado === TRUE) {
		
		// header('Location: ../Vista/Editar.php');
		// include ('../Controlador/ListarProceso.php');
		
	}else{
		echo "Error";
	}




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificaciones</title>
</head>
<body>

	<!-- <section>
		<div>
			<span>Modificacion Existosa</span>
		</div>
	</section> -->

	<script language="javascript">alert("Modificacion Exitosa");window.location.href="../Vista/Informacion.php"</script>
	
</body>
</html>