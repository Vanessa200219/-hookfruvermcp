<?php  

		include '../Conexion/Conexion.php';
		$sentencia = $bd->query("SELECT * FROM productos;");
		$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($productos);
	

	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>LISTA DE PRODUCTOS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/tabla.css">
</head>
<body>

    <!-- HEADER DE RUTAS Y DESCARGAS -->
    <div id="header">
            
        <a class="return  header" href="">INICIO</a>

    </div>
   <!-- FIN DE HEADER RUTAS Y DESCARGAS -->

	<center>
		<div class="div__firmts">
		<h3>LISTA DE PRODUCTOS</h3>
		<table class="table__1">
			<tbody>
			<tr class="td__tittle">
				<td>Codigo Producto</td>
				<td>Codigo Categoria</td>
				<td>Nit Proveedor</td>
				<td>Nombre Producto</td>
				<td>Valor Unitario</td>
				<td>Cantidad</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			</tbody>
			<?php 
				foreach ($productos as $dato) {
					?>
					<tr class="content">
						<td><?php echo $dato->CodigoProducto; ?></td>
						<td><?php echo $dato->CodigoCategoria; ?></td>
						<td><?php echo $dato->NitProveedor; ?></td>
						<td><?php echo $dato->NombreProducto; ?></td>
						<td><?php echo $dato->ValorUnitario; ?></td>
						<td><?php echo $dato->Cantidad; ?></td>
						<td><a class="editar" href="editar.php?id=<?php echo $dato->CodigoProducto; ?>">Editar</a></td>
						<td><a class="eliminar" href="eliminar.php?id=<?php echo $dato->CodigoProducto; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>
		</div>
		<!-- inicio insert -->
		<hr>
		<h3>Ingresar Porducto:</h3>
		<form class="form" method="POST" action="insertar.php">
			<table class="form__items">
				<tr>
					<td>Codigo Categoria: </td>
					<td><input type="text" name="txtCategoria"></td>
				</tr>
				<tr>
					<td>Nit Proveedor: </td>
					<td><input type="text" name="txtProveedor"></td>
				</tr>
				<tr>
					<td>Nombre Producto: </td>
					<td><input type="text" name="txtProducto"></td>
				</tr>
				<tr>
					<td>Valor Unitario: </td>
					<td><input type="text" name="txtValor"></td>
				</tr>
				<tr>
					<td>Cantidad: </td>
					<td><input type="text" name="txtCantidad"></td>
				</tr>
				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="Registrar"></td>
				</tr>
			</table>
		</form>
		<!-- fin insert-->


		

	</center>
</body>
</html>