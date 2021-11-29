<?php  

session_start();


if (!isset($_SESSION['NumerodeDocumento'])) {

	header('Location: ../../Cuenta/Vista/iniciarsesion.php');

}elseif(isset($_SESSION['NumerodeDocumento'])){
		include '../Conexion/Conexion.php';
		$sentencia = $bd->query("SELECT * FROM categoria;");
		$categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($productos);
	

}	
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="../CuentaAdmi/CSS/index.css">
  	<link rel="stylesheet" href="../CuentaAdmi/CSS/perfil.css">
	<link rel="stylesheet" href="../Empleados/CSS/estilos.css">
	<link rel="stylesheet" href="../Empleados/CSS/buscador.css">
	<title>Lista de Categorias</title>
</head>
<body>

  <!-- MENU -->
  
  <section id="header">
    <div class="header">
      
        <div class="brand">
          <a href="../CuentaAdmi/Vista/inicio.php">
            <img src="../../imgindex/logo.png" alt="">
          </a>
        </div>
      <div class="nav-bar">
        
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="../CuentaAdmi/Vista/inicio.php" data-after="Inicio">Inicio</a></li>
            <li><a href="" data-after="Ayuda">Buzon de Ayuda</a></li>
            <li><a href="../Empleados/index.php" data-after="Productos">Empleados</a></li>
          </ul>
        </div>

            <div class="dropdown">
            
              <input  type="buttom" onclick="myFunction()" class="dropbtn" style="background-image:url('https://img.icons8.com/ios-filled/50/000000/cat-profile.png')">
              <span class="caret"></span>
              <div id="myDropdown" class="dropdown-content">
                <form action="../CuentaAdmi/Vista/listar.php" method="POST"><input class="perfil" type="submit" value="Perfil" name="btn2"></form>
                <a href="../Categorias/index.php">Categorias</a>
                <a href="">Productos</a>
                <a href="">Formas de Pago</a>
                <a href="../Proveedores/index.php" class="historial">Proveedores</a>
                <a class="" href="">Facturas</a>
                <a class="salir" href="../../Cuenta/Controlador/CerrarSesion.php">Salir</a>
              </div>
            </div>

      </div>
    </div>
  </section>

  <!-- FIN DE MENU -->
	
<center>
<div class="div__firmts">
<a href="#form" class="empleado">Nueva Categoria</a>


<!-- Buscador -->

<section class="buscador">
		<div >
					<form class="buscar" action="" method="get">
						<a href="index.php"><img id="BuscarImg" src="https://img.icons8.com/ios/50/000000/search-property.png"/></a>
						<input id="Buscar" type="text" name="Busqueda" placeholder="Buscar Categoria" required>
						<input id="Buscar1" type="submit" name="Buscar" value="Buscar">
					</form>
		</div>
</section>

<?php

				if (isset($_GET['Buscar'])) {
					$busqueda = $_GET['Busqueda'];


					$sentencia = $bd->query("SELECT * FROM categoria  WHERE NombredeCategoria LIKE '%$busqueda%';");
					$sentencia->execute();

					if ($busqueda == 0) { ?>
						
					 	<div class="no_existe"><?php echo "No existe este dato"; ?></div>	
					<?php	 
					}



					while ($dato = $sentencia->fetch()) { 
						
					?>
							
					<table class="table__1">

						<tr class="content">
							<td><?php 	echo $dato['CodigoCategoria']; ?></td>
							<td><?php echo $dato['NombredeCategoria']; ?></td>
							<td><?php echo $dato['DescripcionCategoria']; ?></td>
							<td><a class="editar" href="Vistas/informacion.php?id=<?php echo $dato['CodigoCategoria']; ?>">Ver más</a></td>
						</tr>
			
					</table>

					<?php
					
					}
				}

?>

<!-- Buscador Fin -->



<!-- Listar Categorias -->

<h3>Categorias</h3>
		<table class="table__1">
				<tbody>
					<tr class="td__tittle">
						<td>Codigo Categoria</td>
						<td>Nombre de Categoria</td>
						<td>Descripcion Categoria</td>
						<td>Informacion</td>
					</tr>
				</tbody>

			<?php 
				foreach ($categorias as $dato) {
			?>
					<tr class="content">
						<td><?php echo $dato->CodigoCategoria; ?></td>
						<td><?php echo $dato->NombredeCategoria; ?></td>
						<td><?php echo $dato->DescripcionCategoria; ?></td>
						<td><a class="editar" href="Vistas/informacion.php?id=<?php echo $dato->CodigoCategoria; ?>">Ver más</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

<!-- Listar Categorias Fin -->

</div>
<!-- Insertar Nueva Categoria -->
		
<h3>Nueva Categoria:</h3>

<form id="form" class="form" method="POST" action="Controlador/insertar.php">
	<table class="form__items">

		<tr>
			<td>Nombre de Categoria: </td>
			<td><input type="text" name="txtNombredeCategoria" placeholder="Nombre de Categoria" required></td>
		</tr>


		<tr>
			<td>Descripcion Categoria: </td>
			<td><input type="text" name="txtDescripcionCategoria" placeholder="Descripcion Categoria" required></td>
		</tr>



		<input type="hidden" name="oculto" value="1">


		<tr>
			<td><input type="reset" name=""></td>
			<td><input type="submit" name="Enviar" value="Registrarse"></td>
		</tr>
	</table>
</form>
<!-- Insertar Nueva Categoria FIN -->


</center>

	<script src="../../indexJava/app.js"></script> 
	<script src="../CuentaAdmi/Java/index.js"></script>
</body>
</html>