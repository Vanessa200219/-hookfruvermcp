<?php  

session_start();

$id = $_GET['id']; 

if (!isset($_SESSION['NumerodeDocumento'])) {

	header('Location: ../../Cuenta/Vista/iniciarsesion.php');

}elseif(isset($_SESSION['NumerodeDocumento'])){

		include '../../Conexion/Conexion.php';
		$sentencia = $bd->query("SELECT * FROM persona INNER JOIN roles ON persona.id_rol = roles.Id WHERE NumerodeDocumento = $id;");
		$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
		print_r($usuarios);
	
}

foreach ($usuarios as $dato) {
    echo $dato->Nombres;
    echo $dato->id_rol;


if (isset($dato->id_rol)) {
    switch ($dato->id_rol) {
        case 5:
            header('Location: ../Vista/empleadoD.php?id='.$dato->NumerodeDocumento);
            break;

        case 3:
            header('Location: ../Vista/empleadoV.php?id='.$dato->NumerodeDocumento);
            break;
        
        default:
        
    }
}
}
?>