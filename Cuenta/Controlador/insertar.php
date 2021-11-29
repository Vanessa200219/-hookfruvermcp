<?php 



if (!isset($_POST['oculto'])) {
    exit();
}

include '../Conexion/Conexion.php';

try {

    $nombre=$_POST['Nombres'];
    $apellido=$_POST['Apellidos'];
    $tipodedocumento=$_POST['TipodeDocumento'];
    $numerodedocumento=$_POST['NumerodeDocumento'];
    $telefono=$_POST['Telefono'];
    $email=$_POST['CorreoElectronico'];
    $sexo=$_POST['Sexo'];
    $contrasena=md5($_POST['Contrasena']);
    $rol=2;


    $sentencia = $bd->prepare("INSERT INTO persona(Nombres,Apellidos,TipodeDocumento,NumerodeDocumento,Telefono,CorreoElectronico,Sexo,Contrasena,id_rol) VALUES (?,?,?,?,?,?,?,?,?);");
	$resultado = $sentencia->execute([$nombre,$apellido,$tipodedocumento,$numerodedocumento,$telefono,$email,$sexo,$contrasena,$rol]);

} catch(PDOException $e) {
    $e = header('Location:../Vista/Error.php');
}


if ($resultado === TRUE) {
    //echo "Insertado correctamente";
    header('Location: ../Vista/iniciarsesion.php');
}else{
    header('Location:../Vista/Error.php');
}


?>