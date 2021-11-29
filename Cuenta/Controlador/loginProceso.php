<?php 
	session_start();
	include_once '../Conexion/Conexion.php';


	$usuario = $_POST['usuario'];
	$contrasena = md5($_POST['contraseña']);
	$sentencia = $bd->prepare('SELECT * FROM persona WHERE 
								CorreoElectronico = ? AND Contrasena = ?;');



	$sentencia->execute([$usuario, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);

	if ($datos === FALSE) {
		header('Location: ../Vista/iniciarsesion.php');

	}elseif($sentencia->rowCount() == 1){
		$_SESSION['NumerodeDocumento'] = $datos->NumerodeDocumento;
		$_SESSION['Nombres'] = $datos->Nombres;
		$_SESSION['id_rol'] = $datos->id_rol;
		// header('Location: ../Vista/inicio.php');
	}

	
	if (isset($_SESSION['id_rol'])) {
		switch ($_SESSION['id_rol']) {
			case 2:
				header('Location: ../Vista/inicio.php');
				break;

			case 6:
				header('Location: ../../Administrador/CuentaAdmi/Vista/inicio.php');
				break;
			
			default:
			
		}
	}




	
?>