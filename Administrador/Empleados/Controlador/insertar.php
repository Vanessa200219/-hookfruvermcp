<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include '../../Conexion/Conexion.php';

	try {

	$nombres = $_POST['txtNombres'];
	$apellidos = $_POST['txtApellidos'];
	$tipodoc = $_POST['txtTipodeDocumento'];
	$numDoc = $_POST['txtNumerodeDocumento'];
	$telefono = $_POST['txtTelefono'];
    $correo = $_POST['txtCorreoElectronico'];
    $sexo=$_POST['txtSexo'];
	$contrasena=md5($_POST['txtContrasena']);
	$id_rol = $_POST['txtRol'];

    $sentencia = $bd->prepare("INSERT INTO persona(Nombres,Apellidos,TipodeDocumento,NumerodeDocumento,Telefono,CorreoElectronico,Sexo,Contrasena,id_rol) VALUES (?,?,?,?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$nombres,$apellidos,$tipodoc,$numDoc,$telefono,$correo,$sexo,$contrasena,$id_rol]);


} catch(PDOException) {
	echo '<script language="javascript">alert("Error .... El documento ya existe");window.location.href="../index.php"</script>';
    
}

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		// header('Location: ../Vista/vendedor.php');

		if (isset($id_rol)) {
			switch ($id_rol) {
				case 3:
					header('Location: ../Vista/vendedor.php?id='.$numDoc);
					break;
	
				case 5:
					header('Location: ../Vista/domiciliario.php?id='.$numDoc);
					break;
				
				default:
				
			}
		}
	}else{
		echo "Error";
	}
?>