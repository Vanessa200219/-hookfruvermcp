<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$id2 = $_POST['id2'];
	$Categoria2 = $_POST['txt2Categoria'];
	$Proveedor2 = $_POST['txt2Proveedor'];
	$Producto2 = $_POST['txt2Producto'];
	$Valor2 = $_POST['txt2Valor'];
	$Cantidad2 = $_POST['txt2Cantidad'];

	$sentencia = $bd->prepare("UPDATE productos SET CodigoCategoria = ?, NitProveedor = ?, NombreProducto = ?, 
												ValorUnitario = ?, Cantidad = ? WHERE CodigoProducto = ?;");
	$resultado = $sentencia->execute([$Categoria2,$Proveedor2,$Producto2,$Valor2,$Cantidad2, $id2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>