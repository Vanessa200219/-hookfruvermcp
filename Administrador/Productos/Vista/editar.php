<?php  
	include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM productos WHERE CodigoProducto = ?;");
		$sentencia->execute([$id]);
		$productos1 = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($productos1);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Producto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/tabla.css">
</head>
<body>

    <!-- HEADER DE RUTAS Y DESCARGAS -->
    <div id="header">
            
        <a class="return  header" href="">INICIO</a>
        <a class="products  header" href="index.php">PRODUCTOS</a>

    </div>
   <!-- FIN DE HEADER RUTAS Y DESCARGAS -->

	<center>
		<h3>Editar Producto:</h3>
		<form method="POST" action="editarProceso.php">
			<table class="form__items">
				<tr>
					<td>Codigo Categoria: </td>
					<td><input type="text" name="txt2Categoria" value="<?php echo $productos1->CodigoCategoria; ?>"></td>
				</tr>
				<tr>
					<td>Nit Proveedor: </td>
					<td><input type="text" name="txt2Proveedor" value="<?php echo $productos1->NitProveedor; ?>"></td>
				</tr>
				<tr>
					<td>Nombre Producto: </td>
					<td><input type="text" name="txt2Producto" value="<?php echo $productos1->NombreProducto; ?>"></td>
				</tr>
				<tr>
					<td>Valor Unitario: </td>
					<td><input type="text" name="txt2Valor" value="<?php echo $productos1->ValorUnitario; ?>"></td>
				</tr>
				<tr>
					<td>Cantidad: </td>
					<td><input type="text" name="txt2Cantidad" value="<?php echo $productos1->Cantidad; ?>"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $productos1->CodigoProducto; ?>">
					<td colspan="2"><input type="submit" value="Aceptar"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>